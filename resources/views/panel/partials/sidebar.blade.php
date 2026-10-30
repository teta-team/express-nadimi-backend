<aside class="sb">
    <div class="logo">
        <img src="{{ asset('images/nadimi-logo.png') }}" alt="">
        <div>
            <b>اکسپرس ندیمی</b>
            <small>پنل مدیریت</small>
        </div>
    </div>
    <div class="sbl">منوی اصلی</div>
    <nav>
        <a class="ni {{ request()->routeIs('admin.dashboard') ? 'on' : '' }}"
            href="{{ route('admin.dashboard') }}"><span>داشبورد</span></a>
    </nav>
    <div class="sbf">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="tg" type="submit" data-lo>خروج</button>
        </form>
    </div>
</aside>
