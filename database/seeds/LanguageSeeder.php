<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::insert([
            ['prefix' => 'am'],
            ['prefix' => 'ru'],
            ['prefix' => 'en'],
        ]);
    }
}
