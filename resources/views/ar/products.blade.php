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
                <p class="results-meta" aria-live="polite" data-count data-one="منتج واحد" data-many="5 منتجات">21 منتجاً
                </p>

                <div class="pgrid" data-products>
                    <div data-product data-category="vegetables" data-name="tomato گوجه‌فرنگی طماطم">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/tomato-480.webp') }}" alt=""
                                    width="480" height="373" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">طماطم</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">جيرفت، بوشهر، أذربيجان الشرقية</p>
                                <div class="season" role="img" aria-label="الموسم: طوال العام">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="on" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">طوال العام</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="vegetables" data-name="cucumber خیار خيار">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/cucumber-480.webp') }}" alt=""
                                    width="480" height="373" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">خيار</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">جيرفت، أصفهان، طهران</p>
                                <div class="season" role="img" aria-label="الموسم: طوال العام">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="on" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">طوال العام</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="vegetables" data-name="bell pepper فلفل دلمه‌ای فلفل رومي">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/bell-pepper-480.webp') }}" alt=""
                                    width="480" height="373" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">فلفل
                                            رومي</a></h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">جيرفت، أصفهان</p>
                                <div class="season" role="img" aria-label="الموسم: طوال العام">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="on" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">طوال العام</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="vegetables" data-name="cabbage کلم‌پیچ ملفوف">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/cabbage-480.webp') }}" alt=""
                                    width="480" height="373" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">ملفوف</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">گلستان، أردبيل، جيرفت</p>
                                <div class="season" role="img" aria-label="الموسم: سبتمبر – أبريل">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">سبتمبر – أبريل</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="vegetables" data-name="cauliflower گل‌کلم قرنبيط">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/cauliflower-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">قرنبيط</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">جيرفت، گلستان</p>
                                <div class="season" role="img" aria-label="الموسم: سبتمبر – أبريل">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">سبتمبر – أبريل</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="vegetables" data-name="lettuce کاهو خس">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/lettuce-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">خس</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">جيرفت، بوشهر</p>
                                <div class="season" role="img" aria-label="الموسم: أكتوبر – أبريل">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">أكتوبر – أبريل</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="vegetables" data-name="potato سیب‌زمینی بطاطا">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/potato-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">بطاطا</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">أردبيل، همدان، جيرفت</p>
                                <div class="season" role="img" aria-label="الموسم: طوال العام">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="on" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">طوال العام</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="vegetables" data-name="onion پیاز بصل">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/onion-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">بصل</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">جيرفت، خوزستان، أصفهان</p>
                                <div class="season" role="img" aria-label="الموسم: أبريل – نوفمبر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="on" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">أبريل – نوفمبر</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="stone-fruits" data-name="apricot زردآلو مشمش">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/apricot-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">مشمش</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج الموسم</span>
                                </div>
                                <p class="pcard-origin">أذربيجان الشرقية (مرند)، خراسان</p>
                                <div class="season" role="img" aria-label="الموسم: يونيو – أغسطس">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="" title="سبتمبر"></li>
                                        <li class="now" title="أكتوبر"></li>
                                        <li class="" title="نوفمبر"></li>
                                        <li class="" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">يونيو – أغسطس</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="stone-fruits" data-name="cherry گیلاس كرز">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/cherry-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">كرز</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج الموسم</span>
                                </div>
                                <p class="pcard-origin">مشهد، أذربيجان الشرقية، البرز</p>
                                <div class="season" role="img" aria-label="الموسم: يونيو – يوليو">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="" title="سبتمبر"></li>
                                        <li class="now" title="أكتوبر"></li>
                                        <li class="" title="نوفمبر"></li>
                                        <li class="" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">يونيو – يوليو</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="stone-fruits" data-name="peach هلو خوخ">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/peach-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">خوخ</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج الموسم</span>
                                </div>
                                <p class="pcard-origin">مشهد، أصفهان، أذربيجان الشرقية</p>
                                <div class="season" role="img" aria-label="الموسم: يونيو – سبتمبر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="now" title="أكتوبر"></li>
                                        <li class="" title="نوفمبر"></li>
                                        <li class="" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">يونيو – سبتمبر</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="stone-fruits" data-name="nectarine شلیل نكتارين">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/nectarine-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'ar']) }}">نكتارين</a></h3>
                                    <span class="dot-badge is-off_season">خارج الموسم</span>
                                </div>
                                <p class="pcard-origin">أذربيجان الشرقية، مشهد</p>
                                <div class="season" role="img" aria-label="الموسم: يونيو – سبتمبر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="now" title="أكتوبر"></li>
                                        <li class="" title="نوفمبر"></li>
                                        <li class="" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">يونيو – سبتمبر</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="orchard-fruits" data-name="apple سیب تفاح">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/apple-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">تفاح</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">أذربيجان الغربية والشرقية (أرومية، مراغة)</p>
                                <div class="season" role="img" aria-label="الموسم: سبتمبر – مايو">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="on" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">سبتمبر – مايو</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="orchard-fruits" data-name="pomegranate انار رمان">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/pomegranate-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">رمان</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">ساوة، يزد، فارس</p>
                                <div class="season" role="img" aria-label="الموسم: أكتوبر – يناير">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">أكتوبر – يناير</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="orchard-fruits" data-name="kiwi کیوی كيوي">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/kiwi-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">كيوي</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج الموسم</span>
                                </div>
                                <p class="pcard-origin">مازندران، گيلان</p>
                                <div class="season" role="img" aria-label="الموسم: نوفمبر – أبريل">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="" title="سبتمبر"></li>
                                        <li class="now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">نوفمبر – أبريل</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="orchard-fruits" data-name="grape انگور عنب">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/grape-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">عنب</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">قزوين (تاكستان)، أرومية، ملاير</p>
                                <div class="season" role="img" aria-label="الموسم: يوليو – أكتوبر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="" title="نوفمبر"></li>
                                        <li class="" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">يوليو – أكتوبر</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="citrus-melons" data-name="orange پرتقال برتقال">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/orange-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">برتقال</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج الموسم</span>
                                </div>
                                <p class="pcard-origin">مازندران، جيرفت</p>
                                <div class="season" role="img" aria-label="الموسم: نوفمبر – أبريل">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="" title="سبتمبر"></li>
                                        <li class="now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">نوفمبر – أبريل</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="citrus-melons" data-name="tangerine نارنگی يوسفي">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/tangerine-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">يوسفي</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج الموسم</span>
                                </div>
                                <p class="pcard-origin">مازندران، جيرفت</p>
                                <div class="season" role="img" aria-label="الموسم: نوفمبر – مارس">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="" title="سبتمبر"></li>
                                        <li class="now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">نوفمبر – مارس</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="citrus-melons" data-name="lemon لیمو ليمون">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/lemon-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'ar']) }}">ليمون</a></h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">جيرفت، مازندران، فارس</p>
                                <div class="season" role="img" aria-label="الموسم: أكتوبر – أبريل">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="يناير"></li>
                                        <li class="on" title="فبراير"></li>
                                        <li class="on" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="" title="مايو"></li>
                                        <li class="" title="يونيو"></li>
                                        <li class="" title="يوليو"></li>
                                        <li class="" title="أغسطس"></li>
                                        <li class="" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="on" title="نوفمبر"></li>
                                        <li class="on" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">أكتوبر – أبريل</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="citrus-melons" data-name="watermelon هندوانه بطيخ">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/watermelon-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">بطيخ</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج الموسم</span>
                                </div>
                                <p class="pcard-origin">جيرفت، گلستان، خراسان</p>
                                <div class="season" role="img" aria-label="الموسم: أبريل – سبتمبر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="on" title="أبريل"></li>
                                        <li class="on" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="now" title="أكتوبر"></li>
                                        <li class="" title="نوفمبر"></li>
                                        <li class="" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">أبريل – سبتمبر</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="citrus-melons" data-name="melon خربزه و طالبی شمام">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/melon-480.webp') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">شمام</a>
                                    </h3>
                                    <span class="dot-badge is-available">متوفر</span>
                                </div>
                                <p class="pcard-origin">خراسان، أصفهان، ورامين</p>
                                <div class="season" role="img" aria-label="الموسم: مايو – أكتوبر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="يناير"></li>
                                        <li class="" title="فبراير"></li>
                                        <li class="" title="مارس"></li>
                                        <li class="" title="أبريل"></li>
                                        <li class="on" title="مايو"></li>
                                        <li class="on" title="يونيو"></li>
                                        <li class="on" title="يوليو"></li>
                                        <li class="on" title="أغسطس"></li>
                                        <li class="on" title="سبتمبر"></li>
                                        <li class="on now" title="أكتوبر"></li>
                                        <li class="" title="نوفمبر"></li>
                                        <li class="" title="ديسمبر"></li>
                                    </ol>
                                    <span class="season-label">مايو – أكتوبر</span>
                                </div>
                            </div>
                        </article>
                    </div>
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
