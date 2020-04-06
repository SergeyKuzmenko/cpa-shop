<?php

namespace App\Http\Controllers;
use Wilgucki\Csv\Facades\Reader as CsvReader;
use Telegram\Bot\Api as TelegramAPI;

use App\Models\Options;
use App\Models\Analytics;
use App\Models\Notifications;

class Shop extends Controller {
  public function index() {
    return view('main', $this->getParams());
  }

  public function success() {
    return view('success', $this->getParams());
  }

  public function getUpdates() {
    $telegram = new TelegramAPI(Notifications::where('id', 1)->first()->telegram_bot_token);
    return response()->json([
        'response' => $telegram->getUpdates()
      ]);
  }

  public function getParams() {
    $options = new Options();
    $analytics = new Analytics();
    return array_merge($options->get()->first()->toArray(), $analytics->get()->first()->toArray());
  }

}
