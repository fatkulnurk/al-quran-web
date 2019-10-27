<?php

namespace App\Http\Controllers;

use App\Model\Ayah;
use App\Model\Surah;
use Illuminate\Http\Request;

class AyahController extends Controller
{
    public function show($surahSlug, $ayahNumber)
    {
        $ayah = Ayah::with('surah', 'ayahTranslation')
            ->whereHas('surah', function ($query) use ($surahSlug){
                $query->where('slug', $surahSlug);
            })
            ->where('number', $ayahNumber)
            ->first();
        return view('surah.ayah.detail', compact('ayah'));
    }

    public function range($surahSlug, $ayahNumberFrom, $ayahNumberEnd)
    {
        $surah = Surah::where('slug', $surahSlug)->first();
        $ayah = Ayah::with('ayahTranslation')
            ->whereHas('surah', function ($query) use ($surahSlug){
                $query->where('slug', $surahSlug);
            })
            ->where('number', '>=', $ayahNumberFrom)
            ->where('number', '<=', $ayahNumberEnd)
            ->get();

        return view('surah.ayah.range', compact('ayah', 'surah'));
    }
}
