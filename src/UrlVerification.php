<?php

namespace YowayowaEnginners\SlackChannelProtector;

class UrlVerification
{
  public static function ReturnChallengeValue(array $data)
  {
    return $data["challenge"];
  }

  public static function run(array $data)
  {
    self::ReturnChallengeValue($data);
  }
}