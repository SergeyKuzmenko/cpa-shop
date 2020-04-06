<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      DB::table('orders')->insert([
        'form' => rand(1,2),
        'name' => Str::random(5),
        'phone' => '+380'. rand(100000000,999999999),
        'ip' => $faker::Internet::ipv4,
        'location' => $faker::Address::address,
        'string' => 0
      ]);
    }
}
