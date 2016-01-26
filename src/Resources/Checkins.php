<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;

/**
 * Class Checkins
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class Checkins extends Resource
{
    /**
     * @var array List of available methods for the current resource.
     */
    protected $methods = [
        [
            'name' => 'get',
            'url' => '',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'add',
            'url' => 'add',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'recent',
            'url' => 'recent',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'resolve',
            'url' => 'resolve',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => false,
            'hasParams' => false,
            'isPrivate' => true
        ],
        [
            'name' => 'likes',
            'url' => 'likes',
            'verb' => Verb::HTTP_GET,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => false,
            'isPrivate' => false
        ],
        [
            'name' => 'addComment',
            'url' => 'addcomment',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'addPost',
            'url' => 'addpost',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'deleteComment',
            'url' => 'deletecomment',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'like',
            'url' => 'like',
            'verb' => Verb::HTTP_POST,
            'response' => Response::SWARM,
            'hasId' => true,
            'hasParams' => true,
            'isPrivate' => true
        ]
    ];

    /**
     * @var string Endpoint url for the current resource.
     */
    protected $endpoint = 'checkins/';
}