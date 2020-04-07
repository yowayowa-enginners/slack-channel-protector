<?php

use src\Routing;

$data = file_get_contents("php://input");

file_put_contents("log.php", $data, FILE_APPEND);

$data = json_decode($data, true);

echo Routing::exec($data);
