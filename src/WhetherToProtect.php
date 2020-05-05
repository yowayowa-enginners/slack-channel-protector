<?php

namespace YowayowaEnginners\SlackChannelProtector;

class WhetherToProtect implements Runnable
{
  public function run(array $data)
  {
    $targetChannel = $data["event"]["channel"];
    $targetUser = $data["event"]["user"];

    $protectChannels = Env::getEnvValueAsArray('CHANNEL');
    $whitelistUsers = Env::getEnvValueAsArray('SPECIFICUSER');

    if(self::ShouldProtect($targetChannel, $protectChannels, $targetUser, $whitelistUsers)){
      PostMessage::PostMessage($data);
    }
  }

  public static function ShouldProtect(string $targetChannel, array $protectChannels, string $targetUser, array $whitelistUsers) :bool 
  { 
    return in_array($targetChannel, $protectChannels,true) && !in_array($targetUser, $whitelistUsers,true);
  }
}