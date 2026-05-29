<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <img src="{{ asset('images/COACHTECH.png') }}" alt="coachtech" class="header-logo">
        </div>
    </header>

    <main>
        <div class="login">
            <div class="login__inner">
                <h2 class="login__title">ログイン</h2>
                <form method="post" action="{{ url('/login') }}" class="login__form">
                @csrf
                    <div class="form__group">
                        <label>メールアドレス</label>
                        <input type="email" name="email" value="{{ old('email') }}">

                        <div class="error">
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form__group">
                        <label>パスワード</label>
                        <input type="password" name="password">

                        <div class="error">
                            @error('password')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="login-btn">ログインする</button>
                </form>
                <a href="/register" class="register-btn">会員登録はこちら</a>
            </div>
        </div>
    </main>
</body>

</html>