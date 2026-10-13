<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Nadimi</title>

    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @yield('styles')
</head>

<body>

    @include('layouts.ar.header')
    @yield('content')
    @include('layouts.ar.footer')

    <script src="{{ asset('js/lang-redirect.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/eror-page.js') }}"></script>
    @yield('scripts')
</body>

</html>
