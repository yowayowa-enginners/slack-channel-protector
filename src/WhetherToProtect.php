<?php

namespace YowayowaEnginners\SlackChannelProtector;

class WhetherToProtect implements Runnable
{
  public function run(array $data)
  {
    $targetChannel = $data["event"]["channel"];
    $targetUser = $data["event"]["user"];

    $channels = Env::getEnvValueAsArray('CHANNEL');
    $users = Env::getEnvValueAsArray('SPECIFICUSER');

    if(self::ShouldProtect($targetChannel, $channels, $targetUser, $users)){
      PostMessage::PostMessage($data);
    }
  }

  public static function ShouldProtect(string $targetChannel, array $channels, string $targetUser, array $users) :bool 
  { 
    return in_array($targetChannel, $channels,true) && !in_array($targetUser, $users,true);
  }
}