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
        <x-comment
            contents="その意見に対して、私はこう考えます。あなたのそれだと、こういったことも予想されるかと思います。ただ、あれはとても良い考えだと思うので、ここをこうしたらもっと良くなるんではないでしょうか？" 
            name="bbbBBB" 
            createdAt="2024-05-31 12:58:35" 
        />
    </div>

    <!-- コメント追加 -->
    <div class="add">
        <form action="" method="post" class="add-comment">
            @csrf
            <div class="text">
                <h5 class="text-ttl"><label for="comment">コメント</label></h5>
                <textarea name="comment" id="comment" class="text-text" placeholder="議論に参加しましょう！"></textarea>
            </div>
            <div class="submit">
                <botton type="submit" class="submit-button">コメントする</botton>
            </div>
        </form>
    </div>
</div>

@endsection