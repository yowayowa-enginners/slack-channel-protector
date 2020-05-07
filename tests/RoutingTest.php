<?php
require_once __DIR__ . '/../vendor/autoload.php';

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

    $data["event"]["channel"] = 'aaaaaaaa';

    $this->assertEquals('YowayowaEnginners\SlackChannelProtector\WhetherToProtect', Routing::detect($data));
  }

  public function testBotRouting()
  {
    $data = [];

    $data["event"]["bot_id"] = 'bot';

    $this->assertNull(Routing::detect($data));
  }
  
  public function testDetectFailures()
  {
    $data = ['aaa'];

    $this->assertNull(Routing::detect($data));

  }
}