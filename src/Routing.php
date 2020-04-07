<?php

namespace YowayowaEnginners\SlackChannelProtector;

use YowayowaEnginners\SlackChannelProtector\UrlVerification;

class Routing
{
  public static function exec(array $data)
  {
    if($data["type"] = 'url_verification'){
      UrlVerification::ReturnChallengeValue($data);
    };
  }
}