<?php

namespace YowayowaEnginners\SlackChannelProtector;

class Routing
{
  public static function detect(array $data)
  {
    if($data["type"] === 'url_verification'){
      return UrlVerification::class;
    };

    if(isset($data["event"]["subtype"]) && $data["event"]["subtype"] == "bot_message"){
      exit; // 自分自身(bot)のメッセージは処理しない
    }

    if(isset($data["event"]["channel"])){
      return WhetherToProtect::class;
    }
  }

  public static function exec($data)
  {
    self::detect($data)::run($data);
  }
}
