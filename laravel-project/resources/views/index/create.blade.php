@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index/create.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="ttl">
        <h1 class="ttl-top">議題作成</h1>
    </div>

    <form action="{{ route('index.store') }}" method="post" class="form">
        @csrf
        <!-- ジャンル -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="genre">ジャンル<span class="required">※必須</span></label></p>
                <select name="genre_id" id="genre" class="title-inner__input">
                    <option disabled {{ old('genre_id') ? '' : 'selected' }}>選択してください</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                    @endforeach
                </select>
                @error('genre_id')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- タイトル -->
        <div class="title">
            <div class="title-inner">
                <p class="title-inner__top"><label for="title">タイトル<span class="required">※必須</span></label></p>
                <input type="text" name="title" value="{{ old('title') }}" id="title" placeholder="与党の政策について" class="title-inner__input">
                @error('title')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- 内容 -->
        <div class="contents">
            <div class="contents-inner">
                <p class="contents-inner__bottom"><label for="contents">内容<span class="required">※必須</span></label></p>
                <textarea name="contents" id="contents" placeholder="過去の経験から私は反対です。理由は○○だからです。皆さんの意見を聞かせてください" class="contents-inner__textarea">{{ old('contents') }}</textarea>
                @error('contents')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- 送信 -->
        <div class="submit">
            <button type="submit" class="submit-button">投稿</button>
        </div>
    </form>
</div>

@endsection