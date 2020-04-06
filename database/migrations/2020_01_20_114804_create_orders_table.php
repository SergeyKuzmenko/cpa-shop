<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('sqlite')->create('orders', function (Blueprint $table) {
      $table->increments('id');
      $table->string('form');
      $table->string('name');
      $table->string('phone');
      $table->string('ip');
      $table->string('location');
      $table->string('state');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('orders');
  }
}
