@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/bookmark.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- マイブックマーク一覧 -->
    <div class="ttl">
        <h1 class="ttl-top">マイブックマーク一覧</h1>
    </div>

    <!-- 検索 -->
    <div class="item">
        <form action="" method="get" class="search">
            @csrf
            <input type="text" name="" value="" placeholder="キーワードで探す" class="search-keyword">
            <button type="submit" class="submit">検索</button>
        </form>
    </div>

    <!-- 一覧 -->
    <!-- ページネーション -->
    <div class="inner">
        <div class="cards">

            <!-- foreach -->
            <div class="card">
                <a href="{{ route('politics.show') }}" class="card-inner">
                    <!-- タイトル -->
                    <div class="title">
                        <h2 class="title-name">与党の政策について</h2>
                    </div>
                    <!-- 内容 -->
                    <div class="contents">
                        <h3 class="contents-inner">過去の経験から、今回の○○について、私は反対です。理由はこここういうことで何々が予想され結果、またあの時のようなことが起きると思います。皆さんの意見を聞かせてください。</h3>
                    </div>
                    <!-- 投稿者情報 -->
                    <div class="user">
                        <h4 class="user-name">大嶋くるみああああああああああああああああああああああ</h4>
                        <p class="user-create">2024-05-31 12:58:35</p>
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
                        <form action="" method="post" class="bookmark">
                            @csrf
                            <botton type="submit" class="bookmark-button"><i class="fa-solid fa-bookmark"></i></botton>
                        </form>
                    </div>
                    <div class="mark-right">
                        <div class="comment">
                            <i class="fa-regular fa-comments" style="color: #a789f8;"></i>
                            <p class="comment-count">5</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <a href="" class="card-inner">
                    <!-- タイトル -->
                    <div class="title">
                        <h2 class="title-name">与党の政策について</h2>
                    </div>
                    <!-- 内容 -->
                    <div class="contents">
                        <h3 class="contents-inner">過去の経験から、今回の○○について、私は反対です。理由はこここういうことで何々が予想され結果、またあの時のようなことが起きると思います。皆さんの意見を聞かせてください。</h3>
                    </div>
                    <!-- 投稿者情報 -->
                    <div class="user">
                        <h4 class="user-name">大嶋くるみ</h4>
                        <p class="user-create">2024-05-31 12:58:35</p>
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
                        <form action="" method="post" class="bookmark">
                            @csrf
                            <botton type="submit" class="bookmark-button"><i class="fa-solid fa-bookmark"></i></botton>
                        </form>
                    </div>
                    <div class="mark-right">
                        <div class="comment">
                            <i class="fa-regular fa-comments" style="color: #a789f8;"></i>
                            <p class="comment-count">5</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <a href="" class="card-inner">
                    <!-- タイトル -->
                    <div class="title">
                        <h2 class="title-name">与党の政策について</h2>
                    </div>
                    <!-- 内容 -->
                    <div class="contents">
                        <h3 class="contents-inner">過去の経験から、今回の○○について、私は反対です。理由はこここういうことで何々が予想され結果、またあの時のようなことが起きると思います。皆さんの意見を聞かせてください。</h3>
                    </div>
                    <!-- 投稿者情報 -->
                    <div class="user">
                        <h4 class="user-name">大嶋くるみ</h4>
                        <p class="user-create">2024-05-31 12:58:35</p>
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
                        <form action="" method="post" class="bookmark">
                            @csrf
                            <botton type="submit" class="bookmark-button"><i class="fa-solid fa-bookmark"></i></botton>
                        </form>
                    </div>
                    <div class="mark-right">
                        <div class="comment">
                            <i class="fa-regular fa-comments" style="color: #a789f8;"></i>
                            <p class="comment-count">5</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection