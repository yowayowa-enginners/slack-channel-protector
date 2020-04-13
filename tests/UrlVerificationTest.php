<?php

use YowayowaEnginners\SlackChannelProtector\UrlVerification;
use PHPUnit\Framework\TestCase;

class UrlVerificationTest extends TestCase
{
  public function testReturnChallengeValue()
  {
    $data = [];

    $data["challenge"] = "abc";

    $this->assertEquals('abc', UrlVerification::ReturnChallengeValue($data));
    
  }
}