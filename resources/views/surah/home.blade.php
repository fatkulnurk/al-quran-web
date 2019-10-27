@extends('layouts.app')

@section('title', 'Latin dan Terjemahan Bahasa Indonesia')

@section('content')
    <div class="list">
        <h2>Daftar Surah Al Quran</h2>
    </div>
    <table class="u-full-width list">
        @foreach($surah as $data)
            <tr>
                <td class="valign-top">
                    <h5 class="align-center">
                        {{ $data->number_of_surah }}.
                    </h5>
                </td>
                <td class="valign-top">
                    <h5><a href="{{ route('surah.show', $data->slug) }}" title="surat {{ $data->name_alphabet }} Terjemahan dan Tafsir">{{ $data->name_alphabet }}</a> ({{ $data->name_indonesia }})</h5>
                </td>
                <td class="valign-top">
                    <h3 class="rtl align-right">
                        <a href="{{ route('surah.show', $data->slug) }}" class="font-color-black" title="{{ $data->name_arabic }} surah">{{ $data->name_arabic }}</a>
                    </h3>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
