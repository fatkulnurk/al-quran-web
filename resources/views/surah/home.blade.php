@extends('layouts.app')

@section('title', 'Al Quran Online Lengkap Dengan Bacaan Latin dan Terjemah Bahasa Indonesia')

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
                    <h5><a href="{{ route('surah.show', $data->slug) }}">{{ $data->name_alphabet }}</a> ({{ $data->name_indonesia }})</h5>
                </td>
                <td class="valign-top">
                    <h3 class="rtl" style="text-align: right">
                        <a href="{{ route('surah.show', $data->slug) }}" class="font-color-black">{{ $data->name_arabic }}</a>
                    </h3>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
