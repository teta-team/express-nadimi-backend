<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title', 'نديمي إنترناشيونال | تصدير الفواكه والخضروات الطازجة')</title>

    <meta name="description"
          content="@yield('description', 'نديمي إنترناشيونال شركة متخصصة في توريد وتصدير الفواكه والخضروات الإيرانية الطازجة بجودة تصديرية ومعايير دولية، مع توفير حلول متكاملة للتوريد والتعبئة والتصدير إلى الأسواق العالمية.')">

    <meta name="keywords"
          content="@yield('keywords', 'نديمي إنترناشيونال، تصدير الفواكه، تصدير الخضروات، الفواكه الإيرانية، الخضروات الإيرانية، تصدير المنتجات الزراعية، مورد الفواكه الطازجة، مورد الخضروات الطازجة، تجارة المنتجات الزراعية، تصدير المواد الغذائية، استيراد الفواكه، استيراد الخضروات، تجارة دولية')">

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
    <meta http-equiv="content-language" content="ar">
    <meta property="og:locale" content="ar_AR">

    <!-- Canonical -->
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Open Graph -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Nadimi International">

    <meta property="og:title"
          content="@yield('og_title', 'نديمي إنترناشيونال | تصدير المنتجات الزراعية الإيرانية')">

    <meta property="og:description"
          content="@yield('og_description', 'توريد وتصدير الفواكه والخضروات الإيرانية الطازجة بجودة عالية ومعايير تصديرية إلى الأسواق الدولية.')">

    <meta property="og:url" content="@yield('canonical', url()->current())">

    <meta property="og:image"
          content="@yield('og_image', asset('assets/images/og-image.jpg'))">

    <meta property="og:image:alt"
          content="نديمي إنترناشيونال - تصدير الفواكه والخضروات الإيرانية الطازجة">

    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title"
          content="@yield('twitter_title', 'نديمي إنترناشيونال | تصدير الفواكه والخضروات')">

    <meta name="twitter:description"
          content="@yield('twitter_description', 'اكتشف منتجاتنا الزراعية الإيرانية الطازجة وخدمات التوريد والتصدير إلى الأسواق العالمية.')">

    <meta name="twitter:image"
          content="@yield('twitter_image', asset('assets/images/og-image.jpg'))">

    <!-- Developer Information -->
    <meta name="developer" content="Teta Team">
    <meta name="developer:website" content="https://tetateam.com">
    <meta name="designer" content="Teta Team">
    <meta name="creator" content="Teta Team">

    <!-- Icons -->
    <link rel="icon"
          href="{{ asset('assets/images/logo/favicon-64.png') }}"
          type="image/png"
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

    @include('layouts.ar.header')
    @yield('content')
    @include('layouts.ar.footer')

    <script src="{{ asset('assets/js/site.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/whatsapp-form.min.js') }}" defer></script>
    @yield('scripts')
</body>

</html>
