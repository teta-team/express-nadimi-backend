<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Express Nadimi — Fresh Iranian Fruit &amp; Vegetable Exporter')</title>
    <meta name="description" content="@yield('description', 'Fresh Iranian fruit and vegetables supplied by Nadimi International LLC.')">
    @yield('meta')
    <meta name="theme-color" content="#fdfdfc">

    <link rel="icon" href="{{ asset('assets/images/logo/favicon-64.png') }}" type="image/png" sizes="64x64">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/apple-touch-icon.png') }}">
    <link rel="preload" href="{{ asset('assets/fonts/manrope-var-latin.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="{{ asset('assets/fonts/dm-serif-display-latin.woff2') }}" as="font"
        type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
    @yield('styles')
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</head>

<body>

    @include('layouts.en.header')
    @yield('content')
    @include('layouts.en.footer')

    <script src="{{ asset('assets/js/site.js') }}" defer></script>
    <script src="{{ asset('assets/js/whatsapp-form.js') }}" defer></script>
    @yield('scripts')
</body>

</html>
