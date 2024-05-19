@extends('contact.component')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="ttl">
        <h1 class="ttl-top">ログイン</h1>
    </div>

    <form action="" method="post" class="form">
        @csrf
        <!-- メールアドレス -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="email">メールアドレス</label></p>
                <input type="email" name="email" value="" id="email" placeholder="email" class="title-inner__input">
            </div>
        </div>
        <!-- パスワード -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="password">パスワード</label></p>
                <input type="password" name="password" value="" id="password" placeholder="password" class="title-inner__input">
            </div>
        </div>
        <!-- 送信 -->
        <div class="submit">
            <button type="submit" class="submit-button">ログイン</button>
        </div>
    </form>

    <div class="register">
        <a href="{{ route('auth.register') }}" class="register-link">アカウントをお持ちでない方はこちらから</a>
    </div>
</div>

@endsection