@extends('contact.component')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="ttl">
        <h1 class="ttl-top">会員登録</h1>
    </div>

    <form action="" method="post" class="form">
        @csrf
        <!-- 名前 -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="name">名前<span class="required">※必須</span></label></p>
                <input type="text" name="name" value="" id="name" placeholder="name" class="title-inner__input">
            </div>
        </div>
        <!-- メールアドレス -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="email">メールアドレス<span class="required">※必須</span></label></p>
                <input type="email" name="email" value="" id="email" placeholder="email" class="title-inner__input">
            </div>
        </div>
        <!-- パスワード -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="password">パスワード<span class="required">※必須</span></label></p>
                <input type="password" name="password" value="" id="password" placeholder="password" class="title-inner__input">
            </div>
        </div>
        <!-- パスワード確認用 -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="password_confirmation">パスワード確認用<span class="required">※必須</span></label></p>
                <input type="password" name="password_confirmation" value="" id="password_confirmation" placeholder="password_confirmation" class="title-inner__input">
            </div>
        </div>
        <!-- 送信 -->
        <div class="submit">
            <button type="submit" class="submit-button">会員登録</button>
        </div>
    </form>

    <div class="login">
        <a href="{{ route('auth.login') }}" class="login-link">アカウントをお持ちの方はこちらから</a>
    </div>
</div>

@endsection