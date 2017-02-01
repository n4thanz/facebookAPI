<?php 
# MUST USE SESSIONS
session_start();

# FB CORE FILES FOR API USE
require_once 'php-graph-sdk-5.0.0\src\Facebook\autoload.php';

$appID = 'APP ID HERE';
$appSecret = 'APP SECRET HERE';

# API CONFIG
$fb = new Facebook\Facebook([
  'app_id' => $appID,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v2.5',
]);

?>