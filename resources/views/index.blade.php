<!doctype html>
<html lang="en" data-home-en="{{ route('home', ['lang' => 'en']) }}"
    data-home-fa="{{ route('home', ['lang' => 'fa']) }}" data-home-ar="{{ route('home', ['lang' => 'ar']) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Express Nadimi — Fresh Iranian Fruit &amp; Vegetable Exporter</title>
    <meta name="description"
        content="Express Nadimi (Nadimi International LLC) exports fresh Iranian fruits and vegetables. English · فارسی · العربية" />
    <link rel="icon" href="{{ asset('assets/images/logo/nadimi-logo-4096.png') }}" type="image" />
    <script src="{{ asset('assets/js/lang-redirect.js') }}"></script>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: system-ui, Tahoma, sans-serif;
            background: #fbfdfb;
            color: #0f3a2a;
        }

        nav {
            display: flex;
            gap: 10px;
        }

        a {
            padding: 12px 22px;
            border: 1.5px solid #c2dfc9;
            border-radius: 999px;
            color: inherit;
            text-decoration: none;
            font-weight: 700;
        }

        a:hover {
            background: #0f3a2a;
            color: #fff;
        }

        @media (prefers-color-scheme: dark) {
            body {
                background: #0b1510;
                color: #e6f2e9;
            }

            a {
                border-color: #2d4b3b;
            }
        }
    </style>
</head>

<body>
    <nav aria-label="Language">
        <a href="{{ route('home', ['lang' => 'en']) }}" hreflang="en">English</a>
        <a href="{{ route('home', ['lang' => 'fa']) }}" hreflang="fa" lang="fa">فارسی</a>
        <a href="{{ route('home', ['lang' => 'ar']) }}" hreflang="ar" lang="ar">العربية</a>
    </nav>
</body>

</html>
