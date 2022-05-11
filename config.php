<?php
//494360447283-7tehtdb555cfio5cl3d1ln2uij637m57.apps.googleusercontent.com
//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

?>

<?php

//start session on web page
//session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('494360447283-7tehtdb555cfio5cl3d1ln2uij637m57.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/item/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

$google_client->setAccessType("online");

//echo "desde config";

?>