@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    @foreach($surah as $data)
        <div class="list">
            {{ $data->name_arabic }}
            <br>
            <a href="{{ route('surah.show', $data->id) }}">{{ $data->name_alphabet }}</a>
            <br>
            {{ $data->name_indonesia }}
        </div>
    @endforeach
@endsection
