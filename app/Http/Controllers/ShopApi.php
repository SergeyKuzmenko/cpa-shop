<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;
use \Carbon\Carbon;
use Telegram\Bot\Api as TelegramAPI;

use App\Models\Orders;
use App\Models\Notifications;

class ShopApi extends Controller
{

  public function newOrder(Request $request, Carbon $carbon, Notifications $notifications)
  {
    $data = [
      'form' => $request->input('form'),
      'name' => $request->input('name'),
      'phone' => $request->input('phone'),
      'timestamp' => $carbon->now()->format('d.m.Y') . ' ' . $carbon->now()->format('H:i:s'),
      'ip' => $request->ip(),
      'user_agent' => $request->header('User-Agent'),
      'location' => $this->getLocation($request->ip()),
      'state' => 0,
    ];

    if ($data['form'] !== null && $data['name'] !== null && $data['phone'] !== null) {
      $newOrder = new Orders();
      $newOrder->form = $data['form'];
      $newOrder->name = $data['name'];
      $newOrder->phone = $data['phone'];
      $newOrder->ip = $data['ip'];
      $newOrder->user_agent = $data['user_agent'];
      $newOrder->location = $data['location'];
      $newOrder->state = $data['state'];
      $newOrder->save();
      if($notifications->where('id', 1)->first()->telegram_notification_status){
        $this->sendNotification($data);
      }
      return response()->json([
        'response' => true
      ]);
    } else {
      return response()->json([
        'response' => false,
        'error_code' => 1,
        'error_description' => 'Not enough parameters'
      ]);
    }
  }

  private function getLocation($ip = '127.0.0.1')
  {
    $apiKey = env('IPGEOLOCATION_KEY', false);
    $IpGeolocation = $this->getIpGeolocation($apiKey, $ip, 'ru');
    $decodedLocation = json_decode($IpGeolocation, true);
    if (!isset($decodedLocation['message'])) {
      $location = '' . $decodedLocation['country_name'] . ', ' . $decodedLocation['city'] . ', ' . $decodedLocation['district'] . '';
      return $location;
    } else {
      $location = "Неизвестно";
      return $location;
    }
  }

  private function getIpGeolocation($apiKey, $ip, $lang = 'ru')
  {
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey=$apiKey&ip=$ip&lang=$lang";
    $cURL = curl_init();

    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPGET, true);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Accept: application/json',
    ));

    return curl_exec($cURL);
  }

  private function sendNotification($data)
  {
    $telegram = new TelegramAPI(Notifications::where('id', 1)->first()->telegram_bot_token);

    if (env('APP_ENV') == 'production') {
      $chatIds = ['134791860'];
    } else {
      $chatIds = ['134791860'];
    }
    $messagesIds = [];
    $location = $this->getLocation($data['ip']);
    foreach ($chatIds as $chatId) {
      $response = $telegram->sendMessage([
        'chat_id' => $chatId,
        'parse_mode' => 'html',
        'text' => '
<b>🔥 Новый заказ 🔥</b>
<b>Имя:</b> ' . $data['name'] . '
<b>Телефон:</b> ' . $data['phone'] . '
<b>Дата:</b> ' . $data['timestamp'] . '
<b>Форма:</b> ' . $data['form'] . '
<b>IP:</b> ' . $data['ip'] . '
<b>Местоположение:</b> ' . $data['location'] . '
',
      ]);
      array_push($messagesIds, $response->getMessageId());
    }
    $messageId = $response->getMessageId();
    if ($messageId) {
      return response()->json([
        'response' => true
      ]);
    } else {
      return response()->json([
        'response' => false
      ]);
    }
  }
}