@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')

<main class="main">
    <div class="show">
        <video src="{{ asset('storage/' . $video->file_path) }}" controls class="video-player"></video>
        <h2>{{ $video->title }}</h2>
        <p>{{ $video->description }}</p>
    </div>