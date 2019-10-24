@extends('layouts.app')

@section('title', 'Surat ' . $surah->name_alphabet . ' (' . $surah->name_arabic . ') Terjemahan Bahasa Indonesia')

@section('content')
    <div class="list align-center">
        <h1>Surat {{ $surah->name_alphabet }} - {{ $surah->name_arabic }}</h1>
    </div>
    <div class="list">
        {!! $surah->description_indonesia !!}
    </div>
    <div class="fixed-bottom">
        <strong>Pergi Ke ayat:</strong>
        <select class="select" onchange="goTo(this.value)">
            @foreach(optional($surah)->ayah as $data)
                <option value="{{ $data->number }}">{{ $data->number }}</option>
            @endforeach
        </select>
    </div>
    <div class="list">
        <table class="u-full-width">
            @foreach(optional($surah)->ayah as $data)
                <tr id="ayat-ke-{{$data->number}}">
                    <td class="valign-top">
                        [<strong>{{ $data->number }}</strong>]
                    </td>
                    <td>
                        <h2 class="rtl align-right"><a href="{{ route('ayah.show', [$surah->slug, $data->number]) }}"> {{ $data->arabic }} </a></h2>
                        <p>{!! $data->alphabet !!}</p>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@push('footer')
    <script>
        function goTo(number) {
            const element = document.getElementById("ayat-ke-" + number);
            element.scrollIntoView();
        }
    </script>
@endpush
