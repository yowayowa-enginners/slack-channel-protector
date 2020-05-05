<?php

use YowayowaEnginners\SlackChannelProtector\WhetherToProtect;
use PHPUnit\Framework\TestCase;

class WhetherToProtectTest extends TestCase
{
  protected $channel;
  protected $user;

  protected function setUp() :void
  {
    $this->channel = ['abc', 'efg', 'hij'];
    $this->user = ['bbb', 'ccc', 'ddd'];
  }

  public function testWhetherToProtect()
  {
    $channelData = 'abc';
    $userData = 'aaa';
    
    $this->assertTrue(WhetherToProtect::ShouldProtect($channelData, $this->channel, $userData, $this->user));
  }

  public function testWhetherToProtectDifferentChannel()
  {
    $channelData = 'xxxxx';
    $userData = 'ZZZ';
    
    $this->assertFalse(WhetherToProtect::ShouldProtect($channelData, $this->channel, $userData, $this->user));
  }

  public function testWhetherToProtectSpecificUser()
  {
    $channelData = 'xxxxx';
    $userData = 'bbb';
  
    $this->assertFalse(WhetherToProtect::ShouldProtect($channelData, $this->channel, $userData, $this->user));
  }
}