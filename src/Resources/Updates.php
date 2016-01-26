<?php
namespace PDiazDumont\Foursquare\Resources;

use PDiazDumont\Foursquare\Enums\ResponseEnum as Response;
use PDiazDumont\Foursquare\Enums\VerbEnum as Verb;

/**
 * Class Updates
 *
 * @package PDiazDumont\Foursquare\Resources
 */
class Updates extends Resource
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
            'name' => 'notifications',
            'url' => 'notifications',
            'verb' => Verb::HTTP_GET,
            'response' => Response::BOTH,
            'hasId' => false,
            'hasParams' => true,
            'isPrivate' => true
        ],
        [
            'name' => 'markNotificationsRead',
            'url' => 'marknotificationsread',
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
    protected $endpoint = 'updates/';
}