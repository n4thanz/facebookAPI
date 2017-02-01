<title> Facebook API </title>

<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<?php

# INCLUDE CONFIG
require_once __DIR__ . '\inc\config.php';

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  # CONFIRM USER IS LOGGED IN
  echo "<i class='fa fa-check'></i> You are logged in" . "<br/>";

  # ECHOS THE CURRENT ACCESS TOKEN
  // echo "Access Token:" . $accessToken . "<br/><br/>";


  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']


   /* NZ */

		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $fb->get('/me?fields=id,name,email,likes,picture', $accessToken);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$user = $response->getGraphUser();

		echo "<img src='" . $user['picture']['url'] . "'><br/>";
		echo 'Name: ' . $user['name'] . "<br/>";
		echo 'Email: ' . $user['email'];

		echo "<br/>";


		# CONVERT OBJECT TO ARRAY
		$likesArray =  array($user['likes']);

		# DUMPED ARRAY
		//print_r($likesArray);

		# NOTE: THE ARRAY THAT HOLDS THE DATA IN INSIDE AN ARRAY HENCE [0][1]
		//echo $likesArray[0][1]['name'];

		echo "<br/><br/>";

		echo "<ul>";

		# FOREACH LOOP THAT PULLS THE NAME & ID OF A LIKE AND ADDS THEM AND UL WITH LINKS
		foreach ($likesArray[0] as $item) {
			echo "<li><a target='_new' href='https://www.facebook.com/" . $item['id'] . "'>" . $item['name'] . "</a></li>";
		}

		echo "</ul>";





}


?>