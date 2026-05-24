<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <img src="{{ asset('images/COACHTECH.png') }}" alt="coachtech" class="header-logo">
        </div>
    </header>

    <main>
        <div class="register">
            <div class="register__inner">
                <h2 class="register__title">会員登録</h2>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <form method="post" action="/register" class="register__form">
                @csrf
                    <div class="form__group">
                        <label>ユーザー名</label>
                        <input type="text" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form__group">
                        <label>メールアドレス</label>
                        <input type="email" name="email" value="{ old('email') }}">
                    </div>
                    <div class="form__group">
                        <label>パスワード</label>
                        <input type="password" name="password">
                    </div>
                    <div class="form__group">
                        <label>確認用パスワード</label>
                        <input type="password" name="password_confirmation">
                    </div>
                    <button type="submit" class="register-btn">登録する</button>
                </form>
                <a href="/login" class="login-btn">ログインはこちら</a>{
            </div>
        </div>
    </main>
</body>

</html>