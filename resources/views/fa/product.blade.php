@extends('layouts.fa.master')

@section('title')
    صادرات گوجه‌فرنگی ایران | اکسپرس ندیمی
@endsection

@section('description')
    گوجه گلخانه‌ای و مزرعه‌ای سفت و سرخ، برداشت‌شده در مرحله رنگ‌گیری تا سالم و رسیده به مقصد برسد.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('product', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('product', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('product', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('product', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('product', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="اکسپرس ندیمی">
    <meta property="og:title" content="صادرات گوجه‌فرنگی ایران | اکسپرس ندیمی">
    <meta property="og:description"
        content="گوجه گلخانه‌ای و مزرعه‌ای سفت و سرخ، برداشت‌شده در مرحله رنگ‌گیری تا سالم و رسیده به مقصد برسد.">
    <meta property="og:url" content="{{ route('product', ['lang' => 'fa']) }}">
    <meta property="og:image" content="{{ asset('assets/images/products/tomato-900.webp') }}">
    <meta property="og:locale" content="fa_IR">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","اکسپرس ندیمی"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Product","name":"گوجه‌فرنگی","description":"گوجه گلخانه‌ای و مزرعه‌ای سفت و سرخ، برداشت‌شده در مرحله رنگ‌گیری تا سالم و رسیده به مقصد برسد.","image":"{{ asset('assets/images/products/tomato-900.webp') }}","category":"صیفی‌جات","countryOfOrigin":"IR","brand":{"@type":"Brand","name":"Express Nadimi"}}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <div class="container">
            <article class="pd">
                <div class="pd-media">
                    <img src="{{ asset('assets/images/products/tomato-900.webp') }}" alt="گوجه‌فرنگی" width="900"
                        height="700" fetchpriority="high" decoding="async">
                </div>

                <div class="pd-info">
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'fa']) }}">خانه</a><i></i>
                        <a href="{{ route('products', ['lang' => 'fa']) }}">محصولات</a><i></i>
                        <a href="{{ route('products', ['lang' => 'fa', 'category' => 'vegetables']) }}">صیفی‌جات</a>
                    </nav>
                    <span class="dot-badge is-available">موجود</span>
                    <h1 class="display">گوجه‌فرنگی</h1>
                    <p class="pd-summary">گوجه گلخانه‌ای و مزرعه‌ای سفت و سرخ، برداشت‌شده در مرحله رنگ‌گیری تا سالم و رسیده
                        به مقصد برسد.</p>

                    <div class="pd-season">
                        <p class="label" style="margin-bottom: 12px">فصل صادرات · تمام سال</p>
                        <ol class="season-bar" aria-hidden="true">
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on now"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                        </ol>
                        <div class="pd-months" aria-hidden="true">
                            <span>دی</span><span>بهم</span><span>اسف</span><span>فرو</span><span>ارد</span><span>خرد</span><span>تیر</span><span>مرد</span><span>شهر</span><span>مهر</span><span>آبا</span><span>آذر</span>
                        </div>
                    </div>

                    <dl class="specs">
                        <div>
                            <dt>مبدأ تولید</dt>
                            <dd>جیرفت، بوشهر، آذربایجان شرقی</dd>
                        </div>
                        <div>
                            <dt>سایز معمول</dt>
                            <dd dir="ltr" style="text-align: start">Ø 57–67 mm (M) · 67–82 mm (L)</dd>
                        </div>
                        <div>
                            <dt>بسته‌بندی</dt>
                            <dd>کارتن ۵ کیلویی · کارتن ۸ تا ۱۰ کیلویی · سبد پلاستیکی · با برند خریدار</dd>
                        </div>
                        <div>
                            <dt>حداقل سفارش</dt>
                            <dd>یک کامیون (حدود ۲۰ تن) یا یک کانتینر یخچالی ۴۰ فوت</dd>
                        </div>
                    </dl>

                    <div class="pd-actions">
                        <a class="btn" href="#inquiry">استعلام قیمت<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <a class="btn btn-line"
                            href="https://wa.me/989144172605?text=%D8%A7%D8%B3%D8%AA%D8%B9%D9%84%D8%A7%D9%85%20%D9%82%DB%8C%D9%85%D8%AA%20%DA%AF%D9%88%D8%AC%D9%87%E2%80%8C%D9%81%D8%B1%D9%86%DA%AF%DB%8C"
                            target="_blank" rel="noopener"><svg class="ic">
                                <use href="#i-whatsapp" />
                            </svg>پیام در واتساپ</a>
                    </div>
                </div>
            </article>
        </div>

        <section class="section mint inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">
                <div class="inquiry-intro">
                    <span class="label">استعلام قیمت</span>
                    <h2 id="inquiry-h" class="h2" style="margin-top: 14px">استعلام قیمت گوجه‌فرنگی</h2>
                    <p class="lead">محصول، مقدار و مقصد را بنویسید. معمولاً ظرف یک روز کاری پاسخ می‌دهیم.</p>
                </div>
                <div class="waybill">

                    <div class="waybill-head">

                        <b>استعلام صادرات</b>

                        <span>پاسخ تا یک روز کاری</span>

                    </div>

                    <div class="waybill-body">





                        <form class="iform" method="post" action="" novalidate data-busy-text="در حال ارسال…">
                            <!-- backend: set action + @@csrf -->


                            <div class="iform-grid">

                                <div class="field">

                                    <label for="iq-product">محصول</label>

                                    <select id="iq-product" name="product" class="input">

                                        <option value="">ترکیبی / چند محصول</option>

                                        <optgroup label="صیفی‌جات">

                                            <option value="tomato" selected>گوجه‌فرنگی</option>

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

                                </div>

                                <div class="field">

                                    <label for="iq-qty">مقدار <b class="req">*</b></label>

                                    <input id="iq-qty" name="quantity" class="input" required maxlength="80"
                                        value="" placeholder="مثلاً یک کانتینر ۴۰ فوت، ۲۰ تن">

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

                                </div>

                                <div class="field w" style="grid-column: 1 / -1">

                                    <label for="iq-dest">کشور / بندر مقصد <b class="req">*</b></label>

                                    <input id="iq-dest" name="destination" class="input" required maxlength="120"
                                        value="" placeholder="مثلاً عمان – مسقط">

                                </div>

                                <div class="field">

                                    <label for="iq-name">نام شما <b class="req">*</b></label>

                                    <input id="iq-name" name="name" class="input" required maxlength="120"
                                        autocomplete="name" value="">

                                </div>

                                <div class="field">

                                    <label for="iq-co">شرکت</label>

                                    <input id="iq-co" name="company" class="input" maxlength="160"
                                        autocomplete="organization" value="" placeholder="نام شرکت">

                                </div>

                                <div class="field">

                                    <label for="iq-email">ایمیل</label>

                                    <input id="iq-email" name="email" type="email" class="input" maxlength="190"
                                        autocomplete="email" value="" placeholder="name@company.com">

                                </div>

                                <div class="field">

                                    <label for="iq-phone">تلفن / واتساپ</label>

                                    <input id="iq-phone" name="phone" type="tel" class="input" maxlength="40"
                                        autocomplete="tel" inputmode="tel" value="" placeholder="+968 …">

                                </div>

                                <div class="field" style="grid-column: 1 / -1">

                                    <label for="iq-msg">توضیحات <span class="opt">(اختیاری)</span></label>

                                    <textarea id="iq-msg" name="message" class="input" rows="3" maxlength="2000"
                                        placeholder="رقم، سایز، زمان تحویل…"></textarea>

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

        <section class="section" aria-labelledby="rel-h">
            <div class="container">
                <div class="sec-head sec-head-row">
                    <h2 id="rel-h" class="h2">محصولات دیگر این دسته</h2>
                    <a class="link-arrow"
                        href="{{ route('products', ['lang' => 'fa', 'category' => 'vegetables']) }}">صیفی‌جات<svg
                            class="ic flip">
                            <use href="#i-arrow" />
                        </svg></a>
                </div>
                <div class="rail">
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/cucumber-480.webp') }}" alt=""
                                width="480" height="373" loading="lazy" decoding="async">
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
                            <img src="{{ asset('assets/images/products/bell-pepper-480.webp') }}" alt=""
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
                            <img src="{{ asset('assets/images/products/cabbage-480.webp') }}" alt=""
                                width="480" height="373" loading="lazy" decoding="async">
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
            </div>
        </section>
    </main>
@endsection
