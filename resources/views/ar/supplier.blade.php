@extends('layouts.ar.master')

@section('title')
    نموذج التعاون مع الموردين | إكسبرس نديمي
@endsection

@section('description')
    المزارعون وأصحاب البساتين ومزارعو البيوت المحمية والموردون: سجّلوا منتجاتكم للتصدير مع نديمي.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('supplier', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('supplier', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('supplier', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('supplier', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('supplier', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="إكسبرس نديمي">
    <meta property="og:title" content="نموذج التعاون مع الموردين | إكسبرس نديمي">
    <meta property="og:description"
        content="المزارعون وأصحاب البساتين ومزارعو البيوت المحمية والموردون: سجّلوا منتجاتكم للتصدير مع نديمي.">
    <meta property="og:url" content="{{ route('supplier', ['lang' => 'ar']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="ar_OM">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","إكسبرس نديمي"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead phead-panel">
            <div class="container">
                <div class="phead-in phead-sup">
                    <div>
                        <nav class="crumbs" aria-label="Breadcrumb"><a
                                href="{{ route('home', ['lang' => 'ar']) }}">الرئيسية</a><i></i><span aria-current="page">كن
                                مورّداً</span></nav>
                        <span class="label">المزارعون وأصحاب البساتين ومزارعو البيوت المحمية وموردو المنتجات
                            الزراعية</span>
                        <h1 class="display" style="margin-top: 16px">نموذج التعاون مع الموردين</h1>
                        <p>شركة نديمي مستعدة للتعاون مع المزارعين وأصحاب البساتين والبيوت المحمية ومخازن التبريد والموردين
                            الموثوقين في إيران. إذا كان لديكم منتج يناسب أسواق التصدير، فعبّئوا النموذج أدناه ببيانات دقيقة
                            لنتواصل معكم بعد دراسة العينات والجودة والطاقة التوريدية والتغليف وشروط التعاون.</p>
                        <ol class="sflow">
                            <li><span class="ic-wrap"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>إرسال النموذج</li>
                            <li><span class="ic-wrap"><svg class="ic">
                                        <use href="#i-search" />
                                    </svg></span>مراجعة المعلومات والصور</li>
                            <li><span class="ic-wrap"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>اتصال الخبراء بكم</li>
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
                            <span data-pct>0%</span>
                        </div>
                        <small>المرحلة <span data-step-num>1</span> من 8<br>الحقول المميزة بنجمة مطلوبة.</small>
                    </div>
                    <nav class="ssteps" aria-label="نموذج التعاون مع الموردين">
                        <button type="button" class="sstep" data-step="0"><b>1</b><span>المعلومات الشخصية والتواصل</span></button>
                        <button type="button" class="sstep" data-step="1"><b>2</b><span>معلومات المنتج</span></button>
                        <button type="button" class="sstep" data-step="2"><b>3</b><span>مواصفات الحمولة وجودتها</span></button>
                        <button type="button" class="sstep" data-step="3"><b>4</b><span>التعبئة</span></button>
                        <button type="button" class="sstep" data-step="4"><b>5</b><span>السعر وشروط البيع</span></button>
                        <button type="button" class="sstep" data-step="5"><b>6</b><span>صور المنتج والفيديو</span></button>
                        <button type="button" class="sstep" data-step="6"><b>7</b><span>سجل الخبرة</span></button>
                        <button type="button" class="sstep" data-step="7"><b>8</b><span>ملاحظات إضافية</span></button>
                    </nav>
                </aside>

                <div>

                    <form method="post" action="" enctype="multipart/form-data" novalidate data-supplier
                        data-busy-text="جارٍ الإرسال…" data-multistep>
                        <!-- backend: set action + @@csrf -->

                        <section class="ssec" id="s-personal" data-step-section="0">
                            <div class="ssec-h"><span class="num">01</span>
                                <h2>المعلومات الشخصية والتواصل</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-name">الاسم الكامل <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-name" name="name" type="text" class="input"
                                            value="" required data-req maxlength="120" autocomplete="name">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-mobile">رقم الجوال <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-mobile" name="mobile" type="tel" class="input"
                                            value="" required data-req maxlength="40" inputmode="tel"
                                            autocomplete="tel">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-whatsapp">رقم واتساب</label>
                                    <div class="">
                                        <input id="s-whatsapp" name="whatsapp" type="tel" class="input"
                                            value="" maxlength="40" inputmode="tel">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-province">المحافظة <b class="req">*</b></label>
                                    <select id="s-province" name="province" class="input" required data-req>
                                        <option value="">اختر المحافظة</option>
                                        <option value="east_azerbaijan">أذربيجان الشرقية</option>
                                        <option value="west_azerbaijan">أذربيجان الغربية</option>
                                        <option value="ardabil">أردبيل</option>
                                        <option value="isfahan">أصفهان</option>
                                        <option value="alborz">البرز</option>
                                        <option value="ilam">إيلام</option>
                                        <option value="bushehr">بوشهر</option>
                                        <option value="tehran">طهران</option>
                                        <option value="chaharmahal">جهارمحال وبختياري</option>
                                        <option value="south_khorasan">خراسان الجنوبية</option>
                                        <option value="razavi_khorasan">خراسان الرضوية</option>
                                        <option value="north_khorasan">خراسان الشمالية</option>
                                        <option value="khuzestan">خوزستان</option>
                                        <option value="zanjan">زنجان</option>
                                        <option value="semnan">سمنان</option>
                                        <option value="sistan">سيستان وبلوشستان</option>
                                        <option value="fars">فارس</option>
                                        <option value="qazvin">قزوين</option>
                                        <option value="qom">قم</option>
                                        <option value="kurdistan">كردستان</option>
                                        <option value="kerman">كرمان</option>
                                        <option value="kermanshah">كرمانشاه</option>
                                        <option value="kohgiluyeh">كهكيلويه وبوير أحمد</option>
                                        <option value="golestan">گلستان</option>
                                        <option value="gilan">جيلان</option>
                                        <option value="lorestan">لرستان</option>
                                        <option value="mazandaran">مازندران</option>
                                        <option value="markazi">المركزية</option>
                                        <option value="hormozgan">هرمزجان</option>
                                        <option value="hamadan">همدان</option>
                                        <option value="yazd">يزد</option>
                                    </select>
                                </div>
                                <div class="field w">
                                    <label for="s-city">المدينة / منطقة الإنتاج <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-city" name="city" type="text" class="input"
                                            value="" required data-req maxlength="120">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">نوع نشاطكم <b class="req">*</b></legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="role" value="farmer"
                                                data-req><span>مزارع</span></label>
                                        <label class="chip"><input type="radio" name="role" value="orchard"
                                                data-req><span>صاحب بستان</span></label>
                                        <label class="chip"><input type="radio" name="role" value="greenhouse"
                                                data-req><span>مزارع بيوت محمية</span></label>
                                        <label class="chip"><input type="radio" name="role" value="producer"
                                                data-req><span>منتج</span></label>
                                        <label class="chip"><input type="radio" name="role" value="cold_storage"
                                                data-req><span>مشغّل مبرّد</span></label>
                                        <label class="chip"><input type="radio" name="role" value="wholesaler"
                                                data-req><span>مورّد / تاجر جملة</span></label>
                                        <label class="chip"><input type="radio" name="role" value="company"
                                                data-req><span>شركة زراعية</span></label>
                                        <label class="chip"><input type="radio" name="role" value="other"
                                                data-req><span>أخرى</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-product" data-step-section="1" hidden>
                            <div class="ssec-h"><span class="num">02</span>
                                <h2>معلومات المنتج</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-product">اسم المنتج <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-product" name="product" type="text" class="input"
                                            value="" required data-req maxlength="120">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-variety">الصنف / النوع</label>
                                    <small class="hint">مثال: طماطم البيوت المحمية، تفاح أحمر، نكتارين، كرز…</small>
                                    <div class="">
                                        <input id="s-variety" name="variety" type="text" class="input"
                                            value="" maxlength="160">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-origin">موقع إنتاج المنتج <b class="req">*</b></label>
                                    <small class="hint">المحافظة / المدينة / القرية</small>
                                    <div class="">
                                        <input id="s-origin" name="origin" type="text" class="input"
                                            value="" required data-req maxlength="190">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-quantity_tons">الكمية المتاحة للتوريد <b class="req">*</b></label>
                                    <div class="unit-wrap">
                                        <input id="s-quantity_tons" name="quantity_tons" type="number" class="input"
                                            value="" required data-req min="0.1" step="any"
                                            inputmode="decimal">
                                        <em class="unit">طن</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">كيف تتم عملية التوريد؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="single"><span>شحنة واحدة</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="daily"><span>يومياً</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="weekly"><span>أسبوعياً</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="monthly"><span>شهرياً</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="season"><span>موسم الحصاد كاملاً</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w" data-if="frequency:daily,weekly,monthly,season">
                                    <label for="s-capacity">السعة التقريبية عند التوريد المستمر</label>
                                    <small class="hint">طن في اليوم / الأسبوع / الشهر</small>
                                    <div class="">
                                        <input id="s-capacity" name="capacity" type="text" class="input"
                                            value="" maxlength="120">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-ready_from">بداية الحصاد / جاهزية الحمولة <b
                                            class="req">*</b></label>
                                    <div class="">
                                        <input id="s-ready_from" name="ready_from" type="date" class="input"
                                            value="" required data-req>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-ready_until">التوريد متاح حتى</label>
                                    <div class="">
                                        <input id="s-ready_until" name="ready_until" type="date" class="input"
                                            value="">
                                    </div>
                                </div>
                            </div>
                        </section>


                        <section class="ssec" id="s-quality" data-step-section="2" hidden>
                            <div class="ssec-h"><span class="num">03</span>
                                <h2>مواصفات الحمولة وجودتها</h2>
                            </div>
                            <div class="sgrid">
                                <fieldset class="field w">
                                    <legend class="legend">درجة جودة المنتج</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="grade"
                                                value="premium"><span>ممتاز / تصديري</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="grade1"><span>الدرجة الأولى</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="grade2"><span>الدرجة الثانية</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="inspect"><span>بحاجة إلى فحص</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w">
                                    <label for="s-size">حجم المنتج أو عياره</label>
                                    <div class="">
                                        <input id="s-size" name="size" type="text" class="input"
                                            value="" maxlength="120">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">هل المنتج مفروز؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="yes"><span>نعم</span></label>
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="no"><span>لا</span></label>
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="possible"><span>يمكن الفرز</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">حالة المنتج</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="state"
                                                value="fresh"><span>حصاد طازج</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="on_tree"><span>على الشجرة / في الحقل</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="ready_harvest"><span>جاهز للحصاد</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="cold_storage"><span>في المبرّد</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="ready_load"><span>جاهز للتحميل</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">هل يمكن زيارة المنتج أو موقع الإنتاج؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="visit"
                                                value="yes"><span>نعم</span></label>
                                        <label class="chip"><input type="radio" name="visit"
                                                value="no"><span>لا</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-packaging" data-step-section="3" hidden>
                            <div class="ssec-h"><span class="num">04</span>
                                <h2>التعبئة</h2>
                            </div>
                            <div class="sgrid">
                                <fieldset class="field w">
                                    <legend class="legend">حالة التعبئة الحالية</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="packing"
                                                value="bulk"><span>سائب</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="basket"><span>سلة</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="carton"><span>كرتون</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="export"><span>تعبئة تصديرية</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="other"><span>أخرى</span></label>
                                    </div>
                                </fieldset>
                                <div class="field">
                                    <label for="s-pack_weight">وزن كل عبوة / كرتونة</label>
                                    <div class="unit-wrap">
                                        <input id="s-pack_weight" name="pack_weight" type="number" class="input"
                                            value="" min="0" step="any" inputmode="decimal">
                                        <em class="unit">كغ</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">هل يمكنكم التعبئة وفق طلب الشركة؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="yes"><span>نعم</span></label>
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="no"><span>لا</span></label>
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="coordinate"><span>يحتاج إلى تنسيق</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">هل يمكن تغيير الكرتونة أو الوزن أو نوع التعبئة؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="change_pack"
                                                value="yes"><span>نعم</span></label>
                                        <label class="chip"><input type="radio" name="change_pack"
                                                value="no"><span>لا</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-price" data-step-section="4" hidden>
                            <div class="ssec-h"><span class="num">05</span>
                                <h2>السعر وشروط البيع</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-price">السعر المقترح</label>
                                    <div class="unit-wrap">
                                        <input id="s-price" name="price" type="number" class="input"
                                            value="" min="0" step="any" inputmode="decimal">
                                        <em class="unit">تومان / كغ</em>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-payment_terms">طريقة التسوية المقترحة</label>
                                    <div class="">
                                        <input id="s-payment_terms" name="payment_terms" type="text" class="input"
                                            value="" maxlength="190">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">ما شروط هذا السعر؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="farm"><span>التسليم في موقع الإنتاج</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="cold_storage"><span>التسليم في المبرّد</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="agreed"><span>التسليم في مكان متفق عليه</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="negotiable"><span>قابل للتفاوض</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-media" data-step-section="5" hidden>
                            <div class="ssec-h"><span class="num">06</span>
                                <h2>صور المنتج والفيديو</h2>
                            </div>
                            <div class="sgrid">
                                <p class="tip w"><svg class="ic">
                                        <use href="#i-bulb" />
                                    </svg>لمراجعة أفضل، يرجى إرسال صور حقيقية وحديثة للمنتج.</p>
                                <div class="field w">
                                    <label for="s-photos">صور المنتج <b class="req">*</b></label>
                                    <small class="hint">حتى 8 صور، كل صورة حتى 8 ميغابايت (JPG، PNG، WebP)</small>
                                    <div class="drop"><input type="file" id="s-photos" name="photos[]"
                                            accept="image/jpeg,image/png,image/webp" multiple data-req><svg
                                            class="ic">
                                            <use href="#i-image" />
                                        </svg>إضافة صور</div>
                                    <div class="thumbs"></div>
                                </div>
                                <div class="field w">
                                    <label for="s-packaging_photos">صور التعبئة</label>
                                    <small class="hint">حتى 8 صور، كل صورة حتى 8 ميغابايت (JPG، PNG، WebP)</small>
                                    <div class="drop"><input type="file" id="s-packaging_photos"
                                            name="packaging_photos[]" accept="image/jpeg,image/png,image/webp"
                                            multiple><svg class="ic">
                                            <use href="#i-box" />
                                        </svg>إضافة صور</div>
                                    <div class="thumbs"></div>
                                </div>
                                <div class="field w">
                                    <label for="s-video">فيديو قصير للحمولة</label>
                                    <small class="hint">حتى 50 ميغابايت (MP4، MOV، WebM)</small>
                                    <div class="drop"><input type="file" id="s-video" name="video"
                                            accept="video/mp4,video/quicktime,video/webm"><svg class="ic">
                                            <use href="#i-video" />
                                        </svg>إضافة فيديو</div>
                                    <div class="thumbs"></div>
                                </div>
                                <p class="tip w"><svg class="ic">
                                        <use href="#i-sprout" />
                                    </svg>إن أمكن، أرفقوا أيضاً صورة عامة للمزرعة أو البستان أو البيت المحمي أو مكان
                                    التخزين.</p>
                            </div>
                        </section>


                        <section class="ssec" id="s-history" data-step-section="6" hidden>
                            <div class="ssec-h"><span class="num">07</span>
                                <h2>سجل الخبرة</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-years">كم سنة عملتم في مجال هذا المنتج؟</label>
                                    <div class="unit-wrap">
                                        <input id="s-years" name="years" type="number" class="input"
                                            value="" min="0" max="100" step="1"
                                            inputmode="numeric">
                                        <em class="unit">سنة</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">هل لديكم سابقة في بيع المنتج للتصدير؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="export_history"
                                                value="yes"><span>نعم</span></label>
                                        <label class="chip"><input type="radio" name="export_history"
                                                value="no"><span>لا</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w" data-if="export_history:yes">
                                    <label for="s-export_markets">ما الدول أو الأسواق التي صدّرتم إليها؟</label>
                                    <small class="hint">في حال كانت الإجابة نعم</small>
                                    <div class="">
                                        <input id="s-export_markets" name="export_markets" type="text" class="input"
                                            value="" maxlength="190">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">هل يمكنكم التوريد المستمر والتعاون طويل الأمد؟</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="yes"><span>نعم</span></label>
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="no"><span>لا</span></label>
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="seasonal"><span>يعتمد على موسم المحصول</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-notes" data-step-section="7" hidden>
                            <div class="ssec-h"><span class="num">08</span>
                                <h2>ملاحظات إضافية</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field w">
                                    <label for="s-notes" class="sr">ملاحظات إضافية</label>
                                    <p class="hint" style="font-size: .9rem">إن كانت لديكم معلومات أخرى عن المنتج أو
                                        الطاقة الإنتاجية أو الجودة أو شروط البيع أو آلية التعاون، فاكتبوها هنا.</p>
                                    <textarea id="s-notes" name="notes" class="input" rows="5" maxlength="4000"></textarea>
                                </div>
                                <div class="field w">
                                    <label class="check"><input type="checkbox" name="confirm" value="1"
                                            data-req>أؤكد أن المعلومات والصور المرسلة تخص المنتج المذكور وأنها صحيحة بحسب
                                        علمي.</label>
                                </div>
                            </div>
                        </section>

                        <div class="ssubmit">
                            <div style="display: flex; gap: 12px; align-items: center;">
                                <button type="button" class="btn" data-prev-step style="flex: 1;">رجوع</button>
                                <button type="button" class="btn btn-leaf" data-next-step style="flex: 1;">التالي</button>
                                <button type="submit" class="btn btn-leaf" data-submit-step style="flex: 1; display: none;">إرسال</button>
                            </div>
                            <p class="notice notice-ok" data-upload-note hidden>جارٍ رفع الملفات… يرجى إبقاء الصفحة مفتوحة.
                            </p>
                            <p>بعد إرسال النموذج، سيراجع فريق نديمي المعلومات، وإذا ناسب المنتج احتياجاتنا فسيتم التواصل
                                معكم لمتابعة التعاون.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
