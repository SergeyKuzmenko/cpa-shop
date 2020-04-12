<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnalyticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('analytics')->insert([
        'main_analytics' => 'null',
        'success_analytics' => 'null'
      ]);
    }
}
