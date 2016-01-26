<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;

/**
 * Class Users
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class Users extends Resource
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
            'name' => 'requests',
            'url' => 'requests',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => false,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'search',
            'url' => 'search',
            'verb' => Verb::HTTP_GET,
            'response' => Response::BOTH,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'checkins',
            'url' => 'checkins',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'friends',
            'url' => 'friends',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'lists',
            'url' => 'lists',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'mayorships',
            'url' => 'mayorships',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'photos',
            'url' => 'photos',
            'verb' => Verb::HTTP_GET,
            'response' => Response::BOTH,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'tastes',
            'url' => 'tastes',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'tips',
            'url' => 'tips',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'venueHistory',
            'url' => 'venuehistory',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'venueLikes',
            'url' => 'venuelikes',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'approve',
            'url' => 'approve',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'deny',
            'url' => 'deny',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'setPings',
            'url' => 'setpings',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'unfriend',
            'url' => 'unfriend',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'update',
            'url' => 'self/update',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ]
    ];

    /**
     * @var string Endpoint url for the current resource.
     */
    protected $endpoint = 'users/';
}