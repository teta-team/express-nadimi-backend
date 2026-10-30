@extends('layouts.en.master')

@section('title')
    Nadimi International | Fresh Iranian Fruit & Vegetable Exporter
@endsection

@section('description')
    With 15+ years of experience, Nadimi International exports fresh Iranian fruit and vegetables to Oman and the region. Find us at Souq Silal, stand WMC04.
@endsection

@section('canonical', route('home', ['lang' => 'en']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('home', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('home', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('home', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('home', ['lang' => 'en']) }}">
    <link rel="preload" as="image" href="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}" fetchpriority="high">
    @include('partials.seo-schema', ['lang' => 'en', 'website' => true])
@endsection

@section('content')
    <main id="main" tabindex="-1">

        <section class="hero">
            <div class="container hero-in">
                <div class="hero-copy">
                    <p class="label">Nadimi International LLC · Souq Silal – WMC04</p>
                    <h1 class="display">Fresh From Iran. Present in Oman.</h1>
                    <p class="hero-sub">With more than 15 years of experience in agriculture, sourcing and agricultural
                        trade, Nadimi supplies and exports fresh fruit and vegetables. From Iranian farms to the Oman market
                        — quality, trust and lasting partnerships.</p>
                    <div class="hero-ctas">
                        <a class="btn" href="{{ route('products', ['lang' => 'en']) }}">View products<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <a class="btn btn-line" href="#inquiry">Request a quote</a>
                    </div>
                    <ul class="hero-facts">
                        <li><b>15+</b><span>Years in agriculture &amp; trade</span></li>
                        <li><b>7</b><span>Export markets</span></li>
                        <li><b>{{ $products->count() }}+</b><span>Fruit &amp; vegetable types</span></li>
                        <li><b>WMC04</b><span>Our stand at Souq Silal, Oman</span></li>
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
                    <h2 id="steps-h" class="h2">How to work with us</h2>
                    <p class="lead">Cooperation starts with understanding your needs and continues through sourcing,
                        quality control, packaging, shipping and delivery.</p>
                </div>
                <ol class="order-steps">
                    <li class="order-step">
                        <span class="order-n">1</span>
                        <h3>Send your purchase request</h3>
                        <p>Send the product, required quantity, size and grade, packaging type and timing via WhatsApp or
                            the quote form.</p>
                        <a class="link-arrow" href="#inquiry">Fill in the form<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                    <li class="order-step">
                        <span class="order-n">2</span>
                        <h3>Review and offer</h3>
                        <p>Based on your needs, availability and current market conditions, our team checks the right
                            product and sends specifications, photos, packaging details and a commercial offer.</p>
                        <a class="link-arrow" href="{{ route('contact', ['lang' => 'en']) }}">Contact sales<svg
                                class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </li>
                    <li class="order-step">
                        <span class="order-n">3</span>
                        <h3>Sourcing, shipping and delivery</h3>
                        <p>Once agreed, the product is sourced from selected producers, quality-checked, packed and shipped
                            to Oman; supply and delivery are followed up at Souq Silal, stand WMC04.</p>
                        <a class="link-arrow" href="{{ route('about', ['lang' => 'en']) }}#process-h">From farm to Oman<svg
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
                        <h2 id="week-h" class="h2">What can we supply this week?</h2>
                        <p class="lead">The agricultural market changes constantly. Availability, prices and supply terms
                            depend on the harvest season, production volume, quality and daily market conditions. Contact us
                            for today's price.</p>
                    </div>
                    <a class="btn-all" href="{{ route('products', ['lang' => 'en']) }}">
                        <span>All {{ $products->count() }} products</span>
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
                                ? ($p->name['en'] ?? $p->name['fa'] ?? $p->slug)
                                : ($p->name ?: $p->slug);

                            $summary = is_array($p->summary)
                                ? ($p->summary['en'] ?? $p->summary['fa'] ?? '')
                                : ($p->summary ?? '');

                            $months = is_array($p->months)
                                ? array_values($p->months)
                                : [];

                            $months = array_map(
                                fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
                                array_pad(array_slice($months, 0, 12), 12, false)
                            );

                            $monthNames = [
                                'Jan', 'Feb', 'Mar', 'Apr',
                                'May', 'Jun', 'Jul', 'Aug',
                                'Sep', 'Oct', 'Nov', 'Dec',
                            ];

                            $activeMonths = count(array_filter($months));

                            $isAvailable = $p->status === 'available';

                            $status = $isAvailable ? 'Available' : 'Off-season';

                            $statusClass = $isAvailable
                                ? 'is-available'
                                : 'is-off';

                            $image = $p->image
                                ?: asset('assets/images/products/tomato.jpg');

                            $seasonLabel = $activeMonths === 12
                                ? 'Year-round'
                                : ($activeMonths === 0
                                    ? 'Season not specified'
                                    : implode(' – ', array_map(
                                        fn ($index) => $monthNames[$index],
                                        array_keys(array_filter($months))
                                    )));
                        @endphp

                        <article class="pcard">
                            <div class="pcard-media">
                                <a
                                    href="{{ route('product.show', ['lang' => 'en', 'slug' => $p->slug]) }}"
                                    aria-label="View {{ $name }}"
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
                                        <a href="{{ route('product.show', ['lang' => 'en', 'slug' => $p->slug]) }}">
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
                                    aria-label="Season for {{ $name }}: {{ $seasonLabel }}"
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
                        <p>No products are currently available to display.</p>
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
                        <h2 id="why-h" class="h2">Why Nadimi?</h2>
                        <p class="lead">Our goal is not a single deal; we build lasting, reliable business relationships
                            with our customers and partners.</p>
                    </div>
                    <ul class="why-list">
                        <li class="why-item">
                            <h3>15+ years of experience</h3>
                            <p>Experience in agriculture and agricultural trade is the foundation of our knowledge of the
                                product and the market.</p>
                        </li>
                        <li class="why-item">
                            <h3>Links to supply sources</h3>
                            <p>Working with producers and suppliers in Iran lets us review and source a wide range of
                                products.</p>
                        </li>
                        <li class="why-item">
                            <h3>Direct presence in Oman</h3>
                            <p>Our presence at Souq Silal – WMC04 keeps us closer to the Oman market.</p>
                        </li>
                        <li class="why-item">
                            <h3>Focus on quality</h3>
                            <p>Quality, freshness, grading and packaging are the main criteria we check.</p>
                        </li>
                    </ul>
                    <p class="markets-line"><svg class="ic">
                            <use href="#i-globe" />
                        </svg>Export experience to Oman, the UAE, Saudi Arabia, Bahrain, Russia, Armenia and Azerbaijan.</p>
                    <p class="more-wrap"><a class="more-link" href="{{ route('about', ['lang' => 'en']) }}"><span>More
                                about us</span><i class="more-ic" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></i></a></p>
                </div>
            </div>
        </section>


        <section class="section inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">
                <div class="inquiry-intro">
                    <h2 id="inquiry-h" class="h2">Request a Quote</h2>
                    <p class="lead">Submit your request to receive an offer. After receiving it, our sales team will
                        review the supply terms.</p>
                    <ul class="ticks">
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>Quality</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>Freshness</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>Consistency</li>
                        <li><svg class="ic">
                                <use href="#i-check" />
                            </svg>Reliability</li>
                    </ul>
                    <p style="margin-top: 24px"><a class="link-arrow" href="https://wa.me/989144172605" target="_blank"
                            rel="noopener"><svg class="ic">
                                <use href="#i-whatsapp" />
                            </svg>WhatsApp sales</a></p>
                </div>
                <div class="waybill">

                    <div class="waybill-head">

                        <b>Export inquiry</b>

                        <span>Reply within 1 working day</span>

                    </div>

                    <div class="waybill-body">

                        @if (session('success'))
                            <p role="status"
                               style="padding:12px;margin-bottom:16px;border:1px solid #5D8060;border-radius:8px;color:#315C36">
                                {{ session('success') }}
                            </p>
                        @endif


                        <form class="iform" method="POST"
                            action="{{ route('home.post', ['lang' => app()->getLocale()]) }}" novalidate
                            data-whatsapp-form="inquiry">
                            <!-- backend: set action + @@csrf -->
                            @csrf

                            <div class="iform-grid">

                                    <div class="field">
                                        <label for="iq-product">Product</label>

                                        <select id="iq-product" name="product" class="input">
                                            <option value="" @selected(old('product', '') === '')>
                                                Mixed / several products
                                            </option>

                                            @php
                                                $productCategories = [
                                                    'vegetables' => 'Vegetables',
                                                    'stone-fruits' => 'Stone fruits',
                                                    'orchard-fruits' => 'Orchard fruits',
                                                    'citrus-melons' => 'Citrus & melons',
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
                                                                    ? ($p->name['en'] ?? $p->name['fa'] ?? $p->slug)
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

                                    <label for="iq-qty">Quantity <b class="req">*</b></label>

                                    <input id="iq-qty" name="quantity" class="input" required maxlength="80"
                                        value="{{ old('quantity') }}" placeholder="e.g. 1 × 40 ft reefer, 20 t">
                                    @error('quantity')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-pack">Packaging</label>

                                    <select id="iq-pack" name="packaging" class="input">

                                        <option value="">No preference</option>

                                        <option value="carton_5">5 kg carton</option>

                                        <option value="carton_10">8–10 kg carton</option>

                                        <option value="tray">Single-layer tray</option>

                                        <option value="crate">Plastic crate</option>

                                        <option value="mesh_bag">Mesh bag 10–25 kg</option>

                                        <option value="bulk">Bulk bin / loose</option>

                                        <option value="punnet">Punnets 0.5–1 kg</option>

                                        <option value="private_label">Private label</option>

                                    </select>
                                    @error('packaging')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-inco">Incoterm</label>

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

                                    <label for="iq-dest">Destination country / port <b class="req">*</b></label>

                                    <input id="iq-dest" name="destination" class="input" required maxlength="120"
                                        value="{{ old('destination') }}" placeholder="e.g. Oman – Muscat">
                                    @error('destination')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-name">Your name <b class="req">*</b></label>

                                    <input id="iq-name" name="name" class="input" required maxlength="120"
                                        autocomplete="name" value="{{ old('name') }}">
                                    @error('name')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-co">Company</label>

                                    <input id="iq-co" name="company" class="input" maxlength="160"
                                        autocomplete="organization" value="{{ old('company') }}"
                                        placeholder="Company name">
                                    @error('company')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-email">Email</label>

                                    <input id="iq-email" name="email" type="email" class="input" maxlength="190"
                                        autocomplete="email" value="{{ old('email') }}" placeholder="name@company.com">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">

                                    <label for="iq-phone">Phone / WhatsApp</label>

                                    <input id="iq-phone" name="phone" type="tel" class="input" maxlength="40"
                                        autocomplete="tel" inputmode="tel" value="{{ old('phone') }}"
                                        placeholder="+968 …">
                                    @error('phone')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field" style="grid-column: 1 / -1">

                                    <label for="iq-msg">Notes <span class="opt">(optional)</span></label>

                                    <textarea id="iq-msg" name="message" class="input" rows="3" maxlength="2000"
                                        placeholder="Variety, size, delivery date…"></textarea>
                                    @error('message')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>



                            <div class="iform-foot">

                                <p class="iform-hint">Email or phone is enough; one of them is required.</p>

                                <button class="btn btn-leaf" type="submit">Send inquiry<svg class="ic flip">
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
                    </svg>Are you a grower or supplier? Register your produce with us.</p>
                <a class="btn btn-line btn-sm" href="{{ route('supplier', ['lang' => 'en']) }}">Open the supplier
                    form<svg class="ic flip">
                        <use href="#i-arrow" />
                    </svg></a>
            </div>
        </section>
    </main>
@endsection
