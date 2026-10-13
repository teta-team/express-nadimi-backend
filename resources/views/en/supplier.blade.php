@extends('layouts.en.master')

@section('title')
    Supplier partnership form | Express Nadimi
@endsection

@section('description')
    Farmers, orchard owners, greenhouse growers and suppliers: register your produce for export with Nadimi.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('supplier', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('supplier', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('supplier', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('supplier', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('supplier', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Express Nadimi">
    <meta property="og:title" content="Supplier partnership form | Express Nadimi">
    <meta property="og:description"
        content="Farmers, orchard owners, greenhouse growers and suppliers: register your produce for export with Nadimi.">
    <meta property="og:url" content="{{ route('supplier', ['lang' => 'en']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","Express Nadimi"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead phead-panel">
            <div class="container">
                <div class="phead-in phead-sup">
                    <div>
                        <nav class="crumbs" aria-label="Breadcrumb"><a
                                href="{{ route('home', ['lang' => 'en']) }}">Home</a><i></i><span aria-current="page">Become
                                a supplier</span></nav>
                        <span class="label">Farmers, orchard owners, greenhouse growers and agricultural suppliers</span>
                        <h1 class="display" style="margin-top: 16px">Supplier partnership form</h1>
                        <p>Nadimi is ready to work with farmers, orchard owners, greenhouse growers, cold stores and
                            reliable suppliers in Iran. If you have a product suitable for the export market, fill in the
                            form below with accurate details; after reviewing samples, quality, supply capacity, packaging
                            and terms we will contact you.</p>
                        <ol class="sflow">
                            <li><span class="ic-wrap"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>Send the form</li>
                            <li><span class="ic-wrap"><svg class="ic">
                                        <use href="#i-search" />
                                    </svg></span>We review details &amp; photos</li>
                            <li><span class="ic-wrap"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>Our team calls you</li>
                        </ol>
                    </div>
                    <figure class="phead-fig"><img class="phead-img"
                            src="{{ asset('assets/images/scenes/seedlings-800.webp') }}" alt="" width="800"
                            height="1000" fetchpriority="high" decoding="async"></figure>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="slayout">
                <aside class="srail" data-rail-box>
                    <div class="srail-top">
                        <div class="ring">
                            <svg viewBox="0 0 76 76" aria-hidden="true">
                                <circle class="track" cx="38" cy="38" r="34" />
                                <circle class="bar" cx="38" cy="38" r="34" data-ring />
                            </svg>
                            <span data-pct>0%</span>
                        </div>
                        <small>Completed<br>Fields marked with a star are required.</small>
                    </div>
                    <nav class="ssteps" aria-label="Supplier partnership form">
                        <a class="sstep" href="#s-personal"><b>1</b><span>Personal &amp; contact details</span></a>
                        <a class="sstep" href="#s-product"><b>2</b><span>Product details</span></a>
                        <a class="sstep" href="#s-quality"><b>3</b><span>Load specs &amp; quality</span></a>
                        <a class="sstep" href="#s-packaging"><b>4</b><span>Packaging</span></a>
                        <a class="sstep" href="#s-price"><b>5</b><span>Price &amp; sales terms</span></a>
                        <a class="sstep" href="#s-media"><b>6</b><span>Photos &amp; video</span></a>
                        <a class="sstep" href="#s-history"><b>7</b><span>Track record</span></a>
                        <a class="sstep" href="#s-notes"><b>8</b><span>Additional notes</span></a>
                    </nav>
                </aside>

                <div>

                    <form method="post" action="" enctype="multipart/form-data" novalidate data-supplier
                        data-busy-text="Sending…">
                        <!-- backend: set action + @@csrf -->


                        <section class="ssec" id="s-personal">
                            <div class="ssec-h"><span class="num">01</span>
                                <h2>Personal &amp; contact details</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-name">Full name <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-name" name="name" type="text" class="input"
                                            value="" required data-req maxlength="120" autocomplete="name">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-mobile">Mobile number <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-mobile" name="mobile" type="tel" class="input"
                                            value="" required data-req maxlength="40" inputmode="tel"
                                            autocomplete="tel">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-whatsapp">WhatsApp number</label>
                                    <div class="">
                                        <input id="s-whatsapp" name="whatsapp" type="tel" class="input"
                                            value="" maxlength="40" inputmode="tel">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-province">Province <b class="req">*</b></label>
                                    <select id="s-province" name="province" class="input" required data-req>
                                        <option value="">Choose province</option>
                                        <option value="east_azerbaijan">East Azerbaijan</option>
                                        <option value="west_azerbaijan">West Azerbaijan</option>
                                        <option value="ardabil">Ardabil</option>
                                        <option value="isfahan">Isfahan</option>
                                        <option value="alborz">Alborz</option>
                                        <option value="ilam">Ilam</option>
                                        <option value="bushehr">Bushehr</option>
                                        <option value="tehran">Tehran</option>
                                        <option value="chaharmahal">Chaharmahal &amp; Bakhtiari</option>
                                        <option value="south_khorasan">South Khorasan</option>
                                        <option value="razavi_khorasan">Razavi Khorasan</option>
                                        <option value="north_khorasan">North Khorasan</option>
                                        <option value="khuzestan">Khuzestan</option>
                                        <option value="zanjan">Zanjan</option>
                                        <option value="semnan">Semnan</option>
                                        <option value="sistan">Sistan &amp; Baluchestan</option>
                                        <option value="fars">Fars</option>
                                        <option value="qazvin">Qazvin</option>
                                        <option value="qom">Qom</option>
                                        <option value="kurdistan">Kurdistan</option>
                                        <option value="kerman">Kerman</option>
                                        <option value="kermanshah">Kermanshah</option>
                                        <option value="kohgiluyeh">Kohgiluyeh &amp; Boyer-Ahmad</option>
                                        <option value="golestan">Golestan</option>
                                        <option value="gilan">Gilan</option>
                                        <option value="lorestan">Lorestan</option>
                                        <option value="mazandaran">Mazandaran</option>
                                        <option value="markazi">Markazi</option>
                                        <option value="hormozgan">Hormozgan</option>
                                        <option value="hamadan">Hamadan</option>
                                        <option value="yazd">Yazd</option>
                                    </select>
                                </div>
                                <div class="field w">
                                    <label for="s-city">City / production area <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-city" name="city" type="text" class="input"
                                            value="" required data-req maxlength="120">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">Your type of activity <b class="req">*</b></legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="role" value="farmer"
                                                data-req><span>Farmer</span></label>
                                        <label class="chip"><input type="radio" name="role" value="orchard"
                                                data-req><span>Orchard owner</span></label>
                                        <label class="chip"><input type="radio" name="role" value="greenhouse"
                                                data-req><span>Greenhouse grower</span></label>
                                        <label class="chip"><input type="radio" name="role" value="producer"
                                                data-req><span>Producer</span></label>
                                        <label class="chip"><input type="radio" name="role" value="cold_storage"
                                                data-req><span>Cold-storage operator</span></label>
                                        <label class="chip"><input type="radio" name="role" value="wholesaler"
                                                data-req><span>Supplier / wholesaler</span></label>
                                        <label class="chip"><input type="radio" name="role" value="company"
                                                data-req><span>Agricultural company</span></label>
                                        <label class="chip"><input type="radio" name="role" value="other"
                                                data-req><span>Other</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-product">
                            <div class="ssec-h"><span class="num">02</span>
                                <h2>Product details</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-product">Product name <b class="req">*</b></label>
                                    <div class="">
                                        <input id="s-product" name="product" type="text" class="input"
                                            value="" required data-req maxlength="120">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-variety">Variety / type</label>
                                    <small class="hint">e.g. greenhouse tomato, red apple, nectarine, cherry…</small>
                                    <div class="">
                                        <input id="s-variety" name="variety" type="text" class="input"
                                            value="" maxlength="160">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-origin">Production location <b class="req">*</b></label>
                                    <small class="hint">Province / city / village</small>
                                    <div class="">
                                        <input id="s-origin" name="origin" type="text" class="input"
                                            value="" required data-req maxlength="190">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-quantity_tons">Available quantity <b class="req">*</b></label>
                                    <div class="unit-wrap">
                                        <input id="s-quantity_tons" name="quantity_tons" type="number" class="input"
                                            value="" required data-req min="0.1" step="any"
                                            inputmode="decimal">
                                        <em class="unit">tons</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">How often can you supply?</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="single"><span>Single shipment</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="daily"><span>Daily</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="weekly"><span>Weekly</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="monthly"><span>Monthly</span></label>
                                        <label class="chip"><input type="radio" name="frequency"
                                                value="season"><span>Whole harvest season</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w" data-if="frequency:daily,weekly,monthly,season">
                                    <label for="s-capacity">Approximate capacity for ongoing supply</label>
                                    <small class="hint">Tons per day / week / month</small>
                                    <div class="">
                                        <input id="s-capacity" name="capacity" type="text" class="input"
                                            value="" maxlength="120">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-ready_from">Harvest start / load ready date <b
                                            class="req">*</b></label>
                                    <div class="">
                                        <input id="s-ready_from" name="ready_from" type="date" class="input"
                                            value="" required data-req>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-ready_until">Supply available until</label>
                                    <div class="">
                                        <input id="s-ready_until" name="ready_until" type="date" class="input"
                                            value="">
                                    </div>
                                </div>
                            </div>
                        </section>


                        <section class="ssec" id="s-quality">
                            <div class="ssec-h"><span class="num">03</span>
                                <h2>Load specs &amp; quality</h2>
                            </div>
                            <div class="sgrid">
                                <fieldset class="field w">
                                    <legend class="legend">Quality grade</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="grade"
                                                value="premium"><span>Premium / export</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="grade1"><span>Grade 1</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="grade2"><span>Grade 2</span></label>
                                        <label class="chip"><input type="radio" name="grade"
                                                value="inspect"><span>Needs inspection</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w">
                                    <label for="s-size">Size / caliber</label>
                                    <div class="">
                                        <input id="s-size" name="size" type="text" class="input"
                                            value="" maxlength="120">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">Is the product sorted?</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="yes"><span>Yes</span></label>
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="no"><span>No</span></label>
                                        <label class="chip"><input type="radio" name="sorted"
                                                value="possible"><span>Sorting possible</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">Product status</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="state"
                                                value="fresh"><span>Freshly harvested</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="on_tree"><span>On tree / in field</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="ready_harvest"><span>Ready to harvest</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="cold_storage"><span>In cold storage</span></label>
                                        <label class="chip"><input type="radio" name="state"
                                                value="ready_load"><span>Ready to load</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">Can we visit the product or production site?</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="visit"
                                                value="yes"><span>Yes</span></label>
                                        <label class="chip"><input type="radio" name="visit"
                                                value="no"><span>No</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-packaging">
                            <div class="ssec-h"><span class="num">04</span>
                                <h2>Packaging</h2>
                            </div>
                            <div class="sgrid">
                                <fieldset class="field w">
                                    <legend class="legend">Current packaging</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="packing"
                                                value="bulk"><span>Bulk</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="basket"><span>Basket</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="carton"><span>Carton</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="export"><span>Export packaging</span></label>
                                        <label class="chip"><input type="radio" name="packing"
                                                value="other"><span>Other</span></label>
                                    </div>
                                </fieldset>
                                <div class="field">
                                    <label for="s-pack_weight">Weight per pack / carton</label>
                                    <div class="unit-wrap">
                                        <input id="s-pack_weight" name="pack_weight" type="number" class="input"
                                            value="" min="0" step="any" inputmode="decimal">
                                        <em class="unit">kg</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">Can you pack to our specifications?</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="yes"><span>Yes</span></label>
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="no"><span>No</span></label>
                                        <label class="chip"><input type="radio" name="custom_pack"
                                                value="coordinate"><span>Needs coordination</span></label>
                                    </div>
                                </fieldset>
                                <fieldset class="field w">
                                    <legend class="legend">Can the carton, weight or packaging type be changed?</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="change_pack"
                                                value="yes"><span>Yes</span></label>
                                        <label class="chip"><input type="radio" name="change_pack"
                                                value="no"><span>No</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-price">
                            <div class="ssec-h"><span class="num">05</span>
                                <h2>Price &amp; sales terms</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-price">Your proposed price</label>
                                    <div class="unit-wrap">
                                        <input id="s-price" name="price" type="number" class="input"
                                            value="" min="0" step="any" inputmode="decimal">
                                        <em class="unit">Toman / kg</em>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="s-payment_terms">Proposed payment terms</label>
                                    <div class="">
                                        <input id="s-payment_terms" name="payment_terms" type="text" class="input"
                                            value="" maxlength="190">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">What does the price include?</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="farm"><span>Delivered at production site</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="cold_storage"><span>Delivered to cold storage</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="agreed"><span>Delivered to agreed location</span></label>
                                        <label class="chip"><input type="radio" name="price_terms"
                                                value="negotiable"><span>Negotiable</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-media">
                            <div class="ssec-h"><span class="num">06</span>
                                <h2>Photos &amp; video</h2>
                            </div>
                            <div class="sgrid">
                                <p class="tip w"><svg class="ic">
                                        <use href="#i-bulb" />
                                    </svg>For a better review, please send real and recent photos of the product.</p>
                                <div class="field w">
                                    <label for="s-photos">Product photos <b class="req">*</b></label>
                                    <small class="hint">Up to 8 photos, 8 MB each (JPG, PNG, WebP)</small>
                                    <div class="drop"><input type="file" id="s-photos" name="photos[]"
                                            accept="image/jpeg,image/png,image/webp" multiple data-req><svg
                                            class="ic">
                                            <use href="#i-image" />
                                        </svg>Add images</div>
                                    <div class="thumbs"></div>
                                </div>
                                <div class="field w">
                                    <label for="s-packaging_photos">Packaging photos</label>
                                    <small class="hint">Up to 8 photos, 8 MB each (JPG, PNG, WebP)</small>
                                    <div class="drop"><input type="file" id="s-packaging_photos"
                                            name="packaging_photos[]" accept="image/jpeg,image/png,image/webp"
                                            multiple><svg class="ic">
                                            <use href="#i-box" />
                                        </svg>Add images</div>
                                    <div class="thumbs"></div>
                                </div>
                                <div class="field w">
                                    <label for="s-video">Short video of the load</label>
                                    <small class="hint">Up to 50 MB (MP4, MOV, WebM)</small>
                                    <div class="drop"><input type="file" id="s-video" name="video"
                                            accept="video/mp4,video/quicktime,video/webm"><svg class="ic">
                                            <use href="#i-video" />
                                        </svg>Add video</div>
                                    <div class="thumbs"></div>
                                </div>
                                <p class="tip w"><svg class="ic">
                                        <use href="#i-sprout" />
                                    </svg>If possible, also include a general photo of the farm, orchard, greenhouse or
                                    storage site.</p>
                            </div>
                        </section>


                        <section class="ssec" id="s-history">
                            <div class="ssec-h"><span class="num">07</span>
                                <h2>Track record</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field">
                                    <label for="s-years">Years working with this product</label>
                                    <div class="unit-wrap">
                                        <input id="s-years" name="years" type="number" class="input"
                                            value="" min="0" max="100" step="1"
                                            inputmode="numeric">
                                        <em class="unit">years</em>
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">Have you sold this product for export before?</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="export_history"
                                                value="yes"><span>Yes</span></label>
                                        <label class="chip"><input type="radio" name="export_history"
                                                value="no"><span>No</span></label>
                                    </div>
                                </fieldset>
                                <div class="field w" data-if="export_history:yes">
                                    <label for="s-export_markets">Which countries or markets?</label>
                                    <small class="hint">If you answered yes</small>
                                    <div class="">
                                        <input id="s-export_markets" name="export_markets" type="text" class="input"
                                            value="" maxlength="190">
                                    </div>
                                </div>
                                <fieldset class="field w">
                                    <legend class="legend">Can you supply continuously and partner long term?</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="yes"><span>Yes</span></label>
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="no"><span>No</span></label>
                                        <label class="chip"><input type="radio" name="long_term"
                                                value="seasonal"><span>Depends on the season</span></label>
                                    </div>
                                </fieldset>
                            </div>
                        </section>


                        <section class="ssec" id="s-notes">
                            <div class="ssec-h"><span class="num">08</span>
                                <h2>Additional notes</h2>
                            </div>
                            <div class="sgrid">
                                <div class="field w">
                                    <label for="s-notes" class="sr">Additional notes</label>
                                    <p class="hint" style="font-size: .9rem">Anything else about the product, capacity,
                                        quality, sales terms or how you would like to work together.</p>
                                    <textarea id="s-notes" name="notes" class="input" rows="5" maxlength="4000"></textarea>
                                </div>
                                <div class="field w">
                                    <label class="check"><input type="checkbox" name="confirm" value="1"
                                            data-req>I confirm the information and images relate to the product described
                                        and are accurate to the best of my knowledge.</label>
                                </div>
                            </div>
                        </section>

                        <div class="ssubmit">
                            <button type="submit" class="btn btn-leaf">Submit partnership request<svg class="ic flip">
                                    <use href="#i-arrow" />
                                </svg></button>
                            <p class="notice notice-ok" data-upload-note hidden>Uploading files… please keep this page
                                open.</p>
                            <p>After you submit, the Nadimi team reviews your details and, if the product fits our needs,
                                will contact you about next steps.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
