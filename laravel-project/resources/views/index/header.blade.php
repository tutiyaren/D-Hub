<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Hub</title>
    <link rel="shortcut icon" href="{{ asset('/D-Hub.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index/header.css') }}">
    @yield('css')
    <link href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header-left">
            <div class="logo">
                <a href="{{ route('index.index') }}">
                    <img class="logo-image" src="{{ asset('image/D-Hub.png') }}" alt="アプリロゴ">
                </a>
            </div>
        </div>
        <div class="header-right">
            <nav class="menu">
                <ul class="menu-select">
                    @auth
                    <li class="mypage"><a href="{{ route('mypage.index') }}"><i class="fa-solid fa-user" style="color: #63E6BE;"></i></a></li>
                    <li class="create"><a href="{{ route('index.create') }}"><i class="fa-solid fa-plus" style="color: #63E6BE;"></i></a></li>
                    <form action="" method="post" class="logout">
                        @csrf
                        <button type="submit" class="logout-button">ログアウト</button>
                    </form>
                    @endauth
                    @guest
                    <li class="login"><a href="{{ route('auth.login') }}" class="login-link">ログイン</a></li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-left {{ Auth::check() ? 'visible' : 'hidden' }}">
            <div class="contact">
                <a href="{{ route('contact.contact') }}" class="contact-link">お問い合わせ</a>
            </div>
        </div>
        <div class="footer-right">
            <div class="copyright">
                <small class="copyright-ttl">&copy; 2024 Ren Tsuchiya</small>
            </div>
        </div>
    </footer>

</body>

</html>