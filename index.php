<?php
require_once "vendor/autoload.php";

use YowayowaEnginners\SlackChannelProtector\Routing;

$data = file_get_contents("php://input");

file_put_contents("log.php", $data, FILE_APPEND);

$data = json_decode($data, true);

echo Routing::run($data);
