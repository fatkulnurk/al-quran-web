@extends('layouts.app')

@section('title', 'Detail')

@section('content')
    @foreach(optional($surah)->ayah as $data)
        <div class="list">
            {{ $data->arabic }}
            <br>
            {!! $data->alphabet !!}
        </div>
    @endforeach
@endsection
