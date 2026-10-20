@extends('layouts.fa.master')

@section('title')
    اکسپرس ندیمی — صادرات میوه و صیفی‌جات تازه ایران
@endsection

@section('description')
    شرکت ندیمی با بیش از ۱۵ سال تجربه، میوه و سبزیجات تازه ایران را به بازار عمان و بازارهای منطقه صادر می‌کند. حضور مستقیم
    در سوق سلال عمان، جایگاه WMC04. درخواست قیمت روز و موجودی.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('home', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('home', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('home', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('home', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('home', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="اکسپرس ندیمی">
    <meta property="og:title" content="اکسپرس ندیمی — صادرات میوه و صیفی‌جات تازه ایران">
    <meta property="og:description"
        content="شرکت ندیمی با بیش از ۱۵ سال تجربه، میوه و سبزیجات تازه ایران را به بازار عمان و بازارهای منطقه صادر می‌کند. حضور مستقیم در سوق سلال عمان، جایگاه WMC04. درخواست قیمت روز و موجودی.">
    <meta property="og:url" content="{{ route('home', ['lang' => 'fa']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="fa_IR">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="preload" as="image" href="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}"
        fetchpriority="high">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","اکسپرس ندیمی"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">

        <section class="hero">
            <div class="container hero-in">
                <div class="hero-copy">
                    <p class="label">ندیمی اینترنشنال · سوق سلال – WMC04</p>
                    <h1 class="display">میوه و سبزیجات تازه از ایران، با حضور مستقیم در عمان</h1>
                    <p class="hero-sub">شرکت ندیمی با بیش از ۱۵ سال تجربه در حوزه کشاورزی، تأمین و تجارت محصولات کشاورزی، در
                        زمینه تأمین و صادرات میوه و سبزیجات تازه فعالیت می‌کند. از مزارع ایران تا بازار عمان؛ کیفیت، اعتماد
                        و همکاری پایدار.</p>
                    <div class="hero-ctas">
                        <a class="btn" href="{{ route('products', ['lang' => 'fa']) }}">مشاهده محصولات<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <a class="btn btn-line" href="#inquiry">درخواست استعلام</a>
                    </div>
                    <ul class="hero-facts">
                        <li><b>۱۵+</b><span>سال تجربه در کشاورزی و تجارت</span></li>
                        <li><b>۷</b><span>بازار صادراتی</span></li>
                        <li><b>۲۰+</b><span>نوع میوه و صیفی</span></li>
                        <li><b>WMC04</b><span>جایگاه ما در سوق سلال عمان</span></li>
                    </ul>
                </div>
                <figure class="hero-photo">
                    <img src="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}" alt="" width="800"
                        height="1000" fetchpriority="high" decoding="async">
                </figure>
            </div>
        </section>


        <section class="section-tight steps-sec" aria-labelledby="steps-h">
            <div class="container">
                <div class="sec-head">
                    <h2 id="steps-h" class="h2">نحوه همکاری با ما</h2>
                    <p class="lead">فرآیند همکاری از بررسی نیاز شما آغاز می‌شود و تا تأمین، کنترل کیفیت، بسته‌بندی، حمل و
                        تحویل ادامه پیدا می‌کند.</p>
                </div>
                <ol class="order-steps">
                    <li class="order-step">
                        <span class="order-n">۱</span>
                        <h3>ارسال درخواست خرید</h3>
                        <p>نوع محصول، مقدار موردنیاز، سایز و درجه کیفی، نوع بسته‌بندی و زمان موردنظر را از طریق واتساپ یا
                            فرم درخواست قیمت برای ما ارسال کنید.</p>
                        <a class="link-arrow" href="#inquiry">پر کردن فرم<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                    <li class="order-step">
                        <span class="order-n">۲</span>
                        <h3>بررسی و اعلام پیشنهاد</h3>
                        <p>تیم ما بر اساس نیاز شما، موجودی و شرایط روز بازار، محصول مناسب را بررسی کرده و مشخصات، تصاویر،
                            بسته‌بندی و پیشنهاد تجاری را ارائه می‌کند.</p>
                        <a class="link-arrow" href="{{ route('contact', ['lang' => 'fa']) }}">ارتباط با واحد فروش<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                    <li class="order-step">
                        <span class="order-n">۳</span>
                        <h3>تأمین، ارسال و تحویل</h3>
                        <p>پس از توافق، محصول از تولیدکنندگان منتخب تأمین و پس از کنترل کیفیت و بسته‌بندی به عمان ارسال
                            می‌شود؛ تحویل و عرضه در سوق سلال، جایگاه WMC04 پیگیری می‌شود.</p>
                        <a class="link-arrow" href="{{ route('about', ['lang' => 'fa']) }}#process-h">از مزرعه تا عمان<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                </ol>
            </div>
        </section>


        <section class="section" aria-labelledby="week-h">
            <div class="container">
                <div class="sec-head sec-head-row">
                    <div>
                        <h2 id="week-h" class="h2">این هفته چه محصولاتی قابل تأمین هستند؟</h2>
                        <p class="lead">بازار محصولات کشاورزی دائماً در حال تغییر است. موجودی، قیمت و شرایط تأمین بر اساس
                            فصل برداشت، میزان تولید، کیفیت و شرایط روز بازار تعیین می‌شود؛ برای دریافت قیمت روز با ما در
                            تماس باشید.</p>
                    </div>
                    <a class="btn-all" href="{{ route('products', ['lang' => 'fa']) }}"><span>همه ۲۳ محصول</span><span
                            class="btn-all-ic" aria-hidden="true"><svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></span></a>
                </div>
                <div class="rail">
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/tomato.jpg') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">گوجه‌فرنگی</a>
                                </h3>
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
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/cucumber.jpg') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">خیار</a></h3>
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
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/BellPepper.jpg') }}" alt=""
                                width="480" height="373" loading="lazy" decoding="async">
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
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/cabbage.jpg') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">کلم‌پیچ</a>
                                </h3>
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
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/Cauliflower.png') }}" alt=""
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
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/Lettuce.png') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">کاهو</a></h3>
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
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/potato.jpg') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">سیب‌زمینی</a>
                                </h3>
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
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/Redonion.png') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'fa']) }}">پیاز</a></h3>
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
            </div>
        </section>


        <section class="section mint" aria-labelledby="why-h">
            <div class="container why-grid">
                <figure class="why-photo">
                    <img src="{{ asset('assets/images/scenes/tomatoes-vine-800.webp') }}" alt="" width="800"
                        height="1000" loading="lazy" decoding="async">
                </figure>
                <div>
                    <div class="sec-head">
                        <h2 id="why-h" class="h2">چرا شرکت ندیمی؟</h2>
                        <p class="lead">هدف ما تنها انجام یک معامله نیست؛ به دنبال ایجاد روابط تجاری پایدار و قابل اعتماد
                            با مشتریان و شرکای خود هستیم.</p>
                    </div>
                    <ul class="why-list">
                        <li class="why-item">
                            <h3>بیش از ۱۵ سال تجربه</h3>
                            <p>تجربه فعالیت در کشاورزی و تجارت محصولات کشاورزی، پایه اصلی شناخت ما از محصول و بازار است.</p>
                        </li>
                        <li class="why-item">
                            <h3>ارتباط با منابع تأمین</h3>
                            <p>همکاری با تولیدکنندگان و تأمین‌کنندگان در ایران امکان بررسی و تأمین محصولات مختلف را فراهم
                                می‌کند.</p>
                        </li>
                        <li class="why-item">
                            <h3>حضور مستقیم در عمان</h3>
                            <p>حضور در سوق سلال – WMC04 ارتباط نزدیک‌تری میان مجموعه و بازار عمان ایجاد کرده است.</p>
                        </li>
                        <li class="why-item">
                            <h3>توجه به کیفیت</h3>
                            <p>کیفیت، تازگی، درجه‌بندی و بسته‌بندی از معیارهای اصلی بررسی محصولات هستند.</p>
                        </li>
                    </ul>
                    <p class="markets-line"><svg class="ic">
                            <use href="#i-globe" />
                        </svg>تجربه صادرات به عمان، امارات، عربستان، بحرین، روسیه، ارمنستان و آذربایجان.</p>
                    <p class="more-wrap"><a class="more-link" href="{{ route('about', ['lang' => 'fa']) }}"><span>بیشتر
                                درباره ما</span><i class="more-ic" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></i></a></p>
                </div>
            </div>
        </section>


        <section class="section inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">
                <div class="inquiry-intro">
                    <h2 id="inquiry-h" class="h2">درخواست قیمت</h2>
                    <p class="lead">برای دریافت پیشنهاد، اطلاعات درخواست خود را ثبت کنید. پس از دریافت درخواست، تیم فروش
                        شرایط تأمین محصول را بررسی خواهد کرد.</p>
                    <ul class="ticks">
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>کیفیت</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>تازگی</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>پایداری</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>اطمینان</li>
                    </ul>
                    <p style="margin-top: 24px"><a class="link-arrow" href="https://wa.me/989144172605" target="_blank"
                            rel="noopener"><svg class="ic">
                                <use href="#i-whatsapp" />
                            </svg>فروش در واتساپ</a></p>
                </div>
                <div class="waybill">

                    <div class="waybill-head">

                        <b>استعلام صادرات</b>

                        <span>پاسخ تا یک روز کاری</span>

                    </div>

                    <div class="waybill-body">





                        <form class="iform" method="POST"
                            action="{{ route('home.post', ['lang' => app()->getLocale()]) }}" novalidate
                            data-busy-text="در حال ارسال…" id="inquiry-form">
                            <!-- backend: set action + @@csrf -->
                            @csrf

                            <div class="iform-grid">

                                <div class="field">

                                    <label for="iq-product">محصول</label>

                                    <select id="iq-product" name="product" class="input">

                                        <option value="{{ old('product') }}">ترکیبی / چند محصول</option>

                                        <optgroup label="صیفی‌جات">

                                            <option value="tomato">گوجه‌فرنگی</option>

                                            <option value="cucumber">خیار</option>

                                            <option value="bell-pepper">فلفل دلمه‌ای</option>

                                            <option value="cabbage">کلم‌پیچ</option>

                                            <option value="cauliflower">گل‌کلم</option>

                                            <option value="lettuce">کاهو</option>

                                            <option value="potato">سیب‌زمینی</option>

                                            <option value="onion">پیاز</option>

                                        </optgroup>

                                        <optgroup label="میوه‌های هسته‌دار">

                                            <option value="apricot">زردآلو</option>

                                            <option value="cherry">گیلاس</option>

                                            <option value="peach">هلو</option>

                                            <option value="nectarine">شلیل</option>

                                        </optgroup>

                                        <optgroup label="میوه‌های باغی">

                                            <option value="apple">سیب</option>

                                            <option value="pomegranate">انار</option>

                                            <option value="kiwi">کیوی</option>

                                            <option value="grape">انگور</option>

                                        </optgroup>

                                        <optgroup label="مرکبات و جالیزی">

                                            <option value="orange">پرتقال</option>

                                            <option value="tangerine">نارنگی</option>

                                            <option value="lemon">لیمو</option>

                                            <option value="watermelon">هندوانه</option>

                                            <option value="melon">خربزه و طالبی</option>

                                        </optgroup>

                                    </select>
                                    @error('product')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-qty">مقدار <b class="req">*</b></label>

                                    <input id="iq-qty" name="quantity" class="input" required maxlength="80"
                                        value="{{ old('quantity') }}" placeholder="مثلاً یک کانتینر ۴۰ فوت، ۲۰ تن">
                                    @error('quantity')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-pack">بسته‌بندی</label>

                                    <select id="iq-pack" name="packaging" class="input">

                                        <option value="">فرقی نمی‌کند</option>

                                        <option value="carton_5">کارتن ۵ کیلویی</option>

                                        <option value="carton_10">کارتن ۸ تا ۱۰ کیلویی</option>

                                        <option value="tray">سینی تک‌لایه</option>

                                        <option value="crate">سبد پلاستیکی</option>

                                        <option value="mesh_bag">کیسه توری ۱۰ تا ۲۵ کیلویی</option>

                                        <option value="bulk">فله / باکس فله</option>

                                        <option value="punnet">ظرف ۰٫۵ تا ۱ کیلویی</option>

                                        <option value="private_label">با برند خریدار</option>

                                    </select>
                                    @error('packaging')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-inco">شرایط تحویل</label>

                                    <select id="iq-inco" name="incoterm" class="input" dir="ltr">

                                        <option value="FOB" selected>FOB</option>

                                        <option value="CFR">CFR</option>

                                        <option value="CIF">CIF</option>

                                        <option value="EXW">EXW</option>

                                        <option value="FCA">FCA</option>

                                        <option value="DAP">DAP</option>

                                    </select>
                                    @error('incoterm')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field w" style="grid-column: 1 / -1">

                                    <label for="iq-dest">کشور / بندر مقصد <b class="req">*</b></label>

                                    <input id="iq-dest" name="destination" class="input" required maxlength="120"
                                        value="{{ old('destination') }}" placeholder="مثلاً عمان – مسقط">

                                    @error('destination')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-name">نام شما <b class="req">*</b></label>

                                    <input id="iq-name" name="name" class="input" required maxlength="120"
                                        autocomplete="name" value="{{ old('name') }}">
                                    @error('name')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-co">شرکت</label>

                                    <input id="iq-co" name="company" class="input" maxlength="160"
                                        autocomplete="organization" value="{{ old('company') }}" placeholder="نام شرکت">
                                    @error('company')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-email">ایمیل</label>

                                    <input id="iq-email" name="email" type="email" class="input" maxlength="190"
                                        autocomplete="email" value="{{ old('email') }}" placeholder="name@company.com">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-phone">تلفن / واتساپ</label>

                                    <input id="iq-phone" name="phone" type="tel" class="input" maxlength="40"
                                        autocomplete="tel" inputmode="tel" value="{{ old('phone') }}"
                                        placeholder="+968 …">

                                    @error('phone')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field" style="grid-column: 1 / -1">

                                    <label for="iq-msg">توضیحات <span class="opt">(اختیاری)</span></label>

                                    <textarea id="iq-msg" name="message" class="input" rows="3" maxlength="2000"
                                        placeholder="رقم، سایز، زمان تحویل…" value="{{ old('message') }}"></textarea>
                                    @error('message')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>



                            <div class="iform-foot">

                                <p class="iform-hint">ایمیل یا تلفن کافی است؛ یکی از آن‌ها الزامی است.</p>

                                <button class="btn btn-leaf" type="submit">ارسال استعلام<svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </section>


        <section class="supplier-strip">
            <div class="container supplier-strip-in">
                <p><svg class="ic">
                        <use href="#i-sprout" />
                    </svg>کشاورز یا تأمین‌کننده هستید؟ محصولتان را نزد ما ثبت کنید.</p>
                <a class="btn btn-line btn-sm" href="{{ route('supplier', ['lang' => 'fa']) }}">ورود به فرم همکاری<svg
                        class="ic flip">
                        <use href="#i-arrow" />
                    </svg></a>
            </div>
        </section>
    </main>
@endsection
