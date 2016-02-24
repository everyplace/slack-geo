<?php

function pre_print($item) {
	echo "<pre>";
	var_dump($item);
	echo "</pre>";
}

function parseEnv($environmental_variables) {
  $envs = file($environmental_variables);
  $envsObj = new stdClass;
  foreach($envs as $env) {
    $item = explode("=",$env);
    $envsObj->$item[0] = trim($item[1]);
  }
  return $envsObj;
}

$auth = ($_SERVER['AUTH']) ? $_SERVER['AUTH'] : parseEnv('.env')->AUTH;
$autoloader = require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/vendor/wrapi/slack/src/slack.php';

$client = new wrapi\slack($auth);
$test = $client->emoji->list();

$bowtie = $test['emoji']['bowtie'];
echo "<img src=".$bowtie." />";
