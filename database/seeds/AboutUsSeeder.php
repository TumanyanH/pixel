<?php

use Illuminate\Database\Seeder;
use App\AboutUsTranslation;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUsTranslation::insert([
            [
                'language_id' => '1',
                'imagename_main' => 'a',
                'imagename_1' => 'a',
                'imagename_2' => 'a',
                'imagename_3' => 'a',
                'title' => 'a',
                'content' => 'a',
            ],
            [
                'language_id' => '2',
                'imagename_main' => 'a',
                'imagename_1' => 'a',
                'imagename_2' => 'a',
                'imagename_3' => 'a',
                'title' => 'a',
                'content' => 'a',
            ],
            [
                'language_id' => '3',
                'imagename_main' => 'a',
                'imagename_1' => 'a',
                'imagename_2' => 'a',
                'imagename_3' => 'a',
                'title' => 'a',
                'content' => 'a',
            ],
            
        ]);
    }
}
