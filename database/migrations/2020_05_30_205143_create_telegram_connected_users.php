<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelegramConnectedUsers extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('telegram_connected_users', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('user_id')->nullable();
      $table->string('chat_id')->nullable();
      $table->string('first_name')->nullable();
      $table->string('username')->nullable();
      $table->string('date')->nullable();
      $table->string('update_id')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('telegram_connected_users');
  }
}
