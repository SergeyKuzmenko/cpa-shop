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
        'telegram_bot_token' => '',
        'telegram_bot_name' => '',
        'telegram_connected_users' => '[]',
        'email_notification_status' => 0,
        'email_email' => '',
        'email_connected_users' => '[]'
      ]);
    }
}
