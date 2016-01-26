<?php
require '../vendor/autoload.php';

use PDiazDumont\Foursquare\Client;

$foursquare = new Client('APPLICATION_ID','APPLICATION_SECRET');

if ($foursquare->validateUserPush()) {
    $data = $foursquare->getUserPushData();
    // Do something with the push data.
}