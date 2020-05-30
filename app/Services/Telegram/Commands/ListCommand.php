<?php
namespace App\Services\Telegram\Commands;

use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Commands\Command;

class ListCommand extends Command
{
  protected $name = "list";

  protected $description = "Список доступных комманд";

  public function handle($arguments)
  {
    $commands = $this->getTelegram()->getCommands();
    $response = '';
    foreach ($commands as $name => $command) {
      $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
    }
    $this->replyWithMessage(['text' => "Доступные команды: \n$response"]);

  }
}