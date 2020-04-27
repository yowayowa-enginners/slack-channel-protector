<?php

use YowayowaEnginners\SlackChannelProtector\Routing;
use YowayowaEnginners\SlackChannelProtector\Env;
use PHPUnit\Framework\TestCase;

class RoutingTest extends TestCase
{
  public function testDetect()
  {
    $data = [];
    
    $data["type"] = 'url_verification';

    $this->assertEquals('YowayowaEnginners\SlackChannelProtector\UrlVerification', Routing::detect($data));
  }

  public function testPostRouting()
  {
    $data = [];

    $data["event"]["channel"] = Env::getEnvValue('CHANNEL');

    $this->assertEquals('YowayowaEnginners\SlackChannelProtector\WhetherToProtect', Routing::detect($data));
  }
  
  public function testExecFailures()
  {
    $data = [];

    $this->assertNull(Routing::detect($data));

  }
}