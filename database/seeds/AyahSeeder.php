<?php

use Illuminate\Database\Seeder;

class AyahSeeder extends Seeder
{
    private function getData(int $id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET',
            'https://al-quran-8d642.firebaseio.com/surat/' . $id . '.json?print=pretty'
        );

        return json_decode($response->getBody()->getContents(), true);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surahAll = \App\Model\Surah::all();


        $j = 0;
        foreach ($surahAll as $surah) {

            $ayahData = $this->getData($surah->id);

            $i = 0;
            foreach ($ayahData as $data) {
                if ($i == 0 && $j != 0 ) {
                    $arabic = \Illuminate\Support\Str::replaceFirst('بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ', '', $data['ar']);
                } else {
                    $arabic = $data['ar'];
                }

                $ayah = new \App\Model\Ayah([
                    'number' => $data['nomor'],
                    'arabic' => $arabic,
                    'alphabet' => $data['tr']
                ]);

                $surah->ayah()->Save($ayah);

                $i++;
            }

            $j++;
        }
    }
}
