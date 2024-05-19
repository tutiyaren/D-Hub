@extends('contact.component')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/thank.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="ttl">
        <h1 class="ttl-top">Thank you</h1>
    </div>

    <div class="submit">
        <a href="{{ route('index.index') }}" class="submit-link">ホームへ</a>
    </div>
</div>

@endsection