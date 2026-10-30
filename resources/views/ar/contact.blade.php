@extends('layouts.ar.master')

@section('title')
    اتصل بنا | مكاتب إيران وعُمان – إكسبرس نديمي
@endsection

@section('description')
    تواصلوا مع مكتبينا في إيران (تبريز) وعُمان (مسقط) عبر الهاتف أو واتساب أو البريد الإلكتروني، وأرسلوا رسالتكم أو اقتراحكم أو شكواكم.
@endsection

@section('canonical', route('contact', ['lang' => 'ar']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('contact', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('contact', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('contact', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('contact', ['lang' => 'en']) }}">
    @include('partials.seo-schema', [
        'lang' => 'ar',
        'crumbs' => [
            ['الرئيسية', route('home', ['lang' => 'ar'])],
            ['اتصل بنا', route('contact', ['lang' => 'ar'])],
        ],
    ])
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'ar']) }}">الرئيسية</a>
                        <i></i><span aria-current="page">اتصل بنا</span>
                    </nav>
                    <span class="label">اتصل بنا</span>
                    <h1 class="display" style="margin-top: 16px">اتصل بنا</h1>
                    <p>تواصلوا معنا لمعرفة سعر اليوم والمتوفر من المنتجات أو لطلب التعاون أو للتواصل مع فريق المبيعات.
                        ويمكنكم أيضاً إرسال اقتراح أو شكوى.</p>
                </div>
                <figure class="frame frame--contact">
                    <img class="phead-img" src="{{ asset('assets/images/scenes/port-800.webp') }}" alt=""
                        width="800" height="1000" fetchpriority="high" decoding="async">
                    <figcaption class="hero-note">
                        <span class="hero-route" aria-hidden="true"><i></i><span class="hero-route-ic"><svg class="ic">
                                    <use href="#i-ship" />
                                </svg></span><i></i></span>
                        <b>رسالة واحدة تبدأ الشراكة</b>
                        <small>نتطلع إلى التواصل معكم</small>
                    </figcaption>
                </figure>
            </div>
        </section>

        <section class="section" style="padding-top: 0">
            <div class="container">
                <div class="offices">
                    <article class="office reveal" id="office-ir" data-clock data-tz="Asia/Tehran" data-days="6,3"
                        data-hours="8,16" data-open="مفتوح الآن" data-closed="مغلق الآن">
                        <div class="office-head">
                            <div>
                                <h2>مكتب إيران</h2>
                                <small>کرج، أذربيجان الشرقية</small>
                            </div>
                            <div class="clock" aria-label="الوقت المحلي">
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
                                    <small>العنوان</small>
                                    <span>عنوان المكتب، تبريز، إيران (سيُحدَّث قريباً)</span>
                                    <a class="map-link"
                                        href="https://www.google.com/maps/search/?api=1&query=Tabriz%2C%20East%20Azerbaijan%2C%20Iran"
                                        target="_blank" rel="noopener"><svg class="ic">
                                            <use href="#i-map" />
                                        </svg>عرض على الخريطة</a>
                                </div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>الهاتف</small><a class="ltr" href="tel:+989124361450">+98
                                        912 436 1450</a></div>
                                <button type="button" class="copy" data-copy="+98 912 436 1450" aria-label="نسخ"
                                    data-done="تم النسخ"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-whatsapp" />
                                    </svg></span>
                                <div class="row-body"><small>واتساب</small><a class="ltr"
                                        href="https://wa.me/989144172605" target="_blank" rel="noopener">+98 914 417
                                        2605</a></div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-mail" />
                                    </svg></span>
                                <div class="row-body"><small>البريد الإلكتروني</small><a
                                        href="mailto:iran@nadimi.example">iran@nadimi.example</a></div>
                                <button type="button" class="copy" data-copy="iran@nadimi.example" aria-label="نسخ"
                                    data-done="تم النسخ"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-clock" />
                                    </svg></span>
                                <div class="row-body"><small>ساعات العمل</small>
                                    <span>السبت – الأربعاء، 08:00 – 16:00</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="office reveal" id="office-om" data-clock data-tz="Asia/Muscat" data-days="0,4"
                        data-hours="8,17" data-open="مفتوح الآن" data-closed="مغلق الآن">
                        <div class="office-head">
                            <div>
                                <h2>مكتب عُمان</h2>
                                <small>سوق سلال – WMC04، سلطنة عُمان</small>
                            </div>
                            <div class="clock" aria-label="الوقت المحلي">
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
                                    <small>العنوان</small>
                                    <span>Nadimi International LLC، سوق سلال (سوق الفواكه والخضروات في عُمان)، الجناح
                                        WMC04</span>
                                    <a class="map-link"
                                        href="https://www.google.com/maps/search/?api=1&query=Souq%20Silal%20WMC04%2C%20Oman"
                                        target="_blank" rel="noopener"><svg class="ic">
                                            <use href="#i-map" />
                                        </svg>عرض على الخريطة</a>
                                </div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>الهاتف</small><a class="ltr" href="tel:+96899482094">+968
                                        9948 2094</a></div>
                                <button type="button" class="copy" data-copy="+968 9948 2094" aria-label="نسخ"
                                    data-done="تم النسخ"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>الجوال</small><a class="ltr" href="tel:+96899504094">+968
                                        9950 4094</a></div>
                                <button type="button" class="copy" data-copy="+968 9950 4094" aria-label="نسخ"
                                    data-done="تم النسخ"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-mail" />
                                    </svg></span>
                                <div class="row-body"><small>البريد الإلكتروني</small><a
                                        href="mailto:oman@nadimi.example">oman@nadimi.example</a></div>
                                <button type="button" class="copy" data-copy="oman@nadimi.example" aria-label="نسخ"
                                    data-done="تم النسخ"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-clock" />
                                    </svg></span>
                                <div class="row-body"><small>ساعات العمل</small>
                                    <span>الأحد – الخميس، 08:00 – 17:00</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="cform-wrap">
                    <div class="cform-card" id="contact-form">
                        <div class="sec-head" style="margin-bottom: 24px">
                            <span class="label">اختر موضوع رسالتك.</span>
                            <h2 class="h2">راسلنا</h2>
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
                                <legend class="sr">النوع</legend>
                                <label class="type type-message">
                                    <input type="radio" name="type" value="message" checked>
                                    <span><svg class="ic">
                                            <use href="#i-message" />
                                        </svg><b>رسالة عامة</b><small>أسئلة عن المنتجات أو الأسعار أو طلب ما.</small></span>
                                </label>
                                <label class="type type-suggestion">
                                    <input type="radio" name="type" value="suggestion">
                                    <span><svg class="ic">
                                            <use href="#i-bulb" />
                                        </svg><b>اقتراح</b><small>فكرة لتحسين منتجاتنا أو خدماتنا.</small></span>
                                </label>
                                <label class="type type-complaint">
                                    <input type="radio" name="type" value="complaint">
                                    <span><svg class="ic">
                                            <use href="#i-alert" />
                                        </svg><b>شكوى</b><small>حدثت مشكلة؟ أخبرونا بما جرى وسنتابعه.</small></span>
                                </label>
                            </fieldset>

                            <div class="fgrid">
                                <fieldset class="field w">
                                    <legend class="legend">إرسال إلى</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="office" value="any"
                                                checked><span>أيّ مكتب</span></label>
                                        <label class="chip"><input type="radio" name="office"
                                                value="ir"><span>مكتب إيران</span></label>
                                        <label class="chip"><input type="radio" name="office"
                                                value="om"><span>مكتب عُمان</span></label>
                                    </div>
                                </fieldset>
                                <div class="field">
                                    <label for="c-name">الاسم الكامل <b class="req">*</b></label>
                                    <input id="c-name" name="name" class="input" maxlength="120"
                                        autocomplete="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-subject">الموضوع</label>
                                    <input id="c-subject" name="subject" class="input" maxlength="190"
                                        value="{{ old('subject') }}">
                                    @error('subject')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-email">البريد الإلكتروني</label>
                                    <input id="c-email" name="email" type="email" class="input" maxlength="190"
                                        autocomplete="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-phone">الهاتف / واتساب</label>
                                    <input id="c-phone" name="phone" type="tel" class="input" maxlength="40"
                                        autocomplete="tel" inputmode="tel" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field w" data-show-for="complaint" hidden>
                                    <label for="c-ref">رقم الطلب أو الفاتورة <span
                                            class="opt">(اختياري)</span></label>
                                    <input id="c-ref" name="order_ref" class="input" maxlength="80"
                                        value="{{ old('order_ref') }}">
                                    @error('order_ref')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field w">
                                    <label for="c-body">رسالتك <b class="req">*</b></label>
                                    <textarea id="c-body" name="body" class="input" rows="6" maxlength="4000" required></textarea>
                                    @error('body')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w iform-foot">
                                    <p class="iform-hint">البريد الإلكتروني ورقم الهاتف مطلوبان معاً.</p>
                                    <button class="btn btn-leaf" type="submit">أرسل الرسالة<svg class="ic flip">
                                            <use href="#i-arrow" />
                                        </svg></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <aside class="aside-note">
                        <h2>هل تزرعون أو تورّدون منتجات؟</h2>
                        <p>يمكن للمزارعين وأصحاب البساتين ومزارعي البيوت المحمية وتجار الجملة تسجيل منتجاتهم لدينا. املؤوا
                            النموذج مع الصور وسيتصل بكم فريقنا.</p>
                        <a class="btn btn-white" href="{{ route('supplier', ['lang' => 'ar']) }}">استخدموا نموذج التعاون
                            مع الموردين<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <div class="aside-links">
                            <a href="https://wa.me/989144172605" target="_blank" rel="noopener"><svg class="ic">
                                    <use href="#i-whatsapp" />
                                </svg>راسلنا على واتساب</a>
                            <a href="mailto:info@nadimi.example"><svg class="ic">
                                    <use href="#i-mail" />
                                </svg>info@nadimi.example</a>
                            <a href="{{ route('home', ['lang' => 'ar']) }}#inquiry"><svg class="ic">
                                    <use href="#i-file" />
                                </svg>طلب عرض سعر</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
@endsection
