<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('options', function (Blueprint $table) {
      $table->increments('id');
      $table->string('main_title')->nullable();
      $table->string('main_description')->nullable();
      $table->string('main_keywords')->nullable();

      $table->string('main_percent')->nullable();
      $table->string('main_old_price')->nullable();
      $table->string('main_new_price')->nullable();

      $table->string('main_og_locale')->default('ru')->nullable();
      $table->string('main_og_type')->default('website')->nullable();
      $table->string('main_og_title')->nullable();
      $table->string('main_og_description')->nullable();
      $table->string('main_og_url')->nullable();
      $table->string('main_og_image')->nullable();
      $table->string('main_og_sitename')->nullable();


      $table->string('success_title')->nullable();
      $table->string('success_description')->nullable();
      $table->string('success_first_text')->nullable();
      $table->string('success_second_text')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('options');
  }
}
