<?php

namespace App\Http\Controllers;

use App\Model\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PwaController extends Controller
{
    public function serviceWorker()
    {
        $surah = Surah::with('ayah')
            ->get();

        return Response::view('serviceworker', compact('surah'), 200)
            ->header('Content-Type', 'text/javascript');
    }
}
