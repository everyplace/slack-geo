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

$auth = ($_SERVER['AUTH']) ? $_SERVER['AUTH'] : parseEnv('.env');

$autoloader = require __DIR__ . '/vendor/autoload.php';

print_r($autoloader->getPrefixesPsr4());

$client = new wrapi\slack($auth);
