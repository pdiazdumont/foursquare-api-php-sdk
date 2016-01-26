<?php
require '../vendor/autoload.php';

use PDiazDumont\Foursquare\Client;

$foursquare = new Client('APPLICATION_ID','APPLICATION_SECRET');
$foursquare->setAccessToken('ACCESS_TOKEN');

$data = $foursquare->users('self')->checkins([
    'limit' => 10
]);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Making API Calls</title>
    </head>
    <body>
        <h1>Foursquare API</h1>
        <hr>
        <?php
        if (count($data['checkins']['items']) == 0) {
            echo "<p>You don't have any checkins.</p>";
        } else {
            echo '<p>Your last 10 checkins are:</p>';
            foreach ($data['checkins']['items'] as $checkin) {
                echo $checkin['venue']['name'] . "<br>";
            }
        }
        ?>
    </body>
</html>