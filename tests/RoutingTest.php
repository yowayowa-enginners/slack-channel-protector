<?php

use YowayowaEnginners\SlackChannelProtector\Routing;
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

    $data["event"]["channel"] = 'CQT49CT8B';

    $this->assertEquals('YowayowaEnginners\SlackChannelProtector\WhetherToProtect', Routing::exec($data));
  }
  
  public function testExecFailures()
  {
    $data = [];

    $this->assertNull(Routing::exec($data));

  }
}