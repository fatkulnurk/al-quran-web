<?php

namespace App\Http\Controllers;

use App\Model\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $surah = Surah::with('ayah')
            ->get();

        return Response::view('sitemap', compact('surah'), 200)
            ->header('Content-Type', 'text/xml');
    }
}
