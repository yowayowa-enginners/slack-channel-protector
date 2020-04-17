<?php

namespace YowayowaEnginners\SlackChannelProtector;

class PostMessage
{
  public static function run()
  {
    self::PostMessage();
  }

  public static function PostMessage()
  {
    $text ='プロテクターのテストです';
    $data = array(
      'text' => "$text"
    );
    $url = "https://hooks.slack.com/services/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";
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_POST, TRUE); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HEADEROPT, array('Content-Type: application/json'));

    // curl_exec($curl);
  }
}