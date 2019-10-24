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
Route::get('/surah-{surah}/ayah-{ayah}', 'AyahController@show')->name('ayah.show');
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap');
