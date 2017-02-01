<title> Facebook API </title>

<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<?php

require_once __DIR__ . '\php-graph-sdk-5.0.0\src\Facebook\autoload.php';

# INCLUDE CONFIG
require_once __DIR__ . '\inc\config.php';


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional

# URL MUST BE WHITELISTED ON FACEBOOK API LOGIN
$loginUrl = $helper->getLoginUrl('http://localhost/facebookapi_public/login-callback.php', $permissions);

echo '<a class="login-btn" href="' . $loginUrl . '"> <i class="fa fa-facebook" aria-hidden="true"></i> Log in with Facebook!</a>';

?>