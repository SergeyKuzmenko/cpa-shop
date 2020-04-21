<?php

namespace App\Services;

use Telegram\Bot\Api as TelegramAPI;

/**
 * Telegram service
 */
class Telegram {
  /**
   * @var mixed
   */
  protected $token;

  /**
   * @param $token
   */
  function __construct($token) {
    $this->token = $token;
  }

  /**
   * @param Telegram $telegram
   * @return mixed
   */
  public function checkBot(Telegram $telegram) {
    $telegram = new Telegram($this->token);

    try {
      $telegram->getMe();
    } catch (Exception $e) {
      return $e->getMessage();
    }

  }
}