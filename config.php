<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('982543347804-gkg929rkpatgisuh1043c2tibet99ont.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('YPL7tM3Y1FrYvDKfKXguKRfS');

//Set the OAuth 2.0 Redirect URI
//$google_client->setRedirectUri('http://localhost/project_1_form/index.php');
$google_client->setRedirectUri('http://localhost/login_using%20API/login.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();
