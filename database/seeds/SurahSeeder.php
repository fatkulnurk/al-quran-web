<?php

use Illuminate\Database\Seeder;

class SurahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET',
            'https://al-quran-8d642.firebaseio.com/data.json?print=pretty'
        );
        $surahs = json_decode($response->getBody()->getContents(), true);

        $response = $client->request(
            'GET',
            'http://api.alquran.cloud/v1/surah'
        );
        $surahAlQuranCloud = json_decode($response->getBody()->getContents(), true);

        foreach ($surahs as $surah) {
            $type = $surah['type'];
            if ($type == 'mekah') {
                $type = 'Meccan';
            } else {
                $type = 'Medinan';
            }

            $result = \App\Model\Surah::create([
                'name_arabic' => $surah['asma'],
                'name_alphabet' => $surah['nama'],
                'name_indonesia' => $surah['arti'],
                'name_english' => $surahAlQuranCloud['data'][$surah['nomor']-1]['englishNameTranslation'],
                'number_of_surah' => $surah['nomor'],
                'number_of_ayah' => $surah['ayat'],
                'number_of_verses' => $surah['rukuk'], // rukuk
                'relevation_number' => $surah['urut'], // pewahyuan
                'relevation_type' => $type,
                'description_indonesia' => $surah['keterangan']
            ]);


//            foreach ($surahAlQuranCloud['data'] as $s) {
//                if ($s['data']['number'] == $surah['nomor']) {
//                    $result = \App\Model\Surah::create([
//                        'name_arabic' => $surah['asma'],
//                        'name_alphabet' => $surah['nama'],
//                        'name_indonesia' => $surah['arti'],
//                        'name_english' => $s['data']['englishNameTranslation'],
//                        'number_of_surah' => $surah['nomor'],
//                        'number_of_ayah' => $surah['ayat'],
//                        'number_of_verses' => $surah['rukuk'], // rukuk
//                        'relevation_number' => $surah['urut'], // pewahyuan
//                        'relevation_type' => $type,
//                        'description_indonesia' => $surah['keterangan']
//                    ]);
//                    $result->save();
//                }
//            }

        }
    }
}
