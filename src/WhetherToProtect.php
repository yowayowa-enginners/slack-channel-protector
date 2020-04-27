<?php

namespace YowayowaEnginners\SlackChannelProtector;

class WhetherToProtect implements run
{
  public function run(array $data)
  {
    self::WhetherToProtect($data)::PostMessage($data);
  }

  public static function WhetherToProtect(array $data)
  { 
    $channel = Env::getEnvValueAsArray('CHANNEL');
    $user = Env::getEnvValueAsArray('SPECIFICUSER');

    if(in_array($data["event"]["channel"], $channel) && !in_array($data["event"]["user"], $user)){
      return PostMessage::class;
    }
  }
}