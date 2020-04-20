<?php

use YowayowaEnginners\SlackChannelProtector\WhetherToProtect;
use YowayowaEnginners\SlackChannelProtector\Env;
use PHPUnit\Framework\TestCase;

class WhetherToProtectTest extends TestCase
{
  public function testWhetherToProtect()
  {
    $data = [];

    $data["event"]["channel"] = Env::getEnvValue('CHANNEL');

    $data["event"]["user"] = 'aaa';

    $this->assertEquals('YowayowaEnginners\SlackChannelProtector\PostMessage', WhetherToProtect::WhetherToProtect($data));
  }

  public function testWhetherToProtectDifferentChannel()
  {
    $data = [];

    $data["event"]["channel"] = 'xxxxx';

    $data["event"]["user"] = 'ZZZ';

    $this->assertNull(WhetherToProtect::WhetherToProtect($data));
  }

  public function testWhetherToProtectSpecificUser()
  {
    $data = [];

    $data["event"]["channel"] = Env::getEnvValue('CHANNEL');

    $data["event"]["user"] = Env::getEnvValue('SPECIFICUSER');

    $this->assertNull(WhetherToProtect::WhetherToProtect($data));
  }
}