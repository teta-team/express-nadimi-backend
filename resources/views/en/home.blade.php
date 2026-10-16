@extends('layouts.en.master')

@section('title')
    Express Nadimi — Fresh Iranian Fruit &amp;amp; Vegetable Exporter
@endsection

@section('description')
    With 15+ years of experience, Nadimi supplies and exports fresh Iranian fruit and vegetables to the Oman market and the
    region. Direct presence at Souq Silal, stand WMC04. Request today&#x27;s price and availability.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('home', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('home', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('home', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('home', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('home', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Express Nadimi">
    <meta property="og:title" content="Express Nadimi — Fresh Iranian Fruit &amp;amp; Vegetable Exporter">
    <meta property="og:description"
        content="With 15+ years of experience, Nadimi supplies and exports fresh Iranian fruit and vegetables to the Oman market and the region. Direct presence at Souq Silal, stand WMC04. Request today&#x27;s price and availability.">
    <meta property="og:url" content="{{ route('home', ['lang' => 'en']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="preload" as="image" href="{{ asset('assets/images/scenes/field-sunrise-800.webp') }}"
        fetchpriority="high">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","Express Nadimi"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
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
                        <li><b>20+</b><span>Fruit &amp; vegetable types</span></li>
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


        <section class="section" aria-labelledby="week-h">
            <div class="container">
                <div class="sec-head sec-head-row">
                    <div>
                        <h2 id="week-h" class="h2">What can we supply this week?</h2>
                        <p class="lead">The agricultural market changes constantly. Availability, prices and supply terms
                            depend on the harvest season, production volume, quality and daily market conditions. Contact us
                            for today's price.</p>
                    </div>
                    <a class="btn-all" href="{{ route('products', ['lang' => 'en']) }}"><span>All 23 products</span><span
                            class="btn-all-ic" aria-hidden="true"><svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></span></a>
                </div>
                <div class="rail">
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/tomato.jpg') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Tomato</a>
                                </h3>
                                <span class="dot-badge is-available">Available</span>
                            </div>
                            <p class="pcard-origin">Jiroft, Bushehr, East Azerbaijan</p>
                            <div class="season" role="img" aria-label="Season: Year-round">
                                <ol class="season-bar" aria-hidden="true">
                                    <li class="on" title="Jan"></li>
                                    <li class="on" title="Feb"></li>
                                    <li class="on" title="Mar"></li>
                                    <li class="on" title="Apr"></li>
                                    <li class="on" title="May"></li>
                                    <li class="on" title="Jun"></li>
                                    <li class="on" title="Jul"></li>
                                    <li class="on" title="Aug"></li>
                                    <li class="on" title="Sep"></li>
                                    <li class="on now" title="Oct"></li>
                                    <li class="on" title="Nov"></li>
                                    <li class="on" title="Dec"></li>
                                </ol>
                                <span class="season-label">Year-round</span>
                            </div>
                        </div>
                    </article>
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/cucumber.jpg') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Cucumber</a>
                                </h3>
                                <span class="dot-badge is-available">Available</span>
                            </div>
                            <p class="pcard-origin">Jiroft, Isfahan, Tehran</p>
                            <div class="season" role="img" aria-label="Season: Year-round">
                                <ol class="season-bar" aria-hidden="true">
                                    <li class="on" title="Jan"></li>
                                    <li class="on" title="Feb"></li>
                                    <li class="on" title="Mar"></li>
                                    <li class="on" title="Apr"></li>
                                    <li class="on" title="May"></li>
                                    <li class="on" title="Jun"></li>
                                    <li class="on" title="Jul"></li>
                                    <li class="on" title="Aug"></li>
                                    <li class="on" title="Sep"></li>
                                    <li class="on now" title="Oct"></li>
                                    <li class="on" title="Nov"></li>
                                    <li class="on" title="Dec"></li>
                                </ol>
                                <span class="season-label">Year-round</span>
                            </div>
                        </div>
                    </article>
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/BellPepper.jpg') }}" alt=""
                                width="480" height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Bell
                                        Pepper</a></h3>
                                <span class="dot-badge is-available">Available</span>
                            </div>
                            <p class="pcard-origin">Jiroft, Isfahan</p>
                            <div class="season" role="img" aria-label="Season: Year-round">
                                <ol class="season-bar" aria-hidden="true">
                                    <li class="on" title="Jan"></li>
                                    <li class="on" title="Feb"></li>
                                    <li class="on" title="Mar"></li>
                                    <li class="on" title="Apr"></li>
                                    <li class="on" title="May"></li>
                                    <li class="on" title="Jun"></li>
                                    <li class="on" title="Jul"></li>
                                    <li class="on" title="Aug"></li>
                                    <li class="on" title="Sep"></li>
                                    <li class="on now" title="Oct"></li>
                                    <li class="on" title="Nov"></li>
                                    <li class="on" title="Dec"></li>
                                </ol>
                                <span class="season-label">Year-round</span>
                            </div>
                        </div>
                    </article>
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/cabbage.jpg') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Cabbage</a>
                                </h3>
                                <span class="dot-badge is-available">Available</span>
                            </div>
                            <p class="pcard-origin">Golestan, Ardabil, Jiroft</p>
                            <div class="season" role="img" aria-label="Season: Sep – Apr">
                                <ol class="season-bar" aria-hidden="true">
                                    <li class="on" title="Jan"></li>
                                    <li class="on" title="Feb"></li>
                                    <li class="on" title="Mar"></li>
                                    <li class="on" title="Apr"></li>
                                    <li class="" title="May"></li>
                                    <li class="" title="Jun"></li>
                                    <li class="" title="Jul"></li>
                                    <li class="" title="Aug"></li>
                                    <li class="on" title="Sep"></li>
                                    <li class="on now" title="Oct"></li>
                                    <li class="on" title="Nov"></li>
                                    <li class="on" title="Dec"></li>
                                </ol>
                                <span class="season-label">Sep – Apr</span>
                            </div>
                        </div>
                    </article>
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/Cauliflower.png') }}" alt=""
                                width="480" height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a
                                        href="{{ route('product', ['lang' => 'en']) }}">Cauliflower</a></h3>
                                <span class="dot-badge is-available">Available</span>
                            </div>
                            <p class="pcard-origin">Jiroft, Golestan</p>
                            <div class="season" role="img" aria-label="Season: Sep – Apr">
                                <ol class="season-bar" aria-hidden="true">
                                    <li class="on" title="Jan"></li>
                                    <li class="on" title="Feb"></li>
                                    <li class="on" title="Mar"></li>
                                    <li class="on" title="Apr"></li>
                                    <li class="" title="May"></li>
                                    <li class="" title="Jun"></li>
                                    <li class="" title="Jul"></li>
                                    <li class="" title="Aug"></li>
                                    <li class="on" title="Sep"></li>
                                    <li class="on now" title="Oct"></li>
                                    <li class="on" title="Nov"></li>
                                    <li class="on" title="Dec"></li>
                                </ol>
                                <span class="season-label">Sep – Apr</span>
                            </div>
                        </div>
                    </article>
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/Lettuce.png') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Lettuce</a>
                                </h3>
                                <span class="dot-badge is-available">Available</span>
                            </div>
                            <p class="pcard-origin">Jiroft, Bushehr</p>
                            <div class="season" role="img" aria-label="Season: Oct – Apr">
                                <ol class="season-bar" aria-hidden="true">
                                    <li class="on" title="Jan"></li>
                                    <li class="on" title="Feb"></li>
                                    <li class="on" title="Mar"></li>
                                    <li class="on" title="Apr"></li>
                                    <li class="" title="May"></li>
                                    <li class="" title="Jun"></li>
                                    <li class="" title="Jul"></li>
                                    <li class="" title="Aug"></li>
                                    <li class="" title="Sep"></li>
                                    <li class="on now" title="Oct"></li>
                                    <li class="on" title="Nov"></li>
                                    <li class="on" title="Dec"></li>
                                </ol>
                                <span class="season-label">Oct – Apr</span>
                            </div>
                        </div>
                    </article>
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/potato.jpg') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Potato</a>
                                </h3>
                                <span class="dot-badge is-available">Available</span>
                            </div>
                            <p class="pcard-origin">Ardabil, Hamadan, Jiroft</p>
                            <div class="season" role="img" aria-label="Season: Year-round">
                                <ol class="season-bar" aria-hidden="true">
                                    <li class="on" title="Jan"></li>
                                    <li class="on" title="Feb"></li>
                                    <li class="on" title="Mar"></li>
                                    <li class="on" title="Apr"></li>
                                    <li class="on" title="May"></li>
                                    <li class="on" title="Jun"></li>
                                    <li class="on" title="Jul"></li>
                                    <li class="on" title="Aug"></li>
                                    <li class="on" title="Sep"></li>
                                    <li class="on now" title="Oct"></li>
                                    <li class="on" title="Nov"></li>
                                    <li class="on" title="Dec"></li>
                                </ol>
                                <span class="season-label">Year-round</span>
                            </div>
                        </div>
                    </article>
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/Redonion.png') }}" alt="" width="480"
                                height="373" loading="lazy" decoding="async">
                            <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></span>
                        </div>
                        <div class="pcard-body">
                            <div class="pcard-top">
                                <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Onion</a></h3>
                                <span class="dot-badge is-available">Available</span>
                            </div>
                            <p class="pcard-origin">Jiroft, Khuzestan, Isfahan</p>
                            <div class="season" role="img" aria-label="Season: Apr – Nov">
                                <ol class="season-bar" aria-hidden="true">
                                    <li class="" title="Jan"></li>
                                    <li class="" title="Feb"></li>
                                    <li class="" title="Mar"></li>
                                    <li class="on" title="Apr"></li>
                                    <li class="on" title="May"></li>
                                    <li class="on" title="Jun"></li>
                                    <li class="on" title="Jul"></li>
                                    <li class="on" title="Aug"></li>
                                    <li class="on" title="Sep"></li>
                                    <li class="on now" title="Oct"></li>
                                    <li class="on" title="Nov"></li>
                                    <li class="" title="Dec"></li>
                                </ol>
                                <span class="season-label">Apr – Nov</span>
                            </div>
                        </div>
                    </article>
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





                        <form class="iform" method="post" action="" novalidate data-busy-text="Sending…">
                            <!-- backend: set action + @@csrf -->


                            <div class="iform-grid">

                                <div class="field">

                                    <label for="iq-product">Product</label>

                                    <select id="iq-product" name="product" class="input">

                                        <option value="">Mixed / several products</option>

                                        <optgroup label="Vegetables">

                                            <option value="tomato">Tomato</option>

                                            <option value="cucumber">Cucumber</option>

                                            <option value="bell-pepper">Bell Pepper</option>

                                            <option value="cabbage">Cabbage</option>

                                            <option value="cauliflower">Cauliflower</option>

                                            <option value="lettuce">Lettuce</option>

                                            <option value="potato">Potato</option>

                                            <option value="onion">Onion</option>

                                        </optgroup>

                                        <optgroup label="Stone fruits">

                                            <option value="apricot">Apricot</option>

                                            <option value="cherry">Cherry</option>

                                            <option value="peach">Peach</option>

                                            <option value="nectarine">Nectarine</option>

                                        </optgroup>

                                        <optgroup label="Orchard fruits">

                                            <option value="apple">Apple</option>

                                            <option value="pomegranate">Pomegranate</option>

                                            <option value="kiwi">Kiwi</option>

                                            <option value="grape">Grape</option>

                                        </optgroup>

                                        <optgroup label="Citrus &amp; melons">

                                            <option value="orange">Orange</option>

                                            <option value="tangerine">Tangerine</option>

                                            <option value="lemon">Lemon</option>

                                            <option value="watermelon">Watermelon</option>

                                            <option value="melon">Melon</option>

                                        </optgroup>

                                    </select>

                                </div>

                                <div class="field">

                                    <label for="iq-qty">Quantity <b class="req">*</b></label>

                                    <input id="iq-qty" name="quantity" class="input" required maxlength="80"
                                        value="" placeholder="e.g. 1 × 40 ft reefer, 20 t">

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

                                </div>

                                <div class="field w" style="grid-column: 1 / -1">

                                    <label for="iq-dest">Destination country / port <b class="req">*</b></label>

                                    <input id="iq-dest" name="destination" class="input" required maxlength="120"
                                        value="" placeholder="e.g. Oman – Muscat">

                                </div>

                                <div class="field">

                                    <label for="iq-name">Your name <b class="req">*</b></label>

                                    <input id="iq-name" name="name" class="input" required maxlength="120"
                                        autocomplete="name" value="">

                                </div>

                                <div class="field">

                                    <label for="iq-co">Company</label>

                                    <input id="iq-co" name="company" class="input" maxlength="160"
                                        autocomplete="organization" value="" placeholder="Company name">

                                </div>

                                <div class="field">

                                    <label for="iq-email">Email</label>

                                    <input id="iq-email" name="email" type="email" class="input" maxlength="190"
                                        autocomplete="email" value="" placeholder="name@company.com">

                                </div>

                                <div class="field">

                                    <label for="iq-phone">Phone / WhatsApp</label>

                                    <input id="iq-phone" name="phone" type="tel" class="input" maxlength="40"
                                        autocomplete="tel" inputmode="tel" value="" placeholder="+968 …">

                                </div>

                                <div class="field" style="grid-column: 1 / -1">

                                    <label for="iq-msg">Notes <span class="opt">(optional)</span></label>

                                    <textarea id="iq-msg" name="message" class="input" rows="3" maxlength="2000"
                                        placeholder="Variety, size, delivery date…"></textarea>

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
