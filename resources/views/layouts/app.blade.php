<!DOCTYPE html>
<html lang="id">
<head>
    <title>{{ getenv('APP_NAME') }} @yield('title')</title>
    <meta content="follow,index" name="robots">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta charset="utf-8" />
    <meta name="google-site-verification" content="FSVj8qN39rl9nrHqdZRH18waP9sN-76mJiHYGVmwAak" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="msvalidate.01" content="22BE01348A583F2C42BD6C04965A1F1F" />
    <meta name="title" content="@yield('title')">
    <meta property="og:title" content="@yield('title')">
    @if(\Illuminate\Support\Facades\Request::route()->getName() == 'surah.show')
        <meta name="description" content="Baca surat {{ optional($surah)->name_alphabet }} dan artinya, surat {{ optional($surah)->name_alphabet }} lengkap dengan latin, terjemahan bahasa Indonesia kementrian agama, Tafsir Jalalayn dan Tafsir Quraish Shihab.">
        <meta name="og:description" content="Baca surat {{ optional($surah)->name_alphabet }} dan artinya, surat {{ optional($surah)->name_alphabet }} lengkap dengan latin, terjemahan bahasa Indonesia kementrian agama, Tafsir Jalalayn dan Tafsir Quraish Shihab.">
    @elseif(\Illuminate\Support\Facades\Request::route()->getName() == 'ayah.show')
        <meta name="description" content="Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }} latin beserta arti, arti Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }} berdasarkan kementrian agama, Tafsir Jalalayn Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }}, Tafsir Quraish Shihab Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }}">
        <meta name="og:description" content="Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }} latin beserta arti, arti Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }} berdasarkan kementrian agama, Tafsir Jalalayn Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }}, Tafsir Quraish Shihab Surat {{ optional($ayah->surah)->name_alphabet }} ayat ke {{ optional($ayah)->number }}">
    @else
        <meta name="description" content="Baca Al Quran Online, Al Quran 30 juz, Al Quran latin dan terjemah bahasa Indonesia, Al Quran Tafsir Jalalayn dan Tafsir Quraish Shihab.">
        <meta name="og:description" content="Baca Al Quran Online, Al Quran 30 juz, Al Quran latin dan terjemah bahasa Indonesia, Al Quran Tafsir Jalalayn dan Tafsir Quraish Shihab.">
    @endif
    <meta property="og:url" content="{{ \Illuminate\Support\Facades\Request::fullUrl() }}">
    <meta name="google" content="notranslate" />
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="manifest" href="/manifest.json">
    <link rel="canonical" href="{{ \Illuminate\Support\Facades\Request::fullUrl() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css" integrity="sha256-WAgYcAck1C1/zEl5sBl5cfyhxtLgKGdpI3oKyJffVRI=" crossorigin="anonymous" />
    <style>
        body, head, html {
            margin: 0;
            padding: 0;
        }

        body {
            background: #fefefe;
        }

        img {
            max-width: 100%;
            margin: 0;
            padding: 0;
        }

        .img-full {
            margin: 0;
            padding: 0;
            width: 100%;
        }

        /* Grid
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .container {
            position: relative;
            width: 100%;
            max-width: 760px;
            /*max-width: 960px;*/
            margin: 0 auto;
            padding: 0 20px;
            box-sizing: border-box; }
        .column,
        .columns {
            width: 100%;
            float: left;
            box-sizing: border-box; }

        /* Base Styles
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        /* NOTE
        html is set to 62.5% so that all the REM measurements throughout Skeleton
        are based on 10px sizing. So basically 1.5rem = 15px :) */
        html {
            font-size: 62.5%; }
        body {
            font-size: 1.5em; /* currently ems cause chrome bug misinterpreting rems on body element */
            line-height: 1.6;
            font-weight: 400;
            font-family: "Raleway", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #222; }


        /* Typography
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            margin-bottom: 0;
            font-weight: 300; }
        h1 { font-size: 4.0rem; line-height: 1.2;  letter-spacing: -.1rem;}
        h2 { font-size: 3.6rem; line-height: 1.25; letter-spacing: -.1rem; }
        h3 { font-size: 3.0rem; line-height: 1.3;  letter-spacing: -.1rem; }
        h4 { font-size: 2.4rem; line-height: 1.35; letter-spacing: -.08rem; }
        h5 { font-size: 1.8rem; line-height: 1.5;  letter-spacing: -.05rem; }
        h6 { font-size: 1.5rem; line-height: 1.6;  letter-spacing: 0; }

        p {
            margin-top: 0; }

        /* Links
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        a {
            color: #1EAEDB; }
        a:hover {
            color: #0FA0CE; }


        /* Buttons
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .button,
        button,
        input[type="submit"],
        input[type="reset"],
        input[type="button"] {
            display: inline-block;
            height: 38px;
            padding: 0 30px;
            color: #555;
            text-align: center;
            font-size: 11px;
            font-weight: 600;
            line-height: 38px;
            letter-spacing: .1rem;
            text-transform: uppercase;
            text-decoration: none;
            white-space: nowrap;
            background-color: transparent;
            border-radius: 4px;
            border: 1px solid #bbb;
            cursor: pointer;
            box-sizing: border-box; }
        .button:hover,
        button:hover,
        input[type="submit"]:hover,
        input[type="reset"]:hover,
        input[type="button"]:hover,
        .button:focus,
        button:focus,
        input[type="submit"]:focus,
        input[type="reset"]:focus,
        input[type="button"]:focus {
            color: #333;
            border-color: #888;
            outline: 0; }
        .button.button-primary,
        button.button-primary,
        input[type="submit"].button-primary,
        input[type="reset"].button-primary,
        input[type="button"].button-primary {
            color: #FFF;
            background-color: #33C3F0;
            border-color: #33C3F0; }
        .button.button-primary:hover,
        button.button-primary:hover,
        input[type="submit"].button-primary:hover,
        input[type="reset"].button-primary:hover,
        input[type="button"].button-primary:hover,
        .button.button-primary:focus,
        button.button-primary:focus,
        input[type="submit"].button-primary:focus,
        input[type="reset"].button-primary:focus,
        input[type="button"].button-primary:focus {
            color: #FFF;
            background-color: #1EAEDB;
            border-color: #1EAEDB; }


        /* Forms
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        input[type="email"],
        input[type="number"],
        input[type="search"],
        input[type="text"],
        input[type="tel"],
        input[type="url"],
        input[type="password"],
        textarea,
        select {
            height: 38px;
            padding: 6px 10px; /* The 6px vertically centers text on FF, ignored by Webkit */
            background-color: #fff;
            border: 1px solid #D1D1D1;
            border-radius: 4px;
            box-shadow: none;
            box-sizing: border-box; }
        /* Removes awkward default styles on some inputs for iOS */
        input[type="email"],
        input[type="number"],
        input[type="search"],
        input[type="text"],
        input[type="tel"],
        input[type="url"],
        input[type="password"],
        textarea {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none; }
        textarea {
            min-height: 65px;
            padding-top: 6px;
            padding-bottom: 6px; }
        input[type="email"]:focus,
        input[type="number"]:focus,
        input[type="search"]:focus,
        input[type="text"]:focus,
        input[type="tel"]:focus,
        input[type="url"]:focus,
        input[type="password"]:focus,
        textarea:focus,
        select:focus {
            border: 1px solid #33C3F0;
            outline: 0; }
        label,
        legend {
            display: block;
            margin-bottom: .5rem;
            font-weight: 600; }
        fieldset {
            padding: 0;
            border-width: 0; }
        input[type="checkbox"],
        input[type="radio"] {
            display: inline; }
        label > .label-body {
            display: inline-block;
            margin-left: .5rem;
            font-weight: normal; }


        /* Lists
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        ul {
            list-style: circle inside; }
        ol {
            list-style: decimal inside; }
        ol, ul {
            padding-left: 0;
            margin-top: 0; }
        ul ul,
        ul ol,
        ol ol,
        ol ul {
            margin: 1.5rem 0 1.5rem 3rem;
            font-size: 90%; }
        li {
            margin-bottom: 1rem; }


        /* Code
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        code {
            padding: .2rem .5rem;
            margin: 0 .2rem;
            font-size: 90%;
            white-space: nowrap;
            background: #F1F1F1;
            border: 1px solid #E1E1E1;
            border-radius: 4px; }
        pre > code {
            display: block;
            padding: 1rem 1.5rem;
            white-space: pre; }


        /* Tables
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        th,
        td {
            text-align: left;
            border-bottom: 1px solid #E1E1E1;
            padding: 15px 0px 0px 0px;}
        th:first-child,
        td:first-child {
            padding-left: 0; }
        th:last-child,
        td:last-child {
            padding-right: 0; }
        td > p {
            margin: 0;
            padding: 5px 0 5px 0;
        }

        /* Spacing
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        button,
        .button {
            margin-bottom: 1rem; }
        input,
        textarea,
        select,
        fieldset {
            margin-bottom: 1.5rem; }
        pre,
        blockquote,
        dl,
        figure,
        table,
        p,
        ul,
        ol,
        form {
            margin-bottom: 2.5rem; }


        /* Utilities
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .u-full-width {
            width: 100%;
            box-sizing: border-box; }
        .u-max-full-width {
            max-width: 100%;
            box-sizing: border-box; }
        .u-pull-right {
            float: right; }
        .u-pull-left {
            float: left; }


        /* Misc
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        hr {
            margin-top: 3rem;
            margin-bottom: 3.5rem;
            border-width: 0;
            border-top: 1px solid #E1E1E1; }


        /* Clearing
        –––––––––––––––––––––––––––––––––––––––––––––––––– */

        /* Self Clearing Goodness */
        .container:after,
        .row:after,
        .u-cf {
            content: "";
            display: table;
            clear: both; }


        /* Media Queries
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        /*
        Note: The best way to structure the use of media queries is to create the queries
        near the relevant code. For example, if you wanted to change the styles for buttons
        on small devices, paste the mobile query code up in the buttons section and style it
        there.
        */

        /* For devices larger than 400px */
        /* Larger than mobile */
        @media (min-width: 400px) {
            .container {
                width: 100%;
                padding: 0; }
        }

        /* For devices larger than 550px */
        /* Larger than phablet (also point when grid becomes active) */
        @media (min-width: 550px) {

            h1 { font-size: 5.0rem; }
            h2 { font-size: 4.2rem; }
            h3 { font-size: 3.6rem; }
            h4 { font-size: 3.0rem; }
            h5 { font-size: 2.4rem; }
            h6 { font-size: 1.5rem; }

            .column,
            .columns {
                margin-left: 4%; }
            .column:first-child,
            .columns:first-child {
                margin-left: 0; }

            .one.column,
            .one.columns                    { width: 4.66666666667%; }
            .two.columns                    { width: 13.3333333333%; }
            .three.columns                  { width: 22%;            }
            .four.columns                   { width: 30.6666666667%; }
            .five.columns                   { width: 39.3333333333%; }
            .six.columns                    { width: 48%;            }
            .seven.columns                  { width: 56.6666666667%; }
            .eight.columns                  { width: 65.3333333333%; }
            .nine.columns                   { width: 74.0%;          }
            .ten.columns                    { width: 82.6666666667%; }
            .eleven.columns                 { width: 91.3333333333%; }
            .twelve.columns                 { width: 100%; margin-left: 0; }

            .one-third.column               { width: 30.6666666667%; }
            .two-thirds.column              { width: 65.3333333333%; }

            .one-half.column                { width: 48%; }

            /* Offsets */
            .offset-by-one.column,
            .offset-by-one.columns          { margin-left: 8.66666666667%; }
            .offset-by-two.column,
            .offset-by-two.columns          { margin-left: 17.3333333333%; }
            .offset-by-three.column,
            .offset-by-three.columns        { margin-left: 26%;            }
            .offset-by-four.column,
            .offset-by-four.columns         { margin-left: 34.6666666667%; }
            .offset-by-five.column,
            .offset-by-five.columns         { margin-left: 43.3333333333%; }
            .offset-by-six.column,
            .offset-by-six.columns          { margin-left: 52%;            }
            .offset-by-seven.column,
            .offset-by-seven.columns        { margin-left: 60.6666666667%; }
            .offset-by-eight.column,
            .offset-by-eight.columns        { margin-left: 69.3333333333%; }
            .offset-by-nine.column,
            .offset-by-nine.columns         { margin-left: 78.0%;          }
            .offset-by-ten.column,
            .offset-by-ten.columns          { margin-left: 86.6666666667%; }
            .offset-by-eleven.column,
            .offset-by-eleven.columns       { margin-left: 95.3333333333%; }

            .offset-by-one-third.column,
            .offset-by-one-third.columns    { margin-left: 34.6666666667%; }
            .offset-by-two-thirds.column,
            .offset-by-two-thirds.columns   { margin-left: 69.3333333333%; }

            .offset-by-one-half.column,
            .offset-by-one-half.columns     { margin-left: 52%; }

        }

        /* Larger than tablet */
        @media (min-width: 750px) {
            .container {
                width: 80%;
            }
        }

        /* Larger than desktop */
        @media (min-width: 1000px) {}

        /* Larger than Desktop HD */
        @media (min-width: 1200px) {}


        /* modif */
        .list {
            padding: 12px 12px 12px 12px;
            text-align: left;
            background-color: #ffffff;
            color: #000000;
            border-bottom: 1px solid #e3e3e3;
        }

        a {
            text-decoration: none;
        }

        .search {
            background: white;
            padding: 0px 10% 0px 10%;
        }

        .rtl {
            direction: rtl;
        }

        .float-left {
            float: left;
        }
        .float-right {
            float: right;
        }
        .align-center {
            text-align: center;
        }
        .align-left {
            text-align: left;
        }
        .align-right {
            text-align: right;
        }
        .valign-top {
            vertical-align: top;
        }
        .valign-middle {
            vertical-align: middle;
        }
        .valign-bottom {
            vertical-align: bottom;
        }
        .font-color-black {
            color: black;
        }
        .color-black {
            background: black;
        }
        .clear-decoration {
            text-decoration: none;
        }

        .fixed-bottom {
            height: 45px !important;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 5px 0px 0px 5%;
            width: 100%;
            background: #e3e3e3;
            position: fixed;
            z-index: 5;
            vertical-align: bottom;
        }

        .font-raleway {
            font-family: Raleway !important;
        }

        .logo {
            font-size: 4.0rem;
            margin-top: 0;
            margin-bottom: 0;
            font-weight: 300;
            line-height: 1.2;
            letter-spacing: -.1rem;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114032461-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-114032461-2');
    </script>

    @stack('head')
</head>
<body>
<div class="container">
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
                <script async src="https://cse.google.com/cse.js?cx=001126782360084613653:ynw6ibnnhcq"></script>
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
        <p>Baca Al Quran Online, Al Quran 30 juz lengkap, Al Quran latin dan terjemah, Al Quran bahasa Indonesia, Al Quran Terjemahan kementrian agama, Al Quran dilengkapi dengan tafsir dari beberapa ulama seperti Tafsir Jalalayn dan Tafsir Quraish Shihab.</p>
    </div>
    <div class="align-center">
        <p>
            &copy; 2019 - Al Quran Terjemahan Bahasa Indonesia
            <br>
            Semoga website ini bermanfaat, amiinnn.
        </p>
        <p>
            Jika ditemukan kesalahan, mohon menghubungi saya di email fatkulnurk[at]gmail[dot]com.
        </p>
    </div>
</div>
@stack('footer')
<script>
    // pwa
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            // navigator.serviceWorker.register('/sw.js').then(function(registration) {
            navigator.serviceWorker.register('/serviceworker.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }).catch(function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }
</script>
</body>
</html>
