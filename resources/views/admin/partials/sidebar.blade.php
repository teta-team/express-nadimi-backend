<aside class="sb">
    <div class="logo">
        <img src="{{ asset('assets/images/logo/nadimi-logo-512.png') }}" alt="">
        <div>
            <b>ندیمی اینترنشنال</b>
            <small>پنل مدیریت</small>
        </div>
    </div>
    <div class="sbl">منوی اصلی</div>
    <nav id="nav">
        <a class="nv {{ request()->routeIs('admin.dashboard') ? 'on' : '' }}" href="{{ route('admin.dashboard') }}"><span>داشبورد</span></a>
        <a class="nv {{ request()->routeIs('admin.products*') ? 'on' : '' }}" href="{{ route('admin.products.index') }}"><span>محصولات</span></a>
        <a class="nv {{ request()->routeIs('admin.Request*') ? 'on' : '' }}" href="{{ route('admin.Request') }}"><span>درخواست ها</span></a>
        <a class="nv {{ request()->routeIs('admin.messages*') ? 'on' : '' }}" href="{{ route('admin.messages.index') }}"><span>پیام‌های تماس</span></a>
        <a class="nv {{ request()->routeIs('admin.settings*') ? 'on' : '' }}" href="{{ route('admin.settings') }}"><span>تنظیمات</span></a>
    </nav>
    <div class="sbf">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="tg" type="submit" data-lo>خروج از حساب</button>
        </form>
        <small>نسخه مدیریت</small>
    </div>
</aside>
