<?php

namespace App\Http\Controllers;

use App\Model\Ayah;
use App\Model\AyahTranslation;
use App\Model\Surah;
use Illuminate\Http\Request;

class SurahController extends Controller
{
    public function index()
    {
        $surah = Surah::all();

        return view('surah.home', compact('surah'));
    }

    public function show($slug)
    {
        $surah = Surah::with('ayah.ayahTranslation')
            ->where('slug', $slug)
            ->first();

        return view('surah.detail', compact('surah'));
    }
}
