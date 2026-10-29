@extends('layouts.en.master')

@php
    $locale = 'en';

    /*
    |--------------------------------------------------------------------------
    | Current product
    |--------------------------------------------------------------------------
    */

    if (!isset($product) || !$product) {
        abort(404);
    }

    $localizedValue = function ($value, $fallback = '') use ($locale) {
        if (is_array($value)) {
            return $value[$locale]
                ?? $value['en']
                ?? $value['fa']
                ?? $value['ar']
                ?? $fallback;
        }

        return $value ?? $fallback;
    };

    $name = $localizedValue($product->name, 'Product');
    $summary = $localizedValue($product->summary, '');

    $size = $localizedValue($product->size, '—');
    $packaging = $localizedValue($product->packaging, '—');
    $minOrder = $localizedValue($product->min_order, '—');

    $category = is_string($product->category) ? $product->category : '';

    $categoryNames = [
        'vegetables' => 'Vegetables',
        'stone-fruits' => 'Stone fruits',
        'orchard-fruits' => 'Orchard fruits',
        'citrus-melons' => 'Citrus & melons',
    ];

    $categoryName = $categoryNames[$category] ?? 'Products';

    $categoryUrl = route('products', [
        'lang' => $locale,
        'category' => $category,
    ]);

    /*
    |--------------------------------------------------------------------------
    | Product image
    |--------------------------------------------------------------------------
    */

    $imagePath = $product->image ?: 'assets/images/products/tomato-900.webp';

    if (
        !str_starts_with($imagePath, 'http://') &&
        !str_starts_with($imagePath, 'https://')
    ) {
        $imagePath = asset(ltrim($imagePath, '/'));
    }

    /*
    |--------------------------------------------------------------------------
    | Product availability
    |--------------------------------------------------------------------------
    */

    $rawMonths = $product->months;

    if (is_string($rawMonths)) {
        $decodedMonths = json_decode($rawMonths, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedMonths)) {
            $rawMonths = $decodedMonths;
        }
    }

    $rawMonths = is_array($rawMonths) ? array_values($rawMonths) : [];

    $months = [];

    for ($i = 0; $i < 12; $i++) {
        $months[$i] = filter_var(
            $rawMonths[$i] ?? false,
            FILTER_VALIDATE_BOOLEAN
        );
    }

    $activeMonths = count(array_filter($months));

    $monthNames = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
    ];

    $currentMonth = (int) now()->format('n');

    $isOffSeason = $product->status === 'off_season';

    $seasonLabel = match (true) {
        $activeMonths === 12 => 'Year-round',
        $activeMonths === 0 => 'Currently unavailable',
        default => 'Seasonal availability',
    };

    $isAvailable = !$isOffSeason && $activeMonths > 0;

    $statusLabel = $isAvailable ? 'Available' : 'Off season';

    /*
    |--------------------------------------------------------------------------
    | SEO
    |--------------------------------------------------------------------------
    */

    $pageTitle = $name . ' for export from Iran | Express Nadimi';

    $pageDescription = trim(strip_tags($summary));

    if ($pageDescription === '') {
        $pageDescription = $name
            . ' for export from Iran by Express Nadimi. Contact us for export specifications, packaging and pricing.';
    }

    $productUrl = route('product.show', [
        'lang' => $locale,
        'slug' => $product->slug,
    ]);

    $alternateUrls = [
        'en' => route('product.show', [
            'lang' => 'en',
            'slug' => $product->slug,
        ]),
        'fa' => route('product.show', [
            'lang' => 'fa',
            'slug' => $product->slug,
        ]),
        'ar' => route('product.show', [
            'lang' => 'ar',
            'slug' => $product->slug,
        ]),
    ];

    /*
    |--------------------------------------------------------------------------
    | Related products
    |--------------------------------------------------------------------------
    */

    $relatedProducts = $relatedProducts ?? collect();

    if ($relatedProducts->isEmpty()) {
        $relatedProducts = \App\Models\Product::query()
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->where('hidden', false)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();
    }
@endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('description')
    {{ $pageDescription }}
@endsection

@section('meta')
    <link rel="canonical" href="{{ $productUrl }}">

    @foreach ($alternateUrls as $language => $url)
        <link rel="alternate" hreflang="{{ $language }}" href="{{ $url }}">
    @endforeach

    <link rel="alternate" hreflang="x-default" href="{{ $alternateUrls['en'] }}">

    <meta name="robots" content="index, follow">

    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Express Nadimi">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $productUrl }}">
    <meta property="og:image" content="{{ $imagePath }}">
    <meta property="og:locale" content="en_US">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $imagePath }}">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Nadimi International LLC',
            'alternateName' => 'Express Nadimi',
            'url' => url('/'),
            'logo' => asset('assets/images/logo/nadimi-logo-512.png'),
            'email' => 'info@nadimi.example',
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
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $name,
            'description' => $pageDescription,
            'image' => $imagePath,
            'category' => $categoryName,
            'brand' => [
                '@type' => 'Brand',
                'name' => 'Express Nadimi',
            ],
            'url' => $productUrl,
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}
    </script>
@endsection

@section('content')
    <main id="main" tabindex="-1">

        {{-- Product details --}}
        <div class="container">
            <article class="pd">

                <div class="pd-media">
                    <img
                        src="{{ $imagePath }}"
                        alt="{{ $name }}"
                        width="900"
                        height="700"
                        fetchpriority="high"
                        decoding="async"
                    >
                </div>

                <div class="pd-info">

                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => $locale]) }}">Home</a>
                        <i></i>

                        <a href="{{ route('products', ['lang' => $locale]) }}">Products</a>
                        <i></i>

                        <a href="{{ $categoryUrl }}">{{ $categoryName }}</a>
                    </nav>

                    <span class="dot-badge {{ $isAvailable ? 'is-available' : '' }}">
                        {{ $statusLabel }}
                    </span>

                    <h1 class="display">{{ $name }}</h1>

                    @if ($summary !== '')
                        <p class="pd-summary">{{ $summary }}</p>
                    @endif

                    {{-- Export season --}}
                    <div class="pd-season">

                        <p class="label" style="margin-bottom: 12px">
                            Export season · {{ $seasonLabel }}
                        </p>

                        <ol class="season-bar" aria-label="Export availability by month">
                            @foreach ($months as $index => $isActive)
                                <li
                                    class="{{ $isActive ? 'on' : '' }} {{ ($index + 1) === $currentMonth ? 'now' : '' }}"
                                    title="{{ $monthNames[$index] }}: {{ $isActive ? 'Available' : 'Unavailable' }}"
                                ></li>
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
                            <dt>Typical size</dt>
                            <dd dir="ltr" style="text-align: start">{{ $size }}</dd>
                        </div>

                        <div>
                            <dt>Packaging</dt>
                            <dd>{{ $packaging }}</dd>
                        </div>

                        <div>
                            <dt>Minimum order</dt>
                            <dd>{{ $minOrder }}</dd>
                        </div>

                    </dl>

                    <div class="pd-actions">
                        <a class="btn" href="#inquiry">
                            Request price
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
                    <span class="label">Price inquiry</span>

                    <h2 id="inquiry-h" class="h2" style="margin-top: 14px">
                        Request a quote for {{ $name }}
                    </h2>

                    <p class="lead">
                        Tell us the quantity, packaging and destination.
                        We usually respond within one working day.
                    </p>
                </div>

                <div class="waybill">
                    <div class="waybill-head">
                        <b>Export inquiry</b>
                        <span>Response within one working day</span>
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
                            action="{{ route('product.post', ['lang' => app()->getLocale()]) }}"
                            data-busy-text="Sending…"
                            id="inquiry-form"
                        >
                            @csrf

                            <div class="iform-grid">

                                <div class="field">
                                    <label for="iq-product">Product</label>

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

                                <div class="field">
                                    <label for="iq-qty">
                                        Quantity <b class="req">*</b>
                                    </label>

                                    <input
                                        id="iq-qty"
                                        name="quantity"
                                        class="input"
                                        required
                                        maxlength="80"
                                        value="{{ old('quantity') }}"
                                        placeholder="e.g. one 40 ft container, 20 tonnes"
                                    >

                                    @error('quantity')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="iq-pack">Packaging</label>

                                    <select id="iq-pack" name="packaging" class="input">
                                        <option value="">No preference</option>
                                        <option value="carton_5" @selected(old('packaging') === 'carton_5')>
                                            5 kg carton
                                        </option>
                                        <option value="carton_10" @selected(old('packaging') === 'carton_10')>
                                            8–10 kg carton
                                        </option>
                                        <option value="tray" @selected(old('packaging') === 'tray')>
                                            Single-layer tray
                                        </option>
                                        <option value="crate" @selected(old('packaging') === 'crate')>
                                            Plastic crate
                                        </option>
                                        <option value="mesh_bag" @selected(old('packaging') === 'mesh_bag')>
                                            10–25 kg mesh bag
                                        </option>
                                        <option value="bulk" @selected(old('packaging') === 'bulk')>
                                            Bulk / loose
                                        </option>
                                        <option value="punnet" @selected(old('packaging') === 'punnet')>
                                            0.5–1 kg punnet
                                        </option>
                                        <option value="private_label" @selected(old('packaging') === 'private_label')>
                                            Buyer's private label
                                        </option>
                                    </select>

                                    @error('packaging')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="iq-inco">Delivery terms</label>

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

                                <div class="field w" style="grid-column: 1 / -1">
                                    <label for="iq-dest">
                                        Destination country / port <b class="req">*</b>
                                    </label>

                                    <input
                                        id="iq-dest"
                                        name="destination"
                                        class="input"
                                        required
                                        maxlength="120"
                                        value="{{ old('destination') }}"
                                        placeholder="e.g. Oman – Muscat"
                                    >

                                    @error('destination')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="iq-name">
                                        Your name <b class="req">*</b>
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

                                <div class="field">
                                    <label for="iq-co">Company</label>

                                    <input
                                        id="iq-co"
                                        name="company"
                                        class="input"
                                        maxlength="160"
                                        autocomplete="organization"
                                        value="{{ old('company') }}"
                                        placeholder="Company name"
                                    >

                                    @error('company')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="iq-email">Email</label>

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

                                <div class="field">
                                    <label for="iq-phone">Phone / WhatsApp</label>

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

                                <div class="field" style="grid-column: 1 / -1">
                                    <label for="iq-msg">
                                        Notes <span class="opt">(optional)</span>
                                    </label>

                                    <textarea
                                        id="iq-msg"
                                        name="message"
                                        class="input"
                                        rows="3"
                                        maxlength="2000"
                                        placeholder="Variety, size, delivery date…"
                                    >{{ old('message') }}</textarea>

                                    @error('message')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="iform-foot">
                                <p class="iform-hint">
                                    An email address or phone number is required.
                                </p>

                                <button class="btn btn-leaf" type="submit">
                                    Send inquiry
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
                    <h2 id="rel-h" class="h2">More from this category</h2>

                    <a class="link-arrow" href="{{ $categoryUrl }}">
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
                                $relatedName = $localizedValue($relatedProduct->name, 'Product');
                                $relatedSummary = $localizedValue($relatedProduct->summary, '');

                                $relatedImage = $relatedProduct->image
                                    ?: 'assets/images/products/tomato-480.webp';

                                if (
                                    !str_starts_with($relatedImage, 'http://') &&
                                    !str_starts_with($relatedImage, 'https://')
                                ) {
                                    $relatedImage = asset(ltrim($relatedImage, '/'));
                                }

                                $relatedRawMonths = $relatedProduct->months;

                                if (is_string($relatedRawMonths)) {
                                    $decodedRelatedMonths = json_decode($relatedRawMonths, true);

                                    if (
                                        json_last_error() === JSON_ERROR_NONE &&
                                        is_array($decodedRelatedMonths)
                                    ) {
                                        $relatedRawMonths = $decodedRelatedMonths;
                                    }
                                }

                                $relatedRawMonths = is_array($relatedRawMonths)
                                    ? array_values($relatedRawMonths)
                                    : [];

                                $relatedMonths = [];

                                for ($i = 0; $i < 12; $i++) {
                                    $relatedMonths[$i] = filter_var(
                                        $relatedRawMonths[$i] ?? false,
                                        FILTER_VALIDATE_BOOLEAN
                                    );
                                }

                                $relatedActiveMonths = count(array_filter($relatedMonths));

                                $relatedAvailable =
                                    $relatedProduct->status !== 'off_season' &&
                                    $relatedActiveMonths > 0;

                                $relatedSeasonLabel = match (true) {
                                    $relatedActiveMonths === 12 => 'Year-round',
                                    $relatedActiveMonths === 0 => 'Currently unavailable',
                                    default => 'Seasonal availability',
                                };
                            @endphp

                            <article class="pcard">

                                <div class="pcard-media">
                                    <a
                                        href="{{ route('product.show', [
                                            'lang' => $locale,
                                            'slug' => $relatedProduct->slug,
                                        ]) }}"
                                        aria-label="View {{ $relatedName }}"
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

                                        <span class="dot-badge {{ $relatedAvailable ? 'is-available' : '' }}">
                                            {{ $relatedAvailable ? 'Available' : 'Off season' }}
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
                                        aria-label="Available for export in: {{ collect($relatedMonths)->filter()->keys()->map(fn ($index) => $monthNames[$index])->implode(', ') ?: 'No months' }}"
                                    >
                                        <ol class="season-bar" aria-hidden="true">
                                            @foreach ($relatedMonths as $index => $isActive)
                                                <li
                                                    class="{{ $isActive ? 'on' : '' }} {{ ($index + 1) === $currentMonth ? 'now' : '' }}"
                                                    title="{{ $monthNames[$index] }}: {{ $isActive ? 'Available' : 'Unavailable' }}"
                                                ></li>
                                            @endforeach
                                        </ol>
                                        <span class="season-label">
    @if ($relatedActiveMonths === 12)
                                                Available year-round (12 months)
                                            @elseif ($relatedActiveMonths === 0)
                                                Not available during the year
                                            @else
                                                Available {{ $relatedActiveMonths }} months a year
                                            @endif
</span>
                                    </div>


                                </div>
                            </article>
                        @endforeach

                    </div>
                @else
                    <p>No other products are currently listed in this category.</p>
                @endif

            </div>
        </section>

    </main>
@endsection

