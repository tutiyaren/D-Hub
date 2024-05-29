@extends('contact.component')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/contact.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="ttl">
        <h1 class="ttl-top">お問い合わせ</h1>
    </div>

    <form action="{{ route('contact.confirmation') }}" method="post" class="form">
        @csrf
        <!-- 連絡先 -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="tel">連絡先<span class="required">※必須</span></label></p>
                <input type="text" name="tel" value="{{ old('tel', $contactData['tel'] ?? '') }}" id="tel" placeholder="000-1234-1234" class="title-inner__input">
                @error('tel')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- 件名 -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="title">件名<span class="required">※必須</span></label></p>
                <input type="text" name="title" value="{{ old('title', $contactData['title'] ?? '') }}" id="title" placeholder="機能追加" class="title-inner__input">
                @error('title')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- 内容 -->
        <div class="contents">
            <div class="contents-inner">
                <p class="contents-inner__bottom"><label for="contents">内容<span class="required">※必須</span></label></p>
                <textarea name="contents" id="contents" placeholder="○○出来るようにして欲しい" class="contents-inner__textarea">{{ old('contents', $contactData['contents'] ?? '') }}</textarea>
                @error('contents')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- 送信 -->
        <div class="submit">
            <button type="submit" class="submit-button">内容を確認する</button>
        </div>
    </form>
</div>

@endsection