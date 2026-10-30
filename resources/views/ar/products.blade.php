@extends('layouts.ar.master')

@section('title')
    منتجات التصدير | فواكه وخضروات طازجة – إكسبرس نديمي
@endsection

@section('description')
    تصفّحوا الفواكه والخضروات الإيرانية الطازجة للتصدير: موسم التوفر والمنشأ والحجم والتعبئة لكل منتج. تواصلوا معنا لمعرفة سعر اليوم.
@endsection

@section('canonical', route('products', ['lang' => 'ar']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('products', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('products', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('products', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('products', ['lang' => 'en']) }}">
    @include('partials.seo-schema', [
        'lang' => 'ar',
        'crumbs' => [
            ['الرئيسية', route('home', ['lang' => 'ar'])],
            ['المنتجات', route('products', ['lang' => 'ar'])],
        ],
    ])
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="مسار التنقل">
                        <a href="{{ route('home', ['lang' => 'ar']) }}">الرئيسية</a>
                        <i></i>
                        <span aria-current="page">المنتجات</span>
                    </nav>

                    <span class="label">المنتجات</span>

                    <h1 class="display" style="margin-top: 16px">منتجاتنا</h1>

                    <p>
                        بالتعاون مع المنتجين والمزارعين وأصحاب البساتين ومراكز التوريد في إيران، توفّر شركة نديمي مجموعة من
                        الفواكه والخضروات الطازجة المناسبة للتصدير. اختاروا المنتج المطلوب وتواصلوا مع فريق المبيعات لمعرفة
                        المتوفر وسعر اليوم. ويبيّن شريط الموسم الأشهر التي يكون فيها كل منتج جاهزاً عادةً.
                    </p>
                </div>

                <figure class="frame frame--soft">
                    <img
                        class="phead-img"
                        src="{{ asset('assets/images/scenes/produce-flatlay-800.webp') }}"
                        srcset="{{ asset('assets/images/scenes/produce-flatlay-800.webp') }} 800w, {{ asset('assets/images/scenes/produce-flatlay-1600.webp') }} 1600w"
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

        <div class="toolbar">
            <div class="container toolbar-in">
                <div class="filters" role="group" aria-label="فئة المنتجات">
                    <a
                        href="{{ route('products', ['lang' => 'ar']) }}"
                        class="tab"
                        data-filter=""
                        aria-pressed="{{ !request('category') ? 'true' : 'false' }}"
                    >جميع المنتجات</a>

                    <a
                        href="{{ route('products', ['lang' => 'ar', 'category' => 'vegetables']) }}"
                        class="tab"
                        data-filter="vegetables"
                        aria-pressed="{{ request('category') === 'vegetables' ? 'true' : 'false' }}"
                    >الخضروات</a>

                    <a
                        href="{{ route('products', ['lang' => 'ar', 'category' => 'stone-fruits']) }}"
                        class="tab"
                        data-filter="stone-fruits"
                        aria-pressed="{{ request('category') === 'stone-fruits' ? 'true' : 'false' }}"
                    >الفواكه ذات النواة</a>

                    <a
                        href="{{ route('products', ['lang' => 'ar', 'category' => 'orchard-fruits']) }}"
                        class="tab"
                        data-filter="orchard-fruits"
                        aria-pressed="{{ request('category') === 'orchard-fruits' ? 'true' : 'false' }}"
                    >فواكه البساتين</a>

                    <a
                        href="{{ route('products', ['lang' => 'ar', 'category' => 'citrus-melons']) }}"
                        class="tab"
                        data-filter="citrus-melons"
                        aria-pressed="{{ request('category') === 'citrus-melons' ? 'true' : 'false' }}"
                    >الحمضيات والبطيخ</a>
                </div>

                <label class="search">
                    <span class="sr">ابحث عن منتج</span>

                    <svg class="ic">
                        <use href="#i-search" />
                    </svg>

                    <input
                        type="search"
                        name="search"
                        class="input"
                        placeholder="ابحث عن منتج"
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
                    data-one="منتج واحد"
                    data-many="{{ $products->total() }} منتجات"
                >
                    {{ $products->total() }} منتجاً
                </p>

                <div class="pgrid" data-products>
                    @php
                        $lang = 'ar';
                    @endphp

                    @forelse ($products as $p)
                        @php
                            $pname = is_array($p->name)
                                ? ($p->name[$lang] ?? $p->name['ar'] ?? $p->name['en'] ?? $p->slug)
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

                            $status = $p->status === 'off_season' ? 'خارج الموسم' : 'متوفر';

                            $statusClass = $p->status === 'off_season'
                                ? 'is-off'
                                : 'is-available';

                            $activeMonths = count(array_filter($months));

                            $summary = is_array($p->summary)
                                ? ($p->summary[$lang] ?? '')
                                : ($p->summary ?? '');

                            $monthNames = [
                                'يناير',
                                'فبراير',
                                'مارس',
                                'أبريل',
                                'مايو',
                                'يونيو',
                                'يوليو',
                                'أغسطس',
                                'سبتمبر',
                                'أكتوبر',
                                'نوفمبر',
                                'ديسمبر',
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
                                                'lang' => 'ar',
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
                                        aria-label="مواعيد توفر {{ $pname }} حسب الأشهر"
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
                                                متوفر طوال العام
                                            @elseif ($activeMonths === 0)
                                                موسم التوفر غير محدد
                                            @else
                                                متوفر خلال {{ $activeMonths }} أشهر من السنة
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @empty
                        <p>لا توجد منتجات متاحة للعرض حالياً.</p>
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
                    <span class="label">تقويم التوفر</span>

                    <h2 id="cal-h" class="h2">
                        في أي أشهر يتوفر كل منتج؟
                    </h2>
                </div>

                @php
                    $monthNames = [
                        1 => 'يناير',
                        2 => 'فبراير',
                        3 => 'مارس',
                        4 => 'أبريل',
                        5 => 'مايو',
                        6 => 'يونيو',
                        7 => 'يوليو',
                        8 => 'أغسطس',
                        9 => 'سبتمبر',
                        10 => 'أكتوبر',
                        11 => 'نوفمبر',
                        12 => 'ديسمبر',
                    ];

                    $shortMonthNames = [
                        1 => 'ينا',
                        2 => 'فبر',
                        3 => 'مار',
                        4 => 'أبر',
                        5 => 'ماي',
                        6 => 'يون',
                        7 => 'يول',
                        8 => 'أغس',
                        9 => 'سبت',
                        10 => 'أكت',
                        11 => 'نوف',
                        12 => 'ديس',
                    ];

                    $currentMonth = (int) \Carbon\Carbon::now()->format('n');

                    $categoryNames = [
                        'vegetables' => 'الخضروات',
                        'stone-fruits' => 'الفواكه ذات النواة',
                        'orchard-fruits' => 'فواكه البساتين',
                        'citrus-melons' => 'الحمضيات والبطيخ',
                    ];
                @endphp

                <div class="cal" data-cal>
                    <div class="cal-tabs" role="group" aria-label="فئة التقويم">
                        <button
                            type="button"
                            class="tab"
                            data-cal-filter=""
                            aria-pressed="true"
                        >
                            جميع المنتجات
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
                        <span>المنتج</span>

                        @foreach ($monthNames as $number => $name)
                            <span class="{{ $number === $currentMonth ? 'is-now' : '' }}">
                                <b class="m-s">{{ $shortMonthNames[$number] }}</b>
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
                                            ? ($product->name['ar'] ?? $product->name['en'] ?? $product->slug)
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
                                                'lang' => 'ar',
                                                'slug' => $product->slug,
                                            ]) }}"
                                        >
                                            {{ $name }}

                                            <span class="sr">
                                                :
                                                @if ($activeCount === 12)
                                                    متوفر طوال العام
                                                @elseif ($activeCount === 0)
                                                    موسم التوفر غير محدد
                                                @else
                                                    {{ implode('، ', $availableMonthNames) }}
                                                @endif
                                            </span>
                                        </a>

                                        @foreach ($months as $index => $active)
                                            <span
                                                class="cal-cell {{ $active ? 'on' : '' }} {{ ($index + 1) === $currentMonth ? 'now' : '' }}"
                                                aria-label="{{ $name }} - {{ $monthNames[$index + 1] }}: {{ $active ? 'متوفر في هذا الشهر' : 'غير متوفر في هذا الشهر' }}"
                                                title="{{ $monthNames[$index + 1] }}"
                                            ></span>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                    <div class="cal-legend">
                        <span><i></i>شهر التوفر</span>
                        <span><i class="now"></i>الشهر الحالي</span>
                        <span><i class="off"></i>شهر غير متوفر</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
