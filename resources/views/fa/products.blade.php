@extends('layouts.fa.master')

@section('title')
    محصولات صادراتی | میوه و صیفی‌جات تازه ایران – اکسپرس ندیمی
@endsection

@section('description')
    فهرست میوه و صیفی‌جات صادراتی ایران: فصل عرضه، مبدأ تولید، سایز و بسته‌بندی هر محصول. برای قیمت روز و موجودی با ما تماس بگیرید.
@endsection

@section('canonical', route('products', ['lang' => 'fa']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('products', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('products', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('products', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('products', ['lang' => 'en']) }}">
    @include('partials.seo-schema', [
        'lang' => 'fa',
        'crumbs' => [
            ['خانه', route('home', ['lang' => 'fa'])],
            ['محصولات', route('products', ['lang' => 'fa'])],
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
                        <i></i><span aria-current="page">محصولات</span>
                    </nav>
                    <span class="label">محصولات</span>
                    <h1 class="display" style="margin-top: 16px">فهرست محصولات صادراتی ما</h1>
                    <p>شرکت ندیمی با همکاری تولیدکنندگان، کشاورزان، باغداران و مراکز تأمین در ایران، مجموعه‌ای از میوه‌ها و
                        سبزیجات تازه مناسب بازار صادراتی را تأمین می‌کند. محصول موردنظر خود را انتخاب کنید و برای دریافت
                        موجودی و قیمت روز با واحد فروش در ارتباط باشید. نوار فصل نشان می‌دهد هر محصول معمولاً در چه ماه‌هایی
                        آماده است.</p>
                </div>
                <figure class="frame frame--soft"><img class="phead-img"
                        src="{{ asset('assets/images/scenes/produce-flatlay-800.webp') }}"
                        srcset="{{ asset('assets/images/scenes/produce-flatlay-800.webp') }} 800w, {{ asset('assets/images/scenes/produce-flatlay-1600.webp') }} 1600w"
                        sizes="(max-width: 767px) 100vw, 40vw" alt="" width="800" height="1000"
                        fetchpriority="high" decoding="async"></figure>
            </div>
        </section>

        <div class="toolbar">
            <div class="container toolbar-in">
                    <div class="filters" role="group" aria-label="دسته">
                        <a
                            href="{{ route('products', ['lang' => 'fa']) }}"
                            class="tab"
                            data-filter=""
                            aria-pressed="{{ !request('category') ? 'true' : 'false' }}"
                        >همه محصولات</a>

                        <a
                            href="{{ route('products', ['lang' => 'fa', 'category' => 'vegetables']) }}"
                            class="tab"
                            data-filter="vegetables"
                            aria-pressed="{{ request('category') === 'vegetables' ? 'true' : 'false' }}"
                        >صیفی‌جات</a>

                        <a
                            href="{{ route('products', ['lang' => 'fa', 'category' => 'stone-fruits']) }}"
                            class="tab"
                            data-filter="stone-fruits"
                            aria-pressed="{{ request('category') === 'stone-fruits' ? 'true' : 'false' }}"
                        >میوه‌های هسته‌دار</a>

                        <a
                            href="{{ route('products', ['lang' => 'fa', 'category' => 'orchard-fruits']) }}"
                            class="tab"
                            data-filter="orchard-fruits"
                            aria-pressed="{{ request('category') === 'orchard-fruits' ? 'true' : 'false' }}"
                        >میوه‌های باغی</a>

                        <a
                            href="{{ route('products', ['lang' => 'fa', 'category' => 'citrus-melons']) }}"
                            class="tab"
                            data-filter="citrus-melons"
                            aria-pressed="{{ request('category') === 'citrus-melons' ? 'true' : 'false' }}"
                        >مرکبات و جالیزی</a>
                    </div>
                <label class="search">
                    <span class="sr">جستجوی محصول</span>

                    <svg class="ic">
                        <use href="#i-search" />
                    </svg>

                    <input
                        type="search"
                        name="search"
                        class="input"
                        placeholder="جستجوی محصول"
                        data-search
                        value="{{ request('search') }}"
                        autocomplete="off"
                    >
                </label>
            </div>
        </div>

        <section class="section" style="padding-top: 0">
            <div class="container">
                <p
                    class="results-meta"
                    aria-live="polite"
                    data-count
                    data-one="۱ محصول"
                    data-many="{{ $products->total() }} محصول"
                >
                    {{ $products->total() }} محصول
                </p>

                <div class="pgrid" data-products>
                    @php
                        $lang = 'fa';
                    @endphp

                    @forelse($products as $p)
                        @php
                            $pname = is_array($p->name)
                                ? ($p->name[$lang] ?? $p->name['fa'] ?? $p->name['en'] ?? $p->slug)
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

                            $status = $p->status === 'off_season' ? 'خارج از فصل' : 'موجود';

                            $statusClass = $p->status === 'off_season'
                                ? 'is-off'
                                : 'is-available';

                            $activeMonths = count(array_filter($months));

                            $summary = is_array($p->summary)
                                ? ($p->summary[$lang] ?? '')
                                : ($p->summary ?? '');
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
    'lang' => 'fa',
    'slug' => $p->slug
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
                                            @foreach($months as $on)
                                                <li class="{{ $on ? 'on' : '' }}"></li>
                                            @endforeach
                                        </ol>

                                        <span class="season-label">
                            @if($activeMonths === 12)
                                                موجود در تمام سال
                                            @elseif($activeMonths === 0)
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
                        <p>در حال حاضر محصولی برای نمایش وجود ندارد.</p>
                    @endforelse
                </div>

                <div class="products-pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </section>

        <section class="section mint" aria-labelledby="cal-h">
            <div class="container">
                <div class="sec-head">
                    <span class="label">تقویم موجودی</span>
                    <h2 id="cal-h" class="h2">
                        هر محصول در چه ماه‌هایی موجود است؟
                    </h2>
                </div>
                @php
                    $monthNames = [
                        1 => 'فروردین',
                        2 => 'اردیبهشت',
                        3 => 'خرداد',
                        4 => 'تیر',
                        5 => 'مرداد',
                        6 => 'شهریور',
                        7 => 'مهر',
                        8 => 'آبان',
                        9 => 'آذر',
                        10 => 'دی',
                        11 => 'بهمن',
                        12 => 'اسفند',
                    ];

                   $currentMonth = (int) \Carbon\Carbon::now()->format('n');

                    $categoryNames = [
                        'vegetables' => 'صیفی‌جات',
                        'stone-fruits' => 'میوه‌های هسته‌دار',
                        'orchard-fruits' => 'میوه‌های باغی',
                        'citrus-melons' => 'مرکبات و جالیزی',
                    ];
                @endphp

                <div class="cal" data-cal>
                    <div class="cal-tabs" role="group" aria-label="دسته‌بندی تقویم">
                        <button type="button" class="tab" data-cal-filter="" aria-pressed="true">
                            همه محصولات
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
                        <span>محصول</span>

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
                                <p class="cal-group">{{ $categoryName }}</p>

                                @foreach ($categoryProducts as $product)
                                    @php
                                        $name = is_array($product->name)
                                            ? ($product->name['fa'] ?? $product->name['en'] ?? $product->slug)
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
        'lang' => 'fa',
        'slug' => $product->slug
    ]) }}"
                                        >
                                            {{ $name }}

                                            <span class="sr">
                                :
                                @if ($activeCount === 12)
                                                    تمام سال
                                                @elseif ($activeCount === 0)
                                                    ماه موجودی مشخص نشده
                                                @else
                                                    @foreach ($months as $index => $active)
                                                        @if ($active)
                                                            {{ $monthNames[$index + 1] }}{{ $loop->last ? '' : '، ' }}
                                                        @endif
                                                    @endforeach
                                                @endif
                            </span>
                                        </a>

                                        @foreach ($months as $index => $active)
                                            <span
                                                class="cal-cell {{ $active ? 'on' : '' }} {{ ($index + 1) === $currentMonth ? 'now' : '' }}"
                                                aria-label="{{ $name }} - {{ $monthNames[$index + 1] }}: {{ $active ? 'در ماه موجود است' : 'در این ماه موجود نیست' }}"
                                                title="{{ $monthNames[$index + 1] }}"
                                            ></span>
                                        @endforeach

                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>

                    <div class="cal-legend">
                        <span><i></i>ماه موجودی محصول</span>
                        <span><i class="now"></i>ماه جاری</span>
                        <span><i class="off"></i>ماه بدون موجودی</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
