@extends('layouts.app')

@section('title', 'Surat ' . $ayah->surah->name_alphabet . ' ayat ke ' . $ayah->number)

@section('content')
    <div class="list align-center">
        <h1><a href="{{ route('surah.show', $ayah->surah->slug) }}">Surat {{ $ayah->surah->name_alphabet }}</a> ayat ke {{ $ayah->number }}</h1>
    </div>
    <div class="list">
        <table class="u-full-width">
            <tr>
                <td class="valign-top">
                    [<strong>{{ $ayah->number }}</strong>]
                </td>
                <td>
                    <h2 class="rtl align-right">{{ $ayah->arabic }}</h2>
                    <p>{!! $ayah->alphabet !!}</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="list">
        <h5>Translation: </h5>
    </div>

    @foreach($ayah->ayahTranslation as $translation)
        <div class="list">
            {{ $translation->translation->name }} (<b>{{ $translation->translation->translator }}</b>) <br>
            {{ $translation->content }}
        </div>
    @endforeach
@endsection
