@extends('layouts.en.master')

@section('title')
    Contact us, suggestions &amp;amp; complaints | Express Nadimi
@endsection

@section('description')
    Reach our Iran and Oman offices by phone, WhatsApp or email, send a message, a suggestion or a complaint.
@endsection

@section('meta')
    <link rel="canonical" href="{{ route('contact', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="en" href="{{ route('contact', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('contact', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('contact', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('contact', ['lang' => 'en']) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Express Nadimi">
    <meta property="og:title" content="Contact us, suggestions &amp;amp; complaints | Express Nadimi">
    <meta property="og:description"
        content="Reach our Iran and Oman offices by phone, WhatsApp or email, send a message, a suggestion or a complaint.">
    <meta property="og:url" content="{{ route('contact', ['lang' => 'en']) }}">
    <meta property="og:image" content="{{ asset('assets/images/scenes/field-sunrise-1600.webp') }}">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{"@@context":"https://schema.org","@type":"Organization","name":"Nadimi International LLC","alternateName":["Express Nadimi","Express Nadimi"],"url":"{{ url('/') }}","logo":"{{ asset('assets/images/logo/nadimi-logo-512.png') }}","email":"info@nadimi.example","telephone":"+968 9948 2094","address":[{"@type":"PostalAddress","addressLocality":"Tabriz","addressCountry":"IR"},{"@type":"PostalAddress","addressLocality":"Muscat","addressCountry":"OM"}]}</script>
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'en']) }}">Home</a>
                        <i></i><span aria-current="page">Contact</span>
                    </nav>
                    <span class="label">Contact</span>
                    <h1 class="display" style="margin-top: 16px">Contact us</h1>
                    <p>Contact us for today's price, availability, partnership requests or our sales team. You can also send
                        a suggestion or complaint.</p>
                </div>
                <figure class="frame frame--contact">
                    <img class="phead-img" src="{{ asset('assets/images/scenes/port-800.webp') }}" alt=""
                        width="800" height="1000" fetchpriority="high" decoding="async">
                    <figcaption class="hero-note">
                        <span class="hero-route" aria-hidden="true"><i></i><span class="hero-route-ic"><svg class="ic">
                                    <use href="#i-ship" />
                                </svg></span><i></i></span>
                        <b>One message to start a partnership</b>
                        <small>We look forward to hearing from you</small>
                    </figcaption>
                </figure>
            </div>
        </section>

        <section class="section" style="padding-top: 0">
            <div class="container">
                <div class="offices">
                    <article class="office reveal" id="office-ir" data-clock data-tz="Asia/Tehran" data-days="6,3"
                        data-hours="8,16" data-open="Open now" data-closed="Closed now">
                        <div class="office-head">
                            <div>
                                <h2>Iran office</h2>
                                <small>Tabriz, East Azerbaijan</small>
                            </div>
                            <div class="clock" aria-label="Local time">
                                <div class="clock-t" data-clock-time>--:--</div>
                                <span class="clock-badge" data-clock-badge></span>
                            </div>
                        </div>
                        <div class="rows">
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-pin" />
                                    </svg></span>
                                <div class="row-body">
                                    <small>Address</small>
                                    <span>Office address, Tabriz, Iran (to be updated)</span>
                                    <a class="map-link"
                                        href="https://www.google.com/maps/search/?api=1&query=Tabriz%2C%20East%20Azerbaijan%2C%20Iran"
                                        target="_blank" rel="noopener"><svg class="ic">
                                            <use href="#i-map" />
                                        </svg>View on map</a>
                                </div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>Phone</small><a class="ltr" href="tel:+989124361450">+98 912
                                        436 1450</a></div>
                                <button type="button" class="copy" data-copy="+98 912 436 1450" aria-label="Copy"
                                    data-done="Copied"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-whatsapp" />
                                    </svg></span>
                                <div class="row-body"><small>WhatsApp</small><a class="ltr"
                                        href="https://wa.me/989144172605" target="_blank" rel="noopener">+98 914 417
                                        2605</a></div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-mail" />
                                    </svg></span>
                                <div class="row-body"><small>Email</small><a
                                        href="mailto:iran@nadimi.example">iran@nadimi.example</a></div>
                                <button type="button" class="copy" data-copy="iran@nadimi.example" aria-label="Copy"
                                    data-done="Copied"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-clock" />
                                    </svg></span>
                                <div class="row-body"><small>Working hours</small>
                                    <span>Saturday – Wednesday, 08:00 – 16:00</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="office reveal" id="office-om" data-clock data-tz="Asia/Muscat" data-days="0,4"
                        data-hours="8,17" data-open="Open now" data-closed="Closed now">
                        <div class="office-head">
                            <div>
                                <h2>Oman office</h2>
                                <small>Souq Silal – WMC04, Sultanate of Oman</small>
                            </div>
                            <div class="clock" aria-label="Local time">
                                <div class="clock-t" data-clock-time>--:--</div>
                                <span class="clock-badge" data-clock-badge></span>
                            </div>
                        </div>
                        <div class="rows">
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-pin" />
                                    </svg></span>
                                <div class="row-body">
                                    <small>Address</small>
                                    <span>Nadimi International LLC, Souq Silal (Oman's fruit and vegetable market), stand
                                        WMC04</span>
                                    <a class="map-link"
                                        href="https://www.google.com/maps/search/?api=1&query=Souq%20Silal%20WMC04%2C%20Oman"
                                        target="_blank" rel="noopener"><svg class="ic">
                                            <use href="#i-map" />
                                        </svg>View on map</a>
                                </div>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>Phone</small><a class="ltr" href="tel:+96899482094">+968
                                        9948 2094</a></div>
                                <button type="button" class="copy" data-copy="+968 9948 2094" aria-label="Copy"
                                    data-done="Copied"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-phone" />
                                    </svg></span>
                                <div class="row-body"><small>Mobile</small><a class="ltr" href="tel:+96899504094">+968
                                        9950 4094</a></div>
                                <button type="button" class="copy" data-copy="+968 9950 4094" aria-label="Copy"
                                    data-done="Copied"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-mail" />
                                    </svg></span>
                                <div class="row-body"><small>Email</small><a
                                        href="mailto:oman@nadimi.example">oman@nadimi.example</a></div>
                                <button type="button" class="copy" data-copy="oman@nadimi.example" aria-label="Copy"
                                    data-done="Copied"><svg class="ic">
                                        <use href="#i-copy" />
                                    </svg></button>
                            </div>
                            <div class="row">
                                <span class="row-ic"><svg class="ic">
                                        <use href="#i-clock" />
                                    </svg></span>
                                <div class="row-body"><small>Working hours</small>
                                    <span>Sunday – Thursday, 08:00 – 17:00</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="cform-wrap">
                    <div class="cform-card" id="contact-form">
                        <div class="sec-head" style="margin-bottom: 24px">
                            <span class="label">Choose what your message is about.</span>
                            <h2 class="h2">Write to us</h2>
                        </div>


                        @if (session('success'))



                            <p role="status" style="padding:12px;margin-bottom:16px;border:1px solid #5D8060;border-radius:8px;color:#315C36">



                                {{ session('success') }}



                            </p>



                        @endif



                        <form method="POST" action="{{ route('contact.post', ['lang' => app()->getLocale()]) }}"
                            novalidate data-whatsapp-form="contact">
                            @csrf

                            <fieldset class="types">
                                <legend class="sr">Type</legend>
                                <label class="type type-message">
                                    <input type="radio" name="type" value="message" checked>
                                    <span><svg class="ic">
                                            <use href="#i-message" />
                                        </svg><b>General message</b><small>Questions about products, prices or an
                                            order.</small></span>
                                </label>
                                <label class="type type-suggestion">
                                    <input type="radio" name="type" value="suggestion">
                                    <span><svg class="ic">
                                            <use href="#i-bulb" />
                                        </svg><b>Suggestion</b><small>An idea to improve our products or
                                            service.</small></span>
                                </label>
                                <label class="type type-complaint">
                                    <input type="radio" name="type" value="complaint">
                                    <span><svg class="ic">
                                            <use href="#i-alert" />
                                        </svg><b>Complaint</b><small>Something went wrong? Tell us what happened and we will
                                            follow it up.</small></span>
                                </label>
                            </fieldset>

                            <div class="fgrid">
                                <fieldset class="field w">
                                    <legend class="legend">Send to</legend>
                                    <div class="chips">
                                        <label class="chip"><input type="radio" name="office" value="any"
                                                checked><span>Either office</span></label>
                                        <label class="chip"><input type="radio" name="office"
                                                value="ir"><span>Iran office</span></label>
                                        <label class="chip"><input type="radio" name="office"
                                                value="om"><span>Oman office</span></label>
                                    </div>
                                </fieldset>
                                <div class="field">
                                    <label for="c-name">Full name <b class="req">*</b></label>
                                    <input id="c-name" name="name" class="input" maxlength="120"
                                        autocomplete="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-subject">Subject</label>
                                    <input id="c-subject" name="subject" class="input" maxlength="190"
                                        value="{{ old('subject') }}">
                                    @error('subject')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-email">Email</label>
                                    <input id="c-email" name="email" type="email" class="input" maxlength="190"
                                        autocomplete="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="c-phone">Phone / WhatsApp</label>
                                    <input id="c-phone" name="phone" type="tel" class="input" maxlength="40"
                                        autocomplete="tel" inputmode="tel" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field w" data-show-for="complaint" hidden>
                                    <label for="c-ref">Order or invoice number <span
                                            class="opt">(optional)</span></label>
                                    <input id="c-ref" name="order_ref" class="input" maxlength="80"
                                        value="{{ old('order_ref') }}">
                                    @error('order_ref')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field w">
                                    <label for="c-body">Your message <b class="req">*</b></label>
                                    <textarea id="c-body" name="body" class="input" rows="6" maxlength="4000" required></textarea>
                                    @error('body')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w iform-foot">
                                    <p class="iform-hint">Email and phone are both required.</p>
                                    <button class="btn btn-leaf" type="submit">Send message<svg class="ic flip">
                                            <use href="#i-arrow" />
                                        </svg></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <aside class="aside-note">
                        <h2>Do you grow or supply produce?</h2>
                        <p>Farmers, orchard owners, greenhouse growers and wholesalers can register their produce with us.
                            Fill in the form with photos and our buyers will call you.</p>
                        <a class="btn btn-white" href="{{ route('supplier', ['lang' => 'en']) }}">Use the supplier
                            partnership form<svg class="ic flip">
                                <use href="#i-arrow" />
                            </svg></a>
                        <div class="aside-links">
                            <a href="https://wa.me/989144172605" target="_blank" rel="noopener"><svg class="ic">
                                    <use href="#i-whatsapp" />
                                </svg>WhatsApp us</a>
                            <a href="mailto:info@nadimi.example"><svg class="ic">
                                    <use href="#i-mail" />
                                </svg>info@nadimi.example</a>
                            <a href="{{ route('home', ['lang' => 'en']) }}#inquiry"><svg class="ic">
                                    <use href="#i-file" />
                                </svg>Request a quote</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
@endsection
