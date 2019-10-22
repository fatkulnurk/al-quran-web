<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
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
            'https://github.com/lukes/ISO-3166-Countries-with-Regional-Codes/raw/master/all/all.json'
        );

        $countrys = json_decode($response->getBody()->getContents(), true);

        foreach ($countrys as $country) {
            $result = \App\Model\Country::create([
                'name' => $country['name'],
                'alpha_2' => $country['alpha-2'],
                'alpha_3' => $country['alpha-3'],
            ]);
            $result->save();
        }
    }
}
