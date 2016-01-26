# Foursquare API PHP Wrapper

## Introduction
This project offers a more semantic way of accessing the Foursquare API using PHP. Instead of just wrapping the http requests it allows you to access the information using the following syntax:
```php
$foursquare->venues('VENUE_ID')->get();
$foursquare->venues()->search($params);
$foursquare->users('USER_ID')->checkins();
```

**Features:**
* Full support of the Foursquare API including the Real time API.
* Compatible with the PSR-4 standard.
* Friendly commands to query the API.

## Installation
This library can be installed using [Composer](http://getcomposer.org/) by running the following command:
```
composer require pdiazdumont/foursquare-api-php-wrapper
```

## Usage
There are three use cases: requesting an access token from a user, querying the API and accessing the real time data. All these cases require the same code of initialization:

### Initialization
Require the autoloader in order to make all the wrapper classes available.
```php
require 'vendor/autoload.php';
```

Include the API client class.
```php
use PDiazDumont\Foursquare\Client;
```

Instantiate a new client. The required parameters are the application id and the application secret provided by Foursquare after registering your application.
```php
$foursquare = new Client('APPLICATION_ID','APPLICATION_SECRET');
```

### Getting an access token from a user
Certain API requests require permission from the users in order to access their information. The following code demonstrates how to retrieve and store the token that grants permission to your application.

```php
require 'vendor/autoload.php';

use PDiazDumont\Foursquare\Client;

$foursquare = new Client('APPLICATION_ID','APPLICATION_SECRET');

/*
To perform the process of authentication only when needed, the client provides a helper
method called "isAuthenticated".
*/
if ($foursquare->isAuthenticated()) {
    return;
}

/*
The API client must know the redirect URL of the authentication process,
this URL must be equal to the one that is registered in your Foursquare application.
*/
$foursquare->setRedirectUrl('REDIRECT_URL');

/*
The link that the user needs to visit in order to give permission to your application is
generated using the method "getAuthenticationUrl".
*/
$url = $foursquare->getAuthenticationUrl();
header('Location: '. $url);

/*
After the user gives their permission, Foursquare will perform a redirect to the valid Redirect URL
defined in your application, adding a CODE parameter required to complete the process.
The "authenticate" method will exchange the CODE with a valid Access Token, setting it into the client.
*/
if (isset($_REQUEST['code'])) {
    $foursquare->authenticate();
}

/*
After the authentication process, the Access Token can be retrieved and saved for later use.
*/
$accessToken = $foursquare->getAccessToken();
// Save the Access token into a database or other alternative of persistent storage.
```

### Performing requests
The API client exposes a method for each of the resources available in the Foursquare API, this resources are: users, venues, venue groups, checkins, tips, lists, updates, photos, settings, specials, events and page updates. Each one of them has its own methods and arguments so the resulting structure of an api request is:
```php
$foursquare->resource($resourceId)->method($methodParams)
```

Examples:
```php
// Search for a venue
$venues = $foursquare->venues()->search([
    'll' => '44.3,37.2',
    'near' => 'Chicago, IL'
]);

// Get a list of the trending venues surrounding the user
$trending = $foursquare->venues()->trending([
    'll' => '44.3,37.2',
    'limit' => 10
]);

// Get a list of categories applied to venues
$categories = $foursquare->venues()->categories();

// Get information about a particular venue
$venue = $foursquare->venues('VENUE_ID')->get();

// Get information about the friends of a particular user
$friends = $foursquare->users('USER_ID')->friends();

// Get information about the checkins of a particular user
$friends = $foursquare->users('USER_ID')->checkins();

// Get information about the current user, note that the id is equal to "self"
$friends = $foursquare->users('self')->friends();
```

By reading the API documentation is easy to determine the methods that are available and the required arguments.
The following code illustrates how to query the API, note that this time the access token is set directly.

```php
require 'vendor/autoload.php';

use PDiazDumont\Foursquare\Client;

$foursquare = new Client('APPLICATION_ID','APPLICATION_SECRET');

/* To be able to query all the resources it is necessary to set a valid access token,
this token should be retrieved from a database or other type of storage, considering
that it was obtained previously.
*/
$foursquare->setAccessToken('ACCESS_TOKEN');

// Now everything's ready to perform requests
$data = $foursquare->users('self')->get();
echo "Welcome " . $data['user']['firstName'] . " " . $data['user']['lastName'];
```

### Real time API
This functionality can be activated in the Foursquare application dashboard and allows your application to receive a POST request every time one of your users do a checkin. The wrapper allows you to validate the request and extract the information received.
```php
require '../vendor/autoload.php';

use PDiazDumont\Foursquare\Client;

$foursquare = new Client('APPLICATION_ID','APPLICATION_SECRET');

if ($foursquare->validateUserPush()) {
    $data = $foursquare->getUserPushData();
    // Do something with the push data.
}
```