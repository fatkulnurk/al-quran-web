<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountrySeeder::class);
        $this->call(SurahSeeder::class);
        $this->call(AyahSeeder::class);
        $this->call(TranslationSeeder::class);
        $this->call(AyahTranslationSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
