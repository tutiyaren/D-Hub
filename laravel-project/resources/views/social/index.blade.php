@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/social/index.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- 社会 -->
    <div class="ttl">
        <h1 class="ttl-top">社会</h1>
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
    <div class="inner">
        <div class="cards">

            <!-- foreach -->
            <div class="card">
                <x-debate 
                    link="{{ route('social.show') }}" 
                    title="与党の政策について" 
                    contents="過去の経験から、今回の○○について、私は反対です。理由はこここういうことで何々が予想され結果、またあの時のようなことが起きると思います。皆さんの意見を聞かせてください。" 
                    name="AAAAaaa" 
                    createdAt="2024-05-31 12:58:35" 
                />
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