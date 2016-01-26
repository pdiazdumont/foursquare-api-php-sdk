<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;

/**
 * Class Lists
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class Lists extends Resource
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
            'name' => 'get',
            'url' => '',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => false
        ],
        [
            'name' => 'followers',
            'url' => 'followers',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [//TODO
            'name' => 'items',
            'url' => 'items',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'saves',
            'url' => 'saves',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'suggestPhoto',
            'url' => 'suggestphoto',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'suggestTip',
            'url' => 'suggesttip',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'suggestVenues',
            'url' => 'suggestvenues',
            'verb' => Verb::HTTP_GET,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'addItem',
            'url' => 'additem',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'deleteItem',
            'url' => 'deleteitem',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'follow',
            'url' => 'follow',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'moveItem',
            'url' => 'moveitem',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'share',
            'url' => 'share',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'unfollow',
            'url' => 'unfollow',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'update',
            'url' => 'update',
            'verb' => Verb::HTTP_POST,
            'response' => Response::FOURSQUARE,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'updateItem',
            'url' => 'updateitem',
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
    protected $endpoint = 'lists/';
}