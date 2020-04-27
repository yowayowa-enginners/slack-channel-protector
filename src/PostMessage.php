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
    $token = Env::getEnvValue('SLACK_BOT_ACCESS_TOKEN');
    $text = Env::getEnvValue('TEXT');

    $data = array(
      "token" =>  $token,
      'text' => $text
    );

    $url = Env::getEnvValue('URL');
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_POST, TRUE); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HEADEROPT, array('Content-Type: application/json'));

    curl_exec($curl);
  }
}