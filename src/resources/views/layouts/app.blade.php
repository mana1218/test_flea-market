<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <img src="{{ asset('images/COACHTECH.png') }}" alt="coachtech" class="header-logo">
        </div>
        <div class="header-search">
            <input type="text" placeholder="なにをお探しですか？">
        </div>
        <div class="header-btn">
            <form action="/logout" method="post">
            @csrf
                <input type="submit" class="logout-btn" value="ログアウト">
            </form>
            <a href="/mypage" class="mypage-btn">マイページ</a>
            <a href="/sell" class="sell-btn">出品</a>
        </div>
    </header>

    <nav>
        @yield('nav')
    </nav>

    <main>
        @yield('content')
    </main>
</body>

</html>