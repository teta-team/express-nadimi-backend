@extends('layouts.en.master')

@section('title')
    About Us | Nadimi International LLC – Nadimi International
@endsection

@section('description')
    Meet Nadimi: our farm-to-Oman sourcing route, quality control, packaging and 15+ years of experience exporting fresh Iranian fruit and vegetables.
@endsection

@section('canonical', route('about', ['lang' => 'en']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('about', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('about', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('about', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('about', ['lang' => 'en']) }}">
    @include('partials.seo-schema', [
        'lang' => 'en',
        'crumbs' => [
            ['Home', route('home', ['lang' => 'en'])],
            ['About us', route('about', ['lang' => 'en'])],
        ],
    ])
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead phead--about">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'en']) }}">Home</a>
                        <i></i><span aria-current="page">About us</span>
                    </nav>
                    <span class="label">About us</span>
                    <h1 class="display" style="margin-top: 16px">Experience from the farm, presence in the Oman market</h1>
                    <p>From Iranian farms to the Oman market; quality, trust and lasting cooperation.</p>
                    <p class="phead-more">We source fresh fruit and vegetables directly from Iranian producers and, after
                        selection, quality control and packing, bring them to buyers in Oman through our own presence at
                        Souq Silal.</p>
                    <ul class="phead-points">
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>Sourced directly from Iranian producers</span></li>
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>Quality control, grading and packing</span></li>
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>On site at Souq Silal – WMC04</span></li>
                    </ul>
                </div>
                <figure class="frame frame--calm"><img class="phead-img"
                        src="{{ asset('assets/images/scenes/vineyard-hills-800.webp') }}"
                        srcset="{{ asset('assets/images/scenes/vineyard-hills-800.webp') }} 800w, {{ asset('assets/images/scenes/vineyard-hills-1600.webp') }} 1600w"
                        sizes="(max-width: 767px) 100vw, 40vw" alt="" width="800" height="1000"
                        fetchpriority="high" decoding="async"></figure>
            </div>
        </section>

        <section class="section" aria-labelledby="story-h">
            <div class="container story">
                <div class="story-text reveal">
                    <span class="label">Who we are</span>
                    <h2 id="story-h" class="h2" style="margin-top: 14px">Nadimi</h2>
                    <p>With more than 15 years of experience in agriculture, sourcing and trade of agricultural products,
                        Nadimi supplies and exports fresh fruit and vegetables.</p>
                    <p>Today the main focus is the Oman market. Our direct presence at Souq Silal, Oman's fruit and
                        vegetable market, stand WMC04, keeps us close to buyers, helps us understand market needs and lets
                        us supply fresh products regularly.</p>
                    <p>Relying on direct links with Iranian producers and experience in product selection, quality control,
                        packaging and transport, Nadimi works to build a reliable route between Iranian farms and the Oman
                        market.</p>
                    <ul class="hero-facts">
                        <li><b>15+</b><span>Years in agriculture &amp; trade</span></li>
                        <li><b>7</b><span>Export markets</span></li>
                        <li><b>20+</b><span>Fruit &amp; vegetable types</span></li>
                        <li><b>WMC04</b><span>Our stand at Souq Silal, Oman</span></li>
                    </ul>
                </div>
                <div class="story-photos reveal">
                    <img src="{{ asset('assets/images/scenes/seedlings-800.webp') }}" alt="" width="800"
                        height="1000" loading="lazy" decoding="async">
                    <img src="{{ asset('assets/images/scenes/veg-assort-800.webp') }}" alt="" width="800"
                        height="1000" loading="lazy" decoding="async">
                </div>
            </div>
        </section>

        <section class="section founder-sec" aria-labelledby="founder-h">
            <div class="container">
                <div class="founder reveal">
                    <figure class="founder-photo">
                        <img src="{{ asset('assets/images/scenes/about.jpg') }}"
                            srcset="{{ asset('assets/images/people/sajjad-nadimi-founder-480.webp') }} 480w, {{ asset('assets/images/scenes/about.jpg') }} 753w"
                            sizes="(max-width: 899px) 100vw, 42vw"
                            alt="Eng. Sajjad Nadimi, Founder and CEO of Nadimi, at his desk" width="753" height="941"
                            loading="lazy" decoding="async">
                    </figure>
                    <div class="founder-body">
                        <span class="label">Founder</span>
                        <h2 id="founder-h" class="h2">Eng. Sajjad Nadimi</h2>
                        <p class="founder-role">Founder and CEO of Nadimi</p>
                        <div class="founder-text">
                            <p>With more than 15 years of experience in agriculture, sourcing, trade and export of
                                agricultural products, Eng. Sajjad Nadimi is the founder and CEO of Nadimi.</p>
                            <p>The company grew out of years of direct experience in agriculture and a close understanding
                                of production, selection and sourcing, and later expanded into export markets.</p>
                            <p>His outlook rests on lasting quality, commitment in trade, trust and long-term relationships
                                with business partners.</p>
                        </div>
                        <blockquote class="founder-quote">
                            <p>“Our experience began on the farm and continues today in the Oman market; our goal is to
                                offer quality products and build partnerships that last for years.”</p>
                        </blockquote>
                        <p class="founder-sign">Eng. Sajjad Nadimi — Founder and CEO of Nadimi · Nadimi International LLC –
                            Oman</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section mint" aria-labelledby="values-h">
            <div class="container">
                <div class="sec-head">
                    <span class="label">Why Nadimi</span>
                    <h2 id="values-h" class="h2">Why Nadimi?</h2>
                </div>
                <div class="values">
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-globe" />
                            </svg></span><b>Market knowledge</b>
                        <p>Experience in several export markets has given us a better understanding of different needs and
                            expectations.</p>
                    </div>
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-shield" />
                            </svg></span><b>Quality control</b>
                        <p>Products are checked against the agreed specifications for freshness, appearance, size, grading
                            and packaging.</p>
                    </div>
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-handshake" />
                            </svg></span><b>Long-term cooperation</b>
                        <p>We aim for lasting, reliable business relationships rather than a one-off deal.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" aria-labelledby="process-h">
            <div class="container">
                <div class="sec-head reveal">
                    <span class="label">How we work</span>
                    <h2 id="process-h" class="h2">From Farm to Oman</h2>
                    <p class="lead">Our work starts with choosing the right product and continues until it reaches the
                        Oman market.</p>
                </div>
                <ol class="timeline">
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-sprout" />
                            </svg></span>
                        <div>
                            <span class="tl-n">01</span>
                            <h3>Selection and sourcing</h3>
                            <p>Reviewing available products and choosing the best fit for market needs and each order.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-hand" />
                            </svg></span>
                        <div>
                            <span class="tl-n">02</span>
                            <h3>Harvest</h3>
                            <p>Coordinating harvest at the right moment to keep the produce fresh and at its best.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-filter" />
                            </svg></span>
                        <div>
                            <span class="tl-n">03</span>
                            <h3>Control and grading</h3>
                            <p>Checking quality, appearance and size, and grading each lot to the agreed standard.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-box" />
                            </svg></span>
                        <div>
                            <span class="tl-n">04</span>
                            <h3>Packaging</h3>
                            <p>Packing to suit the product and the order, with carton type and weight agreed in advance.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-truck" />
                            </svg></span>
                        <div>
                            <span class="tl-n">05</span>
                            <h3>Loading</h3>
                            <p>Preparing the shipment and loading it with care for transport to its destination.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-ship" />
                            </svg></span>
                        <div>
                            <span class="tl-n">06</span>
                            <h3>Shipping to Oman</h3>
                            <p>Following the shipment closely along its route until it reaches the Oman market.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-pin" />
                            </svg></span>
                        <div>
                            <span class="tl-n">07</span>
                            <h3>Presence at Souq Silal</h3>
                            <p>The product reaches the market and supply continues, serving customers in Oman.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>
        <section class="section mint" aria-labelledby="markets-h">
            <div class="container markets-grid">
                <div>
                    <div class="sec-head reveal">
                        <span class="label">Export markets</span>
                        <h2 id="markets-h" class="h2">International Export Experience</h2>
                        <p class="lead">Export and trade experience with seven markets; today our main focus is the Oman
                            market.</p>
                    </div>
                    <ol class="routes">
                        <li class="route-row reveal">
                            <span class="route-n">01</span>
                            <span class="route-country">Oman<span class="route-city" dir="ltr">Souq Silal –
                                    WMC04</span></span>
                            <span class="route-via sea">Main market</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">02</span>
                            <span class="route-country">United Arab Emirates</span>
                            <span class="route-via">Export experience</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">03</span>
                            <span class="route-country">Saudi Arabia</span>
                            <span class="route-via">Export experience</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">04</span>
                            <span class="route-country">Bahrain</span>
                            <span class="route-via">Export experience</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">05</span>
                            <span class="route-country">Russia</span>
                            <span class="route-via">Export experience</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">06</span>
                            <span class="route-country">Armenia</span>
                            <span class="route-via">Export experience</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">07</span>
                            <span class="route-country">Azerbaijan</span>
                            <span class="route-via">Export experience</span>
                        </li>
                    </ol>
                </div>

                <aside class="office-card reveal" id="oman">
                    <img src="{{ asset('assets/images/scenes/port-800.webp') }}" alt="" width="800"
                        height="1000" loading="lazy" decoding="async">
                    <span class="label">Sultanate of Oman · Souq Silal</span>
                    <h3 class="h3">Our Presence in Oman</h3>
                    <p>Our direct presence at Souq Silal, Oman's fruit and vegetable market, stand WMC04, keeps us close to
                        the market, buyers and fresh-produce traders, helps us understand Oman's needs and lets us follow
                        supply conditions first-hand.</p>
                    <a class="btn btn-white" href="{{ route('contact', ['lang' => 'en']) }}#office-om">Contact the Oman
                        office<svg class="ic flip">
                            <use href="#i-arrow" />
                        </svg></a>
                </aside>
            </div>
        </section>

        <section class="grow" aria-labelledby="grow-h">
            <div class="container">
                <div class="grow-card reveal">
                    <div>
                        <span class="label">For growers</span>
                        <h2 id="grow-h" class="h2">Do you grow fruit or vegetables?</h2>
                        <p>Nadimi is ready to work with farmers, orchard owners, greenhouse growers, cold stores and
                            reliable suppliers in Iran. Products of export-market quality can enter our supply process after
                            review of samples, quality, supply capacity, packaging and terms.</p>
                        <a class="btn btn-white" href="{{ route('supplier', ['lang' => 'en']) }}">Open the supplier
                            form<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                    </div>
                    <figure class="grow-fig"><img class="grow-img"
                            src="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}" alt=""
                            width="800" height="1000" loading="lazy" decoding="async"></figure>
                </div>
            </div>
        </section>
    </main>
@endsection
