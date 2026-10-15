@extends('layouts.en.master')

@section('title')
    Tomato for export from Iran | Express Nadimi
@endsection

@section('description')
    Firm, deep-red greenhouse and open-field tomatoes, picked at breaker-to-pink stage so they arrive ripe, not soft.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('product', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('product', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('product', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('product', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('product', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Express Nadimi">
    <meta property="og:title" content="Tomato for export from Iran | Express Nadimi">
    <meta property="og:description"
        content="Firm, deep-red greenhouse and open-field tomatoes, picked at breaker-to-pink stage so they arrive ripe, not soft.">
    <meta property="og:url" content="{{ route('product', ['lang' => 'en']) }}">
    <meta property="og:image" content="{{ asset('assets/images/products/tomato-900.webp') }}">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","Express Nadimi"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Product","name":"Tomato","description":"Firm, deep-red greenhouse and open-field tomatoes, picked at breaker-to-pink stage so they arrive ripe, not soft.","image":"{{ asset('assets/images/products/tomato-900.webp') }}","category":"Vegetables","countryOfOrigin":"IR","brand":{"@type":"Brand","name":"Express Nadimi"}}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <div class="container">
            <article class="pd">
                <div class="pd-media">
                    <img src="{{ asset('assets/images/products/tomato-900.webp') }}" alt="Tomato" width="900"
                        height="700" fetchpriority="high" decoding="async">
                </div>

                <div class="pd-info">
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'en']) }}">Home</a><i></i>
                        <a href="{{ route('products', ['lang' => 'en']) }}">Products</a><i></i>
                        <a href="{{ route('products', ['lang' => 'en', 'category' => 'vegetables']) }}">Vegetables</a>
                    </nav>
                    <span class="dot-badge is-available">Available</span>
                    <h1 class="display">Tomato</h1>
                    <p class="pd-summary">Firm, deep-red greenhouse and open-field tomatoes, picked at breaker-to-pink stage
                        so they arrive ripe, not soft.</p>

                    <div class="pd-season">
                        <p class="label" style="margin-bottom: 12px">Export season · Year-round</p>
                        <ol class="season-bar" aria-hidden="true">
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                            <li class="on now"></li>
                            <li class="on"></li>
                            <li class="on"></li>
                        </ol>
                        <div class="pd-months" aria-hidden="true">
                            <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span>
                        </div>
                    </div>

                    <dl class="specs">
                        <div>
                            <dt>Origin</dt>
                            <dd>Jiroft, Bushehr, East Azerbaijan</dd>
                        </div>
                        <div>
                            <dt>Typical size</dt>
                            <dd dir="ltr" style="text-align: start">Ø 57–67 mm (M) · 67–82 mm (L)</dd>
                        </div>
                        <div>
                            <dt>Packaging</dt>
                            <dd>5 kg carton · 8–10 kg carton · Plastic crate · Private label</dd>
                        </div>
                        <div>
                            <dt>Minimum order</dt>
                            <dd>One truckload (about 20 t) or a 40 ft reefer container</dd>
                        </div>
                    </dl>

                    <div class="pd-actions">
                        <a class="btn" href="#inquiry">Request price<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <a class="btn btn-line" href="https://wa.me/989144172605?text=Ask%20for%20a%20price%20on%20Tomato"
                            target="_blank" rel="noopener"><svg class="ic">
                                <use href="#i-whatsapp" />
                            </svg>WhatsApp us</a>
                    </div>
                </div>
            </article>
        </div>

        <section class="section mint inquiry" id="inquiry" aria-labelledby="inquiry-h">
            <div class="container inquiry-grid">
                <div class="inquiry-intro">
                    <span class="label">Get a quote</span>
                    <h2 id="inquiry-h" class="h2" style="margin-top: 14px">Ask for a price on Tomato</h2>
                    <p class="lead">Tell us the product, quantity and destination. We usually reply within one working
                        day.</p>
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

                                            <option value="tomato" selected>Tomato</option>

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

        <section class="section" aria-labelledby="rel-h">
            <div class="container">
                <div class="sec-head sec-head-row">
                    <h2 id="rel-h" class="h2">More from this category</h2>
                    <a class="link-arrow"
                        href="{{ route('products', ['lang' => 'en', 'category' => 'vegetables']) }}">Vegetables<svg
                            class="ic flip">
                            <use href="#i-arrow" />
                        </svg></a>
                </div>
                <div class="rail">
                    <article class="pcard">
                        <div class="pcard-media">
                            <img src="{{ asset('assets/images/products/cucumber-480.webp') }}" alt=""
                                width="480" height="373" loading="lazy" decoding="async">
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
                            <img src="{{ asset('assets/images/products/bell-pepper-480.webp') }}" alt=""
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
                            <img src="{{ asset('assets/images/products/cabbage-480.webp') }}" alt=""
                                width="480" height="373" loading="lazy" decoding="async">
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
                            <img src="{{ asset('assets/images/products/cauliflower-480.webp') }}" alt=""
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
                </div>
            </div>
        </section>
    </main>
@endsection
