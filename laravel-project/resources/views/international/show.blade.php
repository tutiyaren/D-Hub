@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/international/show.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- 戻る -->
    <div class="back">
        <a href="{{ url()->previous() }}" class="back-link">←</a>
    </div>
    <!-- 国際 -->
    <div class="ttl">
        @if($genre)
        <h1 class="ttl-top">{{ $genre->name }}</h1>
        @endif
    </div>

    <!-- 該当の議題 -->
    <div class="inner">
        <div class="card">
            <div class="card-inner">
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
            </div>
        </div>
    </div>

    <!-- コメント一覧 -->
    <div class="comments">
        <!-- foreach -->
        @foreach($comments as $comment)
        <div class="comments-card">
            <!-- 内容 -->
            <div class="comment">
                <p class="comment-text">{{ $comment->contents }}</p>
            </div>
            <!-- 投稿者情報 -->
            <div class="who">
                <p class="who-name">{{ $comment->anonymity->nickname }}</p>
                <p class="who-create">{{ $comment->created_at }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- コメント追加 -->
    @auth
    @if ($anonymity)
    <div class="add">
        <form action="{{ route('international.store', ['id' => $debate->id]) }}" method="post" class="add-comment">
            @csrf
            <div class="text">
                <h5 class="text-ttl"><label for="contents">コメント</label></h5>
                <textarea name="contents" id="contents" class="text-text" placeholder="議論に参加しましょう！"></textarea>
            </div>
            @error('contents')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="submit">
                <button type="submit" class="submit-button">コメントする</button>
            </div>
        </form>
    </div>
    @endif
    @endauth
</div>

@endsection