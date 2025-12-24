@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')

<main class="main">
<div class="register">
    <div class="register-title">
        <h1>ユーザー登録</h1>
    </div>

    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf
            <div class="register-field">
                <div class="register-field__name">
                    <label class="register-label">ユーザー名</label>
                    <input type="text" name="name" class="register-input">
                </div>
                <div class="register-field__top">
                    <label for="" class="register-label">メールアドレス</label>
                    <input type="email" name="email" class="register-input" placeholder="test@email">
                </div>

                <div class="register-field__bottom">
                    <label for="" class="register-label">パスワード</label>
                    <input type="password" name="password" class="register-input" placeholder="test1234">
                </div>
            </div>
            <div class="register-btn">
                <button type="submit" class="register-button">登録する</button>
                
            </div>
            <div class="login-btn__link">
                <a href="{{ route('login') }}" class="login-btn">ログインはこちら</a>
            </div>
            
            
        </form>
</div>
</main>
@endsection