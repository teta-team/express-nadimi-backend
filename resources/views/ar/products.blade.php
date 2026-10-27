@extends('layouts.ar.master')

@section('title')
    المنتجات — فواكه وخضروات طازجة للتصدير | إكسبرس نديمي
@endsection

@section('description')
    مواسم التوفر ومناطق الإنتاج والأحجام والتعبئة للمنتجات الطازجة التي نصدّرها من إيران.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('products', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('products', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('products', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('products', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('products', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="إكسبرس نديمي">
    <meta property="og:title" content="المنتجات — فواكه وخضروات طازجة للتصدير | إكسبرس نديمي">
    <meta property="og:description"
        content="مواسم التوفر ومناطق الإنتاج والأحجام والتعبئة للمنتجات الطازجة التي نصدّرها من إيران.">
    <meta property="og:url" content="{{ route('products', ['lang' => 'ar']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="ar_OM">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","إكسبرس نديمي"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'ar']) }}">الرئيسية</a>
                        <i></i><span aria-current="page">المنتجات</span>
                    </nav>
                    <span class="label">المنتجات</span>
                    <h1 class="display" style="margin-top: 16px">منتجاتنا</h1>
                    <p>بالتعاون مع المنتجين والمزارعين وأصحاب البساتين ومراكز التوريد في إيران، توفّر شركة نديمي مجموعة من
                        الفواكه والخضروات الطازجة المناسبة للتصدير. اختاروا المنتج المطلوب وتواصلوا مع فريق المبيعات لمعرفة
                        المتوفر وسعر اليوم. ويبيّن شريط الموسم الأشهر التي يكون فيها كل منتج جاهزاً عادةً.</p>
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
                <div class="filters" role="group" aria-label="الفئة">
                    <a href="{{ route('products', ['lang' => 'ar']) }}" class="tab" data-filter=""
                        aria-pressed="true">جميع المنتجات</a>
                    <a href="{{ route('products', ['lang' => 'ar', 'category' => 'vegetables']) }}" class="tab"
                        data-filter="vegetables" aria-pressed="false">الخضروات</a>
                    <a href="{{ route('products', ['lang' => 'ar', 'category' => 'stone-fruits']) }}" class="tab"
                        data-filter="stone-fruits" aria-pressed="false">الفواكه ذات النواة</a>
                    <a href="{{ route('products', ['lang' => 'ar', 'category' => 'orchard-fruits']) }}" class="tab"
                        data-filter="orchard-fruits" aria-pressed="false">فواكه البساتين</a>
                    <a href="{{ route('products', ['lang' => 'ar', 'category' => 'citrus-melons']) }}" class="tab"
                        data-filter="citrus-melons" aria-pressed="false">الحمضيات والبطيخ</a>
                </div>
                <label class="search">
                    <span class="sr">ابحث عن منتج</span>
                    <svg class="ic">
                        <use href="#i-search" />
                    </svg>
                    <input type="search" class="input" placeholder="ابحث عن منتج" data-search autocomplete="off">
                </label>
            </div>
        </div>

        <section class="section" style="padding-top: 0">
            <div class="container">
                <p class="results-meta" aria-live="polite" data-count data-one="منتج واحد" data-many="5 منتجات">23 منتجاً
                </p>

                                <div class="pgrid" data-products>
@php
$lang = 'ar';
@endphp
@forelse($products ?? [] as $p)
@php
$pname = is_array($p->name) ? ($p->name[$lang] ?? ($p->name['ar'] ?? ($p->name['en'] ?? ''))) : ($p->name ?? '');
$pcat = $p->category ?? '';
$months = is_array($p->months) ? $p->months : array_fill(0,12,true);
$img = $p->image ?: asset('assets/images/products/tomato.jpg');
$status = $p->status === 'off_season' ? 'خارج الموسم' : 'متوفر';
$statusClass = $p->status === 'off_season' ? 'is-off' : 'is-available';
$seasonText = array_sum($months)==12 ? 'طوال العام' : (array_sum($months)==0 ? 'غير محدد' : 'موسمي');
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
                                <div class="season" role="img" aria-label="الموسم: {{ $seasonText }}">
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

                <p class="empty" data-empty hidden>لا توجد منتجات مطابقة لبحثك.</p>

                <div class="custom-box">
                    <div>
                        <h2>تبحثون عن منتج غير مدرج؟</h2>
                        <p>نورّد محاصيل أخرى عند الطلب، منها التمور والأعشاب والفواكه المجففة. أرسلوا لنا قائمتكم.</p>
                    </div>
                    <a class="btn" href="{{ route('home', ['lang' => 'ar']) }}#inquiry">طلب عرض سعر<svg
                            class="ic flip">
                            <use href="#i-arrow" />
                        </svg></a>
                </div>
            </div>
        </section>

        <section class="section mint" aria-labelledby="cal-h">
            <div class="container">
                <div class="sec-head">
                    <span class="label">تقويم الحصاد</span>
                    <h2 id="cal-h" class="h2">متى يتوفر كل منتج</h2>
                </div>
                <div class="cal" data-cal>
                    <div class="cal-tabs" role="group" aria-label="الفئة">
                        <button type="button" class="tab" data-cal-filter="" aria-pressed="true">جميع
                            المنتجات</button>
                        <button type="button" class="tab" data-cal-filter="vegetables"
                            aria-pressed="false">الخضروات</button>
                        <button type="button" class="tab" data-cal-filter="stone-fruits"
                            aria-pressed="false">الفواكه ذات النواة</button>
                        <button type="button" class="tab" data-cal-filter="orchard-fruits"
                            aria-pressed="false">فواكه البساتين</button>
                        <button type="button" class="tab" data-cal-filter="citrus-melons"
                            aria-pressed="false">الحمضيات والبطيخ</button>
                    </div>

                    <div class="cal-head" aria-hidden="true">
                        <span></span>
                        <span class=""><b class="m-s">ينا</b><b class="m-f">يناير</b></span>
                        <span class=""><b class="m-s">فبر</b><b class="m-f">فبراير</b></span>
                        <span class=""><b class="m-s">مار</b><b class="m-f">مارس</b></span>
                        <span class=""><b class="m-s">أبر</b><b class="m-f">أبريل</b></span>
                        <span class=""><b class="m-s">ماي</b><b class="m-f">مايو</b></span>
                        <span class=""><b class="m-s">يون</b><b class="m-f">يونيو</b></span>
                        <span class=""><b class="m-s">يول</b><b class="m-f">يوليو</b></span>
                        <span class=""><b class="m-s">أغس</b><b class="m-f">أغسطس</b></span>
                        <span class=""><b class="m-s">سبت</b><b class="m-f">سبتمبر</b></span>
                        <span class="is-now"><b class="m-s">أكت</b><b class="m-f">أكتوبر</b></span>
                        <span class=""><b class="m-s">نوف</b><b class="m-f">نوفمبر</b></span>
                        <span class=""><b class="m-s">ديس</b><b class="m-f">ديسمبر</b></span>
                    </div>

                    <div data-cal-group="vegetables">
                        <p class="cal-group">الخضروات</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">طماطم<span
                                    class="sr">: طوال العام</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">خيار<span
                                    class="sr">: طوال العام</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">فلفل رومي<span
                                    class="sr">: طوال العام</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">ملفوف<span
                                    class="sr">: سبتمبر – أبريل</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">قرنبيط<span
                                    class="sr">: سبتمبر – أبريل</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">خس<span
                                    class="sr">: أكتوبر – أبريل</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">بطاطا<span
                                    class="sr">: طوال العام</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">بصل<span
                                    class="sr">: أبريل – نوفمبر</span></a>
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
                        <p class="cal-group">الفواكه ذات النواة</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">مشمش<span
                                    class="sr">: يونيو – أغسطس</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">كرز<span
                                    class="sr">: يونيو – يوليو</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">خوخ<span
                                    class="sr">: يونيو – سبتمبر</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">نكتارين<span
                                    class="sr">: يونيو – سبتمبر</span></a>
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
                        <p class="cal-group">فواكه البساتين</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">تفاح<span
                                    class="sr">: سبتمبر – مايو</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">رمان<span
                                    class="sr">: أكتوبر – يناير</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">كيوي<span
                                    class="sr">: نوفمبر – أبريل</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">عنب<span
                                    class="sr">: يوليو – أكتوبر</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">كمثرى<span
                                    class="sr">: أكتوبر – يناير</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">جزر<span
                                    class="sr">: نوفمبر – أبريل</span></a>
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
                        <p class="cal-group">الحمضيات والبطيخ</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">برتقال<span
                                    class="sr">: نوفمبر – أبريل</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">يوسفي<span
                                    class="sr">: نوفمبر – مارس</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">ليمون<span
                                    class="sr">: أكتوبر – أبريل</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">بطيخ<span
                                    class="sr">: أبريل – سبتمبر</span></a>
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
                            <a class="cal-name" href="{{ route('product', ['lang' => 'ar']) }}">شمام<span
                                    class="sr">: مايو – أكتوبر</span></a>
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
                        <span><i></i>في الموسم</span>
                        <span><i class="now"></i>هذا الشهر</span>
                        <span><i class="off"></i>خارج الموسم</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
