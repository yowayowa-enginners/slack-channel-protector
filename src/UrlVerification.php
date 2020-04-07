<?php

namespace YowayowaEnginners\SlackChannelProtector;

class UrlVerification
{
  public static function ReturnChallengeValue(array $data)
  {
      return $data["challenge"];
  }
}