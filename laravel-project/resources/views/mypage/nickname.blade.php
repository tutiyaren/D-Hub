@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/nickname.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- 戻る -->
    <div class="back">
        <a href="{{ url()->previous() }}" class="back-link">←</a>
    </div>
    <div class="ttl">
        <h1 class="ttl-top">NickName設定</h1>
    </div>

    <div class="description">
        <p class="description-text">～D-Hubで使用する名前を設定しましょう～</p>
    </div>

    @if(session('error'))
    <div class="error-top">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('mypage.store') }}" method="post" class="form">
        @csrf
        <div class="name">
            <p class="name-ttl"><label for="nickname">ニックネーム</label></p>
            <input type="text" name="nickname" value="{{ $anonymity ? $anonymity->nickname : '' }}" id="nickname" class="name-input" placeholder="NickName">
            @error('nickname')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="submit">
            <button type="submit" class="submit-button">決定</button>
        </div>
    </form>

</div>

@endsection