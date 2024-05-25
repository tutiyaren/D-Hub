@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/bookmark.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- 戻る -->
    <div class="back">
        <a href="{{ url()->previous() }}" class="back-link">←</a>
    </div>
    <!-- マイブックマーク一覧 -->
    <div class="ttl">
        <h1 class="ttl-top">マイブックマーク一覧</h1>
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
            @foreach($bookmarkDebates as $bookmarkDebate)
            @if ($bookmarkDebate->debate)
            <div class="card">
                <a href="{{ $bookmarkDebate->debate->generateRoute() }}" class="card-inner">
                    <!-- ジャンル名 -->
                    <div class="genre">
                        <p class="genre-ttl">{{ $bookmarkDebate->debate->genre->name }}</p>
                    </div>
                    <!-- タイトル -->
                    <div class="title">
                        <h2 class="title-name">{{ $bookmarkDebate->debate->title }}</h2>
                    </div>
                    <!-- 内容 -->
                    <div class="contents">
                        <h3 class="contents-inner">{{ $bookmarkDebate->debate->contents }}</h3>
                    </div>
                    <!-- 投稿者情報 -->
                    <div class="user">
                        <h4 class="user-name">{{ $bookmarkDebate->debate->anonymity->nickname }}</h4>
                        <p class="user-create">{{ $bookmarkDebate->created_at }}</p>
                    </div>
                </a>
                <!-- マーク等 -->
                <div class="mark">
                    <div class="mark-left">
                        <form action="{{ route('mypage.vote', $bookmarkDebate->id) }}" method="post" class="both">
                            @csrf
                            <input type="hidden" name="debate_id" value="{{ $bookmarkDebate->debate_id }}">
                            <button type="submit" name="vote_type" value="agree" class="both-pros">
                                @if ($isVote[$bookmarkDebate->id] === 'agree')
                                <i class="fa-solid fa-circle" style="color: #FF4500;"></i>
                                @endif
                                @if (!($isVote[$bookmarkDebate->id] === 'agree'))
                                <i class="fa-solid fa-circle"></i>
                                @endif
                            </button>
                            <button type="submit" name="vote_type" value="disagree" class="both-cons">
                                @if ($isVote[$bookmarkDebate->id]=== 'disagree')
                                <i class="fa-solid fa-xmark" style="color: #0000CD;"></i>
                                @endif
                                @if (!($isVote[$bookmarkDebate->id]=== 'disagree'))
                                <i class="fa-solid fa-xmark"></i>
                                @endif
                            </button>
                        </form>
                        <form action="{{ route('mypage.bookmarkToggle') }}" method="post" class="bookmark">
                            @method('delete')
                            @csrf
                            <button type="submit" class="bookmark-button">
                                <i class="fa-solid fa-bookmark" style="color: olive;"></i>
                                <input type="hidden" name="debate_id" value="{{ $bookmarkDebate->debate_id }}">
                            </button>
                        </form>
                    </div>
                    <div class="mark-right">
                        <div class="comment">
                            <i class="fa-regular fa-comments" style="color: #a789f8;"></i>
                            <p class="comment-count">{{ $bookmarkDebate->debate->comments->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="paginate">
            {{ $bookmarkDebates->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>

</div>

@endsection