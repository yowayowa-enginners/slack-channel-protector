<?php

use YowayowaEnginners\SlackChannelProtector\Routing;
use YowayowaEnginners\SlackChannelProtector\Env;
use PHPUnit\Framework\TestCase;

class RoutingTest extends TestCase
{
  public function testExec()
  {
    $data = [];
    
    $data["type"] = 'url_verification';

    $this->assertEquals('YowayowaEnginners\SlackChannelProtector\UrlVerification', Routing::exec($data));
  }

  public function testPostRouting()
  {
    $data = [];

    $data["event"]["channel"] = Env::getEnvValue('CHANNEL');

    $this->assertEquals('YowayowaEnginners\SlackChannelProtector\WhetherToProtect', Routing::exec($data));
  }
  
  public function testExecFailures()
  {
    $data = [];

    $this->assertNull(Routing::exec($data));

  }
}