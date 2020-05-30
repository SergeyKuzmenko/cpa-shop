<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('notifications')->insert([
        'telegram_notification_status' => 0,
        'telegram_bot_token' => null,
        'telegram_bot_id' => null,
        'telegram_bot_first_name' => null,
        'telegram_bot_username' => null,

        'email_notification_status' => 0,
        'email_email' => null,
        'email_connected_emails' => null
      ]);
    }
}
