<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;

/**
 * Class Venues
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class Venues extends Resource
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
            'name' => 'categories',
            'url' => 'categories',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => false,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'explore',
            'url' => 'explore',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'managed',
            'url' => 'managed',
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
            'response' => Response::BOTH,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'explore',
            'url' => 'explore',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'suggestCompletion',
            'url' => 'suggestcompletion',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'timeSeries',
            'url' => 'timeseries',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'trending',
            'url' => 'trending',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'events',
            'url' => 'events',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'hereNow',
            'url' => 'herenow',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'hours',
            'url' => 'hours',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'likes',
            'url' => 'likes',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'links',
            'url' => 'links',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'listed',
            'url' => 'listed',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'menu',
            'url' => 'menu',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'nextVenues',
            'url' => 'nectvenues',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'photos',
            'url' => 'photos',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'similar',
            'url' => 'similar',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'stats',
            'url' => 'stats',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'tips',
            'url' => 'tips',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'claim',
            'url' => 'claim',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'dislike',
            'url' => 'dislike',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'edit',
            'url' => 'edit',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'flag',
            'url' => 'flag',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'like',
            'url' => 'like',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'claim',
            'url' => 'claim',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'proposeEdit',
            'url' => 'proposeedit',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'setRole',
            'url' => 'setrole',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'setSingleLocation',
            'url' => 'setsinglelocation',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ]
    ];

    /**
     * @var string Endpoint url for the current resource.
     */
    protected $endpoint = 'venues/';
}