<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Hub</title>
    <link rel="shortcut icon" href="{{ asset('/D-Hub.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/component.css') }}">
    @yield('css')
    <link href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="{{ route('index.index') }}">
                <img class="logo-image" src="{{ asset('image/D-Hub.png') }}" alt="アプリロゴ">
            </a>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="copyright">
            <small class="copyright-ttl">&copy; Ren Tsuchiya</small>
        </div>
    </footer>

</body>

</html>