@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ secure_asset('css/login.css') }}">
@endsection

@section('content')

<main class="main">
<div class="login">
    <div class="login-title">
        <h1>ログイン</h1>
    </div>

    @if ($errors->any())
        <div class="error-messages">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
            <div class="login-field">
                <div class="login-field__top">
                    <label for="" class="login-label">メールアドレス</label>
                    <input type="email" name="email" class="login-input" placeholder="test@email">
                </div>
                <div class="login-field__bottom">
                    <label for="" class="login-label">パスワード</label>
                    <input type="password" name="password" class="login-input" placeholder="test1234">
                </div>
            </div>
            <div class="login-btn">
                <button type="submit" class="login-button">ログイン</button>
            </div>
            <div class="register-btn__link">
                <a href="{{ route('register') }}" class="register-btn">ユーザー登録はこちら</a>
            </div>
            
        </form>
</div>
</main>
@endsection