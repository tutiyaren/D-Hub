@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/post.css') }}">
@endsection

@section('content')

<div class="main">
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
    <!-- ページネーション -->
    <div class="inner">
        <div class="cards">

            <!-- foreach -->
            @foreach($myDebates as $myDebate)
            <div class="card">
                <a href="{{ $myDebate->generateRoute() }}" class="card-inner">
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
                        <h4 class="user-name">{{ $myDebate->anonymity->nickname }}</h4>
                        <p class="user-create">{{ $myDebate->created_at }}</p>
                    </div>
                </a>
                <!-- マーク等 -->
                <div class="mark">
                    <div class="mark-left">
                        <form action="" method="post" class="both">
                            @csrf
                            <button type="submit" class="both-pros"><i class="fa-solid fa-circle"></i></button>
                            <button type="submit" class="both-cons"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                        <!-- <form action="" method="post" class="bookmark">
                            @csrf
                            <botton type="submit" class="bookmark-button"><i class="fa-solid fa-bookmark"></i></botton>
                        </form> -->
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