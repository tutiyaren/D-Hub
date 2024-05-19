@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/economy/show.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- 戻る -->
    <div class="back">
        <a href="{{ url()->previous() }}" class="back-link">←</a>
    </div>
    <!-- 経済 -->
    <div class="ttl">
        <h1 class="ttl-top">経済</h1>
    </div>

    <!-- 該当の議題 -->
    <div class="inner">
        <div class="card">
            <div class="card-inner">
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
            </div>
        </div>
    </div>

    <!-- コメント一覧 -->
    <div class="comments">
        <!-- foreach -->
        <div class="comments-card">
            <!-- 内容 -->
            <div class="comment">
                <p class="comment-text">その意見に対して、私はこう考えます。あなたのそれだと、こういったことも予想されるかと思います。ただ、あれはとても良い考えだと思うので、ここをこうしたらもっと良くなるんではないでしょうか？</p>
            </div>
            <!-- 投稿者情報 -->
            <div class="who">
                <p class="who-name">坪井美緒あああああああああああああああああああああああ</p>
                <p class="who-create">2024-05-31 12:58:35</p>
            </div>
        </div>

        <div class="comments-card">
            <!-- 内容 -->
            <div class="comment">
                <p class="comment-text">その意見に対して、私はこう考えます。あなたのそれだと、こういったことも予想されるかと思います。ただ、あれはとても良い考えだと思うので、ここをこうしたらもっと良くなるんではないでしょうか？</p>
            </div>
            <!-- 投稿者情報 -->
            <div class="who">
                <p class="who-name">坪井美緒</p>
                <p class="who-create">2024-05-31 12:58:35</p>
            </div>
        </div>

        <div class="comments-card">
            <!-- 内容 -->
            <div class="comment">
                <p class="comment-text">その意見に対して、私はこう考えます。あなたのそれだと、こういったことも予想されるかと思います。ただ、あれはとても良い考えだと思うので、ここをこうしたらもっと良くなるんではないでしょうか？</p>
            </div>
            <!-- 投稿者情報 -->
            <div class="who">
                <p class="who-name">坪井美緒</p>
                <p class="who-create">2024-05-31 12:58:35</p>
            </div>
        </div>

        <div class="comments-card">
            <!-- 内容 -->
            <div class="comment">
                <p class="comment-text">その意見に対して、私はこう考えます。あなたのそれだと、こういったことも予想されるかと思います。ただ、あれはとても良い考えだと思うので、ここをこうしたらもっと良くなるんではないでしょうか？</p>
            </div>
            <!-- 投稿者情報 -->
            <div class="who">
                <p class="who-name">坪井美緒</p>
                <p class="who-create">2024-05-31 12:58:35</p>
            </div>
        </div>

        <div class="comments-card">
            <!-- 内容 -->
            <div class="comment">
                <p class="comment-text">その意見に対して、私はこう考えます。あなたのそれだと、こういったことも予想されるかと思います。ただ、あれはとても良い考えだと思うので、ここをこうしたらもっと良くなるんではないでしょうか？</p>
            </div>
            <!-- 投稿者情報 -->
            <div class="who">
                <p class="who-name">坪井美緒</p>
                <p class="who-create">2024-05-31 12:58:35</p>
            </div>
        </div>
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