<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(AnalyticsTableSeeder::class);
    $this->call(NotificationsTableSeeder::class);
    $this->call(OptionsTableSeeder::class);
    $this->call(OrdersTableSeeder::class);
  }
}
