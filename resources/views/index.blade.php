<!doctype html>
<html lang="en" data-home-en="{{ route('home', ['lang' => 'en']) }}"
    data-home-fa="{{ route('home', ['lang' => 'fa']) }}" data-home-ar="{{ route('home', ['lang' => 'ar']) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Express Nadimi — Iranian Fruit &amp; Vegetable Exporter | English · فارسی · العربية</title>
    <meta name="description"
        content="Express Nadimi (Nadimi International LLC) exports fresh Iranian fruits and vegetables. Choose your language: English, فارسی or العربية." />
    <meta name="robots" content="index, follow, max-image-preview:large" />
    <meta name="theme-color" content="#fbfdfb" />
    <link rel="canonical" href="{{ url('/') }}" />
    <link rel="alternate" hreflang="en" href="{{ route('home', ['lang' => 'en']) }}" />
    <link rel="alternate" hreflang="fa" href="{{ route('home', ['lang' => 'fa']) }}" />
    <link rel="alternate" hreflang="ar" href="{{ route('home', ['lang' => 'ar']) }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Express Nadimi" />
    <meta property="og:title" content="Express Nadimi — Iranian Fruit &amp; Vegetable Exporter" />
    <meta property="og:description"
        content="Fresh Iranian fruits and vegetables for Oman and the region. English · فارسی · العربية" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <link rel="icon" href="{{ asset('assets/images/logo/favicon-64.png') }}" type="image/png" sizes="64x64" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/apple-touch-icon.png') }}" />
    <script src="{{ asset('assets/js/lang-redirect.min.js') }}"></script>
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
