@extends('contact.component')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/confirmation.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="ttl">
        <h1 class="ttl-top">お問い合わせ確認</h1>
    </div>

    <form action="" method="post" class="form">
        @csrf
        <!-- 件名 -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="title">件名</label></p>
                <input type="text" name="" value="" id="title" readonly class="title-inner__input">
            </div>
        </div>
        <!-- 内容 -->
        <div class="contents">
            <div class="contents-inner">
                <p class="contents-inner__bottom"><label for="contents">内容</label></p>
                <textarea name="" id="contents" readonly class="contents-inner__textarea"></textarea>
            </div>
        </div>
        <!-- 送信 -->
        <div class="select">
            <div class="back">
                <a href="{{ route('contact.contact') }}" class="back-link">戻る</a>
            </div>
            <div class="submit">
                <button type="submit" class="submit-button">送信する</button>
            </div>
        </div>
    </form>
</div>

@endsection