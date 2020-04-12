<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('orders')->insert([
        'form' => rand(1,2),
        'name' => 'Test Name',
        'phone' => '+38(000)00-00-000',
        'ip' => '127.0.0.1',
        'user_agent' => 'User-Agent',
        'location' => 'Украина, Кропивницкий',
        'state' => 0
      ]);
    }
}
