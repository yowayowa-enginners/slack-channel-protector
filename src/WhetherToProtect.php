<?php

namespace YowayowaEnginners\SlackChannelProtector;

class WhetherToProtect implements Runnable
{
  public function run(array $data)
  {
    $needleChannel = $data["event"]["channel"];
    $needleUser = $data["event"]["user"];

    $channel = Env::getEnvValueAsArray('CHANNEL');
    $user = Env::getEnvValueAsArray('SPECIFICUSER');

    if(self::NeedsToProtect($needleChannel, $channel, $needleUser, $user)){
      PostMessage::PostMessage($data);
    }
  }

  public static function NeedsToProtect(string $needleChannel, array $channel, string $needleUser, array $user) :bool 
  { 
    return in_array($needleChannel, $channel,true) && !in_array($needleUser, $user,true);
  }
}