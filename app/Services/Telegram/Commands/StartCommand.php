<?php

namespace App\Services\Telegram\Commands;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
  /**
   * @var string Command Name
   */
  protected $name = "start";

  /**
   * @var string Command Description
   */
  protected $description = "Запуск бота";

  /**
   * @inheritdoc
   */
  public function handle($arguments)
  {
    $siteUrl = route('main');
    $update = json_decode($this->getUpdate(), true);

    $update_id = $update['update_id'];
    $user_id = $update['message']['from']['id'];
    $first_name = $update['message']['from']['first_name'];
    $username = $update['message']['from']['username'];
    $chat_id = $update['message']['chat']['id'];
    $date = $update['message']['date'];

    $isConnectedUser = DB::table('telegram_connected_users')->where('user_id', '=', $user_id)->count();

    if ($isConnectedUser > 0) {
      $keyboard = [
        ['/unsubscribe - Отписаться']
      ];
      $reply_markup = Telegram::replyKeyboardMarkup([
        'keyboard' => $keyboard,
        'resize_keyboard' => true,
        'one_time_keyboard' => false
      ]);
      $this->replyWithMessage([
        'parse_mode' => 'html',
        'text' => 'Вы уже подписаны на уведомления',
        'reply_markup' => $reply_markup
      ]);
    } else {
      $keyboard = [
        ['/unsubscribe - Отписаться']
      ];

      DB::table('telegram_connected_users')
        ->insert([
          'user_id' => $user_id,
          'chat_id' => $chat_id,
          'first_name' => $first_name,
          'username' => $username,
          'update_id' => $update_id,
          'date' => $date
        ]);

      $reply_markup = Telegram::replyKeyboardMarkup([
        'keyboard' => $keyboard,
        'resize_keyboard' => true,
        'one_time_keyboard' => false
      ]);

      $this->replyWithMessage([
        'parse_mode' => 'html',
        'text' => 'Вы были подписаны на уведомления сайта: <a href="' . $siteUrl . '">' . $siteUrl . '</a>',
        'reply_markup' => $reply_markup
      ]);

    }



    //$this->triggerCommand('list');
  }
}