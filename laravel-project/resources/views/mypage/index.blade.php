@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/index.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="ttl-my">
        <h1 class="ttl-top">マイページ</h1>
    </div>

    <!-- メニュー選択 -->
    <div class="cards">
        <!-- アプリ内name変更 -->
        <a class="card" href="{{ route('mypage.nickname') }}">
            <div class="icon">
                <i class="fa-solid fa-file-signature fa-2xl" style="color: #a389f8;"></i>
            </div>
            <div class="ttl">
                <p class="ttl-politics">NickName変更</p>
            </div>
        </a>

        <!-- 自分の投稿一覧 -->
        <a class="card" href="{{ route('mypage.post') }}">
            <div class="icon">
                <i class="fa-solid fa-folder fa-2xl" style="color: #a389f8;"></i>
            </div>
            <div class="ttl">
                <p class="ttl-economy">マイ投稿一覧</p>
            </div>
        </a>

        <!-- 自分のブックマーク一覧 -->
        <a class="card" href="{{ route('mypage.bookmark') }}">
            <div class="icon">
                <i class="fa-solid fa-bookmark fa-2xl" style="color: #a389f8;"></i>
            </div>
            <div class="ttl">
                <p class="ttl-international">マイブックマーク一覧</p>
            </div>
        </a>
    </div>

</div>

@endsection