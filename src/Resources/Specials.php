<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;

/**
 * Class Specials
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class Specials extends Resource
{
    /**
     * @var array List of available methods for the current resource.
     */
    protected $methods = [
        [
            'name' => 'get',
            'url' => '',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'add',
            'url' => 'add',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'list',
            'url' => 'list',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'search',
            'url' => 'search',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'flag',
            'url' => 'flag',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ]
    ];

    /**
     * @var string Endpoint url for the current resource.
     */
    protected $endpoint = 'specials/';   
}