<?php
namespace App\Services\Telegram\Commands;

use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Commands\Command;

class UnsubscribeCommand extends Command
{
  protected $name = "unsubscribe";

  protected $description = "Отписаться от рассылки уведомлений";

  public function handle($arguments)
  {
    $update = json_decode($this->getUpdate(), true);
    $user_id = $update['message']['from']['id'];
    DB::table('telegram_connected_users')
      ->where('user_id', '=', $user_id)->delete();

    $this->replyWithMessage([
      'parse_mode' => 'html',
      'text' => "Вы были отписаны от уведомлений. \nЧтобы подписаться - перезагрузите бота.",
    ]);
  }
}