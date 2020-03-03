@extends('layouts.app')

@section('title', 'Surat ' . $ayah->surah->name_alphabet . ' ayat ke ' . $ayah->number . ' Tafsir dan Terjemahan Bahasa Indonesia')

@section('content')
    <div class="list align-center">
        <h1><a href="{{ route('surah.show', $ayah->surah->slug) }}" title="surat {{$ayah->surah->name_alphabet}} terjemahan dan tafsir">Surat {{ $ayah->surah->name_alphabet }}</a> ayat ke {{ $ayah->number }}</h1>
    </div>
    <div class="list">
        <table class="u-full-width">
            <tr>
                <td class="valign-top">
                    [<strong>{{ $ayah->number }}</strong>]
                </td>
                <td>
                    <h2 class="rtl align-right">{{ $ayah->arabic }}</h2>
                </td>
            </tr>
        </table>
        <p>{!! $ayah->alphabet !!}</p>
    </div>
    <div class="list">
        <h5>Terjemahan dan Tafsir Surat {{ $ayah->surah->name_alphabet }} ayat ke {{ $ayah->number }}</h5>
{{--        <p>--}}
{{--            <img class="img-full" src="http://www.everyayah.com/data/quranpngs/{{ $ayah->surah->number_of_surah }}_{{ $ayah->number }}.png" alt="Tafsir Surat {{ $ayah->surah->name_alphabet }} ayat ke {{ $ayah->number }}" rel="nofollow">--}}
{{--        </p>--}}
    </div>
    @foreach($ayah->ayahTranslation as $translation)
        <div class="list">
            <ul>
                <li><b>Tafsir {{ $translation->translation->name }} (<i>{{ $translation->translation->translator }}</i>) surat {{ $ayah->surah->name_alphabet }} ayat ke {{ $ayah->number }}</b></li>
                <li>{{ $translation->content }}</li>
            </ul>

        </div>
    @endforeach

    <div class="list">
        <div id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://quran-translation.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
@endsection
@push('footer')
    <script id="dsq-count-scr" src="//quran-translation.disqus.com/count.js" async></script>
@endpush
