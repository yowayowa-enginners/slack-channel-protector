<?php
require_once __DIR__ . '../vendor/autoload.php';

use YowayowaEnginners\SlackChannelProtector\Routing;
use YowayowaEnginners\SlackChannelProtector\Env;


$data = file_get_contents("php://input");

if (Env::getEnvValue('NODE_ENV') === 'debug'){
  file_put_contents("../data.log", $data, FILE_APPEND);
}

$data = json_decode($data, true);

echo Routing::run($data);
