@extends('index.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index/top.css') }}">
@endsection

@section('content')

<div class="main">
    <div class="cards">

        <!-- 政治 -->
        <a class="card" href="{{ route('politics.index') }}">
            <div class="icon">
                <i class="fa-solid fa-landmark fa-2xl" style="color: #a389f8;"></i>
            </div>
            <div class="ttl">
                <p class="ttl-politics">政治</p>
            </div>
        </a>

        <!-- 経済 -->
        <a class="card" href="{{ route('economy.index') }}">
            <div class="icon">
                <i class="fa-solid fa-chart-line fa-2xl" style="color: #a389f8;"></i>
            </div>
            <div class="ttl">
                <p class="ttl-economy">経済</p>
            </div>
        </a>

        <!-- 国際 -->
        <a class="card" href="{{ route('international.index') }}">
            <div class="icon">
                <i class="fa-solid fa-scale-unbalanced fa-2xl" style="color: #a789f8;"></i>
            </div>
            <div class="ttl">
                <p class="ttl-international">国際</p>
            </div>
        </a>

        <!-- 社会 -->
        <a class="card" href="{{ route('social.index') }}">
            <div class="icon">
                <i class="fa-regular fa-handshake fa-2xl" style="color: #a389f8;"></i>
            </div>
            <div class="ttl">
                <p class="ttl-social">社会</p>
            </div>
        </a>

    </div>
</div>

@endsection