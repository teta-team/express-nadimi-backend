@extends('layouts.fa.master')

@section('title')
    اکسپرس ندیمی | صادرات میوه و صیفی‌جات تازه ایران به عمان
@endsection

@section('description')
    اکسپرس ندیمی با بیش از ۱۵ سال تجربه، میوه و سبزیجات تازه ایران را به عمان و منطقه صادر می‌کند. حضور در سوق سلال، جایگاه WMC04. قیمت روز را بپرسید.
@endsection

@section('canonical', route('home', ['lang' => 'fa']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('home', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('home', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('home', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('home', ['lang' => 'en']) }}">
    <link rel="preload" as="image" href="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}" fetchpriority="high">
    @include('partials.seo-schema', ['lang' => 'fa', 'website' => true])
@endsection

@section('content')
    <main id="main" tabindex="-1">

        <section class="hero">
            <div class="container hero-in">
                <div class="hero-copy">
                    <p class="label">ندیمی اینترنشنال · سوق سلال – WMC04</p>
                    <h1 class="display">میوه و سبزیجات تازه از ایران، با حضور مستقیم در عمان</h1>
                    <p class="hero-sub">شرکت ندیمی با بیش از ۱۵ سال تجربه در حوزه کشاورزی، تأمین و تجارت محصولات کشاورزی، در
                        زمینه تأمین و صادرات میوه و سبزیجات تازه فعالیت می‌کند. از مزارع ایران تا بازار عمان؛ کیفیت، اعتماد
                        و همکاری پایدار.</p>
                    <div class="hero-ctas">
                        <a class="btn" href="{{ route('products', ['lang' => 'fa']) }}">مشاهده محصولات<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <a class="btn btn-line" href="#inquiry">درخواست استعلام</a>
                    </div>
                    <ul class="hero-facts">
                        <li><b>۱۵+</b><span>سال تجربه در کشاورزی و تجارت</span></li>
                        <li><b>۷</b><span>بازار صادراتی</span></li>
                        <li><b>{{ $products->count() }}+</b><span>نوع میوه و صیفی</span></li>
                        <li><b>WMC04</b><span>جایگاه ما در سوق سلال عمان</span></li>
                    </ul>
                </div>
                <figure class="hero-photo">
                    <img src="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}" alt="مزرعه سرسبز کشاورزی در ایران هنگام طلوع خورشید" width="800"
                        height="1000" fetchpriority="high" decoding="async">
                </figure>
            </div>
        </section>


        <section class="section-tight steps-sec" aria-labelledby="steps-h">
            <div class="container">
                <div class="sec-head">
                    <h2 id="steps-h" class="h2">نحوه همکاری با ما برای صادرات میوه و سبزیجات</h2>
                    <p class="lead">فرآیند همکاری از بررسی نیاز شما آغاز می‌شود و تا تأمین، کنترل کیفیت، بسته‌بندی، حمل و
                        تحویل ادامه پیدا می‌کند.</p>
                </div>
                <ol class="order-steps">
                    <li class="order-step">
                        <span class="order-n">۱</span>
                        <h3>ارسال درخواست خرید</h3>
                        <p>نوع محصول، مقدار موردنیاز، سایز و درجه کیفی، نوع بسته‌بندی و زمان موردنظر را از طریق واتساپ یا
                            فرم درخواست قیمت برای ما ارسال کنید.</p>
                        <a class="link-arrow" href="#inquiry">پر کردن فرم<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                    <li class="order-step">
                        <span class="order-n">۲</span>
                        <h3>بررسی و اعلام پیشنهاد</h3>
                        <p>تیم ما بر اساس نیاز شما، موجودی و شرایط روز بازار، محصول مناسب را بررسی کرده و مشخصات، تصاویر،
                            بسته‌بندی و پیشنهاد تجاری را ارائه می‌کند.</p>
                        <a class="link-arrow" href="{{ route('contact', ['lang' => 'fa']) }}">ارتباط با واحد فروش<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                    <li class="order-step">
                        <span class="order-n">۳</span>
                        <h3>تأمین، ارسال و تحویل</h3>
                        <p>پس از توافق، محصول از تولیدکنندگان منتخب تأمین و پس از کنترل کیفیت و بسته‌بندی به عمان ارسال
                            می‌شود؛ تحویل و عرضه در سوق سلال، جایگاه WMC04 پیگیری می‌شود.</p>
                        <a class="link-arrow" href="{{ route('about', ['lang' => 'fa']) }}#process-h">از مزرعه تا عمان<svg
                                class="ic flip">
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
                        <h2 id="week-h" class="h2">این هفته چه محصولاتی قابل تأمین هستند؟</h2>
                        <p class="lead">بازار محصولات کشاورزی دائماً در حال تغییر است. موجودی، قیمت و شرایط تأمین بر اساس
                            فصل برداشت، میزان تولید، کیفیت و شرایط روز بازار تعیین می‌شود؛ برای دریافت قیمت روز با ما در
                            تماس باشید.</p>
                    </div>
                    <a class="btn-all" href="{{ route('products', ['lang' => 'fa']) }}"><span>همه {{ $products->count() }} محصول</span><span
                            class="btn-all-ic" aria-hidden="true"><svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></span></a>
                </div>
                <div class="rail">
                    @forelse ($products as $p)
                        @php
                            $name = is_array($p->name)
                                ? ($p->name['fa'] ?? $p->name['en'] ?? $p->slug)
                                : ($p->name ?: $p->slug);

                            $summary = is_array($p->summary)
                                ? ($p->summary['fa'] ?? $p->summary['en'] ?? '')
                                : ($p->summary ?? '');

                            $months = is_array($p->months)
                                ? array_values($p->months)
                                : [];

                            $months = array_map(
                                fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
                                array_pad(array_slice($months, 0, 12), 12, false)
                            );

                            $monthNames = [
                                'فروردین', 'اردیبهشت', 'خرداد', 'تیر',
                                'مرداد', 'شهریور', 'مهر', 'آبان',
                                'آذر', 'دی', 'بهمن', 'اسفند',
                            ];

                            $activeMonths = count(array_filter($months));

                            $isAvailable = $p->status === 'available';

                            $status = $isAvailable ? 'موجود' : 'خارج از فصل';

                            $statusClass = $isAvailable
                                ? 'is-available'
                                : 'is-off';

                            $image = $p->image
                                ?: asset('assets/images/products/tomato.jpg');

                            $seasonLabel = $activeMonths === 12
                                ? 'تمام سال'
                                : ($activeMonths === 0
                                    ? 'فصل عرضه ثبت نشده'
                                    : implode('، ', array_map(
                                        fn ($index) => $monthNames[$index],
                                        array_keys(array_filter($months))
                                    )));
                        @endphp

                        <article class="pcard">
                            <div class="pcard-media">
                                <a
                                    href="{{ route('product.show', ['lang' => 'fa', 'slug' => $p->slug]) }}"
                                    aria-label="مشاهده محصول {{ $name }}"
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
                                        <a href="{{ route('product.show', ['lang' => 'fa', 'slug' => $p->slug]) }}">
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
                                    aria-label="فصل عرضه {{ $name }}: {{ $seasonLabel }}"
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
                        <p>در حال حاضر محصولی برای نمایش ثبت نشده است.</p>
                    @endforelse
                </div>
            </div>
        </section>


        <section class="section mint" aria-labelledby="why-h">
            <div class="container why-grid">
                <figure class="why-photo">
                    <img src="{{ asset('assets/images/scenes/tomatoes-vine-800.webp') }}" alt="گوجه‌فرنگی تازه روی بوته" width="800"
                        height="1000" loading="lazy" decoding="async">
                </figure>
                <div>
                    <div class="sec-head">
                        <h2 id="why-h" class="h2">چرا شرکت ندیمی؟</h2>
                        <p class="lead">هدف ما تنها انجام یک معامله نیست؛ به دنبال ایجاد روابط تجاری پایدار و قابل اعتماد
                            با مشتریان و شرکای خود هستیم.</p>
                    </div>
                    <ul class="why-list">
                        <li class="why-item">
                            <h3>بیش از ۱۵ سال تجربه</h3>
                            <p>تجربه فعالیت در کشاورزی و تجارت محصولات کشاورزی، پایه اصلی شناخت ما از محصول و بازار است.</p>
                        </li>
                        <li class="why-item">
                            <h3>ارتباط با منابع تأمین</h3>
                            <p>همکاری با تولیدکنندگان و تأمین‌کنندگان در ایران امکان بررسی و تأمین محصولات مختلف را فراهم
                                می‌کند.</p>
                        </li>
                        <li class="why-item">
                            <h3>حضور مستقیم در عمان</h3>
                            <p>حضور در سوق سلال – WMC04 ارتباط نزدیک‌تری میان مجموعه و بازار عمان ایجاد کرده است.</p>
                        </li>
                        <li class="why-item">
                            <h3>توجه به کیفیت</h3>
                            <p>کیفیت، تازگی، درجه‌بندی و بسته‌بندی از معیارهای اصلی بررسی محصولات هستند.</p>
                        </li>
                    </ul>
                    <p class="markets-line"><svg class="ic">
                            <use href="#i-globe" />
                        </svg>تجربه صادرات به عمان، امارات، عربستان، بحرین، روسیه، ارمنستان و آذربایجان.</p>
                    <p class="more-wrap"><a class="more-link" href="{{ route('about', ['lang' => 'fa']) }}"><span>بیشتر
                                درباره ما</span><i class="more-ic" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></i></a></p>
                </div>
            </div>
        </section>


        <section class="section inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">
                <div class="inquiry-intro">
                    <h2 id="inquiry-h" class="h2">درخواست قیمت</h2>
                    <p class="lead">برای دریافت پیشنهاد، اطلاعات درخواست خود را ثبت کنید. پس از دریافت درخواست، تیم فروش
                        شرایط تأمین محصول را بررسی خواهد کرد.</p>
                    <ul class="ticks">
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>کیفیت</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>تازگی</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>پایداری</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>اطمینان</li>
                    </ul>
                    <p style="margin-top: 24px"><a class="link-arrow" href="https://wa.me/989144172605" target="_blank"
                            rel="noopener"><svg class="ic">
                                <use href="#i-whatsapp" />
                            </svg>فروش در واتساپ</a></p>
                </div>
                <div class="waybill">

                    <div class="waybill-head">

                        <b>استعلام صادرات</b>

                        <span>پاسخ تا یک روز کاری</span>

                    </div>

                    <div class="waybill-body">

                        @if (session('success'))
                            <p role="status"
                               style="padding:12px;margin-bottom:16px;border:1px solid #5D8060;border-radius:8px;color:#315C36">
                                {{ session('success') }}
                            </p>
                        @endif




                        <form class="iform" method="POST"
                            action="{{ route('home.post', ['lang' => app()->getLocale()]) }}"
                            data-busy-text="در حال ارسال…" id="inquiry-form">
                            <!-- backend: set action + @@csrf -->
                            @csrf

                            <div class="iform-grid">

                                <div class="field" style="grid-column: 1 / -1">
                                    <label>محصولات موردنظر</label>

                                    <div id="inquiry-products">
                                        @php
                                            $oldProducts = old('products', [
                                                ['product' => '', 'quantity' => '', 'packaging' => ''],
                                            ]);

                                            if (!is_array($oldProducts) || count($oldProducts) === 0) {
                                                $oldProducts = [
                                                    ['product' => '', 'quantity' => '', 'packaging' => ''],
                                                ];
                                            }

                                            $productCategories = [
                                                'vegetables' => 'صیفی‌جات',
                                                'stone-fruits' => 'میوه‌های هسته‌دار',
                                                'orchard-fruits' => 'میوه‌های باغی',
                                                'citrus-melons' => 'مرکبات و جالیزی',
                                            ];

                                            $packagingOptions = [
                                                'carton_5' => 'کارتن ۵ کیلویی',
                                                'carton_10' => 'کارتن ۸ تا ۱۰ کیلویی',
                                                'tray' => 'سینی تک‌لایه',
                                                'crate' => 'سبد پلاستیکی',
                                                'mesh_bag' => 'کیسه توری',
                                                'bulk' => 'فله / باکس فله',
                                                'punnet' => 'ظرف کوچک',
                                                'private_label' => 'با برند خریدار',
                                            ];
                                        @endphp

                                        @foreach ($oldProducts as $index => $oldProduct)
                                            <div class="inquiry-product-row"
                                                 style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px;margin-bottom:16px;padding:16px;border:1px solid #ddd;border-radius:12px">

                                                <div class="field">
                                                    <label>محصول</label>

                                                    <select name="products[{{ $index }}][product]"
                                                            class="input"
                                                            required>
                                                        <option value="">انتخاب محصول</option>

                                                        @foreach ($productCategories as $category => $categoryLabel)
                                                            @php
                                                                $categoryProducts = $products->where('category', $category);
                                                            @endphp

                                                            @if ($categoryProducts->isNotEmpty())
                                                                <optgroup label="{{ $categoryLabel }}">
                                                                    @foreach ($categoryProducts as $p)
                                                                        @php
                                                                            $productName = is_array($p->name)
                                                                                ? ($p->name['fa'] ?? $p->name['en'] ?? $p->slug)
                                                                                : ($p->name ?: $p->slug);
                                                                        @endphp

                                                                        <option value="{{ $p->slug }}"
                                                                            @selected(($oldProduct['product'] ?? '') === $p->slug)>
                                                                            {{ $productName }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endif
                                                        @endforeach
                                                    </select>

                                                    @error("products.$index.product")
                                                    <p style="color:red">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="field">
                                                    <label>مقدار سفارش</label>

                                                    <input type="text"
                                                           name="products[{{ $index }}][quantity]"
                                                           class="input"
                                                           maxlength="80"
                                                           required
                                                           value="{{ $oldProduct['quantity'] ?? '' }}"
                                                           placeholder="مثلاً ۲۰ تن">

                                                    @error("products.$index.quantity")
                                                    <p style="color:red">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="field">
                                                    <label>بسته‌بندی</label>

                                                    <select name="products[{{ $index }}][packaging]"
                                                            class="input">
                                                        <option value="">فرقی نمی‌کند</option>

                                                        @foreach ($packagingOptions as $value => $label)
                                                            <option value="{{ $value }}"
                                                                @selected(($oldProduct['packaging'] ?? '') === $value)>
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error("products.$index.packaging")
                                                    <p style="color:red">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="field" style="display:flex;align-items:end">
                                                    <button type="button"
                                                            class="btn remove-inquiry-product"
                                                            style="width:100%">
                                                        حذف محصول
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="button" id="add-inquiry-product" class="btn">
                                        + افزودن محصول دیگر
                                    </button>

                                    @error('products')
                                    <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-inco">شرایط تحویل</label>

                                    <select id="iq-inco" name="incoterm" class="input" dir="ltr" required>
                                        @foreach (['FOB', 'CFR', 'CIF', 'EXW', 'FCA', 'DAP'] as $term)
                                            <option value="{{ $term }}"
                                                @selected(old('incoterm', 'FOB') === $term)>
                                                {{ $term }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('incoterm')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field w" style="grid-column: 1 / -1">

                                    <label for="iq-dest">کشور / بندر مقصد <b class="req">*</b></label>

                                    <input id="iq-dest" name="destination" class="input" required maxlength="120"
                                        value="{{ old('destination') }}" placeholder="مثلاً عمان – مسقط">

                                    @error('destination')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-name">نام شما <b class="req">*</b></label>

                                    <input id="iq-name" name="name" class="input" required maxlength="120"
                                        autocomplete="name" value="{{ old('name') }}">
                                    @error('name')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-co">شرکت</label>

                                    <input id="iq-co" name="company" class="input" maxlength="160"
                                        autocomplete="organization" value="{{ old('company') }}" placeholder="نام شرکت">
                                    @error('company')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-email">ایمیل</label>

                                    <input id="iq-email" name="email" type="email" class="input" maxlength="190"
                                        autocomplete="email" value="{{ old('email') }}" placeholder="name@company.com">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-phone">تلفن / واتساپ</label>

                                    <input id="iq-phone" name="phone" type="tel" class="input" maxlength="40"
                                        autocomplete="tel" inputmode="tel" value="{{ old('phone') }}"
                                        placeholder="+968 …">

                                    @error('phone')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field" style="grid-column: 1 / -1">

                                    <label for="iq-msg">توضیحات <span class="opt">(اختیاری)</span></label>

                                    <textarea
                                        id="iq-msg"
                                        name="message"
                                        class="input"
                                        rows="3"
                                        maxlength="2000"
                                        placeholder="رقم، سایز، زمان تحویل…"
                                    >{{ old('message') }}</textarea>
                                    @error('message')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>



                            <div class="iform-foot">

                                <p class="iform-hint">ایمیل یا تلفن کافی است؛ یکی از آن‌ها الزامی است.</p>

                                <button class="btn btn-leaf" type="submit">ارسال استعلام<svg class="ic flip">
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
                    </svg>کشاورز یا تأمین‌کننده هستید؟ محصولتان را نزد ما ثبت کنید.</p>
                <a class="btn btn-line btn-sm" href="{{ route('supplier', ['lang' => 'fa']) }}">ورود به فرم همکاری<svg
                        class="ic flip">
                        <use href="#i-arrow" />
                    </svg></a>
            </div>
        </section>
    </main>
@endsection
