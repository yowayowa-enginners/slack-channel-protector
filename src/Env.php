<?php

namespace YowayowaEnginners\SlackChannelProtector;

require_once __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

class Env
{
  public static function getEnvValue(string $key)
  {
    $value = array_key_exists($key, $_ENV) ? $_ENV[$key] : null;

    return $value;
  }

  public static function getEnvValueAsArray(string $key) :array
  {
    $value = array_key_exists($key, $_ENV) ? $_ENV[$key] : null;

    return explode(' ', $value);
  }
}