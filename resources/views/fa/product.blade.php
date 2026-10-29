@extends('layouts.fa.master')
@php
    $locale = app()->getLocale();

    $name = is_array($product->name)
        ? ($product->name[$locale] ?? $product->name['fa'] ?? $product->name['en'] ?? $product->slug)
        : ($product->name ?: $product->slug);

    $summary = is_array($product->summary)
        ? ($product->summary[$locale] ?? $product->summary['fa'] ?? $product->summary['en'] ?? '')
        : ($product->summary ?? '');

    $size = $product->size_translations[$locale]
        ?? $product->size_translations['fa']
        ?? $product->size
        ?? '';

    $packaging = $product->packaging_translations[$locale]
        ?? $product->packaging_translations['fa']
        ?? $product->packaging
        ?? '';

    $minOrder = $product->min_order_translations[$locale]
        ?? $product->min_order_translations['fa']
        ?? $product->min_order
        ?? '';

    $months = is_array($product->months)
        ? array_values($product->months)
        : [];

    $months = array_map(
        fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
        array_pad(array_slice($months, 0, 12), 12, false)
    );

    $activeMonths = count(array_filter($months));

    $image = $product->image ?: asset('assets/images/products/tomato-900.webp');

    $isOffSeason = $product->status === 'off_season';

    $categoryNames = [
    'vegetables' => [
        'fa' => 'صیفی‌جات',
        'en' => 'Vegetables',
        'ar' => 'الخضروات',
    ],
    'stone-fruits' => [
        'fa' => 'میوه‌های هسته‌دار',
        'en' => 'Stone Fruits',
        'ar' => 'الفواكه ذات النواة',
    ],
    'orchard-fruits' => [
        'fa' => 'میوه‌های باغی',
        'en' => 'Orchard Fruits',
        'ar' => 'فواكه البساتين',
    ],
    'citrus-melons' => [
        'fa' => 'مرکبات و جالیزی',
        'en' => 'Citrus & Melons',
        'ar' => 'الحمضيات والبطيخ',
    ],
];

$categoryName = $categoryNames[$product->category][$locale]
    ?? $categoryNames[$product->category]['fa']
    ?? 'محصولات';

    $monthNames = [
        'فروردین', 'اردیبهشت', 'خرداد', 'تیر',
        'مرداد', 'شهریور', 'مهر', 'آبان',
        'آذر', 'دی', 'بهمن', 'اسفند',
    ];
@endphp

@section('title')
    {{ $name }} | محصولات صادراتی اکسپرس ندیمی
@endsection

@section('description')
    {{ $summary ?: 'مشخصات، فصل عرضه و اطلاعات سفارش ' . $name . ' از اکسپرس ندیمی.' }}
@endsection

@section('meta')
    @php
        $locale = app()->getLocale();

        $name = is_array($product->name)
            ? ($product->name[$locale] ?? $product->name['fa'] ?? $product->name['en'] ?? $product->slug)
            : ($product->name ?: $product->slug);

        $summary = is_array($product->summary)
            ? ($product->summary[$locale] ?? $product->summary['fa'] ?? $product->summary['en'] ?? '')
            : ($product->summary ?? '');

        $image = $product->image ?: asset('assets/images/products/tomato-900.webp');

        $categoryNames = [
            'vegetables' => ['fa' => 'صیفی‌جات', 'en' => 'Vegetables', 'ar' => 'الخضروات'],
            'stone-fruits' => ['fa' => 'میوه‌های هسته‌دار', 'en' => 'Stone Fruits', 'ar' => 'الفواكه ذات النواة'],
            'orchard-fruits' => ['fa' => 'میوه‌های باغی', 'en' => 'Orchard Fruits', 'ar' => 'فواكه البساتين'],
            'citrus-melons' => ['fa' => 'مرکبات و جالیزی', 'en' => 'Citrus & Melons', 'ar' => 'الحمضيات والبطيخ'],
        ];

        $categoryName = $categoryNames[$product->category][$locale]
            ?? $categoryNames[$product->category]['en']
            ?? 'Products';

        $productUrl = route('product.show', [
            'lang' => $locale,
            'slug' => $product->slug,
        ]);

        $title = $name . ' | Express Nadimi';
        $description = \Illuminate\Support\Str::limit(strip_tags($summary), 160);
    @endphp

    <link rel="canonical" href="{{ $productUrl }}">

    @foreach (['en', 'fa', 'ar'] as $alternateLang)
        <link
            rel="alternate"
            hreflang="{{ $alternateLang }}"
            href="{{ route('product.show', ['lang' => $alternateLang, 'slug' => $product->slug]) }}"
        >
    @endforeach

    <link
        rel="alternate"
        hreflang="x-default"
        href="{{ route('product.show', ['lang' => 'en', 'slug' => $product->slug]) }}"
    >

    <meta name="description" content="{{ $description }}">

    <meta property="og:type" content="product">
    <meta property="og:site_name" content="اکسپرس ندیمی">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $productUrl }}">
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:locale" content="{{ ['fa' => 'fa_IR', 'ar' => 'ar_AR', 'en' => 'en_US'][$locale] ?? 'en_US' }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $image }}">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Nadimi International LLC',
            'alternateName' => ['Express Nadimi', 'اکسپرس ندیمی'],
            'url' => url('/'),
            'logo' => asset('assets/images/logo/nadimi-logo-512.png'),
            'telephone' => '+968 9948 2094',
            'address' => [
                [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Tabriz',
                    'addressCountry' => 'IR',
                ],
                [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Muscat',
                    'addressCountry' => 'OM',
                ],
            ],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $name,
            'description' => $description,
            'image' => $image,
            'category' => $categoryName,
            'brand' => [
                '@type' => 'Brand',
                'name' => 'Express Nadimi',
            ],
            'url' => $productUrl,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}
    </script>
@endsection
@section('content')
    <main id="main" tabindex="-1">
        <div class="container">
            <article class="pd">
                <div class="pd-media">
                    <img src="{{ $image }}" alt="{{ $name }}" width="900"
                         height="700" fetchpriority="high" decoding="async">
                </div>

                <div class="pd-info">
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'fa']) }}">خانه</a><i></i>
                        <a href="{{ route('products', ['lang' => 'fa']) }}">محصولات</a><i></i>
                        <a href="{{ route('products', [
    'lang' => $locale,
    'category' => $product->category,
]) }}">
                            {{ $categoryName }}
                        </a>
                    </nav>
                    <span class="dot-badge {{ $isOffSeason ? 'is-off' : 'is-available' }}">
    {{ $isOffSeason ? 'خارج از فصل' : 'موجود' }}
</span>
                    <h1 class="display">{{ $name }}</h1>
                    <p class="pd-summary">{{ $summary }}</p>

                    <div class="pd-season">
                        <p class="label" style="margin-bottom: 12px">
                            فصل صادرات ·
                            @if ($activeMonths === 12)
                                تمام سال
                            @elseif ($activeMonths === 0)
                                ماه عرضه مشخص نشده
                            @else
                                {{ $activeMonths }} ماه از سال
                            @endif
                        </p>

                        <ol class="season-bar" aria-hidden="true">
                            @foreach ($months as $month)
                                <li class="{{ $month ? 'on' : '' }}"></li>
                            @endforeach
                        </ol>

                        <div class="pd-months" aria-hidden="true">
                            @foreach ($monthNames as $monthName)
                                <span>{{ mb_substr($monthName, 0, 3, 'UTF-8') }}</span>
                            @endforeach
                        </div>
                    </div>

                    <dl class="specs">
                        <div>
                            <dt>سایز معمول</dt>
                            <dd>{{ $size ?: 'ثبت نشده' }}</dd>
                        </div>
                        <div>
                            <dt>بسته‌بندی</dt>
                            <dd>{{ $packaging ?: 'ثبت نشده' }}</dd>
                        </div>
                        <div>
                            <dt>حداقل سفارش</dt>
                            <dd>{{ $minOrder ?: 'ثبت نشده' }}</dd>
                        </div>
                    </dl>

                    <div class="pd-actions">
                        <a class="btn" href="#inquiry">استعلام قیمت<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </div>
                </div>
            </article>
        </div>

        <section class="section mint inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">
                <div class="inquiry-intro">
                    <span class="label">استعلام قیمت</span>

                    <h2 id="inquiry-h" class="h2" style="margin-top: 14px">
                        استعلام قیمت {{ $name }}
                    </h2>

                    <p class="lead">
                        محصول، مقدار و مقصد را بنویسید. معمولاً ظرف یک روز کاری پاسخ می‌دهیم.
                    </p>
                </div>

                <div class="waybill">
                    <div class="waybill-head">
                        <b>استعلام صادرات</b>
                        <span>پاسخ تا یک روز کاری</span>
                    </div>

                    <div class="waybill-body">
                        @if (session('success'))
                            <p
                                role="status"
                                style="padding:12px;margin-bottom:16px;border:1px solid #5D8060;border-radius:8px;color:#315C36"
                            >
                                {{ session('success') }}
                            </p>
                        @endif

                        @if ($errors->any())
                            <div
                                role="alert"
                                style="padding:12px;margin-bottom:16px;border:1px solid #c66;border-radius:8px;color:#a22"
                            >
                                لطفاً خطاهای فرم را بررسی و دوباره ارسال کنید.
                            </div>
                        @endif

                        <form
                            class="iform"
                            method="POST"
                            action="{{ route('product.post', ['lang' => $locale]) }}"
                            id="inquiry-form"
                            novalidate
                            data-busy-text="در حال ارسال…"
                        >
                            @csrf

                            <div class="iform-grid">
                                {{-- محصول --}}
                                <div class="field">
                                    <label for="iq-product">محصول مورد استعلام</label>

                                    <input
                                        id="iq-product"
                                        type="text"
                                        class="input"
                                        value="{{ $name }}"
                                        readonly
                                    >

                                    <input
                                        type="hidden"
                                        name="products[0][product]"
                                        value="{{ $product->slug }}"
                                    >

                                    @error('products.0.product')
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror

                                    @error('products')
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- مقدار --}}
                                <div class="field">
                                    <label for="iq-qty">
                                        مقدار <b class="req">*</b>
                                    </label>

                                    <input
                                        id="iq-qty"
                                        name="products[0][quantity]"
                                        class="input"
                                        required
                                        maxlength="80"
                                        value="{{ old('products.0.quantity') }}"
                                        placeholder="مثلاً یک کانتینر ۴۰ فوت، ۲۰ تن"
                                    >

                                    @error('products.0.quantity')
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- بسته‌بندی --}}
                                <div class="field">
                                    <label for="iq-pack">بسته‌بندی</label>

                                    <select
                                        id="iq-pack"
                                        name="products[0][packaging]"
                                        class="input"
                                    >
                                        <option value="">فرقی نمی‌کند</option>

                                        <option value="carton_5"
                                            @selected(old('products.0.packaging') === 'carton_5')>
                                            کارتن ۵ کیلویی
                                        </option>

                                        <option value="carton_10"
                                            @selected(old('products.0.packaging') === 'carton_10')>
                                            کارتن ۸ تا ۱۰ کیلویی
                                        </option>

                                        <option value="tray"
                                            @selected(old('products.0.packaging') === 'tray')>
                                            سینی تک‌لایه
                                        </option>

                                        <option value="crate"
                                            @selected(old('products.0.packaging') === 'crate')>
                                            سبد پلاستیکی
                                        </option>

                                        <option value="mesh_bag"
                                            @selected(old('products.0.packaging') === 'mesh_bag')>
                                            کیسه توری ۱۰ تا ۲۵ کیلویی
                                        </option>

                                        <option value="bulk"
                                            @selected(old('products.0.packaging') === 'bulk')>
                                            فله / باکس فله
                                        </option>

                                        <option value="punnet"
                                            @selected(old('products.0.packaging') === 'punnet')>
                                            ظرف ۰٫۵ تا ۱ کیلویی
                                        </option>

                                        <option value="private_label"
                                            @selected(old('products.0.packaging') === 'private_label')>
                                            با برند خریدار
                                        </option>
                                    </select>

                                    @error('products.0.packaging')
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- شرایط تحویل --}}
                                <div class="field">
                                    <label for="iq-inco">شرایط تحویل</label>

                                    <select
                                        id="iq-inco"
                                        name="incoterm"
                                        class="input"
                                        dir="ltr"
                                    >
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
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- مقصد --}}
                                <div class="field w" style="grid-column:1 / -1">
                                    <label for="iq-dest">
                                        کشور / بندر مقصد <b class="req">*</b>
                                    </label>

                                    <input
                                        id="iq-dest"
                                        name="destination"
                                        class="input"
                                        required
                                        maxlength="120"
                                        value="{{ old('destination') }}"
                                        placeholder="مثلاً عمان – مسقط"
                                    >

                                    @error('destination')
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- نام --}}
                                <div class="field">
                                    <label for="iq-name">
                                        نام شما <b class="req">*</b>
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
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- شرکت --}}
                                <div class="field">
                                    <label for="iq-co">شرکت</label>

                                    <input
                                        id="iq-co"
                                        name="company"
                                        class="input"
                                        maxlength="160"
                                        autocomplete="organization"
                                        value="{{ old('company') }}"
                                        placeholder="نام شرکت"
                                    >

                                    @error('company')
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- ایمیل --}}
                                <div class="field">
                                    <label for="iq-email">ایمیل</label>

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
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- تلفن --}}
                                <div class="field">
                                    <label for="iq-phone">تلفن / واتساپ</label>

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
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                {{-- توضیحات --}}
                                <div class="field" style="grid-column:1 / -1">
                                    <label for="iq-msg">
                                        توضیحات <span class="opt">(اختیاری)</span>
                                    </label>

                                    <textarea
                                        id="iq-msg"
                                        name="message"
                                        class="input"
                                        rows="3"
                                        maxlength="2000"
                                        placeholder="رقم، سایز، زمان تحویل…"
                                    >{{ old('message') }}</textarea>

                                    @error('message')
                                    <p class="field-error" style="color:red">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="iform-foot">
                                <p class="iform-hint">
                                    واردکردن ایمیل یا تلفن الزامی است؛ یکی از آن‌ها کافی است.
                                </p>

                                <button class="btn btn-leaf" type="submit">
                                    ارسال استعلام
                                    <svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg>
                                </button>
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
                       href="{{ route('products', [
       'lang' => $locale,
       'category' => $product->category,
   ]) }}">
                        {{ $categoryName }}
                        <svg class="ic flip">
                            <use href="#i-arrow" />
                        </svg>
                    </a>
                </div>
                <div class="pgrid related-pgrid">
                    @forelse ($relatedProducts as $p)
                        @php
                            $lang = 'fa';

                            $pname = is_array($p->name)
                                ? ($p->name[$lang] ?? $p->name['en'] ?? $p->slug)
                                : ($p->name ?: $p->slug);

                            $summary = is_array($p->summary)
                                ? ($p->summary[$lang] ?? $p->summary['en'] ?? '')
                                : ($p->summary ?? '');

                            $months = is_array($p->months)
                                ? array_values($p->months)
                                : [];

                            $months = array_map(
                                fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
                                array_pad(array_slice($months, 0, 12), 12, false)
                            );

                            $img = $p->image ?: asset('assets/images/products/tomato.jpg');

                            $status = $p->status === 'off_season' ? 'خارج از فصل' : 'موجود';

                            $statusClass = $p->status === 'off_season'
                                ? 'is-off'
                                : 'is-available';

                            $activeMonths = count(array_filter($months));
                        @endphp

                        <div class="related-product-item">
                            <article class="pcard">
                                <div class="pcard-media">
                                    <a href="{{ route('product.show', [
                        'lang' => 'fa',
                        'slug' => $p->slug,
                    ]) }}">
                                        <img
                                            src="{{ $img }}"
                                            alt="{{ $pname }}"
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
                                'lang' => 'fa',
                                'slug' => $p->slug,
                            ]) }}">
                                                {{ $pname }}
                                            </a>
                                        </h3>

                                        <span class="dot-badge {{ $statusClass }}">
                            {{ $status }}
                        </span>
                                    </div>

                                    <p class="pcard-origin">{{ $summary }}</p>

                                    <div
                                        class="season"
                                        role="img"
                                        aria-label="ماه‌های موجود بودن {{ $pname }}"
                                    >
                                        <ol class="season-bar" aria-hidden="true">
                                            @foreach ($months as $on)
                                                <li class="{{ $on ? 'on' : '' }}"></li>
                                            @endforeach
                                        </ol>

                                        <span class="season-label">
                            @if ($activeMonths === 12)
                                                موجود در تمام سال
                                            @elseif ($activeMonths === 0)
                                                ماه موجودی مشخص نشده
                                            @else
                                                موجود در {{ $activeMonths }} ماه از سال
                                            @endif
                        </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @empty
                        <p>در حال حاضر محصول دیگری در این دسته ثبت نشده است.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
