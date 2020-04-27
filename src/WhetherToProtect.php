<?php

namespace YowayowaEnginners\SlackChannelProtector;

class WhetherToProtect
{
  public static function run(array $data)
  {
    self::WhetherToProtect($data)::run();
  }

  public static function WhetherToProtect(array $data)
  { 
    $channel = Env::getEnvValue('CHANNEL');
    $user = Env::getEnvValue('SPECIFICUSER');

    if($data["event"]["channel"] === $channel && $data["event"]["user"] !== $user){
      return PostMessage::class;
    }
  }
}