<?php
include('config.php');

if (empty($_SESSION['username']) && empty($_SESSION['user_first_name'])) {
	echo "session username is empty";
	header('Refresh:3 ; URL=login.php');
} else {

	//session is not empty/means you logged in and now you are logged out
	echo "Loging you out...";



	//Reset OAuth access token
	//$google_client->revokeToken();
	//$google_client->revokeToken($_SESSION[ 'access_token' ]);
	//Destroy entire session data.
	session_destroy();


	header('Refresh:3 ; URL=login.php');
}
