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


        foreach ($surahAll as $surah) {

            $ayahData = $this->getData($surah->id);

            foreach ($ayahData as $data) {
                $ayah = new \App\Model\Ayah([
                    'number' => $data['nomor'],
                    'arabic' => $data['ar'],
                    'alphabet' => $data['tr']
                ]);

                $surah->ayah()->Save($ayah);
            }


        }
    }
}
