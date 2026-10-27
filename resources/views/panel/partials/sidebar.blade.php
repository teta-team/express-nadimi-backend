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
        <a class="ni {{ request()->routeIs('panel.products*') ? 'on' : '' }}" href="{{ route('panel.products') }}"><span>محصولات</span></a>
        <a class="ni" href="{{ route('panel') }}"><span>پنل اصلی (قدیمی)</span></a>
    </nav>
    <div class="sbf">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="tg" type="submit" data-lo>خروج</button>
        </form>
    </div>
</aside>
