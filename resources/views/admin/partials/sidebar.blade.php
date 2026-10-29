<aside class="sb">
    <div class="logo">
        <img src="{{ asset('assets/images/nadimi-logo.png') }}" alt="">
        <div>
            <b>اکسپرس ندیمی</b>
            <small>پنل مدیریت</small>
        </div>
    </div>
    <div class="sbl">منوی اصلی</div>
    <nav id="nav">
        <a class="nv {{ request()->routeIs('admin.dashboard') ? 'on' : '' }}" href="{{ route('admin.dashboard') }}"><span>داشبورد</span></a>
        <a class="nv {{ request()->routeIs('admin.products*') ? 'on' : '' }}" href="{{ route('admin.products.index') }}"><span>محصولات</span></a>
        <a class="nv {{ request()->routeIs('admin.Request*') ? 'on' : '' }}" href="{{ route('admin.Request') }}"><span>درخواست ها</span></a>
        <a class="nv" href="#"><span>متن‌های سایت</span></a>
        <a class="nv" href="#"><span>تنظیمات</span></a>
    </nav>
    <div class="sbf">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="tg" type="submit" data-lo>خروج از حساب</button>
        </form>
        <small>نسخه مدیریت</small>
    </div>
</aside>
