@extends('layouts.en.master')

@section('title')
    Products — Fresh fruits &amp;amp; vegetables for export | Express Nadimi
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
    <meta property="og:title" content="Products — Fresh fruits &amp;amp; vegetables for export | Express Nadimi">
    <meta property="og:description"
        content="Seasonal availability, origins, sizes and packaging for the fresh produce we export from Iran.">
    <meta property="og:url" content="{{ route('products', ['lang' => 'en']) }}">
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
                        <i></i><span aria-current="page">Products</span>
                    </nav>
                    <span class="label">Products</span>
                    <h1 class="display" style="margin-top: 16px">Our products</h1>
                    <p>Working with producers, farmers, orchard owners and supply centres in Iran, Nadimi supplies a range
                        of fresh fruit and vegetables suited to export. Choose your product and contact our sales team for
                        availability and today's price. The season bar shows when each product is usually ready.</p>
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
                <div class="filters" role="group" aria-label="Category">
                    <a href="{{ route('products', ['lang' => 'en']) }}" class="tab" data-filter=""
                        aria-pressed="true">All products</a>
                    <a href="{{ route('products', ['lang' => 'en', 'category' => 'vegetables']) }}" class="tab"
                        data-filter="vegetables" aria-pressed="false">Vegetables</a>
                    <a href="{{ route('products', ['lang' => 'en', 'category' => 'stone-fruits']) }}" class="tab"
                        data-filter="stone-fruits" aria-pressed="false">Stone fruits</a>
                    <a href="{{ route('products', ['lang' => 'en', 'category' => 'orchard-fruits']) }}" class="tab"
                        data-filter="orchard-fruits" aria-pressed="false">Orchard fruits</a>
                    <a href="{{ route('products', ['lang' => 'en', 'category' => 'citrus-melons']) }}" class="tab"
                        data-filter="citrus-melons" aria-pressed="false">Citrus &amp; melons</a>
                </div>
                <label class="search">
                    <span class="sr">Search products</span>
                    <svg class="ic">
                        <use href="#i-search" />
                    </svg>
                    <input type="search" class="input" placeholder="Search products" data-search autocomplete="off">
                </label>
            </div>
        </div>

        <section class="section" style="padding-top: 0">
            <div class="container">
                <p class="results-meta" aria-live="polite" data-count data-one="1 product" data-many="5 products">23
                    products</p>

                <div class="pgrid" data-products>
                    <div data-product data-category="vegetables" data-name="tomato گوجه‌فرنگی طماطم">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/tomato.jpg') }}" alt="" width="480"
                                    height="373" decoding="async">
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
                    </div>
                    <div data-product data-category="vegetables" data-name="cucumber خیار خيار">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/cucumber.jpg') }}" alt=""
                                    width="480" height="373" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'en']) }}">Cucumber</a></h3>
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
                    </div>
                    <div data-product data-category="vegetables" data-name="bell pepper فلفل دلمه‌ای فلفل رومي">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/BellPepper.jpg') }}" alt=""
                                    width="480" height="373" decoding="async">
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
                    </div>
                    <div data-product data-category="vegetables" data-name="cabbage کلم‌پیچ ملفوف">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/cabbage.jpg') }}" alt=""
                                    width="480" height="373" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'en']) }}">Cabbage</a></h3>
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
                    </div>
                    <div data-product data-category="vegetables" data-name="cauliflower گل‌کلم قرنبيط">
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
                    </div>
                    <div data-product data-category="vegetables" data-name="lettuce کاهو خس">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/Lettuce.png') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'en']) }}">Lettuce</a></h3>
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
                    </div>
                    <div data-product data-category="vegetables" data-name="potato سیب‌زمینی بطاطا">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/potato.jpg') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
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
                    </div>
                    <div data-product data-category="vegetables" data-name="onion پیاز بصل">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/Redonion.png') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Onion</a>
                                    </h3>
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
                    <div data-product data-category="stone-fruits" data-name="apricot زردآلو مشمش">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/apricot.png') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'en']) }}">Apricot</a></h3>
                                    <span class="dot-badge is-off_season">Off season</span>
                                </div>
                                <p class="pcard-origin">East Azerbaijan (Marand), Khorasan</p>
                                <div class="season" role="img" aria-label="Season: Jun – Aug">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="Jan"></li>
                                        <li class="" title="Feb"></li>
                                        <li class="" title="Mar"></li>
                                        <li class="" title="Apr"></li>
                                        <li class="" title="May"></li>
                                        <li class="on" title="Jun"></li>
                                        <li class="on" title="Jul"></li>
                                        <li class="on" title="Aug"></li>
                                        <li class="" title="Sep"></li>
                                        <li class="now" title="Oct"></li>
                                        <li class="" title="Nov"></li>
                                        <li class="" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Jun – Aug</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="stone-fruits" data-name="cherry گیلاس كرز">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/Cherry.jpg') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Cherry</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">Off season</span>
                                </div>
                                <p class="pcard-origin">Mashhad, East Azerbaijan, Alborz</p>
                                <div class="season" role="img" aria-label="Season: Jun – Jul">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="Jan"></li>
                                        <li class="" title="Feb"></li>
                                        <li class="" title="Mar"></li>
                                        <li class="" title="Apr"></li>
                                        <li class="" title="May"></li>
                                        <li class="on" title="Jun"></li>
                                        <li class="on" title="Jul"></li>
                                        <li class="" title="Aug"></li>
                                        <li class="" title="Sep"></li>
                                        <li class="now" title="Oct"></li>
                                        <li class="" title="Nov"></li>
                                        <li class="" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Jun – Jul</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="stone-fruits" data-name="peach هلو خوخ">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/peach.jpg') }}" alt="" width="480"
                                    height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Peach</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">Off season</span>
                                </div>
                                <p class="pcard-origin">Mashhad, Isfahan, East Azerbaijan</p>
                                <div class="season" role="img" aria-label="Season: Jun – Sep">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="Jan"></li>
                                        <li class="" title="Feb"></li>
                                        <li class="" title="Mar"></li>
                                        <li class="" title="Apr"></li>
                                        <li class="" title="May"></li>
                                        <li class="on" title="Jun"></li>
                                        <li class="on" title="Jul"></li>
                                        <li class="on" title="Aug"></li>
                                        <li class="on" title="Sep"></li>
                                        <li class="now" title="Oct"></li>
                                        <li class="" title="Nov"></li>
                                        <li class="" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Jun – Sep</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="stone-fruits" data-name="nectarine شلیل نكتارين">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/nectarine.png') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'en']) }}">Nectarine</a></h3>
                                    <span class="dot-badge is-off_season">Off season</span>
                                </div>
                                <p class="pcard-origin">East Azerbaijan, Mashhad</p>
                                <div class="season" role="img" aria-label="Season: Jun – Sep">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="Jan"></li>
                                        <li class="" title="Feb"></li>
                                        <li class="" title="Mar"></li>
                                        <li class="" title="Apr"></li>
                                        <li class="" title="May"></li>
                                        <li class="on" title="Jun"></li>
                                        <li class="on" title="Jul"></li>
                                        <li class="on" title="Aug"></li>
                                        <li class="on" title="Sep"></li>
                                        <li class="now" title="Oct"></li>
                                        <li class="" title="Nov"></li>
                                        <li class="" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Jun – Sep</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="orchard-fruits" data-name="apple سیب تفاح">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/apple.jpg') }}" alt="" width="480"
                                    height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Apple</a>
                                    </h3>
                                    <span class="dot-badge is-available">Available</span>
                                </div>
                                <p class="pcard-origin">West &amp; East Azerbaijan (Urmia, Maragheh)</p>
                                <div class="season" role="img" aria-label="Season: Sep – May">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="Jan"></li>
                                        <li class="on" title="Feb"></li>
                                        <li class="on" title="Mar"></li>
                                        <li class="on" title="Apr"></li>
                                        <li class="on" title="May"></li>
                                        <li class="" title="Jun"></li>
                                        <li class="" title="Jul"></li>
                                        <li class="" title="Aug"></li>
                                        <li class="on" title="Sep"></li>
                                        <li class="on now" title="Oct"></li>
                                        <li class="on" title="Nov"></li>
                                        <li class="on" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Sep – May</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="orchard-fruits" data-name="گلابی كُمَّثرَى pear">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/pear.jpg') }}" alt="" width="480"
                                    height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Pear</a>
                                    </h3>
                                    <span class="dot-badge is-available">Available</span>
                                </div>
                                <p class="pcard-origin">Saveh, Yazd, Fars</p>
                                <div class="season" role="img" aria-label="Season: Oct – Jan">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="on" title="Jan"></li>
                                        <li class="" title="Feb"></li>
                                        <li class="" title="Mar"></li>
                                        <li class="" title="Apr"></li>
                                        <li class="" title="May"></li>
                                        <li class="" title="Jun"></li>
                                        <li class="" title="Jul"></li>
                                        <li class="" title="Aug"></li>
                                        <li class="" title="Sep"></li>
                                        <li class="on now" title="Oct"></li>
                                        <li class="on" title="Nov"></li>
                                        <li class="on" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Oct – Jan</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="orchard-fruits" data-name="carrot هویج جزر">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/carrut.jpg') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Carrot</a>
                                    </h3>
                                    <span class="dot-badge is-off_season">Off season</span>
                                </div>
                                <p class="pcard-origin">Mazandaran, Gilan</p>
                                <div class="season" role="img" aria-label="Season: Nov – Apr">
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
                                        <li class="now" title="Oct"></li>
                                        <li class="on" title="Nov"></li>
                                        <li class="on" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Nov – Apr</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="orchard-fruits" data-name="grape انگور عنب">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/GrapeCrate.png') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Grape</a>
                                    </h3>
                                    <span class="dot-badge is-available">Available</span>
                                </div>
                                <p class="pcard-origin">Qazvin (Takestan), Urmia, Malayer</p>
                                <div class="season" role="img" aria-label="Season: Jul – Oct">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="Jan"></li>
                                        <li class="" title="Feb"></li>
                                        <li class="" title="Mar"></li>
                                        <li class="" title="Apr"></li>
                                        <li class="" title="May"></li>
                                        <li class="" title="Jun"></li>
                                        <li class="on" title="Jul"></li>
                                        <li class="on" title="Aug"></li>
                                        <li class="on" title="Sep"></li>
                                        <li class="on now" title="Oct"></li>
                                        <li class="" title="Nov"></li>
                                        <li class="" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Jul – Oct</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="citrus-melons" data-name="watermelon هندوانه بطيخ">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/Watermelon.png') }}" alt=""
                                    width="480" height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a
                                            href="{{ route('product', ['lang' => 'en']) }}">Watermelon</a></h3>
                                    <span class="dot-badge is-off_season">Off season</span>
                                </div>
                                <p class="pcard-origin">Jiroft, Golestan, Khorasan</p>
                                <div class="season" role="img" aria-label="Season: Apr – Sep">
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
                                        <li class="now" title="Oct"></li>
                                        <li class="" title="Nov"></li>
                                        <li class="" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">Apr – Sep</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div data-product data-category="citrus-melons" data-name="melon خربزه و طالبی شمام">
                        <article class="pcard">
                            <div class="pcard-media">
                                <img src="{{ asset('assets/images/products/Melon.png') }}" alt="" width="480"
                                    height="373" loading="lazy" decoding="async">
                                <span class="pcard-go" aria-hidden="true"><svg class="ic flip">
                                        <use href="#i-arrow" />
                                    </svg></span>
                            </div>
                            <div class="pcard-body">
                                <div class="pcard-top">
                                    <h3 class="pcard-title"><a href="{{ route('product', ['lang' => 'en']) }}">Melon</a>
                                    </h3>
                                    <span class="dot-badge is-available">Available</span>
                                </div>
                                <p class="pcard-origin">Khorasan, Isfahan, Varamin</p>
                                <div class="season" role="img" aria-label="Season: May – Oct">
                                    <ol class="season-bar" aria-hidden="true">
                                        <li class="" title="Jan"></li>
                                        <li class="" title="Feb"></li>
                                        <li class="" title="Mar"></li>
                                        <li class="" title="Apr"></li>
                                        <li class="on" title="May"></li>
                                        <li class="on" title="Jun"></li>
                                        <li class="on" title="Jul"></li>
                                        <li class="on" title="Aug"></li>
                                        <li class="on" title="Sep"></li>
                                        <li class="on now" title="Oct"></li>
                                        <li class="" title="Nov"></li>
                                        <li class="" title="Dec"></li>
                                    </ol>
                                    <span class="season-label">May – Oct</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <p class="empty" data-empty hidden>No products match your search.</p>

                <div class="custom-box">
                    <div>
                        <h2>Looking for something not listed?</h2>
                        <p>We source other crops on request, including dates, herbs and dried fruit. Send us your list.</p>
                    </div>
                    <a class="btn" href="{{ route('home', ['lang' => 'en']) }}#inquiry">Request a quote<svg
                            class="ic flip">
                            <use href="#i-arrow" />
                        </svg></a>
                </div>
            </div>
        </section>

        <section class="section mint" aria-labelledby="cal-h">
            <div class="container">
                <div class="sec-head">
                    <span class="label">Harvest calendar</span>
                    <h2 id="cal-h" class="h2">When each product is in season</h2>
                </div>
                <div class="cal" data-cal>
                    <div class="cal-tabs" role="group" aria-label="Category">
                        <button type="button" class="tab" data-cal-filter="" aria-pressed="true">All
                            products</button>
                        <button type="button" class="tab" data-cal-filter="vegetables"
                            aria-pressed="false">Vegetables</button>
                        <button type="button" class="tab" data-cal-filter="stone-fruits"
                            aria-pressed="false">Stone fruits</button>
                        <button type="button" class="tab" data-cal-filter="orchard-fruits"
                            aria-pressed="false">Orchard fruits</button>
                        <button type="button" class="tab" data-cal-filter="citrus-melons"
                            aria-pressed="false">Citrus &amp; melons</button>
                    </div>

                    <div class="cal-head" aria-hidden="true">
                        <span></span>
                        <span class=""><b class="m-s">Jan</b><b class="m-f">January</b></span>
                        <span class=""><b class="m-s">Feb</b><b class="m-f">February</b></span>
                        <span class=""><b class="m-s">Mar</b><b class="m-f">March</b></span>
                        <span class=""><b class="m-s">Apr</b><b class="m-f">April</b></span>
                        <span class=""><b class="m-s">May</b><b class="m-f">May</b></span>
                        <span class=""><b class="m-s">Jun</b><b class="m-f">June</b></span>
                        <span class=""><b class="m-s">Jul</b><b class="m-f">July</b></span>
                        <span class=""><b class="m-s">Aug</b><b class="m-f">August</b></span>
                        <span class=""><b class="m-s">Sep</b><b class="m-f">September</b></span>
                        <span class="is-now"><b class="m-s">Oct</b><b class="m-f">October</b></span>
                        <span class=""><b class="m-s">Nov</b><b class="m-f">November</b></span>
                        <span class=""><b class="m-s">Dec</b><b class="m-f">December</b></span>
                    </div>

                    <div data-cal-group="vegetables">
                        <p class="cal-group">Vegetables</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Tomato<span
                                    class="sr">: Year-round</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Cucumber<span
                                    class="sr">: Year-round</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Bell Pepper<span
                                    class="sr">: Year-round</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Cabbage<span
                                    class="sr">: Sep – Apr</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Cauliflower<span
                                    class="sr">: Sep – Apr</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Lettuce<span
                                    class="sr">: Oct – Apr</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Potato<span
                                    class="sr">: Year-round</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Onion<span
                                    class="sr">: Apr – Nov</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div data-cal-group="stone-fruits">
                        <p class="cal-group">Stone fruits</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Apricot<span
                                    class="sr">: Jun – Aug</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Cherry<span
                                    class="sr">: Jun – Jul</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Peach<span
                                    class="sr">: Jun – Sep</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Nectarine<span
                                    class="sr">: Jun – Sep</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div data-cal-group="orchard-fruits">
                        <p class="cal-group">Orchard fruits</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Apple<span
                                    class="sr">: Sep – May</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Pear<span
                                    class="sr">: Oct – Jan</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Kiwi<span
                                    class="sr">: Nov – Apr</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Grape<span
                                    class="sr">: Jul – Oct</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Pomegranate<span
                                    class="sr">: Oct – Jan</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Carrot<span
                                    class="sr">: Nov – Apr</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div data-cal-group="citrus-melons">
                        <p class="cal-group">Citrus &amp; melons</p>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Orange<span
                                    class="sr">: Nov – Apr</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Tangerine<span
                                    class="sr">: Nov – Mar</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Lemon<span
                                    class="sr">: Oct – Apr</span></a>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Watermelon<span
                                    class="sr">: Apr – Sep</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                        <div class="cal-row">
                            <a class="cal-name" href="{{ route('product', ['lang' => 'en']) }}">Melon<span
                                    class="sr">: May – Oct</span></a>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on" aria-hidden="true"></span>
                            <span class="cal-cell on now" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                            <span class="cal-cell" aria-hidden="true"></span>
                        </div>
                    </div>

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
