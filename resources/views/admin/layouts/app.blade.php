<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'پنل مدیریت') - اکسپرس ندیمی</title>
    <link rel="icon" href="{{ asset('assets/images/nadimi-logo.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <style>
        :root{--bg:#0b1020;--card:#121a2c;--line:#1f2a44;--text:#e7e9ee;--sub:#9aa3b9;--side:#0f1628;--brand:#22c55e}
        *{box-sizing:border-box}
        body{margin:0;font-family:Vazirmatn,system-ui;background:var(--bg);color:var(--text)}
        .app{display:grid;grid-template-columns:272px minmax(0,1fr);min-height:100vh}
        main{padding:32px}
        .page-head{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:26px;gap:16px}
        .page-head h1{margin:0;font-size:24px;font-weight:900}
        .page-head p{margin:6px 0 0;color:var(--sub)}
        .head-actions{display:flex;gap:10px;flex-wrap:wrap}
        .btn{display:inline-flex;align-items:center;gap:8px;border:1px solid var(--line);border-radius:999px;padding:9px 18px;text-decoration:none;color:var(--text);background:transparent;font-weight:600}
        .btn.p{background:linear-gradient(135deg,#22c55e,#16a34a);color:#fff;border-color:transparent}
        .btn.dn{color:#f87171;border-color:rgba(248,113,113,.4)}
        .card{background:radial-gradient(1200px 120% at 50% 0,rgba(34,197,94,.08),transparent),var(--card);border:1px solid var(--line);border-radius:18px;box-shadow:0 40px 80px -60px rgba(34,197,94,.4);overflow:hidden}
        .card-h{display:flex;align-items:center;justify-content:space-between;padding:18px 24px;border-bottom:1px solid var(--line)}
        .card-b{padding:0}
        .table{width:100%;border-collapse:collapse}
        .table th,.table td{padding:14px 24px;border-bottom:1px solid var(--line);text-align:right;vertical-align:middle}
        .table th{background:rgba(148,163,184,.08);color:var(--sub);font-weight:700;font-size:14px}
        .table tbody tr:hover{background:rgba(148,163,184,.06)}
        .form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;padding:24px}
        .form-grid .w{grid-column:1/-1}
        .field{display:flex;flex-direction:column;gap:8px}
        .field label{font-weight:700}
        .field input,.field select,.field textarea{border:1px solid var(--line);border-radius:14px;padding:10px 14px;font-family:inherit;font-size:15px;background:transparent;color:var(--text)}
        .actions{display:flex;gap:10px;justify-content:flex-end;padding:0 24px 24px}
        .alert{background:rgba(34,197,94,.18);color:#4ade80;border:1px solid rgba(74,222,128,.4);border-radius:14px;padding:12px 18px;margin-bottom:20px}
        .nv{display:flex;align-items:center;gap:12px;padding:10px 14px;border-radius:999px;color:rgba(231,233,238,.78);text-decoration:none;font-weight:700}
        .nv.on{background:linear-gradient(90deg,rgba(34,197,94,.25),transparent);color:#fff}
        .sb{background:radial-gradient(220% 120% at 50% 0,rgba(34,197,94,.16),transparent),var(--side);color:#e7e9ee;border-left:1px solid var(--line)}
        .logo{border-bottom:1px solid var(--line)}
        .logo small{color:var(--sub)}
        .sbl{color:var(--sub)}
        .sbf small{color:var(--sub)}
        .tg{width:100%;border:1px solid var(--line);background:transparent;color:var(--text);border-radius:999px;padding:9px 14px;font-family:inherit;cursor:pointer}
        .cd{border:1px solid var(--line);border-radius:20px;background:var(--card);color:var(--text);padding:0;max-width:420px;width:calc(100% - 32px)}
        .cd::backdrop{background:rgba(3,7,18,.72)}
        .cd-box{padding:24px}
        .cd-box h3{margin:0 0 8px;font-size:19px}
        .cd-box p{margin:0;color:var(--sub);line-height:1.9}
        .cd-actions{display:flex;gap:10px;justify-content:flex-end;margin-top:22px}
        .empty{padding:48px 24px;text-align:center;color:var(--sub)}
        .badge{display:inline-flex;align-items:center;gap:6px;border-radius:999px;padding:3px 10px;font-size:12px;font-weight:700;border:1px solid var(--line)}
        .badge.new{background:rgba(34,197,94,.15);color:#4ade80;border-color:rgba(74,222,128,.4)}
        .badge.mid{background:rgba(234,179,8,.15);color:#facc15;border-color:rgba(250,204,21,.4)}
        .badge.done{background:rgba(148,163,184,.15);color:#cbd5e1}
        .filters{display:flex;gap:10px;flex-wrap:wrap;padding:16px 24px;border-bottom:1px solid var(--line)}
        .filters input,.filters select{border:1px solid var(--line);border-radius:12px;padding:9px 13px;background:transparent;color:var(--text);font-family:inherit}
        .pag{padding:16px 24px}
        .pag nav{display:flex;gap:6px;flex-wrap:wrap}
        .pag a,.pag span{border:1px solid var(--line);border-radius:10px;padding:6px 11px;text-decoration:none;color:var(--text);font-size:14px}
        .pag .active span{background:var(--brand);color:#04120a;border-color:transparent;font-weight:800}
        .btn.sm{padding:6px 12px;font-size:13px}
        @media (max-width:820px){.app{grid-template-columns:1fr}.sb{display:none}main{padding:18px}.table th,.table td{padding:11px 12px}.form-grid{grid-template-columns:1fr}.page-head{flex-direction:column}}
    </style>
    @stack('styles')
</head>
<body>
    <div class="app">
        @include('admin.partials.sidebar')
        <div>
            <main>
                <header class="page-head">
                    <div>
                        <h1>@yield('page-title')</h1>
                        <p>@yield('page-subtitle')</p>
                    </div>
                    <div class="head-actions">
                        <a class="btn" href="{{ route('home', ['lang' => 'fa']) }}" target="_blank">مشاهده سایت</a>
                    </div>
                </header>
                @if(session('success'))
                    <div class="alert">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert" style="background:rgba(239,68,68,.16);color:#f87171;border:1px solid rgba(248,113,113,.5)">
                        <div style="font-weight:800;margin-bottom:6px">خطا در ثبت اطلاعات</div>
                        <ul style="margin:0;padding-right:18px;line-height:1.9">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
<dialog id="confirmDelete" class="cd" aria-labelledby="confirmDeleteTitle">
    <form method="dialog" class="cd-box">
        <h3 id="confirmDeleteTitle">تأیید حذف</h3>
        <p data-confirm-text>آیا از انجام این عملیات مطمئن هستید؟</p>
        <div class="cd-actions">
            <button value="cancel" class="btn">انصراف</button>
            <button value="confirm" class="btn dn">تأیید و حذف</button>
        </div>
    </form>
</dialog>
<script>
    document.addEventListener('submit', function (event) {
        const form = event.target.closest('form[data-confirm-delete]');
        if (!form || form.dataset.confirmed === '1') {
            return;
        }

        event.preventDefault();
        const dialog = document.getElementById('confirmDelete');
        if (!dialog) {
            form.dataset.confirmed = '1';
            form.submit();
            return;
        }

        const text = dialog.querySelector('[data-confirm-text]');
        if (text) {
            text.textContent = form.dataset.confirmDelete || 'آیا از انجام این عملیات مطمئن هستید؟';
        }

        dialog.returnValue = '';
        dialog.showModal();
        dialog.addEventListener('close', function () {
            if (dialog.returnValue === 'confirm') {
                form.dataset.confirmed = '1';
                form.submit();
            }
        }, { once: true });
    });
</script>
@stack('scripts')
</body>
</html>
