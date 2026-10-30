@extends('layouts.fa.master')

@section('title')
    همکاری با تأمین‌کنندگان | ثبت محصول برای صادرات – ندیمی
@endsection

@section('description')
    کشاورزان، باغداران و گلخانه‌داران: محصول خود را برای صادرات به عمان و منطقه با ندیمی ثبت کنید. فرم همکاری را پر کنید تا با شما تماس بگیریم.
@endsection

@section('canonical', route('supplier', ['lang' => 'fa']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('supplier', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('supplier', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('supplier', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('supplier', ['lang' => 'en']) }}">
    @include('partials.seo-schema', [
        'lang' => 'fa',
        'crumbs' => [
            ['خانه', route('home', ['lang' => 'fa'])],
            ['همکاری تأمین‌کنندگان', route('supplier', ['lang' => 'fa'])],
        ],
    ])
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead phead-panel">
            <div class="container">
                <div class="phead-in phead-sup">
                    <div>
                        <nav class="crumbs" aria-label="Breadcrumb"><a
                                href="{{ route('home', ['lang' => 'fa']) }}">خانه</a><i></i><span aria-current="page">همکاری
                                تأمین‌کنندگان</span></nav>
                        <span class="label">کشاورزان، باغداران، گلخانه‌داران و تأمین‌کنندگان محصولات کشاورزی</span>
                        <h1 class="display" style="margin-top: 16px">فرم همکاری با تأمین‌کنندگان</h1>
                        <p>شرکت ندیمی آماده همکاری با کشاورزان، باغداران، گلخانه‌داران، سردخانه‌ها و تأمین‌کنندگان معتبر در
                            ایران است. اگر محصول مناسب بازار صادراتی دارید، فرم زیر را با اطلاعات دقیق تکمیل کنید تا پس از
                            بررسی نمونه، کیفیت، ظرفیت تأمین، بسته‌بندی و شرایط همکاری با شما تماس بگیریم.</p>
                        <ol class="sflow">
                            <li><span class="ic-wrap"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>ارسال فرم</li>
                            <li><span class="ic-wrap"><svg class="ic">
                                        <use href="#i-search" />
                                    </svg></span>بررسی اطلاعات و تصاویر</li>
                            <li><span class="ic-wrap"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>تماس کارشناسان</li>
                        </ol>
                    </div>
                    <figure class="phead-fig"><img class="phead-img"
                            src="{{ asset('assets/images/scenes/seedlings-800.webp') }}" alt="" width="800"
                            height="1000" fetchpriority="high" decoding="async"></figure>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="slayout">
                <aside class="srail" data-rail-box>
                    <div class="srail-top">
                        <div class="ring">
                            <svg viewBox="0 0 76 76" aria-hidden="true">
                                <circle class="track" cx="38" cy="38" r="34" />
                                <circle class="bar" cx="38" cy="38" r="34" data-ring />
                            </svg>
                            <span data-pct>۰٪</span>
                        </div>
                        <small>مرحله <span data-step-num>1</span> از ۸<br>فیلدهای ستاره‌دار الزامی هستند.</small>
                    </div>
                    <nav class="ssteps" aria-label="فرم همکاری با تأمین‌کنندگان">
                        <button type="button" class="sstep" data-step="0"><b>۱</b><span>اطلاعات شخصی و تماس</span></button>
                        <button type="button" class="sstep" data-step="1"><b>۲</b><span>اطلاعات محصول</span></button>
                        <button type="button" class="sstep" data-step="2"><b>۳</b><span>مشخصات و کیفیت بار</span></button>
                        <button type="button" class="sstep" data-step="3"><b>۴</b><span>بسته‌بندی</span></button>
                        <button type="button" class="sstep" data-step="4"><b>۵</b><span>قیمت و شرایط فروش</span></button>
                        <button type="button" class="sstep" data-step="5"><b>۶</b><span>تصاویر و ویدئوی محصول</span></button>
                        <button type="button" class="sstep" data-step="6"><b>۷</b><span>سابقه فعالیت</span></button>
                        <button type="button" class="sstep" data-step="7"><b>۸</b><span>توضیحات تکمیلی</span></button>
                    </nav>
                </aside>

                <div>

                    <form method="post" action="{{ route('supplier.store', ['lang' => 'fa']) }}" enctype="multipart/form-data" novalidate data-supplier
                        data-busy-text="در حال ارسال…" data-multistep>
                        @csrf
                        <input type="hidden" name="grade" value="">
                        <input type="hidden" name="state" value="">
                        <input type="hidden" name="sorted" value="">
                        <input type="hidden" name="visit" value="">
                        <input type="hidden" name="packing" value="">
                        <input type="hidden" name="price_terms" value="">
                        <input type="hidden" name="export_history" value="">
                        <input type="hidden" name="long_term" value="">
                        <input type="hidden" name="custom_pack" value="">
                        <input type="hidden" name="change_pack" value="">

                        @if ($errors->any())
                            <script type="application/json" data-server-errors>@json($errors->all())</script>
                        @endif
                        @if (session('success'))
                            <div class="notice notice-ok" data-autofocus role="status">
                                <div><strong>{{ session('success') }}</strong></div>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="notice notice-err" data-autofocus role="alert">
                                <div><strong>{{ session('error') }}</strong></div>
                            </div>
                        @endif

                        <section class="ssec" id="s-personal" data-step-section="0">
                            <div class="ssec-h"><span class="num">۰۱</span>
                                <h2>اطلاعات شخصی و تماس</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-name">نام و نام خانوادگی <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-name" data-label="نام و نام خانوادگی" name="name" type="text" class="input"
                                            value="" required data-req maxlength="120" autocomplete="name">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-mobile">شماره موبایل <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-mobile" data-label="شماره موبایل" name="mobile" type="tel" class="input"
                                            value="" required data-req maxlength="40" inputmode="tel"
                                            autocomplete="tel">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-whatsapp">شماره واتساپ</label>
                                    <div class="">
                                        <input id="s-whatsapp" name="whatsapp" type="tel" class="input"
                                            value="" maxlength="40" inputmode="tel">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-province">استان <b class="req">*</b></label>
                                    <select id="s-province" name="province" class="input" required data-req data-label="استان">
                                        <option value="">انتخاب استان</option>
                                        <option value="east_azerbaijan">آذربایجان شرقی</option>
                                        <option value="west_azerbaijan">آذربایجان غربی</option>
                                        <option value="ardabil">اردبیل</option>
                                        <option value="isfahan">اصفهان</option>
                                        <option value="alborz">البرز</option>
                                        <option value="ilam">ایلام</option>
                                        <option value="bushehr">بوشهر</option>
                                        <option value="tehran">تهران</option>
                                        <option value="chaharmahal">چهارمحال و بختیاری</option>
                                        <option value="south_khorasan">خراسان جنوبی</option>
                                        <option value="razavi_khorasan">خراسان رضوی</option>
                                        <option value="north_khorasan">خراسان شمالی</option>
                                        <option value="khuzestan">خوزستان</option>
                                        <option value="zanjan">زنجان</option>
                                        <option value="semnan">سمنان</option>
                                        <option value="sistan">سیستان و بلوچستان</option>
                                        <option value="fars">فارس</option>
                                        <option value="qazvin">قزوین</option>
                                        <option value="qom">قم</option>
                                        <option value="kurdistan">کردستان</option>
                                        <option value="kerman">کرمان</option>
                                        <option value="kermanshah">کرمانشاه</option>
                                        <option value="kohgiluyeh">کهگیلویه و بویراحمد</option>
                                        <option value="golestan">گلستان</option>
                                        <option value="gilan">گیلان</option>
                                        <option value="lorestan">لرستان</option>
                                        <option value="mazandaran">مازندران</option>
                                        <option value="markazi">مرکزی</option>
                                        <option value="hormozgan">هرمزگان</option>
                                        <option value="hamadan">همدان</option>
                                        <option value="yazd">یزد</option>
                                    </select>
                                </div>
                                <div class="field w">
                                    <label for="s-city">شهر / منطقه تولید <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-city" data-label="شهر" name="city" type="text" class="input"
                                            value="" required data-req maxlength="120">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">نوع فعالیت شما <b class="req">*</b></legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="role" value="farmer" data-label="نقش"
                                                data-req><span>کشاورز</span></label>
                                        <label class="chip"><input type="radio" name="role" value="orchard"
                                                data-req><span>باغدار</span></label>
                                        <label class="chip"><input type="radio" name="role" value="greenhouse"
                                                data-req><span>گلخانه‌دار</span></label>
                                        <label class="chip"><input type="radio" name="role" value="producer"
                                                data-req><span>تولیدکننده</span></label>
                                        <label class="chip"><input type="radio" name="role" value="cold_storage"
                                                data-req><span>سردخانه‌دار</span></label>
                                        <label class="chip"><input type="radio" name="role" value="wholesaler"
                                                data-req><span>تأمین‌کننده / عمده‌فروش</span></label>
                                        <label class="chip"><input type="radio" name="role" value="company"
                                                data-req><span>شرکت یا مجموعه کشاورزی</span></label>
                                        <label class="chip"><input type="radio" name="role" value="other"
                                                data-req><span>سایر</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>

                        

<section class="ssec" id="s-product" data-step-section="1" hidden>
                            <div class="ssec-h"><span class="num">۰۲</span>
                                <h2>اطلاعات محصول</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-product">نام محصول <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-product" name="product" type="text" class="input" data-label="محصول"
                                            value="" required data-req maxlength="120">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-variety">رقم / نوع محصول</label>
                                    <small class="hint">مثال: گوجه گلخانه‌ای، سیب قرمز، شلیل، گیلاس و…</small>
                                    <div class="">
                                        <input id="s-variety" name="variety" type="text" class="input"
                                            value="" maxlength="160">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-origin">محل تولید محصول <b class="req">*</b></label>
                                    <small class="hint">استان / شهر / روستا</small>
                                    <div class="">
                                        <input id="s-origin" name="origin" type="text" class="input" data-label="منشأ"
                                            value="" required data-req maxlength="190">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-quantity_tons">مقدار بار قابل تأمین <b class="req">*</b></label>
                                    <div class="unit-wrap">
                                        <input id="s-quantity_tons" name="quantity_tons" type="number" class="input" data-label="مقدار"
                                            value="" required data-req min="0.1" step="any"
                                            inputmode="decimal">
                                        <em class="unit">تن</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">میزان تأمین شما چگونه است؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="single"><span>یک محموله</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="daily"><span>روزانه</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="weekly"><span>هفتگی</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="monthly"><span>ماهانه</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="season"><span>کل فصل برداشت</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w" data-if="frequency:daily,weekly,monthly,season">
                                    <label for="s-capacity">در صورت تأمین مستمر، ظرفیت تقریبی</label>
                                    <small class="hint">تن در روز / هفته / ماه</small>
                                    <div class="">
                                        <input id="s-capacity" name="capacity" type="text" class="input"
                                            value="" maxlength="120">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-ready_from">زمان شروع برداشت / آماده بودن بار <b
                                            class="req">*</b></label>
                                    <div class="">
                                        <input id="s-ready_from" name="ready_from" type="date" class="input" data-label="آماده از تاریخ"
                                            value="" required data-req>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-ready_until">تا چه زمانی امکان تأمین دارید؟</label>
                                    <div class="">
                                        <input id="s-ready_until" name="ready_until" type="date" class="input"
                                            value="">
                                    </div>
                                </div>
                            </div>
                        </section>

                        

<section class="ssec" id="s-quality" data-step-section="2" hidden>
                            <div class="ssec-h"><span class="num">۰۳</span>
                                <h2>مشخصات و کیفیت بار</h2>
                            </div>
                            <div class="sgrid">
                                <fieldset class="field w">
                                    <legend class="legend">درجه کیفی محصول</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="grade"
                                                value="premium"><span>ممتاز / صادراتی</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="grade1"><span>درجه یک</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="grade2"><span>درجه دو</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="inspect"><span>نیازمند بررسی</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w">
                                    <label for="s-size">سایز یا کالیبر محصول</label>
                                    <div class="">
                                        <input id="s-size" name="size" type="text" class="input"
                                            value="" maxlength="120">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">محصول سورت شده است؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="yes"><span>بله</span></label>
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="no"><span>خیر</span></label>
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="possible"><span>امکان سورت وجود دارد</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">وضعیت محصول</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="state"
                                                value="fresh"><span>تازه برداشت‌شده</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="on_tree"><span>روی درخت / مزرعه</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="ready_harvest"><span>آماده برداشت</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="cold_storage"><span>در سردخانه</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="ready_load"><span>آماده بارگیری</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">آیا امکان بازدید از محصول یا محل تولید وجود دارد؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="visit"
                                                value="yes"><span>بله</span></label>
                                        <label class="chip"><input type="radio" name="visit"
                                                value="no"><span>خیر</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>

                        

<section class="ssec" id="s-packaging" data-step-section="3" hidden>
                            <div class="ssec-h"><span class="num">۰۴</span>
                                <h2>بسته‌بندی</h2>
                            </div>
                            <div class="sgrid">
                                <fieldset class="field w">
                                    <legend class="legend">وضعیت فعلی محصول</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="packing"
                                                value="bulk"><span>فله</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="basket"><span>سبد</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="carton"><span>کارتن</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="export"><span>بسته‌بندی صادراتی</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="other"><span>سایر</span></label>
                                    </div>
                                </fieldset>
                                <div class="field">
                                    <label for="s-pack_weight">وزن هر بسته / کارتن</label>
                                    <div class="unit-wrap">
                                        <input id="s-pack_weight" name="pack_weight" type="number" class="input"
                                            value="" min="0" step="any" inputmode="decimal">
                                        <em class="unit">کیلوگرم</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">آیا امکان بسته‌بندی طبق درخواست شرکت وجود دارد؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="yes"><span>بله</span></label>
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="no"><span>خیر</span></label>
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="coordinate"><span>نیاز به هماهنگی دارد</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">آیا امکان تغییر کارتن، وزن یا نوع بسته‌بندی وجود دارد؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="change_pack"
                                                value="yes"><span>بله</span></label>
                                        <label class="chip"><input type="radio" name="change_pack"
                                                value="no"><span>خیر</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>

                        

<section class="ssec" id="s-price" data-step-section="4" hidden>
                            <div class="ssec-h"><span class="num">۰۵</span>
                                <h2>قیمت و شرایط فروش</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-price">قیمت پیشنهادی شما</label>
                                    <div class="unit-wrap">
                                        <input id="s-price" name="price" type="number" class="input"
                                            value="" min="0" step="any" inputmode="decimal">
                                        <em class="unit">تومان / کیلوگرم</em>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-payment_terms">نحوه تسویه پیشنهادی</label>
                                    <div class="">
                                        <input id="s-payment_terms" name="payment_terms" type="text" class="input"
                                            value="" maxlength="190">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">قیمت مربوط به چه شرایطی است؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="farm"><span>تحویل در محل تولید</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="cold_storage"><span>تحویل سردخانه</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="agreed"><span>تحویل محل مورد توافق</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="negotiable"><span>قابل مذاکره</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>

                        

<section class="ssec" id="s-media" data-step-section="5" hidden>
                            <div class="ssec-h"><span class="num">۰۶</span>
                                <h2>تصاویر و ویدئوی محصول</h2>
                            </div>
                            <div class="sgrid">
                                <p class="tip w"><svg class="ic">
                                        <use href="#i-bulb" />
                                    </svg>برای بررسی بهتر، لطفاً تصاویر واقعی و جدید محصول را ارسال کنید.</p>
                                <div class="field w">
                                    <label for="s-photos">آپلود عکس محصول <b class="req">*</b></label>
                                    <small class="hint">حداکثر ۸ عکس، هر عکس تا ۸ مگابایت (JPG، PNG، WebP)</small>
                                    <div class="drop"><input type="file" id="s-photos" name="photos[]" data-label="عکس‌ها"
                                            accept="image/jpeg,image/png,image/webp" multiple data-req><svg
                                            class="ic">
                                            <use href="#i-image" />
                                        </svg>افزودن تصاویر</div>
                                    <div class="thumbs"></div>
                                </div>
                                <div class="field w">
                                    <label for="s-packaging_photos">آپلود عکس بسته‌بندی</label>
                                    <small class="hint">حداکثر ۸ عکس، هر عکس تا ۸ مگابایت (JPG، PNG، WebP)</small>
                                    <div class="drop"><input type="file" id="s-packaging_photos"
                                            name="packaging_photos[]" accept="image/jpeg,image/png,image/webp"
                                            multiple><svg class="ic">
                                            <use href="#i-box" />
                                        </svg>افزودن تصاویر</div>
                                    <div class="thumbs"></div>
                                </div>
                                <div class="field w">
                                    <label for="s-video">آپلود ویدئوی کوتاه از بار</label>
                                    <small class="hint">حداکثر ۵۰ مگابایت (MP4، MOV، WebM)</small>
                                    <div class="drop"><input type="file" id="s-video" name="video"
                                            accept="video/mp4,video/quicktime,video/webm"><svg class="ic">
                                            <use href="#i-video" />
                                        </svg>افزودن ویدئو</div>
                                    <div class="thumbs"></div>
                                </div>
                                <p class="tip w"><svg class="ic">
                                        <use href="#i-sprout" />
                                    </svg>در صورت امکان، یک تصویر کلی از مزرعه، باغ، گلخانه یا محل نگهداری محصول نیز ارسال
                                    کنید.</p>
                            </div>
                        </section>

                        

<section class="ssec" id="s-history" data-step-section="6" hidden>
                            <div class="ssec-h"><span class="num">۰۷</span>
                                <h2>سابقه فعالیت</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-years">چند سال در زمینه این محصول فعالیت دارید؟</label>
                                    <div class="unit-wrap">
                                        <input id="s-years" name="years" type="number" class="input"
                                            value="" min="0" max="100" step="1"
                                            inputmode="numeric">
                                        <em class="unit">سال</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">آیا سابقه فروش محصول برای صادرات دارید؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="export_history"
                                                value="yes"><span>بله</span></label>
                                        <label class="chip"><input type="radio" name="export_history"
                                                value="no"><span>خیر</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w" data-if="export_history:yes">
                                    <label for="s-export_markets">سابقه صادرات به چه کشورها یا بازارهایی؟</label>
                                    <small class="hint">در صورت پاسخ بله</small>
                                    <div class="">
                                        <input id="s-export_markets" name="export_markets" type="text" class="input"
                                            value="" maxlength="190">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">آیا امکان تأمین مستمر و همکاری بلندمدت دارید؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="yes"><span>بله</span></label>
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="no"><span>خیر</span></label>
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="seasonal"><span>بستگی به فصل محصول دارد</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>

                        

<section class="ssec" id="s-notes" data-step-section="7" hidden>
                            <div class="ssec-h"><span class="num">۰۸</span>
                                <h2>توضیحات تکمیلی</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field w">
                                    <label for="s-notes" class="sr">توضیحات تکمیلی</label>
                                    <p class="hint" style="font-size: .9rem">اگر اطلاعات دیگری درباره محصول، ظرفیت
                                        تولید، کیفیت، شرایط فروش یا نحوه همکاری دارید، اینجا بنویسید.</p>
                                    <textarea id="s-notes" name="notes" class="input" rows="5" maxlength="4000"></textarea>
                                </div>
                                <div class="field w">
                                    <label class="check" style="display: flex; align-items: center; gap: 8px;"><input type="checkbox" style="margin: 0;" name="confirm" value="1"
                                            data-req>تأیید می‌کنم اطلاعات و تصاویر ارسال‌شده مربوط به محصول معرفی‌شده بوده و
                                        تا حد اطلاع من صحیح است.</label>
                                </div>
                            </div>
                        </section>

                        

<div class="ssubmit">
                            <div style="display: flex; gap: 12px; align-items: center;">
                                <button type="button" class="btn" data-prev-step style="flex: 1;">بازگشت</button>
                                <button type="button" class="btn btn-leaf" data-next-step style="flex: 1;">بعدی</button>
                                <button type="submit" class="btn btn-leaf" data-submit-step style="flex: 1;">ارسال</button>
                            </div>
                            </p>
                            <p>پس از ثبت فرم، اطلاعات توسط تیم شرکت ندیمی بررسی شده و در صورت تناسب محصول با نیاز مجموعه،
                                جهت ادامه همکاری با شما تماس گرفته خواهد شد.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
