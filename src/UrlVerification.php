<?php

namespace src;

class UrlVerification
{
  public static function ReturnChallengeValue(array $data)
  {
      return $data["challenge"];
  }
}