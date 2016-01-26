<?php
require '../vendor/autoload.php';

use PDiazDumont\Foursquare\Client;

$foursquare = new Client('APPLICATION_ID','APPLICATION_SECRET');
$foursquare->setRedirectUrl('REDIRECT_URL');

if ($foursquare->isAuthenticated()) {
    $data = $foursquare->users('self')->get();
} else if (isset($_REQUEST['code'])) {
    $foursquare->authenticate();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Getting an Access Token</title>
    </head>
    <body>
        <h1>Foursquare API</h1>
        <hr>
        <?php
        if (!$foursquare->isAuthenticated()) {
            echo '<p>You need to allow this application to access your Foursquare information, to do so please follow this link: <a href="' . $foursquare->getAuthenticationUrl() . '">Foursquare authentication</a></p>';
        } else {
            echo "<p>Welcome " . $data['user']['firstName'] . " " . $data['user']['lastName'] . ", you've checkin " . $data['user']['checkins']['count'] . " times and you have " . $user['user']['coinBalance'] . " coins.</p><br>";
            echo "<img src='" . $data['user']['photo']['prefix'] . "88" . $data['user']['photo']['suffix'] . "'>";
        }
        ?>
    </body>
</html>