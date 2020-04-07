<?php

namespace src;

use src\UrlVerification;

class Routing
{
  public static function exec(array $data)
  {
    if($data["type"] = 'url_verification'){
      UrlVerification::ReturnChallengeValue($data);
    };
  }
}