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

    $this->assertEquals('YowayowaEnginners\SlackChannelProtector\WheatherToProtect', Routing::exec($data));
  }
  
  public function testExecFailures()
  {
    $data = [];

    $data = [
      'りんご' => [
        'price' => 100,
        'quantity' => 50
      ],
      'みかん' => [
        'price' => 500,
        'quantity' => 30
      ],
      'メロン' => [
        'price' => 5000,
        'quantity' => 2
      ],
      'ぶどう' => [
        'price' => 2000,
        'quantity' => 1
      ]
    ];

    // var_dump($data);
    // arsort($data);
    // var_dump($data);
    
    $sortKey = array();
    foreach ($data as $index => $val) {
      $sortKey[$index] = $val['price'] * $val['quantity'];
    }
    
    array_multisort($sortKey, SORT_ASC, $data);
    
    // var_dump($data);

    $this->assertNull(Routing::exec($data));

  }
}