<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;

/**
 * Class PageUpdates
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class PageUpdates extends Resource
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
            'isPrivate' => true
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
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'delete',
            'url' => 'delete',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'like',
            'url' => 'like',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ]
    ];

    /**
     * @var string Endpoint url for the current resource.
     */
    protected $endpoint = 'pageupdates/';
}