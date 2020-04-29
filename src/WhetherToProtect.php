<?php

namespace YowayowaEnginners\SlackChannelProtector;

class WhetherToProtect implements Runnable
{
  public function run(array $data)
  {
    if(is_null(self::WhetherToProtect($data))){
      exit;
    }
    self::WhetherToProtect($data)::PostMessage($data);
  }

  public static function WhetherToProtect(array $data)
  { 
    $channel = Env::getEnvValueAsArray('CHANNEL');
    $user = Env::getEnvValueAsArray('SPECIFICUSER');

    if(in_array($data["event"]["channel"], $channel,true) && !in_array($data["event"]["user"], $user,true)){
      return PostMessage::class;
    }
  }
}