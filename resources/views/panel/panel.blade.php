<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="robots" content="noindex,nofollow">
    <title>پنل مدیریت اکسپرس ندیمی</title>
    <link rel="icon" href="{{ asset('images/nadimi-logo.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="app">

        {{-- Desktop sidebar. The menu items inside #nav are rendered by admin.js. --}}
        <aside class="sb">
            <div class="logo">
                <img src="{{ asset('images/nadimi-logo.png') }}" alt="">
                <div>
                    <b>اکسپرس ندیمی</b>
                    <small>پنل مدیریت</small>
                </div>
            </div>
            <div class="sbl">منوی اصلی</div>
            <nav id="nav"></nav>
            <div class="sbf">
                <button class="tg" data-act="theme" data-tb></button>
                <small>نسخه‌ی نمایشی</small>
            </div>
        </aside>

        <div>
            {{-- Mobile top bar --}}
            <header class="mbar">
                <div class="logo">
                    <img src="{{ asset('images/nadimi-logo.png') }}" alt="">
                    <div>
                        <b>اکسپرس ندیمی</b>
                    </div>
                </div>
                <button class="mtg" data-act="theme" data-tb aria-label="تغییر پوسته"></button>
            </header>

            {{-- The pages (home, products, messages, site texts) are rendered here by admin.js. --}}
            <main id="main"></main>
        </div>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
