<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>پنل مدیریت اکسپرس ندیمی</title>
    <link rel="icon" href="{{ asset('assets/images/nadimi-logo.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.min.css') }}">
</head>

<body>
    <div class="app">

        {{-- Desktop sidebar. The menu items inside #nav are rendered by admin.min.js. --}}
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
                <button class="tg" data-act="logout" data-lo></button>
                <small>نسخه‌ی نمایشی</small>
            </div>
        </aside>

        <div>
            {{-- Mobile top bar --}}
            <header class="mbar">
                <div class="logo">
                    <img src="{{ asset('assets/images/nadimi-logo.png') }}" alt="">
                    <div>
                        <b>اکسپرس ندیمی</b>
                    </div>
                </div>
                <button class="mtg" data-act="theme" data-tb aria-label="تغییر پوسته"></button>
            </header>

            {{-- The pages (home, products, messages, site texts) are rendered here by admin.min.js. --}}
            <main id="main"></main>
        </div>

    </div>

    {{-- Hidden logout form (submitted by the "خروج" buttons in admin.min.js) --}}
    <form id="logout-form" method="POST" action="{{ route('logout') }}" hidden>@csrf</form>

    <script>
        window.PANEL = {
            user: @json($username),
            weak: @json($weakPassword),
            csrf: @json(csrf_token()),
            accountUrl: @json(route('panel.account')),
            productsUrl: '/panel/products',
        };
    </script>
    <script src="{{ asset('assets/js/admin.min.js') }}"></script>
</body>

</html>
