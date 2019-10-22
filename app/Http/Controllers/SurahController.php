<?php

namespace App\Http\Controllers;

use App\Model\Ayah;
use App\Model\Surah;
use Illuminate\Http\Request;

class SurahController extends Controller
{
    public function index()
    {
        $surah = Surah::all();

        return view('surah.home', compact('surah'));
    }

    public function show($id)
    {
        $surah = Surah::with('ayah')
            ->where('id', $id)
            ->first();

        return view('surah.detail', compact('surah'));
    }
}
