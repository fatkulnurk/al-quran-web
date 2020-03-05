@extends('layouts.app')

@section('title', 'Surat ' . $surah->name_alphabet . ' (' . $surah->name_arabic . ') latin dan Terjemahan Bahasa Indonesia')

@section('content')
    <div class="list align-center">
        <h1><a href="{{ request()->getUri() }}" title="Surat {{ $surah->name_alphabet }} Terjemahan Bahasa Indonesia">Surat {{ $surah->name_alphabet }}</a> - {{ $surah->name_arabic }}</h1>
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
                        <h2 class="rtl align-right"><a href="{{ route('ayah.show', [$surah->slug, $data->number]) }}" title="surat {{ $surah->name_alphabet }} ayat ke {{ $data->number }}"> {{ $data->arabic }} </a></h2>
                        <p>{!! $data->alphabet !!}</p>
                        @foreach($data->ayahTranslation as $translation)
                            @if($loop->first)
                                <p>{{ $translation->content }}</p>
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="list">
        <h3>Keterangan Surat {{ $surah->name_alphabet }}</h3>
        <table class="u-full-width">
            <thead>
            <tr>
                <th>Info</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Nama Surat</td>
                <td><a href="{{ request()->getUri() }}" title="Surat {{ $surah->name_alphabet }} Terjemahan Bahasa Indonesia">{{ $surah->name_alphabet }}</a></td>
            </tr>
            <tr>
                <td>Nama Surat (Arabic)</td>
                <td class="rtl">{{ $surah->name_arabic }}</td>
            </tr>
            <tr>
                <td>Arti</td>
                <td>{{ $surah->name_indonesia }}</td>
            </tr>
            <tr>
                <td>Surat No</td>
                <td>{{ $surah->number_of_surah }}</td>
            </tr>
            <tr>
                <td>Jumlah Ayat</td>
                <td>{{ $surah->number_of_ayah }}</td>
            </tr>
            <tr>
                <td>Tempat diturunkan</td>
                <td>{{ $surah->relevation_type }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="list">
        <h3>Daftar Surat</h3>
        <ul>
            @foreach($surahAll as $data)
                <li><a href="{{ route('surah.show', $data->slug) }}" title="surat {{ $data->name_alphabet }} Terjemahan bahasa indonesia">{{ $data->name_alphabet }}</a> ({{ $data->name_indonesia }})</li>
            @endforeach
        </ul>
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
