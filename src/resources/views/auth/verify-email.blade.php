<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <img src="{{ asset('images/COACHTECH.png') }}" alt="coachtech" class="header-logo">
        </div>
    </header>

    <main>
        <div class="confirm">
            <p class="confirm-text">登録していただいたメールアドレスに認証メールを送付しました。<br>メール認証を完了してください。
            </p>

            <a href="" class="confirm-btn">認証はこちらから</a>

            <form method="post" action="{{ route('verification.send') }}">
            @csrf
                <button type="submit" class="resend-link">認証メールを再送する</button>
            </form>
        </div>
    </main>
</body>

</html>