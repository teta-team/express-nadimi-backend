@extends('layouts.fa.master')

@section('title')
    تماس با ما | دفاتر ایران و عمان – اکسپرس ندیمی
@endsection

@section('description')
    با دفاتر ایران (تبریز) و عمان (مسقط) از طریق تلفن، واتساپ و ایمیل در ارتباط باشید. پیام، پیشنهاد یا شکایت خود را برای ما بفرستید.
@endsection

@section('canonical', route('contact', ['lang' => 'fa']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('contact', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('contact', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('contact', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('contact', ['lang' => 'en']) }}">
    @include('partials.seo-schema', [
        'lang' => 'fa',
        'crumbs' => [
            ['خانه', route('home', ['lang' => 'fa'])],
            ['تماس با ما', route('contact', ['lang' => 'fa'])],
        ],
    ])
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'fa']) }}">خانه</a>
                        <i></i><span aria-current="page">تماس با ما</span>
                    </nav>
                    <span class="label">تماس با ما</span>
                    <h1 class="display" style="margin-top: 16px">تماس با ما</h1>
                    <p>برای دریافت قیمت روز، موجودی محصولات، درخواست همکاری یا ارتباط با واحد فروش با ما در تماس باشید.
                        می‌توانید پیشنهاد یا شکایت خود را هم ثبت کنید.</p>
                </div>
                <figure class="frame frame--contact">
                    <img class="phead-img" src="{{ asset('assets/images/scenes/port-800.webp') }}" alt=""
                        width="800" height="1000" fetchpriority="high" decoding="async">
                    <figcaption class="hero-note">
                        <span class="hero-route" aria-hidden="true"><i></i><span class="hero-route-ic"><svg class="ic">
                                    <use href="#i-ship" />
                                </svg></span><i></i></span>
                        <b>یک پیام تا شروع همکاری</b>
                        <small>منتظر شنیدن از شما هستیم</small>
                    </figcaption>
                </figure>
            </div>
        </section>

        <section class="section" style="padding-top: 0">
            <div class="container">
                <div class="offices">
                    <article class="office reveal" id="office-ir" data-clock data-tz="Asia/Tehran" data-days="6,3"
                        data-hours="8,16" data-open="اکنون باز است" data-closed="اکنون بسته است">
                        <div class="office-head">
                            <div>
                                <h2>دفتر ایران</h2>
                                <small>تبریز، آذربایجان شرقی</small>
                            </div>
                            <div class="clock" aria-label="ساعت محلی">
                                <div class="clock-t" data-clock-time>--:--</div>
                                <span class="clock-badge" data-clock-badge></span>
                            </div>
                        </div>
                        <div class="rows">
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-pin" />
                                    </svg></span>
                                <div class="row-body">
                                    <small>نشانی</small>
                                    <span>نشانی دفتر، کرج (به‌زودی تکمیل می‌شود)</span>
                                    <a class="map-link"
                                        href="https://www.google.com/maps/search/?api=1&query=Tabriz%2C%20East%20Azerbaijan%2C%20Iran"
                                        target="_blank" rel="noopener"><svg class="ic">
                                            <use href="#i-map" />
                                        </svg>مشاهده روی نقشه</a>
                                </div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>تلفن</small><a class="ltr" href="tel:+989124361450">+98 912
                                        436 1450</a></div>
                                <button type="button" class="copy" data-copy="+98 912 436 1450" aria-label="کپی"
                                    data-done="کپی شد"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-whatsapp" />
                                    </svg></span>
                                <div class="row-body"><small>واتساپ</small><a class="ltr"
                                        href="https://wa.me/989144172605" target="_blank" rel="noopener">+98 914 417
                                        2605</a></div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-mail" />
                                    </svg></span>
                                <div class="row-body"><small>ایمیل</small><a
                                        href="mailto:iran@nadimi.example">iran@nadimi.example</a></div>
                                <button type="button" class="copy" data-copy="iran@nadimi.example" aria-label="کپی"
                                    data-done="کپی شد"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-clock" />
                                    </svg></span>
                                <div class="row-body"><small>ساعات کاری</small>
                                    <span>شنبه تا چهارشنبه، ۰۸:۰۰ تا ۱۶:۰۰</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="office reveal" id="office-om" data-clock data-tz="Asia/Muscat" data-days="0,4"
                        data-hours="8,17" data-open="اکنون باز است" data-closed="اکنون بسته است">
                        <div class="office-head">
                            <div>
                                <h2>دفتر عمان</h2>
                                <small>سوق سلال – WMC04، سلطنت عمان</small>
                            </div>
                            <div class="clock" aria-label="ساعت محلی">
                                <div class="clock-t" data-clock-time>--:--</div>
                                <span class="clock-badge" data-clock-badge></span>
                            </div>
                        </div>
                        <div class="rows">
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-pin" />
                                    </svg></span>
                                <div class="row-body">
                                    <small>نشانی</small>
                                    <span>Nadimi International LLC، سوق سلال (بازار میوه و تره‌بار عمان)، جایگاه
                                        WMC04</span>
                                    <a class="map-link"
                                        href="https://www.google.com/maps/search/?api=1&query=Souq%20Silal%20WMC04%2C%20Oman"
                                        target="_blank" rel="noopener"><svg class="ic">
                                            <use href="#i-map" />
                                        </svg>مشاهده روی نقشه</a>
                                </div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>تلفن</small><a class="ltr" href="tel:+96899482094">+968
                                        9948 2094</a></div>
                                <button type="button" class="copy" data-copy="+968 9948 2094" aria-label="کپی"
                                    data-done="کپی شد"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>موبایل</small><a class="ltr" href="tel:+96899504094">+968
                                        9950 4094</a></div>
                                <button type="button" class="copy" data-copy="+968 9950 4094" aria-label="کپی"
                                    data-done="کپی شد"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-mail" />
                                    </svg></span>
                                <div class="row-body"><small>ایمیل</small><a
                                        href="mailto:oman@nadimi.example">oman@nadimi.example</a></div>
                                <button type="button" class="copy" data-copy="oman@nadimi.example" aria-label="کپی"
                                    data-done="کپی شد"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-clock" />
                                    </svg></span>
                                <div class="row-body"><small>ساعات کاری</small>
                                    <span>یکشنبه تا پنجشنبه، ۰۸:۰۰ تا ۱۷:۰۰</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="cform-wrap">
                    <div class="cform-card" id="contact-form">
                        <div class="sec-head" style="margin-bottom: 24px">
                            <span class="label">موضوع پیام خود را انتخاب کنید.</span>
                            <h2 class="h2">برای ما بنویسید</h2>
                        </div>


                        @if (session('success'))



                            <p role="status" style="padding:12px;margin-bottom:16px;border:1px solid #5D8060;border-radius:8px;color:#315C36">



                                {{ session('success') }}



                            </p>



                        @endif



                        <form method="POST" action="{{ route('contact.post', ['lang' => app()->getLocale()]) }}"
                            novalidate data-whatsapp-form="contact">
                            @csrf

                            <fieldset class="types">
                                <legend class="sr">نوع پیام</legend>
                                <label class="type type-message">
                                    <input type="radio" name="type" value="message" checked>
                                    <span><svg class="ic">
                                            <use href="#i-message" />
                                        </svg><b>پیام عمومی</b><small>سؤال درباره محصولات، قیمت یا سفارش.</small></span>
                                </label>
                                <label class="type type-suggestion">
                                    <input type="radio" name="type" value="suggestion">
                                    <span><svg class="ic">
                                            <use href="#i-bulb" />
                                        </svg><b>پیشنهاد</b><small>ایده‌ای برای بهتر شدن محصولات یا خدمات ما.</small></span>
                                </label>
                                <label class="type type-complaint">
                                    <input type="radio" name="type" value="complaint">
                                    <span><svg class="ic">
                                            <use href="#i-alert" />
                                        </svg><b>شکایت</b><small>مشکلی پیش آمده؟ ماجرا را بنویسید تا پیگیری
                                            کنیم.</small></span>
                                </label>
                            </fieldset>

                            <div class="fgrid">
                                <fieldset class="field w">
                                    <legend class="legend">ارسال به</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="office" value="any"
                                                checked><span>فرقی نمی‌کند</span></label>
                                        <label class="chip"><input type="radio" name="office"
                                                value="ir"><span>دفتر ایران</span></label>
                                        <label class="chip"><input type="radio" name="office"
                                                value="om"><span>دفتر عمان</span></label>
                                    </div>
                                </fieldset>
                                <div class="field">
                                    <label for="c-name">نام و نام خانوادگی <b class="req">*</b></label>
                                    <input id="c-name" name="name" class="input" maxlength="120"
                                        autocomplete="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-subject">موضوع</label>
                                    <input id="c-subject" name="subject" class="input" maxlength="190"
                                        value="{{ old('subject') }}">
                                    @error('subject')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-email">ایمیل</label>
                                    <input id="c-email" name="email" type="email" class="input" maxlength="190"
                                        autocomplete="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-phone">تلفن / واتساپ</label>
                                    <input id="c-phone" name="phone" type="tel" class="input" maxlength="40"
                                        autocomplete="tel" inputmode="tel" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field w" data-show-for="complaint" hidden>
                                    <label for="c-ref">شماره سفارش یا فاکتور <span
                                            class="opt">(اختیاری)</span></label>
                                    <input id="c-ref" name="order_ref" class="input" maxlength="80"
                                        value="{{ old('order_ref') }}">
                                    @error('order_ref')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field w">
                                    <label for="c-body">متن پیام <b class="req">*</b></label>
                                    <textarea id="c-body" name="body" class="input" rows="6" maxlength="4000" required></textarea>
                                    @error('body')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w iform-foot">
                                    <p class="iform-hint">وارد کردن ایمیل و شماره تلفن هر دو الزامی است.</p>
                                    <button class="btn btn-leaf" type="submit">ارسال پیام<svg class="ic flip">
                                            <use href="#i-arrow" />
                                        </svg></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <aside class="aside-note">
                        <h2>تولیدکننده یا تأمین‌کننده محصول هستید؟</h2>
                        <p>کشاورزان، باغداران، گلخانه‌داران و عمده‌فروشان می‌توانند محصول خود را نزد ما ثبت کنند. فرم را
                            همراه با عکس پر کنید تا کارشناسان ما تماس بگیرند.</p>
                        <a class="btn btn-white" href="{{ route('supplier', ['lang' => 'fa']) }}">فرم همکاری
                            تأمین‌کنندگان<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <div class="aside-links">
                            <a href="https://wa.me/989144172605" target="_blank" rel="noopener"><svg class="ic">
                                    <use href="#i-whatsapp" />
                                </svg>پیام در واتساپ</a>
                            <a href="mailto:info@nadimi.example"><svg class="ic">
                                    <use href="#i-mail" />
                                </svg>info@nadimi.example</a>
                            <a href="{{ route('home', ['lang' => 'fa']) }}#inquiry"><svg class="ic">
                                    <use href="#i-file" />
                                </svg>درخواست استعلام</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
@endsection
