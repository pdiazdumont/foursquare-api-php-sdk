<?php
namespace PDiazDumont\Foursquare\Tests;

use PDiazDumont\Foursquare\Client;
use PDiazDumont\Foursquare\Tests\FoursquareAPICredentials;

class APIRequestsTest extends \PHPUnit_Framework_TestCase
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(FoursquareAPICredentials::$clientId, FoursquareAPICredentials::$clientSecret);
    }

    public function testClientWrongResource()
    {
        $this->setExpectedException('PDiazDumont\Foursquare\Exceptions\InvalidMethodException');
        $this->client->unknownResource();
    }

    public function testClientWrongResourceMethod()
    {
        $this->setExpectedException('PDiazDumont\Foursquare\Exceptions\InvalidMethodException');
        $this->client->unknownResource()->unknownResourceMethod();
    }
}