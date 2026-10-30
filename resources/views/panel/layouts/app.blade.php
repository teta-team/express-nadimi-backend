<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>پنل مدیریت اکسپرس ندیمی</title>
    <link rel="icon" href="{{ asset('assets/images/nadimi-logo.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
        <style>
        .panel-wrap{display:grid;grid-template-columns:260px 1fr;min-height:100vh}
        @media(max-width:768px){.panel-wrap{grid-template-columns:1fr}}
        .panel-main{padding:24px;max-width:1100px;margin:0 auto;width:100%}
        .panel-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px}
        .card{background:#fff;border:1px solid #eee;border-radius:12px;padding:18px;box-shadow:0 1px 2px rgba(0,0,0,.02);overflow-x:auto}
        .table{width:100%;border-collapse:collapse;min-width:600px}
        .table th,.table td{padding:10px 12px;border-bottom:1px solid #f0f0f0;text-align:right}
        .table th{background:#fafafa;font-weight:600}
        .btn{display:inline-flex;align-items:center;gap:6px;border:1px solid #ddd;border-radius:10px;padding:8px 12px;text-decoration:none;color:#333;cursor:pointer}
        .btn.p{background:#0f7b3e;color:#fff;border-color:#0f7b3e}
        .btn.dn{background:#fff;color:#d33;border-color:#f3c0c0}
        .form-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
        @media(max-width:600px){.form-grid{grid-template-columns:1fr}}
        .form-grid .w{grid-column:1/-1}
        label{display:flex;flex-direction:column;gap:6px}
        input,select,textarea{border:1px solid #e5e7eb;border-radius:10px;padding:9px 10px;font-family:inherit;width:100%}
        .row{display:flex;gap:10px;align-items:center}
        .bar{display:flex;gap:10px;justify-content:flex-end;margin-top:16px}
        .alert{background:#f0fdf4;color:#166534;border:1px solid #bbf7d0;border-radius:10px;padding:10px 12px;margin-bottom:14px}
    </style>
</head>
<body>
<div class="panel-wrap">
    @include('panel.partials.sidebar')
    <main class="panel-main">
        <header class="panel-header">
            <div>
                <h1 style="margin:0">@yield('title')</h1>
                <small>@yield('subtitle')</small>
            </div>
            <div class="row">
                <a class="btn" href="{{ route('home', ['lang' => 'fa']) }}" target="_blank">مشاهده سایت</a>
            </div>
        </header>
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
