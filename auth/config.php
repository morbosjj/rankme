<?php
	
require_once '../vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setClientId('328447961111-6ks6c3u6vmo8kvta8pjlbit7f3rpeoup.apps.googleusercontent.com');
$google_client->setClientSecret('MI9sTec0ixUPGNG9RB9OROqr');
$google_client->setRedirectUri('https://rank-me.000webhostapp.com/auth/auth.php');

$google_client->addScope('email');
$google_client->addScope('profile');

session_start();


?>