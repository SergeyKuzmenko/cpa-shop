<?php

namespace App\Http\Controllers;

use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Log;

class TelegramNotification
{
  public function handler()
  {
    Telegram::commandsHandler(true);
    $updates = Telegram::getWebhookUpdates();
    Log::info("Telegram Updates: $updates");
    return response(null, 200);
  }

  public function setWebhook()
  {
    $response = Telegram::setWebhook(
      ['url' => env('TELEGRAM_TEST_HOST')]
    );
    Log::info('WebHook: Saved');
  }

  public function infoWebhook()
  {
    $token = env('TELEGRAM_BOT_TOKEN');
    $response = file_get_contents("https://api.telegram.org/bot$token/getWebhookInfo");
    $response = json_decode($response, true);
  }

  public function removeWebhook()
  {
    $response = Telegram::removeWebhook();
    Log::info('WebHook: Removed');
  }

}