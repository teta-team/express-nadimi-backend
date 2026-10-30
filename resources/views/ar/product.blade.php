@extends('layouts.ar.master')

@php
    $locale = 'ar';

    /*
    |--------------------------------------------------------------------------
    | Product data
    |--------------------------------------------------------------------------
    */

    $name = is_array($product->name)
        ? ($product->name[$locale] ?? $product->name['fa'] ?? $product->name['en'] ?? $product->slug)
        : ($product->name ?: $product->slug);

    $summary = is_array($product->summary)
        ? ($product->summary[$locale] ?? $product->summary['fa'] ?? $product->summary['en'] ?? '')
        : ($product->summary ?? '');

    $sizeTranslations = $product->size_translations ?? [];
    $packagingTranslations = $product->packaging_translations ?? [];
    $minOrderTranslations = $product->min_order_translations ?? [];

    $size = (is_array($sizeTranslations) ? ($sizeTranslations[$locale] ?? $sizeTranslations['fa'] ?? null) : null)
        ?? $product->size
        ?? '';

    $packaging = (is_array($packagingTranslations) ? ($packagingTranslations[$locale] ?? $packagingTranslations['fa'] ?? null) : null)
        ?? $product->packaging
        ?? '';

    $minOrder = (is_array($minOrderTranslations) ? ($minOrderTranslations[$locale] ?? $minOrderTranslations['fa'] ?? null) : null)
        ?? $product->min_order
        ?? '';

    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    */

    $categoryNames = [
        'vegetables' => [
            'ar' => 'الخضروات',
            'en' => 'Vegetables',
            'fa' => 'صیفی‌جات',
        ],
        'stone-fruits' => [
            'ar' => 'الفواكه ذات النواة',
            'en' => 'Stone Fruits',
            'fa' => 'میوه‌های هسته‌دار',
        ],
        'orchard-fruits' => [
            'ar' => 'فواكه البساتين',
            'en' => 'Orchard Fruits',
            'fa' => 'میوه‌های باغی',
        ],
        'citrus-melons' => [
            'ar' => 'الحمضيات والبطيخ',
            'en' => 'Citrus & Melons',
            'fa' => 'مرکبات و جالیزی',
        ],
    ];

    $categoryName = $categoryNames[$product->category][$locale]
        ?? $categoryNames[$product->category]['en']
        ?? 'المنتجات';

    /*
    |--------------------------------------------------------------------------
    | Product image
    |--------------------------------------------------------------------------
    */

    $image = $product->image ?: 'assets/images/products/tomato-900.webp';

    if (
        !str_starts_with($image, 'http://') &&
        !str_starts_with($image, 'https://')
    ) {
        $image = asset(ltrim($image, '/'));
    }

    /*
    |--------------------------------------------------------------------------
    | Availability months
    |--------------------------------------------------------------------------
    */

    $rawMonths = $product->months;

    if (is_string($rawMonths)) {
        $decodedMonths = json_decode($rawMonths, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedMonths)) {
            $rawMonths = $decodedMonths;
        }
    }

    $months = is_array($rawMonths) ? array_values($rawMonths) : [];

    $months = array_map(
        fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
        array_pad(array_slice($months, 0, 12), 12, false)
    );

    $activeMonths = count(array_filter($months));

    $isOffSeason = $product->status === 'off_season';
    $isAvailable = !$isOffSeason && $activeMonths > 0;

    $monthNames = [
        'ينا', 'فبر', 'مار', 'أبر',
        'ماي', 'يون', 'يول', 'أغس',
        'سبت', 'أكت', 'نوف', 'ديس',
    ];

    $currentMonth = (int) now()->format('n');

    $seasonLabel = match (true) {
        $activeMonths === 12 => 'متوفر طوال العام',
        $activeMonths === 0 => 'لم تُحدد أشهر التوفر',
        default => 'متوفر خلال ' . $activeMonths . ' شهرًا من السنة',
    };

    /*
    |--------------------------------------------------------------------------
    | SEO
    |--------------------------------------------------------------------------
    */

    $productUrl = route('product.show', [
        'lang' => $locale,
        'slug' => $product->slug,
    ]);

    $title = $name . ' للتصدير من إيران | إكسبرس نديمي';

    $description = \Illuminate\Support\Str::limit(
        trim(strip_tags($summary)) ?: 'مواصفات وموسم التوريد ومعلومات طلب ' . $name . ' من إكسبرس نديمي.',
        160
    );

    $alternateUrls = [
        'en' => route('product.show', ['lang' => 'en', 'slug' => $product->slug]),
        'fa' => route('product.show', ['lang' => 'fa', 'slug' => $product->slug]),
        'ar' => route('product.show', ['lang' => 'ar', 'slug' => $product->slug]),
    ];

    /*
    |--------------------------------------------------------------------------
    | Related products
    |--------------------------------------------------------------------------
    */

    $relatedProducts = $relatedProducts ?? collect();
@endphp

@php
    $crumbs = [
        ['الرئيسية', route('home', ['lang' => 'ar'])],
        ['المنتجات', route('products', ['lang' => 'ar'])],
        [$categoryName, route('products', ['lang' => 'ar', 'category' => $product->category])],
        [$name, $productUrl],
    ];
    $productSchema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Product',
        '@id'      => $productUrl . '#product',
        'name'        => $name,
        'description' => $description,
        'image'       => [$image],
        'category'    => $categoryName,
        'sku'         => (string) $product->slug,
        'brand'       => ['@type' => 'Brand', 'name' => 'Nadimi International'],
        'url'         => $productUrl,
    ];
@endphp

@section('title', $title)
@section('description', $description)
@section('canonical', $productUrl)
@section('og_type', 'product')
@section('og_image', $image)
@section('og_image_alt', $name)

@section('meta')
    @foreach ($alternateUrls as $alternateLang => $alternateUrl)
        <link rel="alternate" hreflang="{{ $alternateLang }}" href="{{ $alternateUrl }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ $alternateUrls['en'] }}">
    @include('partials.seo-schema', ['lang' => 'ar', 'crumbs' => $crumbs])
    <script type="application/ld+json">{!! json_encode($productSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">

        {{-- Product details --}}
        <div class="container">
            <article class="pd">

                <div class="pd-media">
                    <img
                        src="{{ $image }}"
                        alt="{{ $name }}"
                        width="900"
                        height="700"
                        fetchpriority="high"
                        decoding="async"
                    >
                </div>

                <div class="pd-info">

                    <nav class="crumbs" aria-label="مسار التنقل">
                        <a href="{{ route('home', ['lang' => $locale]) }}">الرئيسية</a>
                        <i></i>

                        <a href="{{ route('products', ['lang' => $locale]) }}">المنتجات</a>
                        <i></i>

                        <a href="{{ route('products', ['lang' => $locale, 'category' => $product->category]) }}">
                            {{ $categoryName }}
                        </a>
                    </nav>

                    <span class="dot-badge {{ $isAvailable ? 'is-available' : 'is-off' }}">
                        {{ $isAvailable ? 'متوفر' : 'خارج الموسم' }}
                    </span>

                    <h1 class="display">{{ $name }}</h1>

                    @if ($summary !== '')
                        <p class="pd-summary">{{ $summary }}</p>
                    @endif

                    {{-- Export season --}}
                    <div class="pd-season">

                        <p class="label" style="margin-bottom: 12px">
                            موسم التصدير ·
                            @if ($activeMonths === 12)
                                طوال العام
                            @elseif ($activeMonths === 0)
                                لم تُحدد أشهر التوفر
                            @else
                                {{ $activeMonths }} شهرًا من السنة
                            @endif
                        </p>

                        <ol class="season-bar" aria-hidden="true">
                            @foreach ($months as $index => $isActive)
                                <li class="{{ $isActive ? 'on' : '' }} {{ ($index + 1) === $currentMonth && $isActive ? 'now' : '' }}"></li>
                            @endforeach
                        </ol>

                        <div class="pd-months" aria-hidden="true">
                            @foreach ($monthNames as $monthName)
                                <span>{{ $monthName }}</span>
                            @endforeach
                        </div>

                    </div>

                    {{-- Product specifications --}}
                    <dl class="specs">

                        <div>
                            <dt>الحجم المعتاد</dt>
                            <dd dir="ltr" style="text-align: start">
                                {{ $size ?: 'غير محدد' }}
                            </dd>
                        </div>

                        <div>
                            <dt>التعبئة</dt>
                            <dd>{{ $packaging ?: 'غير محددة' }}</dd>
                        </div>

                        <div>
                            <dt>الحد الأدنى للطلب</dt>
                            <dd>{{ $minOrder ?: 'غير محدد' }}</dd>
                        </div>

                    </dl>

                    <div class="pd-actions">
                        <a class="btn" href="#inquiry">
                            اطلب السعر
                            <svg class="ic flip" aria-hidden="true">
                                <use href="#i-arrow" />
                            </svg>
                        </a>
                    </div>

                </div>
            </article>
        </div>

        {{-- Inquiry form --}}
        <section class="section mint inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">

                <div class="inquiry-intro">
                    <span class="label">اطلب عرض سعر</span>

                    <h2 id="inquiry-h" class="h2" style="margin-top: 14px">
                        اطلب سعر {{ $name }}
                    </h2>

                    <p class="lead">
                        أخبرنا بالكمية والتعبئة والوجهة. نرد عادةً خلال يوم عمل واحد.
                    </p>
                </div>

                <div class="waybill">

                    <div class="waybill-head">
                        <b>استفسار تصدير</b>
                        <span>الرد خلال يوم عمل واحد</span>
                    </div>

                    <div class="waybill-body">

                        @if (session('success'))
                            <p role="status"
                               style="padding:12px;margin-bottom:16px;border:1px solid #5D8060;border-radius:8px;color:#315C36">
                                {{ session('success') }}
                            </p>
                        @endif

                        <form
                            class="iform"
                            method="POST"
                            action="{{ route('product.post', ['lang' => $locale]) }}"
                            novalidate
                            data-busy-text="جارٍ الإرسال…"
                            id="inquiry-form"
                        >
                            @csrf

                            <div class="iform-grid">

                                {{-- Current product --}}
                                <div class="field">
                                    <label for="iq-product">المنتج</label>

                                    <input
                                        id="iq-product"
                                        type="text"
                                        class="input"
                                        value="{{ $name }}"
                                        readonly
                                    >

                                    <input
                                        type="hidden"
                                        name="product"
                                        value="{{ $product->slug }}"
                                    >

                                    @error('product')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Quantity --}}
                                <div class="field">
                                    <label for="iq-qty">
                                        الكمية <b class="req">*</b>
                                    </label>

                                    <input
                                        id="iq-qty"
                                        name="quantity"
                                        class="input"
                                        required
                                        maxlength="80"
                                        value="{{ old('quantity') }}"
                                        placeholder="مثلاً حاوية 40 قدماً، 20 طناً"
                                    >

                                    @error('quantity')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Packaging --}}
                                <div class="field">
                                    <label for="iq-pack">التعبئة</label>

                                    <select id="iq-pack" name="packaging" class="input">
                                        <option value="" @selected(old('packaging') === '')>
                                            بلا تفضيل
                                        </option>

                                        <option value="carton_5" @selected(old('packaging') === 'carton_5')>
                                            كرتونة 5 كغ
                                        </option>

                                        <option value="carton_10" @selected(old('packaging') === 'carton_10')>
                                            كرتونة 8–10 كغ
                                        </option>

                                        <option value="tray" @selected(old('packaging') === 'tray')>
                                            صينية بطبقة واحدة
                                        </option>

                                        <option value="crate" @selected(old('packaging') === 'crate')>
                                            صندوق بلاستيكي
                                        </option>

                                        <option value="mesh_bag" @selected(old('packaging') === 'mesh_bag')>
                                            كيس شبكي 10–25 كغ
                                        </option>

                                        <option value="bulk" @selected(old('packaging') === 'bulk')>
                                            سائب / صناديق كبيرة
                                        </option>

                                        <option value="punnet" @selected(old('packaging') === 'punnet')>
                                            علب 0.5–1 كغ
                                        </option>

                                        <option value="private_label" @selected(old('packaging') === 'private_label')>
                                            بعلامة المشتري
                                        </option>
                                    </select>

                                    @error('packaging')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Incoterm --}}
                                <div class="field">
                                    <label for="iq-inco">شرط التسليم</label>

                                    <select id="iq-inco" name="incoterm" class="input" dir="ltr">
                                        @foreach (['FOB', 'CFR', 'CIF', 'EXW', 'FCA', 'DAP'] as $term)
                                            <option
                                                value="{{ $term }}"
                                                @selected(old('incoterm', 'FOB') === $term)
                                            >
                                                {{ $term }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('incoterm')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Destination --}}
                                <div class="field w" style="grid-column: 1 / -1">
                                    <label for="iq-dest">
                                        بلد / ميناء الوجهة <b class="req">*</b>
                                    </label>

                                    <input
                                        id="iq-dest"
                                        name="destination"
                                        class="input"
                                        required
                                        maxlength="120"
                                        value="{{ old('destination') }}"
                                        placeholder="مثلاً عُمان – مسقط"
                                    >

                                    @error('destination')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Name --}}
                                <div class="field">
                                    <label for="iq-name">
                                        الاسم <b class="req">*</b>
                                    </label>

                                    <input
                                        id="iq-name"
                                        name="name"
                                        class="input"
                                        required
                                        maxlength="120"
                                        autocomplete="name"
                                        value="{{ old('name') }}"
                                    >

                                    @error('name')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Company --}}
                                <div class="field">
                                    <label for="iq-co">الشركة</label>

                                    <input
                                        id="iq-co"
                                        name="company"
                                        class="input"
                                        maxlength="160"
                                        autocomplete="organization"
                                        value="{{ old('company') }}"
                                        placeholder="اسم الشركة"
                                    >

                                    @error('company')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="field">
                                    <label for="iq-email">البريد الإلكتروني</label>

                                    <input
                                        id="iq-email"
                                        name="email"
                                        type="email"
                                        class="input"
                                        maxlength="190"
                                        autocomplete="email"
                                        value="{{ old('email') }}"
                                        placeholder="name@company.com"
                                    >

                                    @error('email')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Phone --}}
                                <div class="field">
                                    <label for="iq-phone">الهاتف / واتساب</label>

                                    <input
                                        id="iq-phone"
                                        name="phone"
                                        type="tel"
                                        class="input"
                                        maxlength="40"
                                        autocomplete="tel"
                                        inputmode="tel"
                                        value="{{ old('phone') }}"
                                        placeholder="+968 …"
                                    >

                                    @error('phone')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Notes --}}
                                <div class="field" style="grid-column: 1 / -1">
                                    <label for="iq-msg">
                                        ملاحظات <span class="opt">(اختياري)</span>
                                    </label>

                                    <textarea
                                        id="iq-msg"
                                        name="message"
                                        class="input"
                                        rows="3"
                                        maxlength="2000"
                                        placeholder="الصنف، الحجم، موعد التسليم…"
                                    >{{ old('message') }}</textarea>

                                    @error('message')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="iform-foot">
                                <p class="iform-hint">
                                    يكفي البريد الإلكتروني أو الهاتف، ويجب إدخال أحدهما.
                                </p>

                                <button class="btn btn-leaf" type="submit">
                                    أرسل الاستفسار
                                    <svg class="ic flip" aria-hidden="true">
                                        <use href="#i-arrow" />
                                    </svg>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>

        {{-- Related products --}}
        <section class="section" aria-labelledby="rel-h">
            <div class="container">

                <div class="sec-head sec-head-row">
                    <h2 id="rel-h" class="h2">المزيد من هذه الفئة</h2>

                    <a
                        class="link-arrow"
                        href="{{ route('products', ['lang' => $locale, 'category' => $product->category]) }}"
                    >
                        {{ $categoryName }}

                        <svg class="ic flip" aria-hidden="true">
                            <use href="#i-arrow" />
                        </svg>
                    </a>
                </div>

                @if ($relatedProducts->isNotEmpty())
                    <div class="rail">

                        @foreach ($relatedProducts as $relatedProduct)
                            @php
                                $relatedName = is_array($relatedProduct->name)
                                    ? ($relatedProduct->name[$locale] ?? $relatedProduct->name['fa'] ?? $relatedProduct->name['en'] ?? $relatedProduct->slug)
                                    : ($relatedProduct->name ?: $relatedProduct->slug);

                                $relatedSummary = is_array($relatedProduct->summary)
                                    ? ($relatedProduct->summary[$locale] ?? $relatedProduct->summary['fa'] ?? $relatedProduct->summary['en'] ?? '')
                                    : ($relatedProduct->summary ?? '');

                                $relatedImage = $relatedProduct->image ?: 'assets/images/products/tomato-480.webp';

                                if (
                                    !str_starts_with($relatedImage, 'http://') &&
                                    !str_starts_with($relatedImage, 'https://')
                                ) {
                                    $relatedImage = asset(ltrim($relatedImage, '/'));
                                }

                                $relatedRawMonths = $relatedProduct->months;

                                if (is_string($relatedRawMonths)) {
                                    $decodedRelatedMonths = json_decode($relatedRawMonths, true);

                                    if (json_last_error() === JSON_ERROR_NONE && is_array($decodedRelatedMonths)) {
                                        $relatedRawMonths = $decodedRelatedMonths;
                                    }
                                }

                                $relatedMonths = is_array($relatedRawMonths)
                                    ? array_values($relatedRawMonths)
                                    : [];

                                $relatedMonths = array_map(
                                    fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
                                    array_pad(array_slice($relatedMonths, 0, 12), 12, false)
                                );

                                $relatedActiveMonths = count(array_filter($relatedMonths));

                                $relatedAvailable =
                                    $relatedProduct->status !== 'off_season' &&
                                    $relatedActiveMonths > 0;

                                $relatedSeasonLabel = match (true) {
                                    $relatedActiveMonths === 12 => 'متوفر طوال العام',
                                    $relatedActiveMonths === 0 => 'لم تُحدد أشهر التوفر',
                                    default => 'متوفر خلال ' . $relatedActiveMonths . ' شهرًا',
                                };
                            @endphp

                            <article class="pcard">

                                <div class="pcard-media">
                                    <a
                                        href="{{ route('product.show', [
                                            'lang' => $locale,
                                            'slug' => $relatedProduct->slug,
                                        ]) }}"
                                        aria-label="عرض {{ $relatedName }}"
                                    >
                                        <img
                                            src="{{ $relatedImage }}"
                                            alt="{{ $relatedName }}"
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
                                            <a href="{{ route('product.show', [
                                                'lang' => $locale,
                                                'slug' => $relatedProduct->slug,
                                            ]) }}">
                                                {{ $relatedName }}
                                            </a>
                                        </h3>

                                        <span class="dot-badge {{ $relatedAvailable ? 'is-available' : 'is-off' }}">
                                            {{ $relatedAvailable ? 'متوفر' : 'خارج الموسم' }}
                                        </span>
                                    </div>

                                    @if ($relatedSummary !== '')
                                        <p class="pcard-origin">
                                            {{ \Illuminate\Support\Str::limit($relatedSummary, 90) }}
                                        </p>
                                    @endif

                                    <div
                                        class="season"
                                        role="img"
                                        aria-label="موسم {{ $relatedName }}: {{ $relatedSeasonLabel }}"
                                    >
                                        <ol class="season-bar" aria-hidden="true">
                                            @foreach ($relatedMonths as $index => $isActive)
                                                <li
                                                    class="{{ $isActive ? 'on' : '' }} {{ ($index + 1) === $currentMonth && $isActive ? 'now' : '' }}"
                                                    title="{{ $monthNames[$index] }}"
                                                ></li>
                                            @endforeach
                                        </ol>

                                        <span class="season-label">
                                            {{ $relatedSeasonLabel }}
                                        </span>
                                    </div>

                                </div>
                            </article>
                        @endforeach

                    </div>
                @else
                    <p>لا توجد منتجات أخرى مسجلة ضمن هذه الفئة حاليًا.</p>
                @endif

            </div>
        </section>

    </main>
@endsection
