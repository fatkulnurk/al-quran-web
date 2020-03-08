<!DOCTYPE html>
<html lang="id">
<head><title>{{ getenv('APP_NAME') }} @yield('title')</title><meta content="follow,index" name="robots"><meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"><meta charset="utf-8" /><meta name="google-site-verification" content="6DhVtb5OFQfC0KguuFoCdNecJgN2fKbK4PI7SFFPzmw" /><meta content='Indonesia' name='geo.placename'/>
    <meta content='id' name='geo.country'/><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="msvalidate.01" content="22BE01348A583F2C42BD6C04965A1F1F" /><meta name="title" content="@yield('title')"><meta property="og:title" content="@yield('title')">
    @if(\Illuminate\Support\Facades\Request::route()->getName() == 'surah.show')<meta name="description" content="Baca surat {{ optional($surah)->name_alphabet }} dan artinya, surat {{ optional($surah)->name_alphabet }} lengkap dengan latin, terjemahan bahasa Indonesia kementrian agama, Tafsir Jalalayn dan Tafsir Quraish Shihab."><meta name="og:description" content="Baca surat {{ optional($surah)->name_alphabet }} dan artinya, surat {{ optional($surah)->name_alphabet }} lengkap dengan latin, terjemahan bahasa Indonesia kementrian agama, Tafsir Jalalayn dan Tafsir Quraish Shihab.">
    @elseif(\Illuminate\Support\Facades\Request::route()->getName() == 'ayah.show')<meta name="description" content="Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }} latin beserta arti, arti Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }} berdasarkan kementrian agama, Tafsir Jalalayn Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }}, Tafsir Quraish Shihab Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }}"><meta name="og:description" content="Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }} latin beserta arti, arti Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }} berdasarkan kementrian agama, Tafsir Jalalayn Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }}, Tafsir Quraish Shihab Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }}">
    @else<meta name="description" content="Baca Al Quran Online, Al Quran 30 juz, Al Quran latin dan terjemah bahasa Indonesia, Al Quran Tafsir Jalalayn dan Tafsir Quraish Shihab."><meta name="og:description" content="Baca Al Quran Online, Al Quran 30 juz, Al Quran latin dan terjemah bahasa Indonesia, Al Quran Tafsir Jalalayn dan Tafsir Quraish Shihab.">
    @endif<meta property="og:url" content="{{ \Illuminate\Support\Facades\Request::fullUrl() }}"><meta name="google" content="notranslate" /><link rel="shortcut icon" href="/favicon.ico"><link rel="manifest" href="/manifest.json"><link rel="canonical" href="{{ \Illuminate\Support\Facades\Request::fullUrl() }}"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU=" crossorigin="anonymous" /><link rel="stylesheet" href="{{ asset('css/app.css') }}" /><script defer src="https://www.googletagmanager.com/gtag/js?id=UA-114032461-2"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-114032461-2');</script>
    @stack('head')</head><body><div class="container">
    <div class="list">
        <div class="align-center">
            @if(\Illuminate\Support\Facades\Request::route()->getName() == 'surah.index')
                <h1 class="font-raleway"><a href="{{ route('surah.index') }}">AL-QURAN</a> </h1>
            @else
                <span class="font-raleway logo"><a href="{{ route('surah.index') }}">AL-QURAN</a> </span>
                @endif
            <p>Al Quran Terjemahan & Tafsir Bahasa Indonesia</p>
        </div>
        <div class="search">
            <form action="{{ route('surah.index') }}" method="get">
                <div class="row">
                    <div class="eight columns">
                        <input class="u-full-width" type="text" name="q" placeholder="search">
                    </div>
                    <div class="four columns">
                        <input class="button-primary u-full-width" type="submit" value="Submit">
                    </div>
                </div>
            </form>
            @if(\Illuminate\Support\Facades\Request::has('q'))
                <script async src="https://cse.google.com/cse.js?cx=006244869116590388301:zglko8oisw3"></script>
{{--                <div class="gcse-search"></div>--}}
{{--                <script async src="https://cse.google.com/cse.js?cx=001126782360084613653:ynw6ibnnhcq"></script>--}}
                <div class="gcse-searchresults-only"></div>
            @endif
        </div>
    </div>
</div>
<div class="container">
    @yield('content')
</div>
<div class="container">
    <div class="list">
        <p>
            <a href="/" title="Al Quran Terjemahan Bahasa Indonesia">Baca Al Quran Online</a>,
            <a href="/" title="Al Quran 30 juz lengkap">Al Quran 30 juz lengkap</a>,
            <a href="/" title="Al Quran latin dan terjemah">Al Quran latin dan terjemah</a>,
            <a href="/" title="Al Quran bahasa Indonesia">Al Quran bahasa Indonesia</a>,
            <a href="/" title="Al Quran Terjemahan kementrian agama">Al Quran Terjemahan kementrian agama</a>,
            <a href="/" title="Al Quran Tafsir">Al Quran dilengkapi dengan tafsir dari beberapa ulama seperti Tafsir Jalalayn dan Tafsir Quraish Shihab</a>.</p>
    </div>
    <div class="align-center">
        <p>
            &copy; 2019 - <a href="/" title="Al Quran Terjemahan Bahasa Indonesia">Al Quran Terjemahan Bahasa Indonesia</a>
            <br>
            Semoga website ini bermanfaat, amiinnn.
        </p>
        <p>
            Jika ditemukan kesalahan, mohon menghubungi saya di email rudi@dibumi.com
        </p>
    </div>
</div>
@stack('footer')
{{--<script>--}}
{{--    // pwa--}}
{{--    // if ('serviceWorker' in navigator) {--}}
{{--    //     window.addEventListener('load', function() {--}}
{{--    //         // navigator.serviceWorker.register('/sw.js').then(function(registration) {--}}
{{--    //         navigator.serviceWorker.register('/serviceworker.js').then(function(registration) {--}}
{{--    //             // Registration was successful--}}
{{--    //             console.log('ServiceWorker registration successful with scope: ', registration.scope);--}}
{{--    //         }).catch(function(err) {--}}
{{--    //             // registration failed :(--}}
{{--    //             console.log('ServiceWorker registration failed: ', err);--}}
{{--    //         });--}}
{{--    //     });--}}
{{--    // }--}}
{{--// </script>--}}
</body>
</html>
