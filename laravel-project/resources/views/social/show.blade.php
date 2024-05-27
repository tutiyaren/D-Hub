@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/social/show.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- 戻る -->
    <div class="back">
        <a href="{{ url()->previous() }}" class="back-link">←</a>
    </div>
    <!-- 社会 -->
    <div class="ttl">
        <h1 class="ttl-top">社会</h1>
    </div>

    <!-- 該当の議題 -->
    <div class="inner">
        <div class="card">
            <x-detail
                title="与党の政策について" 
                contents="過去の経験から、今回の○○について、私は反対です。理由はこういうことで何々が予想され結果、またあの時のようなことが起きると思います。皆さんの意見を聞かせてください。" 
                name="AAAAaaa" 
                createdAt="2024-05-31 12:58:35" 
            />
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