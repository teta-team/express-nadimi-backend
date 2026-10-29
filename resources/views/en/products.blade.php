@extends('layouts.en.master')

@section('title')
    Products — Fresh fruits &amp; vegetables for export | Express Nadimi
@endsection

@section('description')
    Seasonal availability, origins, sizes and packaging for the fresh produce we export from Iran.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('products', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('products', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('products', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('products', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('products', ['lang' => 'en']) }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Express Nadimi">
    <meta property="og:title" content="Products — Fresh fruits &amp; vegetables for export | Express Nadimi">
    <meta property="og:description"
          content="Seasonal availability, origins, sizes and packaging for the fresh produce we export from Iran.">
    <meta property="og:url" content="{{ route('products', ['lang' => 'en']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="en_US">

    <meta name="twitter:card" content="summary_large_image">

    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@type": "Organization",
            "name": "Nadimi International LLC",
            "alternateName": ["Express Nadimi", "اکسپرس ندیمی"],
            "url": "{{ url('/') }}",
            "logo": "{{ asset('assets/images/logo/nadimi-logo-512.png') }}",
            "email": "info@nadimi.example",
            "telephone": "+968 9948 2094",
            "address": [
                {
                    "@type": "PostalAddress",
                    "addressLocality": "Tabriz",
                    "addressCountry": "IR"
                },
                {
                    "@type": "PostalAddress",
                    "addressLocality": "Muscat",
                    "addressCountry": "OM"
                }
            ]
        }
    </script>
@endsection

@section('content')
    <main id="main" tabindex="-1">

        {{-- Page Header --}}
        <section class="phead">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'en']) }}">Home</a>
                        <i></i>
                        <span aria-current="page">Products</span>
                    </nav>

                    <span class="label">Products</span>

                    <h1 class="display" style="margin-top: 16px">
                        Our products
                    </h1>

                    <p>
                        Working with producers, farmers, orchard owners and supply centres in Iran,
                        Nadimi supplies a range of fresh fruit and vegetables suited to export.
                        Choose your product and contact our sales team for availability and today's
                        price. The season bar shows when each product is usually ready.
                    </p>
                </div>

                <figure class="frame frame--soft">
                    <img
                        class="phead-img"
                        src="{{ asset('assets/images/scenes/produce-flatlay-800.webp') }}"
                        srcset="{{ asset('assets/images/scenes/produce-flatlay-800.webp') }} 800w,
                                {{ asset('assets/images/scenes/produce-flatlay-1600.webp') }} 1600w"
                        sizes="(max-width: 767px) 100vw, 40vw"
                        alt=""
                        width="800"
                        height="1000"
                        fetchpriority="high"
                        decoding="async"
                    >
                </figure>
            </div>
        </section>

        {{-- Filters and Search --}}
        <div class="toolbar">
            <div class="container toolbar-in">

                <div class="filters" role="group" aria-label="Product category">
                    <a
                        href="{{ route('products', ['lang' => 'en']) }}"
                        class="tab"
                        data-filter=""
                        aria-pressed="{{ !request('category') ? 'true' : 'false' }}"
                    >
                        All products
                    </a>

                    <a
                        href="{{ route('products', ['lang' => 'en', 'category' => 'vegetables']) }}"
                        class="tab"
                        data-filter="vegetables"
                        aria-pressed="{{ request('category') === 'vegetables' ? 'true' : 'false' }}"
                    >
                        Vegetables
                    </a>

                    <a
                        href="{{ route('products', ['lang' => 'en', 'category' => 'stone-fruits']) }}"
                        class="tab"
                        data-filter="stone-fruits"
                        aria-pressed="{{ request('category') === 'stone-fruits' ? 'true' : 'false' }}"
                    >
                        Stone fruits
                    </a>

                    <a
                        href="{{ route('products', ['lang' => 'en', 'category' => 'orchard-fruits']) }}"
                        class="tab"
                        data-filter="orchard-fruits"
                        aria-pressed="{{ request('category') === 'orchard-fruits' ? 'true' : 'false' }}"
                    >
                        Orchard fruits
                    </a>

                    <a
                        href="{{ route('products', ['lang' => 'en', 'category' => 'citrus-melons']) }}"
                        class="tab"
                        data-filter="citrus-melons"
                        aria-pressed="{{ request('category') === 'citrus-melons' ? 'true' : 'false' }}"
                    >
                        Citrus &amp; melons
                    </a>
                </div>

                <label class="search">
                    <span class="sr">Search products</span>

                    <svg class="ic">
                        <use href="#i-search" />
                    </svg>

                    <input
                        type="search"
                        name="search"
                        class="input"
                        placeholder="Search products"
                        data-search
                        value="{{ request('search') }}"
                        autocomplete="off"
                    >
                </label>
            </div>
        </div>

        {{-- Product Grid --}}
        <section class="section" style="padding-top: 0">
            <div class="container">

                <p
                    class="results-meta"
                    aria-live="polite"
                    data-count
                    data-one="1 product"
                    data-many="{{ $products->total() }} products"
                >
                    {{ $products->total() }} products
                </p>

                <div class="pgrid" data-products>
                    @php
                        $lang = 'en';
                    @endphp

                    @forelse ($products as $p)
                        @php
                            $pname = is_array($p->name)
                                ? ($p->name[$lang] ?? $p->name['en'] ?? $p->name['fa'] ?? $p->slug)
                                : ($p->name ?? $p->slug);

                            $pcat = $p->category ?? '';

                            $months = is_array($p->months) && count($p->months) === 12
                                ? array_values($p->months)
                                : array_fill(0, 12, false);

                            $months = array_map(
                                fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
                                $months
                            );

                            $img = $p->image ?: asset('assets/images/products/tomato.jpg');

                            $status = $p->status === 'off_season'
                                ? 'Out of season'
                                : 'Available';

                            $statusClass = $p->status === 'off_season'
                                ? 'is-off'
                                : 'is-available';

                            $activeMonths = count(array_filter($months));

                            $summary = is_array($p->summary)
                                ? ($p->summary[$lang] ?? '')
                                : ($p->summary ?? '');

                            $monthNames = [
                                'January',
                                'February',
                                'March',
                                'April',
                                'May',
                                'June',
                                'July',
                                'August',
                                'September',
                                'October',
                                'November',
                                'December',
                            ];
                        @endphp

                        <div
                            data-product
                            data-category="{{ $pcat }}"
                            data-name="{{ mb_strtolower($pname, 'UTF-8') }}"
                            data-months="{{ implode(',', array_map(
                                fn ($on) => $on ? '1' : '0',
                                $months
                            )) }}"
                        >
                            <article class="pcard">
                                <div class="pcard-media">
                                    <img
                                        src="{{ $img }}"
                                        alt="{{ $pname }}"
                                        width="480"
                                        height="373"
                                        loading="lazy"
                                        decoding="async"
                                    >

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
                                                'lang' => 'en',
                                                'slug' => $p->slug,
                                            ]) }}">
                                                {{ $pname }}
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
                                        aria-label="Availability by month for {{ $pname }}"
                                    >
                                        <ol class="season-bar" aria-hidden="true">
                                            @foreach ($months as $index => $on)
                                                <li
                                                    class="{{ $on ? 'on' : '' }} {{ ($index + 1) === (int) date('n') ? 'now' : '' }}"
                                                    title="{{ $monthNames[$index] }}"
                                                ></li>
                                            @endforeach
                                        </ol>

                                        <span class="season-label">
                                            @if ($activeMonths === 12)
                                                Available year-round
                                            @elseif ($activeMonths === 0)
                                                Availability not specified
                                            @else
                                                Available for {{ $activeMonths }} months of the year
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @empty
                        <p>No products are currently available to display.</p>
                    @endforelse
                </div>

                <p class="empty" data-empty hidden>
                    No products match your search.
                </p>

                <div class="products-pagination">
                    {{ $products->links() }}
                </div>

            </div>
        </section>

        {{-- Availability Calendar --}}
        <section class="section mint" aria-labelledby="cal-h">
            <div class="container">

                <div class="sec-head">
                    <span class="label">Harvest calendar</span>

                    <h2 id="cal-h" class="h2">
                        When is each product in season?
                    </h2>
                </div>

                @php
                    $monthNames = [
                        1 => 'January',
                        2 => 'February',
                        3 => 'March',
                        4 => 'April',
                        5 => 'May',
                        6 => 'June',
                        7 => 'July',
                        8 => 'August',
                        9 => 'September',
                        10 => 'October',
                        11 => 'November',
                        12 => 'December',
                    ];

                    $currentMonth = (int) \Carbon\Carbon::now()->format('n');

                    $categoryNames = [
                        'vegetables' => 'Vegetables',
                        'stone-fruits' => 'Stone fruits',
                        'orchard-fruits' => 'Orchard fruits',
                        'citrus-melons' => 'Citrus & melons',
                    ];
                @endphp

                <div class="cal" data-cal>

                    <div class="cal-tabs" role="group" aria-label="Calendar categories">
                        <button
                            type="button"
                            class="tab"
                            data-cal-filter=""
                            aria-pressed="true"
                        >
                            All products
                        </button>

                        @foreach ($categoryNames as $categoryKey => $categoryName)
                            <button
                                type="button"
                                class="tab"
                                data-cal-filter="{{ $categoryKey }}"
                                aria-pressed="false"
                            >
                                {{ $categoryName }}
                            </button>
                        @endforeach
                    </div>

                    <div class="cal-head" aria-hidden="true">
                        <span>Product</span>

                        @foreach ($monthNames as $number => $name)
                            <span class="{{ $number === $currentMonth ? 'is-now' : '' }}">
                                <b class="m-s">{{ mb_substr($name, 0, 3, 'UTF-8') }}</b>
                                <b class="m-f">{{ $name }}</b>
                            </span>
                        @endforeach
                    </div>

                    @foreach ($categoryNames as $categoryKey => $categoryName)
                        @php
                            $categoryProducts = $calendarProducts->where('category', $categoryKey);
                        @endphp

                        @if ($categoryProducts->isNotEmpty())
                            <div data-cal-group="{{ $categoryKey }}">
                                <p class="cal-group">
                                    {{ $categoryName }}
                                </p>

                                @foreach ($categoryProducts as $product)
                                    @php
                                        $name = is_array($product->name)
                                            ? ($product->name['en'] ?? $product->name['fa'] ?? $product->slug)
                                            : ($product->name ?? $product->slug);

                                        $rawMonths = is_array($product->months)
                                            ? array_values($product->months)
                                            : [];

                                        $months = [];

                                        for ($i = 0; $i < 12; $i++) {
                                            $value = $rawMonths[$i] ?? false;

                                            $months[] = filter_var(
                                                $value,
                                                FILTER_VALIDATE_BOOLEAN
                                            );
                                        }

                                        $activeCount = count(array_filter($months));

                                        $availableMonthNames = [];

                                        foreach ($months as $index => $active) {
                                            if ($active) {
                                                $availableMonthNames[] = $monthNames[$index + 1];
                                            }
                                        }
                                    @endphp

                                    <div
                                        class="cal-row"
                                        data-cal-product
                                        data-category="{{ $product->category }}"
                                        data-name="{{ mb_strtolower($name, 'UTF-8') }}"
                                    >
                                        <a
                                            class="cal-name"
                                            href="{{ route('product.show', [
                                                'lang' => 'en',
                                                'slug' => $product->slug,
                                            ]) }}"
                                        >
                                            {{ $name }}

                                            <span class="sr">
                                                :
                                                @if ($activeCount === 12)
                                                    Available year-round
                                                @elseif ($activeCount === 0)
                                                    Availability not specified
                                                @else
                                                    {{ implode(', ', $availableMonthNames) }}
                                                @endif
                                            </span>
                                        </a>

                                        @foreach ($months as $index => $active)
                                            <span
                                                class="cal-cell {{ $active ? 'on' : '' }} {{ ($index + 1) === $currentMonth ? 'now' : '' }}"
                                                aria-label="{{ $name }} — {{ $monthNames[$index + 1] }}: {{ $active ? 'In season' : 'Out of season' }}"
                                                title="{{ $monthNames[$index + 1] }}"
                                            ></span>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                    <div class="cal-legend">
                        <span><i></i>In season</span>
                        <span><i class="now"></i>This month</span>
                        <span><i class="off"></i>Off season</span>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
