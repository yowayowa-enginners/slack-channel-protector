<?php

namespace YowayowaEnginners\SlackChannelProtector;

class PostMessage
{
  public static function PostMessage()
  {
    $token = Env::getEnvValue('SLACK_BOT_ACCESS_TOKEN');
    $channel = Env::getEnvValue('CHANNEL');
    $text = Env::getEnvValue('TEXT');

    $data = array(
      'token' =>  $token,
      'channel' => $channel,
      'text' => $text,
      'username' => 'Bot'
    );

    $url = Env::getEnvValue('URL');
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_POST, TRUE); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_HEADEROPT, array('Content-Type: application/json'));

    curl_exec($curl);
  }
}