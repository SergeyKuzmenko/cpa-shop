<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('sqlite')->create('notifications', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('telegram_notification_status')->default(0);
      $table->string('telegram_bot_token');
      $table->string('telegram_connected_users');
      $table->integer('email_notification_status')->default(0);
      $table->string('email_email');
      $table->string('email_connected_users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('notifications');
  }
}
