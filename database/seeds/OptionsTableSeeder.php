<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('options')->insert([
        'main_title' => 'Заголовок главной страницы',
        'main_description' => 'Описание главной страницы',
        'main_keywords' => 'Ключевые, слова, главной, страницы',
        'main_percent' => 55,
        'main_old_price' => 100,
        'main_new_price' => 45,
        'main_og_locale' => 'ru',
        'main_og_type' => 'website',
        'main_og_title' => 'main_og_url',
        'main_og_description' => 'main_og_description',
        'main_og_url' => 'main_og_url',
        'main_og_image' => 'url/to/img',
        'main_og_sitename' => 'main_og_url',
        'success_title' => 'Заголовок страницы подтверждения',
        'success_description' => 'Описание страницы подтверждения',
        'success_first_text' => 'Главная надпись',
        'success_second_text' => 'Нижняя надпись'
      ]);
    }
}
