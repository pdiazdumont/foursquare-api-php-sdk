<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;

/**
 * Class Events
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class Events extends Resource
{
    /**
     * @var array List of available methods for the current resource.
     */
    protected $methods = [
        [
            'name' => 'get',
            'url' => '',
            'verb' => Verb::HTTP_GET,
            'response' => Response::BOTH,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'categories',
            'url' => 'categories',
            'verb' => Verb::HTTP_GET,
            'response' => Response::BOTH,
            'hasId' => false,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'search',
            'url' => 'search',
            'verb' => Verb::HTTP_GET,
            'response' => Response::BOTH,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'add',
            'url' => 'add',
            'verb' => Verb::HTTP_POST,
            'response' => Response::BOTH,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ]
    ];

    /**
     * @var string Endpoint url for the current resource.
     */
    protected $endpoint = 'events/';
}