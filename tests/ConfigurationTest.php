<?php
namespace PDiazDumont\Foursquare\Tests;

use PDiazDumont\Foursquare\Client;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    protected $client;

    public function testClientCorrectInitialization()
    {
        $this->client = new Client('key', 'secret');
        $this->assertInstanceof('PDiazDumont\Foursquare\Client', $this->client);
    }

    public function testClientWrongInitialization()
    {
        $this->setExpectedException('PDiazDumont\Foursquare\Exceptions\MissingArgumentException');
        $this->client = new Client();
    }

    public function testClientAccessToken()
    {
        $this->client = new Client('key', 'secret');
        $this->client->setAccessToken('token');
        $this->assertTrue($this->client->isAuthenticated());
    }
}