<?php

namespace YowayowaEnginners\SlackChannelProtector;

class UrlVerification implements Runnable
{
  public static function ReturnChallengeValue(array $data)
  {
    return $data["challenge"];
  }

  public function run(array $data)
  {
    self::ReturnChallengeValue($data);
  }
}