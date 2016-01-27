<?php
namespace PDiazDumont\Foursquare;

use PDiazDumont\Foursquare\Exceptions;

/**
 * Class Client
 *
 * @package PDiazDumont\Foursquare
 */
class Client
{
    /**
     * @const string Endpoint url to request authentication.
     */
    const AUTHENTICATION_URL = 'https://foursquare.com/oauth2/authenticate';
    
    /**
     * @const string Endpoint url to request an access token.
     */
    const TOKEN_URL = 'https://foursquare.com/oauth2/access_token';

    /**
     * @const string Endpoint url of the API.
     */
    const API_URL = 'https://api.foursquare.com/';

    /**
     * @const string Version of the API.
     */
    const API_VERSION = 'v2/';
/**
     * @const string Version of the API.
     */
    const API_DATE_VERSION = '20140806';

    /**
     * @var string The application ID.
     */
    private $clientId;

    /**
     * @var string The application secret.
     */
    private $clientSecret;

    /**
     * @var string Use the API updates up to this date.
     */
    private $clientDate;

    /**
     * @var string The application redirect url.
     */
    private $redirectUrl;

    /**
     * @var string The base API endpoint url.
     */
    private $endpoint;

    /**
     * @var string The application http client.
     */
    private $httpClient;

    /**
     * @var string The application access token.
     */
    private $accessToken;

    /**
     * @var string List of Foursquare resources available in the API.
     */
    private $resources = [
        'users',
        'venues',
        'venueGroups',
        'checkins',
        'tips',
        'lists',
        'updates',
        'photos',
        'settings',
        'specials',
        'events',
        'pageupdates',
    ];

    /**
     * Creates a new instance of the API client.
     *
     * @param string $clientId     Application ID.
     * @param string $clientSecret Application secret.
     *
     * @return string
     */
    public function __construct($clientId = null, $clientSecret = null, $clientDate = null)
    {
        if (is_null($clientId) || is_null($clientSecret)) {
            throw new Exceptions\MissingArgumentException("The Foursquare client requires an application ID and an application secret.", 401);
        }
        $this->endpoint = static::API_URL.static::API_VERSION;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->clientDate = (isset($clientDate)) ? $clientDate : static::API_DATE_VERSION;
        $this->httpClient = new \GuzzleHttp\Client(['verify' => false]);
    }

    /**
     * Sets the redirect url.
     *
     * @param string $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * Returns a valid authentication url.
     *
     * @return string
     */
    public function getAuthenticationUrl()
    {
        $params = [
            'client_id' => $this->clientId,
            'response_type' => 'code',
            'redirect_uri' => $this->redirectUrl
        ];
        return static::AUTHENTICATION_URL . '?' . http_build_query($params);
    }

    /**
     * Request an access token and sets it to the client.
     *
     * @throws ServerException
     */
    public function authenticate()
    {
        $code = $_REQUEST['code'];
        if (!isset($code)) {
            throw new Exceptions\ServerException("The Foursquare server didn't return a code.", 401);
        }
        $params = [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $this->redirectUrl,
            'code' => $code
        ];
        $response = json_decode($this->httpClient->get(static::TOKEN_URL, [
            'query' => $params
        ])->getBody(), true);
        if (isset($response['access_token'])) {
            $this->accessToken = $response['access_token'];
        } else {
            throw new Exceptions\ServerException("The Foursquare server didn't return an access token.", 401);
        }
    }

    /**
     * Sets the Access Token.
     *
     * @param string $accessToken Access token to set in the client.
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Returns the application Access Token.
     *
     * @return string|null
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Validates the received push data and returns the result.
     *
     * @return bool
     */
    public function validateUserPush()
    {
        if ((in_array('checkin', $_REQUEST) || in_array('like', $_REQUEST) || in_array('tip', $_REQUEST) || in_array('photo', $_REQUEST)) && in_array('user', $_REQUEST) && in_array('secret', $_REQUEST)) {
            $secret = json_decode($_REQUEST['secret'], true);
            return $secret == $this->clientSecret;
        }
        return false;
    }

    /**
     * Returns the received push data.
     *
     * @return array
     */
    public function getUserPushData()
    {
        return [
            'checkin' => json_decode($_REQUEST['checkin'], true),
            'user' => json_decode($_REQUEST['user'], true)
        ];
    }

    /**
     * Instantiates a new resource class.
     *
     * @param string $name Name of the method.
     * @param array  $args Arguments of the method.
     *
     * @return Resource
     *
     * @throws InvalidMethodException
     */
    public function __call($name, $args)
    {
        if (in_array($name, $this->resources)) {
            $class = __NAMESPACE__ . '\\Resources\\' . ucfirst($name);
            return new $class($this, $args);
        } else {
            throw new Exceptions\InvalidMethodException(sprintf("The method '%s' doesn't exist.", $name));
        }
    }

    /**
     * Prepare the arguments to send in the API request and returns them as an array.
     *
     * @param array $args Arguments of the method.
     *
     * @return array
     */
    public function prepareArguments($args) {
        $args['client_id'] = $this->clientId;
        $args['client_secret'] = $this->clientSecret;
        $args['v'] = $this->clientDate;
        return $args;
    }

    /**
     * Validates if the client is authenticated and returns the result.
     *
     * @return bool
     */
    public function isAuthenticated()
    {
        return !empty($this->accessToken);
    }

    /**
     * Makes a GET request to the API and returns the reuslt.
     *
     * @param string $url  Url to request.
     * @param array  $args Arguments to send in the request.
     *
     * @return array
     */
    public function get($url, $args)
    {
        $args = $this->prepareArguments($args);
        return json_decode($this->httpClient->get($this->endpoint . $url, [
            'query' => $args
        ])->getBody(), true);
    }

    /**
     * Makes a POST request to the API and returns the reuslt.
     *
     * @param string $url  Url to request.
     * @param array  $args Arguments to send in the request.
     *
     * @return array
     */
    public function post($url, $args)
    {
        $args = $this->prepareArguments($args);
        return json_decode($this->httpClient->post($this->endpoint . $url, [
            'form_params' => $args
        ])->getBody(), true);
    }
}