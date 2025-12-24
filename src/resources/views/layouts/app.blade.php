<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
    <div class="header__inner">

        {{-- 左側：ログイン中のみ表示 --}}
        <div class="header__left">
            @auth
                <a href="{{ route('videos.create') }}" class="header__upload-btn">アップロード</a>

                <form method="POST" action="{{ route('logout') }}" class="header__logout-form">
                    @csrf
                    <button type="submit" class="header__logout-btn">ログアウト</button>
                </form>
            @endauth
        </div>

        {{-- 中央：ロゴ --}}
        <div class="header__center">
            @if (request()->routeIs('login') || request()->routeIs('register'))
                <span class="header__logo">ClipHub</span>
            @else
                <a href="{{ route('home') }}" class="header__logo">ClipHub</a>
            @endif
        </div>

        {{-- 右側：空（中央ロゴが正確に真ん中へいくためのダミー） --}}
        <div class="header__right"></div>

    </div>
</header>


    <main>
        @yield('content')
    </main>
</body>
</html>