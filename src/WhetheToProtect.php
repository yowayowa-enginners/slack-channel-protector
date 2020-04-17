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
    if($data["event"]["channel"] === 'CQT49CT8B' && $data["event"]["user"] !== 'UTH8P3G4A'){
      return PostMessage::class;
    }
  }
}