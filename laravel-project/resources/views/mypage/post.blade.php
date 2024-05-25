@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/post.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- 戻る -->
    <div class="back">
        <a href="{{ url()->previous() }}" class="back-link">←</a>
    </div>
    <!-- マイ投稿一覧 -->
    <div class="ttl">
        <h1 class="ttl-top">マイ投稿一覧</h1>
    </div>

    <!-- 検索 -->
    <div class="item">
        <form method="get" class="search">
            @csrf
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワードで探す" class="search-keyword">
            <button type="submit" class="submit">検索</button>
        </form>
    </div>

    <!-- 一覧 -->
    <div class="inner">
        <div class="cards">

            <!-- foreach -->
            @foreach($myDebates as $myDebate)
            <div class="card">
                <a href="{{ $myDebate->generateRoute() }}" class="card-inner">
                    <!-- ジャンル名 -->
                    <div class="genre">
                        <p class="genre-ttl">{{ $myDebate->genre->name }}</p>
                    </div>
                    <!-- タイトル -->
                    <div class="title">
                        <h2 class="title-name">{{ $myDebate->title }}</h2>
                    </div>
                    <!-- 内容 -->
                    <div class="contents">
                        <h3 class="contents-inner">{{ $myDebate->contents }}</h3>
                    </div>
                    <!-- 投稿者情報 -->
                    <div class="user">
                        <p class="user-create">{{ $myDebate->created_at }}</p>
                    </div>
                </a>
                <!-- マーク等 -->
                <div class="mark">
                    <div class="mark-left">
                        <div class="both">
                            <span type="submit" name="vote_type" value="agree" class="both-pros">
                                <i class="fa-solid fa-circle" style="color: #FF4500;"></i>
                                <p class="count-agree">{{ $myDebate->votes()->where('vote_type', 'agree')->count() }}</p>
                            </span>
                            <span type="submit" name="vote_type" value="disagree" class="both-cons">
                                <i class="fa-solid fa-xmark" style="color: #0000CD;"></i>
                                <p class="count-disagree">{{ $myDebate->votes()->where('vote_type', 'disagree')->count() }}</p>
                            </span>
                        </div>
                    </div>
                    <div class="mark-right">
                        <div class="comment">
                            <i class="fa-regular fa-comments" style="color: #a789f8;"></i>
                            <p class="comment-count">{{ $myDebate->comments->count() }}</p>
                        </div>
                        <form action="{{ route('mypage.destory', $myDebate->id) }}" method="post" class="delete">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="anonymity_id" value="{{ $myDebate->anonymity_id }}">
                            <button type="submit" class="delete-button">削除</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $myDebates->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>

</div>

@endsection