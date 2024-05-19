@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/nickname.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="ttl">
        <h1 class="ttl-top">NickName設定</h1>
    </div>

    <div class="description">
        <p class="description-text">～D-Hubで使用する名前を設定しましょう～</p>
    </div>

    <form action="" method="post" class="form">
        @csrf
        <div class="name">
            <p class="name-ttl"><label for="nickname">ニックネーム</label></p>
            <input type="text" name="nickname" value="" id="nickname" class="name-input" placeholder="NickName">
        </div>
        <div class="submit">
            <button type="submit" class="submit-button">決定</button>
        </div>
    </form>

</div>

@endsection