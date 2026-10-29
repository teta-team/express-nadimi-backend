<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'إكسبرس نديمي')</title>
    <meta name="description" content="@yield('description', 'تصدير الفواكه والخضروات الإيرانية الطازجة من شركة نديمي الدولية.')">
    @yield('meta')
    <meta name="theme-color" content="#fdfdfc">

    <link rel="icon" href="{{ asset('assets/images/logo/favicon-64.png') }}" type="image/png" sizes="64x64">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/apple-touch-icon.png') }}">
    <link rel="preload" href="{{ asset('assets/fonts/vazirmatn-var.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
    @yield('styles')
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</head>

<body>

    @include('layouts.ar.header')
    @yield('content')
    @include('layouts.ar.footer')

    <script src="{{ asset('assets/js/site.js') }}" defer></script>
    <script src="{{ asset('assets/js/whatsapp-form.js') }}" defer></script>
    @yield('scripts')
</body>

</html>
