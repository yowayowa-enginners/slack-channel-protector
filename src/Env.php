<?php

namespace YowayowaEnginners\SlackChannelProtector;

require './vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

class Env
{
  public static function getEnvValue(string $key)
  {
    return array_key_exists($key, $_ENV) ? $_ENV[$key] : null;
  }
}