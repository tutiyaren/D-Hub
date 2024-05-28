@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/economy/index.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- 経済 -->
    <div class="ttl">
        @if($genre)
        <h1 class="ttl-top">{{ $genre->name }}</h1>
        @endif
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
            @foreach($debates as $debate)
            <div class="card">
                <a href="{{ route('economy.show', $debate->id) }}" class="card-inner">
                    <!-- タイトル -->
                    <div class="title">
                        <h2 class="title-name">{{ $debate->title }}</h2>
                    </div>
                    <!-- 内容 -->
                    <div class="contents">
                        <h3 class="contents-inner">{{ $debate->contents }}</h3>
                    </div>
                    <!-- 投稿者情報 -->
                    <div class="user">
                        <h4 class="user-name">{{ $debate->anonymity->nickname }}</h4>
                        <p class="user-create">{{ $debate->created_at }}</p>
                    </div>
                </a>
                <!-- マーク等 -->
                <div class="mark">
                    <div class="mark-left">
                        @auth
                        <form action="" method="post" class="both">
                            @csrf
                            <button type="submit" class="both-pros"><i class="fa-solid fa-circle"></i></button>
                            <button type="submit" class="both-cons"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                        <form action="" method="post" class="bookmark">
                            @csrf
                            <botton type="submit" class="bookmark-button"><i class="fa-solid fa-bookmark"></i></botton>
                        </form>
                        @endauth
                    </div>
                    <div class="mark-right">
                        <div class="comment">
                            <i class="fa-regular fa-comments" style="color: #a789f8;"></i>
                            <p class="comment-count">{{ $debate->comments->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- ページネーション -->
        <div class="paginate">
            {{ $debates->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>

</div>

@endsection