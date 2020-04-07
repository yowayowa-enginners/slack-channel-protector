<?php

$data = file_get_contents("php://input");

file_put_contents("log.php", $data, FILE_APPEND);

$data = json_decode($data, true);

echo Routing::exec($data);

class Routing
{
  public static function exec(array $data)
  {
    if($data["type"] = 'url_verification'){
      UrlVerification::ReturnChallengeValue($data);
    };
  }
}

class UrlVerification
{
  public static function ReturnChallengeValue(array $data)
  {
      return $data["challenge"];
  }
}
