@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}" />
@endsection

@section('content')

<main class="main">
<div class="edit">
    <h1 class="edit__title">映像編集画面</h1>

    <div class="edit__container">

    {{-- 左カラム --}}
    <div class="edit__left">
        @if ($video->thumbnail_path)
            <img src="{{ asset('storage/' . $video->thumbnail_path) }}" class="edit__thumb" alt="">
        @endif
    </div>

    {{-- 右カラム --}}
    <div class="edit__right">
        <form method="POST" action="{{ route('videos.update', ['id' => $video['id']]) }}" enctype="multipart/form-data" class="edit__right-title">
            @csrf
            @method('PUT')

            <label class="edit__label">サムネイル画像を変更</label>
            <input type="file" name="thumbnail" accept="image/*">

            <label class="edit__label">タイトル</label>
            <input type="text" name="title" class="edit__input" value="{{ $video['title'] }}">

            <label class="edit__label">説明</label>
            <textarea name="description" class="edit__textarea">{{ $video['description'] }}</textarea>

            <button type="submit" class="edit__button">更新する</button>
        </form>
    </div>

</div>

</div>
</main>
@endsection
