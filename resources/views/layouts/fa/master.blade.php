<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title', 'ندیمی اینترنشنال | صادرات میوه و سبزیجات تازه ایرانی')</title>

    <meta name="description"
          content="@yield('description', 'ندیمی اینترنشنال؛ تأمین‌کننده و صادرکننده میوه و سبزیجات تازه ایرانی با کیفیت صادراتی، بسته‌بندی استاندارد و خدمات تأمین و صادرات محصولات کشاورزی به بازارهای بین‌المللی.')">

    <meta name="keywords"
          content="@yield('keywords', 'ندیمی اینترنشنال، صادرات میوه، صادرات سبزیجات، صادرات محصولات کشاورزی، میوه تازه ایرانی، سبزیجات تازه ایرانی، صادرکننده میوه، تأمین‌کننده محصولات کشاورزی، صادرات صیفی‌جات، خرید عمده میوه، صادرات مواد غذایی، بازارهای بین‌المللی')">

    <meta name="author" content="Nadimi International">
    <meta name="publisher" content="Nadimi International">
    <meta name="copyright" content="Nadimi International">
    <meta name="application-name" content="Nadimi International">
    <meta name="generator" content="Laravel">

    <!-- SEO Robots -->
    <meta name="robots"
          content="@yield('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">

    <meta name="googlebot"
          content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- Browser & Theme -->
    <meta name="theme-color" content="#fdfdfc">
    <meta name="color-scheme" content="light">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    <!-- Language -->
    <meta http-equiv="content-language" content="fa">
    <meta property="og:locale" content="fa_IR">

    <!-- Canonical -->
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Open Graph -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Nadimi International">

    <meta property="og:title"
          content="@yield('og_title', 'ندیمی اینترنشنال | صادرات محصولات کشاورزی ایران')">

    <meta property="og:description"
          content="@yield('og_description', 'تأمین و صادرات میوه و سبزیجات تازه ایرانی با کیفیت صادراتی و استانداردهای بین‌المللی توسط ندیمی اینترنشنال.')">

    <meta property="og:url" content="@yield('canonical', url()->current())">

    <meta property="og:image"
          content="@yield('og_image', asset('assets/images/og-image.jpg'))">

    <meta property="og:image:alt"
          content="ندیمی اینترنشنال؛ صادرکننده میوه و سبزیجات تازه ایرانی">

    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title"
          content="@yield('twitter_title', 'ندیمی اینترنشنال | صادرات میوه و سبزیجات تازه')">

    <meta name="twitter:description"
          content="@yield('twitter_description', 'صادرات و تأمین بین‌المللی محصولات کشاورزی تازه و باکیفیت ایرانی.')">

    <meta name="twitter:image"
          content="@yield('twitter_image', asset('assets/images/og-image.jpg'))">

    <!-- Developer Information -->
    <meta name="developer" content="Teta Team">
    <meta name="developer:website" content="https://tetateam.com">
    <meta name="designer" content="Teta Team">
    <meta name="creator" content="Teta Team">

    <!-- Icons -->
    <link rel="icon"
          href="{{ asset('assets/images/logo/favicon.ico') }}"
          type="image/ico"
          sizes="64x64">

    <link rel="apple-touch-icon"
          href="{{ asset('assets/images/logo/apple-touch-icon.png') }}">

    <!-- Font Preload -->
    <link rel="preload"
          href="{{ asset('assets/fonts/vazirmatn-var.woff2') }}"
          as="font"
          type="font/woff2"
          crossorigin>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">

    @yield('styles')

    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
</head>

<body>

    @include('layouts.fa.header')
    @yield('content')
    @include('layouts.fa.footer')

    <script src="{{ asset('assets/js/site.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/whatsapp-form.min.js') }}" defer></script>
    @yield('scripts')
</body>

</html>
