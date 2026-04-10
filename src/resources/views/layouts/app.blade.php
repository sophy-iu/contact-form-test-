<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>

<header class="header">
    <div class="header__inner">
        <a class="header__logo" href="/">
            FashionablyLate
        </a>
    </div>

    @if (request()->is('register'))
    <div class="header__nav">
        <a href="/login" class="header__button">login</a>
    </div>
    @endif
    @if (request()->is('login'))
    <div class="header__nav">
        <a href="/register" class="header__button">register</a>
    </div>
    @endif
    @if (request()->is('admin'))
    <div class="header__nav">
        <a href="/login" class="header__button">logout</a>
    </div>
    @endif
</header>

<main>
    @yield('content')
</main>

</body>
</html>