@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<main class="main">
    <div class="videos">
        <h1 class="videos__title">アップロード済み映像一覧</h1>

        <div class="videos__list">
            @foreach ($videos as $video)
                <div class="video-card">
                    {{-- ★ サムネイル画像（ここ！） --}}
                    @if ($video->thumbnail_path)
                        <img src="{{ asset('storage/' . $video->thumbnail_path) }}" class="video-card__thumbnail">
                    @else
                        <div class="video-card__thumbnail--noimage">No Thumbnail</div>
                    @endif

                    <div class="video-card__info">
                        <h2 class="video-card__title">{{ $video['title'] }}</h2>
                        <p class="video-card__description">{{ $video['description'] }}
                        </p>

                        <div class="video-card__buttons">
                            <a href="{{ route('videos.edit', ['id' => $video->id]) }}" class="video-card__edit-btn">編集
                            </a>
                            <form method="POST" action="{{ route('videos.destroy', ['id' => $video->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="video-card__delete-btn">削除
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
@endsection