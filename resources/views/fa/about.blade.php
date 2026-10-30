@extends('layouts.fa.master')

@section('title')
    درباره ما | ندیمی اینترنشنال، اکسپرس ندیمی
@endsection

@section('description')
    آشنایی با شرکت ندیمی: مسیر تأمین از مزرعه تا بازار عمان، کنترل کیفیت، بسته‌بندی و بیش از ۱۵ سال تجربه در صادرات میوه و سبزیجات تازه.
@endsection

@section('canonical', route('about', ['lang' => 'fa']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('about', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('about', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('about', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('about', ['lang' => 'en']) }}">
    @include('partials.seo-schema', [
        'lang' => 'fa',
        'crumbs' => [
            ['خانه', route('home', ['lang' => 'fa'])],
            ['درباره ما', route('about', ['lang' => 'fa'])],
        ],
    ])
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead phead--about">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'fa']) }}">خانه</a>
                        <i></i><span aria-current="page">درباره ما</span>
                    </nav>
                    <span class="label">درباره ما</span>
                    <h1 class="display" style="margin-top: 16px">تجربه از مزرعه، حضور در بازار عمان</h1>
                    <p>از مزارع ایران تا بازار عمان؛ کیفیت، اعتماد و همکاری پایدار.</p>
                    <p class="phead-more">ما میوه و سبزیجات تازه را مستقیم از تولیدکنندگان ایرانی تأمین می‌کنیم و پس از
                        انتخاب، کنترل کیفیت و بسته‌بندی، با حضور مستقیم در سوق سلال به دست خریداران عمانی می‌رسانیم.</p>
                    <ul class="phead-points">
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>تأمین مستقیم از تولیدکنندگان ایرانی</span></li>
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>کنترل کیفیت، درجه‌بندی و بسته‌بندی</span></li>
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>حضور مستقیم در سوق سلال – WMC04</span></li>
                    </ul>
                </div>
                <figure class="frame frame--calm"><img class="phead-img"
                        src="{{ asset('assets/images/scenes/vineyard-hills-800.webp') }}"
                        srcset="{{ asset('assets/images/scenes/vineyard-hills-800.webp') }} 800w, {{ asset('assets/images/scenes/vineyard-hills-1600.webp') }} 1600w"
                        sizes="(max-width: 767px) 100vw, 40vw" alt="" width="800" height="1000"
                        fetchpriority="high" decoding="async"></figure>
            </div>
        </section>

        <section class="section" aria-labelledby="story-h">
            <div class="container story">
                <div class="story-text reveal">
                    <span class="label">ما که هستیم</span>
                    <h2 id="story-h" class="h2" style="margin-top: 14px">شرکت ندیمی</h2>
                    <p>شرکت ندیمی با بیش از ۱۵ سال تجربه در حوزه کشاورزی، تأمین و تجارت محصولات کشاورزی، در زمینه تأمین و
                        صادرات میوه و سبزیجات تازه فعالیت می‌کند.</p>
                    <p>امروز تمرکز اصلی مجموعه بر بازار عمان است. حضور مستقیم شرکت در سوق سلال، بازار میوه و تره‌بار عمان،
                        جایگاه WMC04 امکان ارتباط نزدیک با خریداران، شناخت نیاز بازار و عرضه محصولات تازه را فراهم کرده است.
                    </p>
                    <p>شرکت ندیمی با تکیه بر ارتباط مستقیم با تولیدکنندگان ایرانی، تجربه در انتخاب و کنترل کیفیت محصول،
                        بسته‌بندی و حمل‌ونقل، تلاش می‌کند مسیری مطمئن میان مزارع ایران و بازار عمان ایجاد کند.</p>
                    <ul class="hero-facts">
                        <li><b>۱۵+</b><span>سال تجربه در کشاورزی و تجارت</span></li>
                        <li><b>۷</b><span>بازار صادراتی</span></li>
                        <li><b>۲۰+</b><span>نوع میوه و صیفی</span></li>
                        <li><b>WMC04</b><span>جایگاه ما در سوق سلال عمان</span></li>
                    </ul>
                </div>
                <div class="story-photos reveal">
                    <img src="{{ asset('assets/images/scenes/seedlings-800.webp') }}" alt="" width="800"
                        height="1000" loading="lazy" decoding="async">
                    <img src="{{ asset('assets/images/scenes/veg-assort-800.webp') }}" alt="" width="800"
                        height="1000" loading="lazy" decoding="async">
                </div>
            </div>
        </section>

        <section class="section founder-sec" aria-labelledby="founder-h">
            <div class="container">
                <div class="founder reveal">
                    <figure class="founder-photo">
                        <img src="{{ asset('assets/images/scenes/about.jpg') }}"
                            srcset="{{ asset('assets/images/people/sajjad-nadimi-founder-480.webp') }} 480w, {{ asset('assets/images/scenes/about.jpg') }} 753w"
                            sizes="(max-width: 899px) 100vw, 42vw"
                            alt="Eng. Sajjad Nadimi, Founder and CEO of Nadimi, at his desk" width="753" height="941"
                            loading="lazy" decoding="async">
                    </figure>
                    <div class="founder-body">
                        <span class="label">بنیان‌گذار</span>
                        <h2 id="founder-h" class="h2">مهندس سجاد ندیمی</h2>
                        <p class="founder-role">بنیان‌گذار و مدیرعامل شرکت ندیمی</p>
                        <div class="founder-text">
                            <p>مهندس سجاد ندیمی با بیش از ۱۵ سال تجربه در حوزه کشاورزی، تأمین، تجارت و صادرات محصولات
                                کشاورزی، بنیان‌گذار و مدیرعامل شرکت ندیمی است.</p>
                            <p>فعالیت این مجموعه از سال‌ها تجربه مستقیم در بخش کشاورزی و شناخت دقیق فرآیند تولید، انتخاب و
                                تأمین محصول شکل گرفته و در ادامه با ورود به بازارهای صادراتی توسعه یافته است.</p>
                            <p>دیدگاه مهندس سجاد ندیمی بر کیفیت پایدار، تعهد در تجارت، اعتماد و ایجاد روابط بلندمدت با شرکای
                                تجاری استوار است.</p>
                        </div>
                        <blockquote class="founder-quote">
                            <p>«تجربه ما از مزرعه آغاز شده و امروز در بازار عمان ادامه دارد؛ هدف ما ارائه محصول باکیفیت و
                                ساخت همکاری‌هایی است که سال‌ها ماندگار باشند.»</p>
                        </blockquote>
                        <p class="founder-sign">مهندس سجاد ندیمی — بنیان‌گذار و مدیرعامل شرکت ندیمی · Nadimi International
                            LLC – Oman</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section mint" aria-labelledby="values-h">
            <div class="container">
                <div class="sec-head">
                    <span class="label">چرا ندیمی</span>
                    <h2 id="values-h" class="h2">چرا شرکت ندیمی؟</h2>
                </div>
                <div class="values">
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-globe" />
                            </svg></span><b>شناخت بازار</b>
                        <p>تجربه فعالیت در بازارهای صادراتی مختلف به شناخت بهتر نیازها و تفاوت‌های بازارهای بین‌المللی کمک
                            کرده است.</p>
                    </div>
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-shield" />
                            </svg></span><b>کنترل کیفیت</b>
                        <p>محصولات بر اساس مشخصات مورد توافق از نظر تازگی، ظاهر، سایز، درجه‌بندی و شرایط بسته‌بندی بررسی
                            می‌شوند.</p>
                    </div>
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-handshake" />
                            </svg></span><b>همکاری بلندمدت</b>
                        <p>هدف ما تنها انجام یک معامله نیست؛ ما به دنبال ایجاد روابط تجاری پایدار و قابل اعتماد با مشتریان و
                            شرکای خود هستیم.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" aria-labelledby="process-h">
            <div class="container">
                <div class="sec-head reveal">
                    <span class="label">روند کار ما</span>
                    <h2 id="process-h" class="h2">از مزرعه تا عمان</h2>
                    <p class="lead">فعالیت ما از انتخاب محصول مناسب آغاز می‌شود و تا رسیدن آن به بازار عمان ادامه پیدا
                        می‌کند.</p>
                </div>
                <ol class="timeline">
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-sprout" />
                            </svg></span>
                        <div>
                            <span class="tl-n">۰۱</span>
                            <h3>انتخاب و تأمین محصول</h3>
                            <p>بررسی محصولات موجود و انتخاب گزینه مناسب بر اساس نیاز بازار و سفارش مشتری.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-hand" />
                            </svg></span>
                        <div>
                            <span class="tl-n">۰۲</span>
                            <h3>برداشت</h3>
                            <p>هماهنگی برای برداشت محصول در زمان مناسب تا تازگی و کیفیت آن به بهترین شکل حفظ شود.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-filter" />
                            </svg></span>
                        <div>
                            <span class="tl-n">۰۳</span>
                            <h3>کنترل و درجه‌بندی</h3>
                            <p>بررسی کیفیت، ظاهر و سایز محصول و درجه‌بندی آن بر اساس استاندارد مورد توافق با مشتری.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-box" />
                            </svg></span>
                        <div>
                            <span class="tl-n">۰۴</span>
                            <h3>بسته‌بندی</h3>
                            <p>بسته‌بندی متناسب با نوع محصول و سفارش، با هماهنگی وزن و نوع کارتن پیش از نهایی شدن سفارش.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-truck" />
                            </svg></span>
                        <div>
                            <span class="tl-n">۰۵</span>
                            <h3>بارگیری</h3>
                            <p>آماده‌سازی محموله و بارگیری دقیق آن برای انتقال امن محصول به مقصد مورد نظر.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-ship" />
                            </svg></span>
                        <div>
                            <span class="tl-n">۰۶</span>
                            <h3>حمل به عمان</h3>
                            <p>پیگیری مستمر مسیر حمل و انتقال محموله تا زمان رسیدن آن به بازار عمان.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-pin" />
                            </svg></span>
                        <div>
                            <span class="tl-n">۰۷</span>
                            <h3>حضور در سوق سلال</h3>
                            <p>ورود محصول به بازار و ادامه عرضه منظم، در کنار همکاری مستقیم با مشتریان در عمان.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>
        <section class="section mint" aria-labelledby="markets-h">
            <div class="container markets-grid">
                <div>
                    <div class="sec-head reveal">
                        <span class="label">بازارهای صادراتی</span>
                        <h2 id="markets-h" class="h2">تجربه بازارهای بین‌المللی</h2>
                        <p class="lead">تجربه صادرات و همکاری تجاری با هفت بازار؛ تمرکز اصلی امروز بر بازار عمان است.</p>
                    </div>
                    <ol class="routes">
                        <li class="route-row reveal">
                            <span class="route-n">۰۱</span>
                            <span class="route-country">عمان<span class="route-city" dir="ltr">Souq Silal –
                                    WMC04</span></span>
                            <span class="route-via sea">بازار اصلی</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">۰۲</span>
                            <span class="route-country">امارات متحده عربی</span>
                            <span class="route-via">سابقه صادرات</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">۰۳</span>
                            <span class="route-country">عربستان سعودی</span>
                            <span class="route-via">سابقه صادرات</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">۰۴</span>
                            <span class="route-country">بحرین</span>
                            <span class="route-via">سابقه صادرات</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">۰۵</span>
                            <span class="route-country">روسیه</span>
                            <span class="route-via">سابقه صادرات</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">۰۶</span>
                            <span class="route-country">ارمنستان</span>
                            <span class="route-via">سابقه صادرات</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">۰۷</span>
                            <span class="route-country">آذربایجان</span>
                            <span class="route-via">سابقه صادرات</span>
                        </li>
                    </ol>
                </div>

                <aside class="office-card reveal" id="oman">
                    <img src="{{ asset('assets/images/scenes/port-800.webp') }}" alt="" width="800"
                        height="1000" loading="lazy" decoding="async">
                    <span class="label">سلطنت عمان · سوق سلال</span>
                    <h3 class="h3">حضور ما در عمان</h3>
                    <p>حضور مستقیم مجموعه در سوق سلال، بازار میوه و تره‌بار عمان، جایگاه WMC04، ارتباط نزدیک با بازار،
                        خریداران و فعالان حوزه میوه و سبزیجات تازه را ممکن کرده و به ما کمک می‌کند نیازهای بازار عمان را
                        بهتر بشناسیم و شرایط عرضه را از نزدیک دنبال کنیم.</p>
                    <a class="btn btn-white" href="{{ route('contact', ['lang' => 'fa']) }}#office-om">تماس با دفتر
                        عمان<svg class="ic flip">
                            <use href="#i-arrow" />
                        </svg></a>
                </aside>
            </div>
        </section>

        <section class="grow" aria-labelledby="grow-h">
            <div class="container">
                <div class="grow-card reveal">
                    <div>
                        <span class="label">ویژه تولیدکنندگان</span>
                        <h2 id="grow-h" class="h2">کشاورز یا تولیدکننده هستید؟</h2>
                        <p>شرکت ندیمی آماده همکاری با کشاورزان، باغداران، گلخانه‌داران، سردخانه‌ها و تأمین‌کنندگان معتبر در
                            ایران است. محصولاتی که از کیفیت مناسب بازار صادراتی برخوردار باشند، پس از بررسی نمونه، کیفیت،
                            ظرفیت تأمین، بسته‌بندی و شرایط همکاری می‌توانند وارد فرآیند تأمین شوند.</p>
                        <a class="btn btn-white" href="{{ route('supplier', ['lang' => 'fa']) }}">ورود به فرم همکاری<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </div>
                    <figure class="grow-fig"><img class="grow-img"
                            src="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}" alt=""
                            width="800" height="1000" loading="lazy" decoding="async"></figure>
                </div>
            </div>
        </section>
    </main>
@endsection
