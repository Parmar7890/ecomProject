<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('388755981402-s0ra6pqej6b7le0qtr5o1avj7bpj67mc.apps.googleusercontent.com');
// $google_client->setClientId('388755981402-s0ra6pqej6b7le0qtr5o1avj7bpj67mc.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/adityaTask/AdminLTE-3.2.0/auth/login1.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 