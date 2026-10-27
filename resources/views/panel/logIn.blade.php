<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>ورود | اکسپرس ندیمی</title>
    <link rel="icon" href="{{ asset('assets/images/nadimi-logo.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>

<body>
    <main class="login">

        <form class="login-card" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-card__brand">
                <img src="{{ asset('assets/images/nadimi-logo.png') }}" alt="">
                <div>
                    <b>اکسپرس ندیمی</b>
                    <small>پنل مدیریت</small>
                </div>
            </div>

            @if ($errors->any())
                <p class="login-card__error" role="alert">{{ $errors->first() }}</p>
            @endif

            <div class="field">
                <label class="field__label" for="username">نام کاربری</label>
                <input class="field__input" id="username" name="username" type="text" value="{{ old('username') }}"
                    autocomplete="username" autocapitalize="none" required autofocus>
            </div>

            <div class="field">
                <label class="field__label" for="password">گذرواژه</label>
                <input class="field__input" id="password" name="password" type="password"
                    autocomplete="current-password" required>
            </div>

            <button class="login-card__submit" type="submit">ورود</button>
        </form>

    </main>
</body>

</html>
