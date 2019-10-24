<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AyahTranslationSeeder extends Seeder
{
    private function read($path)
    {
        $files = Storage::disk('local')
            ->get($path);

//        $data = $skuList = preg_split('/\r\n|\r|\n/', $files);
        $data = $skuList = preg_split('/\n/', $files);

        return $data;
    }

    private function explode($data)
    {
        return explode('|', $data);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paths = [
            [
                'path' => 'data/surah/translate/indonesia/id.indonesian.txt',
                'translation_id' => '1'
            ], [
                'path' => 'data/surah/translate/indonesia/id.muntakhab.txt',
                'translation_id' => '2'
            ], [
                'path' => 'data/surah/translate/indonesia/id.jalalayn.txt',
                'translation_id' => '3'
            ],
        ];

        foreach ($paths as $path) {

            $dataTemp = $this->read($path['path']);
            $countDataTemp = count($dataTemp);

            $translation = \App\Model\Translation::where('id', $path['translation_id'])->first();
            foreach ($dataTemp as $data) {
                if (!empty($data) && $data != '') {

                    $raw = $this->explode($data);

                    $ayah = \App\Model\Ayah::where('surah_id', $raw[0])
                        ->where('number', $raw[1])
                        ->first();

                    $ayahTranslation = new \App\Model\AyahTranslation([
                        'ayah_id' => $raw[0],
                        'number' => $raw[1],
                        'content' => $raw[2]
                    ]);

                    $surah = \App\Model\Surah::where('number_of_surah', $raw[0])->first();

                    $ayahTranslation->translation()->associate($translation);
                    $ayahTranslation->surah()->associate($surah);
                    $ayahTranslation->ayah()->associate($ayah);
                    $ayahTranslation->save();

                }
            }
        }

    }
}
