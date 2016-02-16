<?php

function parseEnv($environmental_variables) {
  $envs = file($environmental_variables);
  $envsObj = new stdClass;
  foreach($envs as $env) {
    $item = explode("=",$env);
    $envsObj->$item[0] = $item[1];
  }
  return $envsObj;
}

// $auth = ($_SERVER['AUTH']) ? $_SERVER['AUTH'] : parseEnv('.env')->auth;
$auth = "xoxp-19250642657-19248205763-19260270998-b847394f84";

$autoloader = require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/vendor/wrapi/slack/src/slack.php';
// print_r($autoloader->getPrefixesPsr4());

$client = new wrapi\slack($auth);
$test = $client->emoji->list();

$bowtie = $test['emoji']['bowtie'];
echo "<img src=".$bowtie." />";
 