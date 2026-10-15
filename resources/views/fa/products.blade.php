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
                <p class="results-meta" aria-live="polite" data-count data-one="1 محصول" data-many="5 محصول">۲۱ محصول</p>

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
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'fa']) }}">گوجه‌فرنگی</a></h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">جیرفت، بوشهر، آذربایجان شرقی</p>
                                <div class="season" role="img" aria-label="فصل عرضه: تمام سال">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="on" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">تمام سال</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">خیار</a>
                                    </h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">جیرفت، اصفهان، تهران</p>
                                <div class="season" role="img" aria-label="فصل عرضه: تمام سال">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="on" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">تمام سال</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">فلفل
                                            دلمه‌ای</a></h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">جیرفت، اصفهان</p>
                                <div class="season" role="img" aria-label="فصل عرضه: تمام سال">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="on" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">تمام سال</span>
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
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'fa']) }}">کلم‌پیچ</a></h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">گلستان، اردبیل، جیرفت</p>
                                <div class="season" role="img" aria-label="فصل عرضه: شهریور – فروردین">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">شهریور – فروردین</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">گل‌کلم</a>
                                    </h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">جیرفت، گلستان</p>
                                <div class="season" role="img" aria-label="فصل عرضه: شهریور – فروردین">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">شهریور – فروردین</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">کاهو</a>
                                    </h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">جیرفت، بوشهر</p>
                                <div class="season" role="img" aria-label="فصل عرضه: مهر – فروردین">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">مهر – فروردین</span>
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
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'fa']) }}">سیب‌زمینی</a></h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">اردبیل، همدان، جیرفت</p>
                                <div class="season" role="img" aria-label="فصل عرضه: تمام سال">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="on" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">تمام سال</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">پیاز</a>
                                    </h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">جیرفت، خوزستان، اصفهان</p>
                                <div class="season" role="img" aria-label="فصل عرضه: فروردین – آبان">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="on" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">فروردین – آبان</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">زردآلو</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج از فصل</span>
                                </div>
                                <p class="pcard-origin">آذربایجان شرقی (مرند)، خراسان</p>
                                <div class="season" role="img" aria-label="فصل عرضه: خرداد – مرداد">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="" title="شهریور"></li>
                                        <li class="now" title="مهر"></li>
                                        <li class="" title="آبان"></li>
                                        <li class="" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">خرداد – مرداد</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">گیلاس</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج از فصل</span>
                                </div>
                                <p class="pcard-origin">مشهد، آذربایجان شرقی، البرز</p>
                                <div class="season" role="img" aria-label="فصل عرضه: خرداد – تیر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="" title="شهریور"></li>
                                        <li class="now" title="مهر"></li>
                                        <li class="" title="آبان"></li>
                                        <li class="" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">خرداد – تیر</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">هلو</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج از فصل</span>
                                </div>
                                <p class="pcard-origin">مشهد، اصفهان، آذربایجان شرقی</p>
                                <div class="season" role="img" aria-label="فصل عرضه: خرداد – شهریور">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="now" title="مهر"></li>
                                        <li class="" title="آبان"></li>
                                        <li class="" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">خرداد – شهریور</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">شلیل</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج از فصل</span>
                                </div>
                                <p class="pcard-origin">آذربایجان شرقی، مشهد</p>
                                <div class="season" role="img" aria-label="فصل عرضه: خرداد – شهریور">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="now" title="مهر"></li>
                                        <li class="" title="آبان"></li>
                                        <li class="" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">خرداد – شهریور</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">سیب</a>
                                    </h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">آذربایجان غربی و شرقی (ارومیه، مراغه)</p>
                                <div class="season" role="img" aria-label="فصل عرضه: شهریور – اردیبهشت">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="on" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">شهریور – اردیبهشت</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">انار</a>
                                    </h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">ساوه، یزد، فارس</p>
                                <div class="season" role="img" aria-label="فصل عرضه: مهر – دی">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">مهر – دی</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">کیوی</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج از فصل</span>
                                </div>
                                <p class="pcard-origin">مازندران، گیلان</p>
                                <div class="season" role="img" aria-label="فصل عرضه: آبان – فروردین">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="" title="شهریور"></li>
                                        <li class="now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">آبان – فروردین</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">انگور</a>
                                    </h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">قزوین (تاکستان)، ارومیه، ملایر</p>
                                <div class="season" role="img" aria-label="فصل عرضه: تیر – مهر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="" title="آبان"></li>
                                        <li class="" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">تیر – مهر</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">پرتقال</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج از فصل</span>
                                </div>
                                <p class="pcard-origin">مازندران، جیرفت</p>
                                <div class="season" role="img" aria-label="فصل عرضه: آبان – فروردین">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="" title="شهریور"></li>
                                        <li class="now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">آبان – فروردین</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">نارنگی</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">خارج از فصل</span>
                                </div>
                                <p class="pcard-origin">مازندران، جیرفت</p>
                                <div class="season" role="img" aria-label="فصل عرضه: آبان – اسفند">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="" title="شهریور"></li>
                                        <li class="now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">آبان – اسفند</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">لیمو</a>
                                    </h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">جیرفت، مازندران، فارس</p>
                                <div class="season" role="img" aria-label="فصل عرضه: مهر – فروردین">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="دی"></li>
                                        <li class="on" title="بهمن"></li>
                                        <li class="on" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="" title="اردیبهشت"></li>
                                        <li class="" title="خرداد"></li>
                                        <li class="" title="تیر"></li>
                                        <li class="" title="مرداد"></li>
                                        <li class="" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="on" title="آبان"></li>
                                        <li class="on" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">مهر – فروردین</span>
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
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'fa']) }}">هندوانه</a></h3>
                                    <span class="dot-badge is-off_season">خارج از فصل</span>
                                </div>
                                <p class="pcard-origin">جیرفت، گلستان، خراسان</p>
                                <div class="season" role="img" aria-label="فصل عرضه: فروردین – شهریور">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="on" title="فروردین"></li>
                                        <li class="on" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="now" title="مهر"></li>
                                        <li class="" title="آبان"></li>
                                        <li class="" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">فروردین – شهریور</span>
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
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">خربزه و
                                            طالبی</a></h3>
                                    <span class="dot-badge is-available">موجود</span>
                                </div>
                                <p class="pcard-origin">خراسان، اصفهان، ورامین</p>
                                <div class="season" role="img" aria-label="فصل عرضه: اردیبهشت – مهر">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="دی"></li>
                                        <li class="" title="بهمن"></li>
                                        <li class="" title="اسفند"></li>
                                        <li class="" title="فروردین"></li>
                                        <li class="on" title="اردیبهشت"></li>
                                        <li class="on" title="خرداد"></li>
                                        <li class="on" title="تیر"></li>
                                        <li class="on" title="مرداد"></li>
                                        <li class="on" title="شهریور"></li>
                                        <li class="on now" title="مهر"></li>
                                        <li class="" title="آبان"></li>
                                        <li class="" title="آذر"></li>
                                    </ol>
                                    <span class="season-label">اردیبهشت – مهر</span>
                                </div>
                            </div>
                        </article>
                    </div>
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
