<?php

namespace YowayowaEnginners\SlackChannelProtector;

class Routing
{
  public static function exec(array $data)
  {
    if($data["type"] === 'url_verification'){
      return UrlVerification::class;
    };
  }

  
  public static function run($data)
  {
    self::exec($data)::run($data);
  }
}
