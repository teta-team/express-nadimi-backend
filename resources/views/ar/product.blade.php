@extends('layouts.ar.master')

@section('title')
    طماطم للتصدير من إيران | إكسبرس نديمي
@endsection

@section('description')
    طماطم صلبة حمراء من البيوت المحمية والحقول المفتوحة، تُقطف في مرحلة التلوّن لتصل ناضجة لا طرية.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('product', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('product', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('product', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('product', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('product', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="إكسبرس نديمي">
    <meta property="og:title" content="طماطم للتصدير من إيران | إكسبرس نديمي">
    <meta property="og:description"
        content="طماطم صلبة حمراء من البيوت المحمية والحقول المفتوحة، تُقطف في مرحلة التلوّن لتصل ناضجة لا طرية.">
    <meta property="og:url" content="{{ route('product', ['lang' => 'ar']) }}">
    <meta property="og:image" content="{{ asset('assets/images/products/tomato-900.webp') }}">
    <meta property="og:locale" content="ar_OM">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","إكسبرس نديمي"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Product","name":"طماطم","description":"طماطم صلبة حمراء من البيوت المحمية والحقول المفتوحة، تُقطف في مرحلة التلوّن لتصل ناضجة لا طرية.","image":"{{ asset('assets/images/products/tomato-900.webp') }}","category":"الخضروات","countryOfOrigin":"IR","brand":{"@type":"Brand","name":"Express Nadimi"}}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <div class="container">
            <article class="pd">
                <div class="pd-media">
                    <img src="{{ asset('assets/images/products/tomato-900.webp') }}" alt="طماطم" width="900"
                        height="700" fetchpriority="high" decoding="async">
                </div>

                <div class="pd-info">
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'ar']) }}">الرئيسية</a><i></i>
                        <a href="{{ route('products', ['lang' => 'ar']) }}">المنتجات</a><i></i>
                        <a href="{{ route('products', ['lang' => 'ar', 'category' => 'vegetables']) }}">الخضروات</a>
                    </nav>
                    <span class="dot-badge is-available">متوفر</span>
                    <h1 class="display">طماطم</h1>
                    <p class="pd-summary">طماطم صلبة حمراء من البيوت المحمية والحقول المفتوحة، تُقطف في مرحلة التلوّن لتصل
                        ناضجة لا طرية.</p>

                    <div class="pd-season">
                        <p class="label" style="margin-bottom: 12px">موسم التصدير · طوال العام</p>
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
                            <span>ينا</span><span>فبر</span><span>مار</span><span>أبر</span><span>ماي</span><span>يون</span><span>يول</span><span>أغس</span><span>سبت</span><span>أكت</span><span>نوف</span><span>ديس</span>
                        </div>
                    </div>

                    <dl class="specs">
                        <div>
                            <dt>منطقة الإنتاج</dt>
                            <dd>جيرفت، بوشهر، أذربيجان الشرقية</dd>
                        </div>
                        <div>
                            <dt>الحجم المعتاد</dt>
                            <dd dir="ltr" style="text-align: start">Ø 57–67 mm (M) · 67–82 mm (L)</dd>
                        </div>
                        <div>
                            <dt>التعبئة</dt>
                            <dd>كرتونة 5 كغ · كرتونة 8–10 كغ · صندوق بلاستيكي · بعلامة المشتري</dd>
                        </div>
                        <div>
                            <dt>الحد الأدنى للطلب</dt>
                            <dd>شاحنة واحدة (نحو 20 طناً) أو حاوية مبرّدة 40 قدماً</dd>
                        </div>
                    </dl>

                    <div class="pd-actions">
                        <a class="btn" href="#inquiry">اطلب السعر<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <a class="btn btn-line"
                            href="https://wa.me/989144172605?text=%D8%A7%D8%B7%D9%84%D8%A8%20%D8%B3%D8%B9%D8%B1%20%D8%B7%D9%85%D8%A7%D8%B7%D9%85"
                            target="_blank" rel="noopener"><svg class="ic">
                                <use href="#i-whatsapp" />
                            </svg>راسلنا على واتساب</a>
                    </div>
                </div>
            </article>
        </div>

        <section class="section mint inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">
                <div class="inquiry-intro">
                    <span class="label">اطلب عرض سعر</span>
                    <h2 id="inquiry-h" class="h2" style="margin-top: 14px">اطلب سعر طماطم</h2>
                    <p class="lead">أخبرونا بالمنتج والكمية والوجهة. نرد عادة خلال يوم عمل واحد.</p>
                </div>
                <div class="waybill">

                    <div class="waybill-head">

                        <b>استفسار تصدير</b>

                        <span>رد خلال يوم عمل</span>

                    </div>

                    <div class="waybill-body">





                        <form class="iform" method="POST"
                              action="{{ route('home.post', ['lang' => app()->getLocale()]) }}" novalidate
                              data-whatsapp-form="inquiry">
                            <!-- backend: set action + @@csrf -->

                            @csrf
                            <div class="iform-grid">

                                <div class="field">

                                    <label for="iq-product">المنتج</label>

                                    <select id="iq-product" name="product" class="input">

                                        <option value="{{ old('product') }}">مختلط / عدة منتجات</option>

                                        <optgroup label="الخضروات">

                                            <option value="tomato">طماطم</option>

                                            <option value="cucumber">خيار</option>

                                            <option value="bell-pepper">فلفل رومي</option>

                                            <option value="cabbage">ملفوف</option>

                                            <option value="cauliflower">قرنبيط</option>

                                            <option value="lettuce">خس</option>

                                            <option value="potato">بطاطا</option>

                                            <option value="onion">بصل</option>

                                        </optgroup>

                                        <optgroup label="الفواكه ذات النواة">

                                            <option value="apricot">مشمش</option>

                                            <option value="cherry">كرز</option>

                                            <option value="peach">خوخ</option>

                                            <option value="nectarine">نكتارين</option>

                                        </optgroup>

                                        <optgroup label="فواكه البساتين">

                                            <option value="apple">تفاح</option>

                                            <option value="pomegranate">رمان</option>

                                            <option value="kiwi">كيوي</option>

                                            <option value="grape">عنب</option>

                                        </optgroup>

                                        <optgroup label="الحمضيات والبطيخ">

                                            <option value="orange">برتقال</option>

                                            <option value="tangerine">يوسفي</option>

                                            <option value="lemon">ليمون</option>

                                            <option value="watermelon">بطيخ</option>

                                            <option value="melon">شمام</option>

                                        </optgroup>

                                    </select>
                                    @error('product')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-qty">الكمية <b class="req">*</b></label>

                                    <input id="iq-qty" name="quantity" class="input" required maxlength="80"
                                           value="{{ old('quantity') }}" placeholder="مثلاً حاوية 40 قدماً، 20 طناً">
                                    @error('quantity')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-pack">التعبئة</label>

                                    <select id="iq-pack" name="packaging" class="input">

                                        <option value="">بلا تفضيل</option>

                                        <option value="carton_5">كرتونة 5 كغ</option>

                                        <option value="carton_10">كرتونة 8–10 كغ</option>

                                        <option value="tray">صينية بطبقة واحدة</option>

                                        <option value="crate">صندوق بلاستيكي</option>

                                        <option value="mesh_bag">كيس شبكي 10–25 كغ</option>

                                        <option value="bulk">سائب / صناديق كبيرة</option>

                                        <option value="punnet">علب 0.5–1 كغ</option>

                                        <option value="private_label">بعلامة المشتري</option>

                                    </select>
                                    @error('packaging')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-inco">شرط التسليم</label>

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

                                    <label for="iq-dest">بلد / ميناء الوجهة <b class="req">*</b></label>

                                    <input id="iq-dest" name="destination" class="input" required maxlength="120"
                                           value="{{ old('destination') }}" placeholder="مثلاً عُمان – مسقط">
                                    @error('destination')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-name">الاسم <b class="req">*</b></label>

                                    <input id="iq-name" name="name" class="input" required maxlength="120"
                                           autocomplete="name" value="{{ old('name') }}">
                                    @error('name')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-co">الشركة</label>

                                    <input id="iq-co" name="company" class="input" maxlength="160"
                                           autocomplete="organization" value="{{ old('company') }}"
                                           placeholder="اسم الشركة">
                                    @error('company')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-email">البريد الإلكتروني</label>

                                    <input id="iq-email" name="email" type="email" class="input" maxlength="190"
                                           autocomplete="email" value="{{ old('email') }}" placeholder="name@company.com">
                                    @error('email')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-phone">الهاتف / واتساب</label>

                                    <input id="iq-phone" name="phone" type="tel" class="input" maxlength="40"
                                           autocomplete="tel" inputmode="tel" value="{{ old('phone') }}"
                                           placeholder="+968 …">
                                    @error('phone')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field" style="grid-column: 1 / -1">

                                    <label for="iq-msg">ملاحظات <span class="opt">(اختياري)</span></label>

                                    <textarea id="iq-msg" name="message" class="input" rows="3" maxlength="2000"
                                              placeholder="الصنف، الحجم، موعد التسليم…"></textarea>
                                    @error('message')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>



                            <div class="iform-foot">

                                <p class="iform-hint">يكفي البريد أو الهاتف، وأحدهما مطلوب.</p>

                                <button class="btn btn-leaf" type="submit">أرسل الاستفسار<svg class="ic flip">
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
                    <h2 id="rel-h" class="h2">المزيد من هذه الفئة</h2>
                    <a class="link-arrow"
                        href="{{ route('products', ['lang' => 'ar', 'category' => 'vegetables']) }}">الخضروات<svg
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
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">خيار</a></h3>
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
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">فلفل رومي</a>
                                </h3>
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
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'ar']) }}">ملفوف</a></h3>
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
            </div>
        </section>
    </main>
@endsection
