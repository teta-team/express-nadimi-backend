<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title', 'Nadimi International')</title>

    <meta name="description"
          content="@yield('description', 'Nadimi International is a supplier and exporter of premium Iranian fresh fruits and vegetables, providing international sourcing, quality control, and export solutions.')">

    <meta name="keywords"
          content="@yield('keywords', 'Nadimi International, Iranian fruits export, Iranian vegetables export, fresh fruit exporter, fresh vegetables supplier, agricultural products export, Iran produce supplier, fruit wholesale, vegetable wholesale')">

    <meta name="author" content="Nadimi International">
    <meta name="publisher" content="Nadimi International">
    <meta name="copyright" content="Nadimi International">
    <meta name="application-name" content="Nadimi International">
    <meta name="generator" content="Laravel">

    <meta name="robots"
          content="@yield('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">

    <meta name="googlebot"
          content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <meta name="theme-color" content="#fdfdfc">
    <meta name="color-scheme" content="light">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    <!-- Website Identity -->
    <meta property="og:site_name" content="Nadimi International">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:locale" content="fa_IR">

    <!-- Canonical -->
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Open Graph -->
    <meta property="og:title"
          content="@yield('og_title', 'Nadimi International | Iranian Fresh Produce Exporter')">

    <meta property="og:description"
          content="@yield('og_description', 'Discover premium Iranian fresh fruits and vegetables with Nadimi International. Your partner in agricultural sourcing and international export.')">

    <meta property="og:url" content="@yield('canonical', url()->current())">

    <meta property="og:image"
          content="@yield('og_image', asset('assets/images/og-image.jpg'))">

    <meta property="og:image:alt"
          content="Nadimi International - Iranian Fresh Fruits and Vegetables Export">

    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title"
          content="@yield('twitter_title', 'Nadimi International | Fresh Produce Export')">

    <meta name="twitter:description"
          content="@yield('twitter_description', 'Premium Iranian fresh fruits and vegetables for international markets.')">

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

    <!-- Language -->
    <meta http-equiv="content-language" content="en">

    <!-- Font Preload -->
    <link rel="preload" href="{{ asset('assets/fonts/dm-serif-display-latin.woff2') }}" as="font" type="font/woff2" crossorigin>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">

    @yield('styles')

    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
</head>

<body>

    @include('layouts.en.header')
    @yield('content')
    @include('layouts.en.footer')

    <script src="{{ asset('assets/js/site.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/whatsapp-form.min.js') }}" defer></script>
    @yield('scripts')
</body>

</html>
