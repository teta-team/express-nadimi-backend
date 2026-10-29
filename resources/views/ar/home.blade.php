@extends('layouts.ar.master')

@section('title')
    إكسبرس نديمي — تصدير الفواكه والخضروات الإيرانية الطازجة
@endsection

@section('description')
    تصدّر شركة نديمي بخبرة تزيد على 15 عاماً الفواكه والخضروات الإيرانية الطازجة إلى السوق العُماني وأسواق المنطقة، بحضور
    مباشر في سوق سلال، الجناح WMC04. اطلبوا سعر اليوم والمتوفر.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('home', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('home', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('home', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('home', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('home', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="إكسبرس نديمي">
    <meta property="og:title" content="إكسبرس نديمي — تصدير الفواكه والخضروات الإيرانية الطازجة">
    <meta property="og:description"
        content="تصدّر شركة نديمي بخبرة تزيد على 15 عاماً الفواكه والخضروات الإيرانية الطازجة إلى السوق العُماني وأسواق المنطقة، بحضور مباشر في سوق سلال، الجناح WMC04. اطلبوا سعر اليوم والمتوفر.">
    <meta property="og:url" content="{{ route('home', ['lang' => 'ar']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="ar_OM">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="preload" as="image" href="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}"
        fetchpriority="high">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","إكسبرس نديمي"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">

        <section class="hero">
            <div class="container hero-in">
                <div class="hero-copy">
                    <p class="label">نديمي إنترناشونال · سوق سلال – WMC04</p>
                    <h1 class="display">طازج من إيران، حاضرون في عُمان</h1>
                    <p class="hero-sub">تعمل شركة نديمي في توريد وتصدير الفواكه والخضروات الطازجة بخبرة تزيد على 15 عاماً في
                        الزراعة والتوريد وتجارة المنتجات الزراعية. من المزارع الإيرانية إلى السوق العُماني؛ جودة وثقة وتعاون
                        مستدام.</p>
                    <div class="hero-ctas">
                        <a class="btn" href="{{ route('products', ['lang' => 'ar']) }}">تصفّح المنتجات<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <a class="btn btn-line" href="#inquiry">طلب عرض سعر</a>
                    </div>
                    <ul class="hero-facts">
                        <li><b>15+</b><span>عاماً من الخبرة في الزراعة والتجارة</span></li>
                        <li><b>7</b><span>أسواق تصدير</span></li>
                        <li>
                            <b>{{ $products->count() }}+</b>
                            <span>صنفاً من الفواكه والخضروات</span>
                        </li>
                        <li><b>WMC04</b><span>جناحنا في سوق سلال بعُمان</span></li>
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
                    <h2 id="steps-h" class="h2">كيف نتعاون معكم</h2>
                    <p class="lead">يبدأ التعاون بدراسة احتياجاتكم ويستمر عبر التوريد ومراقبة الجودة والتغليف والشحن
                        والتسليم.</p>
                </div>
                <ol class="order-steps">
                    <li class="order-step">
                        <span class="order-n">1</span>
                        <h3>إرسال طلب الشراء</h3>
                        <p>أرسلوا نوع المنتج والكمية المطلوبة والحجم والدرجة ونوع التغليف والموعد عبر واتساب أو نموذج طلب
                            السعر.</p>
                        <a class="link-arrow" href="#inquiry">تعبئة النموذج<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                    <li class="order-step">
                        <span class="order-n">2</span>
                        <h3>الدراسة والعرض</h3>
                        <p>يدرس فريقنا المنتج المناسب بحسب احتياجاتكم والمتوفر وظروف السوق اليوم، ثم يقدّم المواصفات والصور
                            والتغليف والعرض التجاري.</p>
                        <a class="link-arrow" href="{{ route('contact', ['lang' => 'ar']) }}">التواصل مع المبيعات<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                    <li class="order-step">
                        <span class="order-n">3</span>
                        <h3>التوريد والشحن والتسليم</h3>
                        <p>بعد الاتفاق يُورَّد المنتج من منتجين مختارين، ويُفحص ويُغلَّف ويُشحن إلى عُمان، ثم تُتابَع عملية
                            العرض والتسليم في سوق سلال، الجناح WMC04.</p>
                        <a class="link-arrow" href="{{ route('about', ['lang' => 'ar']) }}#process-h">من المزرعة إلى
                            عُمان<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                </ol>
            </div>
        </section>

@include('partials.export-cinema')
        <section class="section" aria-labelledby="week-h">
            <div class="container">
                <div class="sec-head sec-head-row">
                    <div>
                        <h2 id="week-h" class="h2">ما المنتجات المتاحة هذا الأسبوع؟</h2>
                        <p class="lead">
                            تعرّفوا على منتجاتنا الزراعية ومواسم توريدها،
                            وتواصلوا معنا لمعرفة الأسعار والكميات المتاحة حالياً.
                        </p>
                    </div>

                    <a class="btn-all" href="{{ route('products', ['lang' => 'ar']) }}">
                        <span>جميع المنتجات ({{ $products->count() }})</span>

                        <span class="btn-all-ic" aria-hidden="true">
                    <svg class="ic flip">
                        <use href="#i-arrow" />
                    </svg>
                </span>
                    </a>
                </div>

                <div class="rail">
                    @forelse ($products as $p)
                        @php
                            $name = is_array($p->name)
                                ? ($p->name['ar'] ?? $p->name['en'] ?? $p->name['fa'] ?? $p->slug)
                                : ($p->name ?: $p->slug);

                            $summary = is_array($p->summary)
                                ? ($p->summary['ar'] ?? $p->summary['en'] ?? $p->summary['fa'] ?? '')
                                : ($p->summary ?? '');

                            $months = is_array($p->months)
                                ? array_values($p->months)
                                : [];

                            $months = array_map(
                                fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
                                array_pad(array_slice($months, 0, 12), 12, false)
                            );

                            $monthNames = [
                                'يناير', 'فبراير', 'مارس', 'أبريل',
                                'مايو', 'يونيو', 'يوليو', 'أغسطس',
                                'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر',
                            ];

                            $activeMonths = count(array_filter($months));
                            $isAvailable = $p->status === 'available';

                            $status = $isAvailable ? 'متوفر' : 'خارج الموسم';

                            $statusClass = $isAvailable
                                ? 'is-available'
                                : 'is-off';

                            $image = $p->image
                                ?: asset('assets/images/products/tomato.jpg');

                            $seasonLabel = $activeMonths === 12
                                ? 'طوال العام'
                                : ($activeMonths === 0
                                    ? 'لم يُحدَّد موسم التوريد'
                                    : implode('، ', array_map(
                                        fn ($index) => $monthNames[$index],
                                        array_keys(array_filter($months))
                                    )));
                        @endphp

                        <article class="pcard">
                            <div class="pcard-media">
                                <a
                                    href="{{ route('product.show', ['lang' => 'ar', 'slug' => $p->slug]) }}"
                                    aria-label="عرض المنتج {{ $name }}"
                                >
                                    <img
                                        src="{{ $image }}"
                                        alt="{{ $name }}"
                                        width="480"
                                        height="373"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </a>

                                <span class="pcard-go" aria-hidden="true">
                            <svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg>
                        </span>
                            </div>

                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title">
                                        <a href="{{ route('product.show', ['lang' => 'ar', 'slug' => $p->slug]) }}">
                                            {{ $name }}
                                        </a>
                                    </h3>

                                    <span class="dot-badge {{ $statusClass }}">
                                {{ $status }}
                            </span>
                                </div>

                                <p class="pcard-origin">
                                    {{ $summary }}
                                </p>

                                <div
                                    class="season"
                                    role="img"
                                    aria-label="موسم توريد {{ $name }}: {{ $seasonLabel }}"
                                >
                                    <ol class="season-bar" aria-hidden="true">
                                        @foreach ($months as $index => $on)
                                            <li
                                                class="{{ $on ? 'on' : '' }}"
                                                title="{{ $monthNames[$index] }}"
                                            ></li>
                                        @endforeach
                                    </ol>

                                    <span class="season-label">
                                {{ $seasonLabel }}
                            </span>
                                </div>
                            </div>
                        </article>
                    @empty
                        <p>لا توجد منتجات متاحة حالياً.</p>
                    @endforelse
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
                        <h2 id="why-h" class="h2">لماذا نديمي؟</h2>
                        <p class="lead">هدفنا ليس إتمام صفقة واحدة، بل بناء علاقات تجارية ثابتة وموثوقة مع عملائنا
                            وشركائنا.</p>
                    </div>
                    <ul class="why-list">
                        <li class="why-item">
                            <h3>أكثر من 15 عاماً من الخبرة</h3>
                            <p>الخبرة في الزراعة وتجارة المنتجات الزراعية هي أساس معرفتنا بالمنتج والسوق.</p>
                        </li>
                        <li class="why-item">
                            <h3>الصلة بمصادر التوريد</h3>
                            <p>التعاون مع المنتجين والموردين في إيران يتيح لنا دراسة وتوريد منتجات متنوعة.</p>
                        </li>
                        <li class="why-item">
                            <h3>حضور مباشر في عُمان</h3>
                            <p>وجودنا في سوق سلال – WMC04 يقرّبنا أكثر من السوق العُماني.</p>
                        </li>
                        <li class="why-item">
                            <h3>الاهتمام بالجودة</h3>
                            <p>الجودة والطزاجة والفرز والتغليف من المعايير الأساسية في فحص المنتجات.</p>
                        </li>
                    </ul>
                    <p class="markets-line"><svg class="ic">
                            <use href="#i-globe" />
                        </svg>خبرة تصدير إلى عُمان والإمارات والسعودية والبحرين وروسيا وأرمينيا وأذربيجان.</p>
                    <p class="more-wrap"><a class="more-link" href="{{ route('about', ['lang' => 'ar']) }}"><span>المزيد
                                عنّا</span><i class="more-ic" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></i></a></p>
                </div>
            </div>
        </section>


        <section class="section inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">
                <div class="inquiry-intro">
                    <h2 id="inquiry-h" class="h2">طلب عرض سعر</h2>
                    <p class="lead">للحصول على عرض، سجّلوا بيانات طلبكم. بعد استلامه يدرس فريق المبيعات شروط التوريد.</p>
                    <ul class="ticks">
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>الجودة</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>الطزاجة</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>الثبات</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>الموثوقية</li>
                    </ul>
                    <p style="margin-top: 24px"><a class="link-arrow" href="https://wa.me/989144172605" target="_blank"
                            rel="noopener"><svg class="ic">
                                <use href="#i-whatsapp" />
                            </svg>المبيعات عبر واتساب</a></p>
                </div>
                <div class="waybill">

                    <div class="waybill-head">

                        <b>استفسار تصدير</b>

                        <span>رد خلال يوم عمل</span>

                    </div>

                    <div class="waybill-body">





                        <form class="iform" method="POST"
                            action="{{ route('home.post', ['lang' => app()->getLocale()]) }}" novalidate
                            data-busy-text="جارٍ الإرسال…">
                            <!-- backend: set action + @@csrf -->

                            @csrf
                            <div class="iform-grid">

                                <div class="field">

                                    <label for="iq-product">المنتج</label>

                                    <select id="iq-product" name="product" class="input">
                                        <option value="" @selected(old('product', '') === '')>
                                            مختلط / عدة منتجات
                                        </option>

                                        @php
                                            $productCategories = [
                                                'vegetables' => 'الخضروات',
                                                'stone-fruits' => 'الفواكه ذات النواة',
                                                'orchard-fruits' => 'فواكه البساتين',
                                                'citrus-melons' => 'الحمضيات والبطيخ',
                                            ];
                                        @endphp

                                        @foreach ($productCategories as $category => $categoryLabel)
                                            @php
                                                $categoryProducts = $products->where('category', $category);
                                            @endphp

                                            @if ($categoryProducts->isNotEmpty())
                                                <optgroup label="{{ $categoryLabel }}">
                                                    @foreach ($categoryProducts as $p)
                                                        @php
                                                            $productName = is_array($p->name)
                                                                ? ($p->name['ar'] ?? $p->name['en'] ?? $p->name['fa'] ?? $p->slug)
                                                                : ($p->name ?: $p->slug);
                                                        @endphp

                                                        <option
                                                            value="{{ $p->slug }}"
                                                            @selected((string) old('product') === (string) $p->slug)
                                                        >
                                                            {{ $productName }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endif
                                        @endforeach
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


        <section class="supplier-strip">
            <div class="container supplier-strip-in">
                <p><svg class="ic">
                        <use href="#i-sprout" />
                    </svg>هل أنتم مزارعون أو موردون؟ سجّلوا منتجاتكم لدينا.</p>
                <a class="btn btn-line btn-sm" href="{{ route('supplier', ['lang' => 'ar']) }}">افتح نموذج الموردين<svg
                        class="ic flip">
                        <use href="#i-arrow" />
                    </svg></a>
            </div>
        </section>
    </main>
@endsection
