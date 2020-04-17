<?php

use YowayowaEnginners\SlackChannelProtector\WhetherToProtect;
use PHPUnit\Framework\TestCase;

class WhetherToProtectTest extends TestCase
{
  public function testWhetherToProtect()
  {
    $data = [];

    $data["event"]["channel"] = 'CQT49CT8B';

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

    $data["event"]["channel"] = 'CQT49CT8B';

    $data["event"]["user"] = 'UTH8P3G4A';

    $this->assertNull(WhetherToProtect::WhetherToProtect($data));
  }
}