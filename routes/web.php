<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SurahController@index')->name('surah.index');
Route::get('/surah-{surah}', 'SurahController@show')->name('surah.show');
Route::get('/surah-{surah}/ayah-{ayah}', 'AyahController@show')
    ->name('ayah.show')
    ->where([
        'ayah' => '[0-9]+',
        'surah' => '[a-zA-Z-]+'
    ]);
Route::get('/surah-{surah}/ayah-{ayahOne}-sampai-ayah-{ayahTwo}', 'AyahController@range')
    ->name('ayah.show.range')
    ->where([
        'ayahOne' => '[0-9]+',
        'ayahTwo' => '[0-9]+',
        'surah' => '[a-zA-Z-]+'
    ]);
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap');
Route::get('/sw.js', 'PwaController@serviceWorker')->name('service.worker');
