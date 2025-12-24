@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}" />
@endsection

@section('content')

<main class="main">
<div class="create">
    <div class="create__title">映像アップロード</div>

    <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data" class="create__form">
        @csrf

        {{-- 動画ファイル --}}
        <div class="create__field">
            <label for="video" class="create__label">動画ファイル</label>
            <input type="file" name="video" id="video" class="create__input" accept="video/*" required>
        </div>

        {{-- サムネイル画像 --}}
        <div class="create__field">
            <label for="thumbnail" class="create__label">サムネイル画像</label>
            <input class="create__input" type="file" name="thumbnail" id="thumbnail" accept="image/*">
        </div>

        {{-- タイトル --}}
        <div class="create__field">
            <label for="title" class="create__label">タイトル</label>
            <input type="text" name="title" id="title" class="create__input" placeholder="例：作品タイトル" value="{{ old('title') }}" required>
        </div>

        {{-- 説明文 --}}
        <div class="create__field">
            <label for="description" class="create__label">説明文</label>
            <textarea name="description" id="description" class="create__textarea" placeholder="映像の内容や制作意図などを入力">{{ old('description') }}</textarea>
        </div>

        {{-- 送信ボタン --}}
        <div class="create__buttons">
            <button type="submit" class="create__button create__button--submit">アップロード</button>
            <a href="{{ route('home') }}" class="create__button create__button--cancel">キャンセル</a>
        </div>
    </form>
</div>
</main>
@endsection