@extends('layouts.fa.master')

@section('title')
    محصولات — میوه و صیفی‌جات صادراتی | اکسپرس ندیمی
@endsection

@section('description')
    فصل عرضه، مبدأ تولید، سایز و بسته‌بندی محصولات تازه‌ای که از ایران صادر می‌کنیم.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('products', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('products', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('products', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('products', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('products', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="اکسپرس ندیمی">
    <meta property="og:title" content="محصولات — میوه و صیفی‌جات صادراتی | اکسپرس ندیمی">
    <meta property="og:description"
        content="فصل عرضه، مبدأ تولید، سایز و بسته‌بندی محصولات تازه‌ای که از ایران صادر می‌کنیم.">
    <meta property="og:url" content="{{ route('products', ['lang' => 'fa']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="fa_IR">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","اکسپرس ندیمی"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'fa']) }}">خانه</a>
                        <i></i><span aria-current="page">محصولات</span>
                    </nav>
                    <span class="label">محصولات</span>
                    <h1 class="display" style="margin-top: 16px">محصولات ما</h1>
                    <p>شرکت ندیمی با همکاری تولیدکنندگان، کشاورزان، باغداران و مراکز تأمین در ایران، مجموعه‌ای از میوه‌ها و
                        سبزیجات تازه مناسب بازار صادراتی را تأمین می‌کند. محصول موردنظر خود را انتخاب کنید و برای دریافت
                        موجودی و قیمت روز با واحد فروش در ارتباط باشید. نوار فصل نشان می‌دهد هر محصول معمولاً در چه ماه‌هایی
                        آماده است.</p>
                </div>
                <figure class="frame frame--soft"><img class="phead-img"
                        src="{{ asset('assets/images/scenes/produce-flatlay-800.webp') }}"
                        srcset="{{ asset('assets/images/scenes/produce-flatlay-800.webp') }} 800w, {{ asset('assets/images/scenes/produce-flatlay-1600.webp') }} 1600w"
                        sizes="(max-width: 767px) 100vw, 40vw" alt="" width="800" height="1000"
                        fetchpriority="high" decoding="async"></figure>
            </div>
        </section>

        <div class="toolbar">
            <div class="container toolbar-in">
                <div class="filters" role="group" aria-label="دسته">
                    <a href="{{ route('products', ['lang' => 'fa']) }}" class="tab" data-filter=""
                        aria-pressed="true">همه محصولات</a>
                    <a href="{{ route('products', ['lang' => 'fa', 'category' => 'vegetables']) }}" class="tab"
                        data-filter="vegetables" aria-pressed="false">صیفی‌جات</a>
                    <a href="{{ route('products', ['lang' => 'fa', 'category' => 'stone-fruits']) }}" class="tab"
                        data-filter="stone-fruits" aria-pressed="false">میوه‌های هسته‌دار</a>
                    <a href="{{ route('products', ['lang' => 'fa', 'category' => 'orchard-fruits']) }}" class="tab"
                        data-filter="orchard-fruits" aria-pressed="false">میوه‌های باغی</a>
                    <a href="{{ route('products', ['lang' => 'fa', 'category' => 'citrus-melons']) }}" class="tab"
                        data-filter="citrus-melons" aria-pressed="false">مرکبات و جالیزی</a>
                </div>
                <label class="search">
                    <span class="sr">جستجوی محصول</span>
                    <svg class="ic">
                        <use href="#i-search" />
                    </svg>
                    <input type="search" class="input" placeholder="جستجوی محصول" data-search autocomplete="off">
                </label>
            </div>
        </div>

        <section class="section" style="padding-top: 0">
            <div class="container">
                <p class="results-meta" aria-live="polite" data-count data-one="1 محصول" data-many="5 محصول">۲۳ محصول</p>

                                <div class="pgrid" data-products>
@php
$lang = 'fa';
@endphp
@forelse($products ?? [] as $p)
@php
$pname = is_array($p->name) ? ($p->name[$lang] ?? ($p->name['fa'] ?? ($p->name['en'] ?? ''))) : ($p->name ?? '');
$pcat = $p->category ?? '';
$months = is_array($p->months) ? $p->months : array_fill(0,12,true);
$img = $p->image ?: asset('assets/images/products/tomato.jpg');
$status = $p->status === 'off_season' ? 'خارج از فصل' : 'موجود';
$statusClass = $p->status === 'off_season' ? 'is-off' : 'is-available';
$seasonText = array_sum($months)==12 ? 'تمام سال' : (array_sum($months)==0 ? 'نامشخص' : 'فصلی');
@endphp
                    <div data-product data-category="{{ $pcat }}" data-name="{{ strtolower($pname) }}">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ $img }}" alt="{{ $pname }}" width="480" height="373" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip"><use href="#i-arrow" /></svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => $lang, 'slug' => $p->slug]) }}">{{ $pname }}</a></h3>
                                    <span class="dot-badge {{ $statusClass }}">{{ $status }}</span>
                                </div>
                                <p class="pcard-origin">{{ $p->summary[$lang] ?? '' }}</p>
                                <div class="season" role="img" aria-label="فصل: {{ $seasonText }}">
                                    <ol class="season-bar" aria-hidden="true">
                                        @foreach($months as $idx => $on)
                                        <li class="{{ $on ? 'on' : '' }}{{ $idx == date('n')-1 ? ' now' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <span class="season-label">{{ $seasonText }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
@empty
@endforelse
                </div>

                <p class="empty" data-empty hidden>محصولی با این جستجو پیدا نشد.</p>

                <div class="custom-box">
                    <div>
                        <h2>محصول مورد نظرتان در فهرست نیست؟</h2>
                        <p>محصولات دیگری مثل خرما، سبزی و خشکبار را هم طبق سفارش تأمین می‌کنیم. فهرست خود را بفرستید.</p>
                    </div>
                    <a class="btn" href="{{ route('home', ['lang' => 'fa']) }}#inquiry">درخواست استعلام<svg
                            class="ic flip">
                            <use href="#i-arrow" />
                        </svg></a>
                </div>
            </div>
        </section>

        <section class="section mint" aria-labelledby="cal-h">
            <div class="container">
                <div class="sec-head">
                    <span class="label">تقویم برداشت</span>
                    <h2 id="cal-h" class="h2">هر محصول چه ماه‌هایی موجود است</h2>
                </div>
                <div class="cal" data-cal>
                    <div class="cal-tabs" role="group" aria-label="دسته">
                        <button type="button" class="tab" data-cal-filter="" aria-pressed="true">همه
                            محصولات</button>
                        <button type="button" class="tab" data-cal-filter="vegetables"
                            aria-pressed="false">صیفی‌جات</button>
                        <button type="button" class="tab" data-cal-filter="stone-fruits"
                            aria-pressed="false">میوه‌های هسته‌دار</button>
                        <button type="button" class="tab" data-cal-filter="orchard-fruits"
                            aria-pressed="false">میوه‌های باغی</button>
                        <button type="button" class="tab" data-cal-filter="citrus-melons"
                            aria-pressed="false">مرکبات و جالیزی</button>
                    </div>

                    <div class="cal-head" aria-hidden="true">
                        <span></span>
                        <span class=""><b class="m-s">دی</b><b class="m-f">دی</b></span>
                        <span class=""><b class="m-s">بهم</b><b class="m-f">بهمن</b></span>
                        <span class=""><b class="m-s">اسف</b><b class="m-f">اسفند</b></span>
                        <span class=""><b class="m-s">فرو</b><b class="m-f">فروردین</b></span>
                        <span class=""><b class="m-s">ارد</b><b class="m-f">اردیبهشت</b></span>
                        <span class=""><b class="m-s">خرد</b><b class="m-f">خرداد</b></span>
                        <span class=""><b class="m-s">تیر</b><b class="m-f">تیر</b></span>
                        <span class=""><b class="m-s">مرد</b><b class="m-f">مرداد</b></span>
                        <span class=""><b class="m-s">شهر</b><b class="m-f">شهریور</b></span>
                        <span class="is-now"><b class="m-s">مهر</b><b class="m-f">مهر</b></span>
                        <span class=""><b class="m-s">آبا</b><b class="m-f">آبان</b></span>
                        <span class=""><b class="m-s">آذر</b><b class="m-f">آذر</b></span>
                    </div>

                    <div data-cal-group="vegetables">
                        <p class="cal-group">صیفی‌جات</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">گوجه‌فرنگی<span
                                    class="sr">: تمام سال</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">خیار<span
                                    class="sr">: تمام سال</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">فلفل دلمه‌ای<span
                                    class="sr">: تمام سال</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">کلم‌پیچ<span
                                    class="sr">: شهریور – فروردین</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">گل‌کلم<span
                                    class="sr">: شهریور – فروردین</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">کاهو<span
                                    class="sr">: مهر – فروردین</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">سیب‌زمینی<span
                                    class="sr">: تمام سال</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">پیاز<span
                                    class="sr">: فروردین – آبان</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div data-cal-group="stone-fruits">
                        <p class="cal-group">میوه‌های هسته‌دار</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">زردآلو<span
                                    class="sr">: خرداد – مرداد</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">گیلاس<span
                                    class="sr">: خرداد – تیر</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">هلو<span
                                    class="sr">: خرداد – شهریور</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">شلیل<span
                                    class="sr">: خرداد – شهریور</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div data-cal-group="orchard-fruits">
                        <p class="cal-group">میوه‌های باغی</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">سیب<span
                                    class="sr">: شهریور – اردیبهشت</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">انار<span
                                    class="sr">: مهر – دی</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">کیوی<span
                                    class="sr">: آبان – فروردین</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">انگور<span
                                    class="sr">: تیر – مهر</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">گلابی<span
                                    class="sr">: مهر – دی</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">هویج<span
                                    class="sr">: آبان – فروردین</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div data-cal-group="citrus-melons">
                        <p class="cal-group">مرکبات و جالیزی</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">پرتقال<span
                                    class="sr">: آبان – فروردین</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">نارنگی<span
                                    class="sr">: آبان – اسفند</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">لیمو<span
                                    class="sr">: مهر – فروردین</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">هندوانه<span
                                    class="sr">: فروردین – شهریور</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'fa']) }}">خربزه و طالبی<span
                                    class="sr">: اردیبهشت – مهر</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="cal-legend">
                        <span><i></i>در فصل</span>
                        <span><i class="now"></i>ماه جاری</span>
                        <span><i class="off"></i>خارج از فصل</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
