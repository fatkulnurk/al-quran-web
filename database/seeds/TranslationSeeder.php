<?php

use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Bahasa Indonesia',
                'translator' => 'Indonesian Ministry of Religious Affairs',
                'code' => 'id.indonesia'
            ],[
                'name' => 'Quraish Shihab',
                'translator' => 'Muhammad Quraish Shihab et al. *',
                'code' => 'id.muntakhab'
            ],[
                'name' => 'Tafsir Jalalayn',
                'translator' => 'Jalal ad-Din al-Mahalli and Jalal ad-Din as-Suyuti *',
                'code' => 'id.jalalayn'
            ]
        ];

        foreach ($data as $item) {
            $translation = new \App\Model\Translation($item);
            $country = \App\Model\Country::where('alpha_2', 'id')
                ->first();
            $country->translation()->save($translation);
        }
    }
}
