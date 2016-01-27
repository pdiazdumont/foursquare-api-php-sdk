<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;
use PDiazDumont\Foursquare\Exceptions;

/**
 * Class Resource
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class Resource
{

    /**
     * @var string The API client.
     */
    protected $client;

    /**
     * @var string The resource ID.
     */
    protected $id;

    /**
     * Instantiates a new resource class.
     *
     * @param string $name HTTP client.
     * @param array  $args ID of the resource.
     *
     * @return Resource
     */
    public function __construct($client, $args)
    {
        $this->client = $client;
        if (count($args) == 1) {
            $this->id = $args[0];
        } else if (count($args) > 1) {
            throw new Exceptions\InvalidArgumentException("This method requires at most 1 argument.");
        }
    }

    /**
     * Sets the ID of the resourcer.
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Finds if a method is available for the resource.
     *
     * @param string $name Name of the method.
     *
     * @return array|bool
     */
    public function findMethod($name)
    {
        $method = array_search($name, array_column($this->methods, 'name'));
        if ($method !== false) {
            return $this->methods[$method];
        } else {
            return $method;
        }
    }

    /**
     * Calls a method in the current resource.
     *
     * @param string $name Name of the method.
     * @param array  $args Arguments of the method.
     *
     * @return array
     *
     * @throws InvalidMethodException
     */
    public function __call($name, $args)
    {
        $method = $this->findMethod($name);
        if ($method) {
            return $this->callAPI($method, (count($args) != 0) ? $args[0] : []);
        } else {
            throw new Exceptions\InvalidMethodException(sprintf("The method '%s' doesn't exist.", $name));
        }
    }

    /**
     * Makes a request to the API and returns the result.
     *
     * @param string $method Method to call.
     * @param array  $args Arguments of the method.
     *
     * @return array
     *
     * @throws ServerException
     */
    public function callAPI($method, $args)
    {
        if ($method['isPrivate']) {
            if (!$this->client->isAuthenticated()) {
                throw new Exceptions\ServerException("A valid access token is required to perform this operation.");
            }
            $args['oauth_token'] = $this->client->getAccessToken();
        }
        $url = $this->endpoint;
        if ($method['hasId']) {
            $url .= $this->id . '/';
        }
        $url .= $method['url'] . '/';
        switch ($method['response']) {
            case Response::FOURSQUARE:
                $args['m'] = 'foursquare';
                break;
            case Response::SWARM:
            case Response::BOTH:
                $args['m'] = 'swarm';
                break;
        }
        switch ($method['verb']) {
            case Verb::HTTP_GET:
                $response = $this->client->get($url, $args);
                break;
            case Verb::HTTP_POST:
                $response = $this->client->post($url, $args);
                break;
        }
        if ($response['meta']['code'] == 200) {
            return $response['response'];
        } else {
            throw new Exceptions\ServerException($response['meta']['errorDetail'], $response['meta']['code']);
        }
    }
}