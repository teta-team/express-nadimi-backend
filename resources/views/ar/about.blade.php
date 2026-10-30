@extends('layouts.ar.master')

@section('title')
    من نحن | نديمي إنترناشيونال – إكسبرس نديمي
@endsection

@section('description')
    تعرّفوا على نديمي: مسار التوريد من المزرعة إلى السوق العُماني، ومراقبة الجودة والتعبئة، وخبرة تزيد على 15 عاماً في تصدير الفواكه والخضروات.
@endsection

@section('canonical', route('about', ['lang' => 'ar']))
@section('og_image', asset('assets/images/scenes/field-sunrise-1600.webp'))

@section('meta')
    <link rel="alternate" hreflang="en" href="{{ route('about', ['lang' => 'en']) }}">
    <link rel="alternate" hreflang="fa" href="{{ route('about', ['lang' => 'fa']) }}">
    <link rel="alternate" hreflang="ar" href="{{ route('about', ['lang' => 'ar']) }}">
    <link rel="alternate" hreflang="x-default" href="{{ route('about', ['lang' => 'en']) }}">
    @include('partials.seo-schema', [
        'lang' => 'ar',
        'crumbs' => [
            ['الرئيسية', route('home', ['lang' => 'ar'])],
            ['من نحن', route('about', ['lang' => 'ar'])],
        ],
    ])
@endsection

@section('content')
    <main id="main" tabindex="-1">
        <section class="phead phead--about">
            <div class="container phead-in">
                <div>
                    <nav class="crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home', ['lang' => 'ar']) }}">الرئيسية</a>
                        <i></i><span aria-current="page">من نحن</span>
                    </nav>
                    <span class="label">من نحن</span>
                    <h1 class="display" style="margin-top: 16px">خبرة بدأت من المزرعة وحضور في السوق العُماني</h1>
                    <p>من المزارع الإيرانية إلى السوق العُماني؛ جودة وثقة وتعاون مستدام.</p>
                    <p class="phead-more">نورّد الفواكه والخضروات الطازجة مباشرةً من المنتجين الإيرانيين، وبعد الاختيار
                        ومراقبة الجودة والتعبئة نوصلها إلى المشترين في عُمان عبر حضورنا المباشر في سوق سلال.</p>
                    <ul class="phead-points">
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>توريد مباشر من المنتجين الإيرانيين</span></li>
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>مراقبة الجودة والتدرّج والتعبئة</span></li>
                        <li><svg class="ic" aria-hidden="true">
                                <use href="#i-check" />
                            </svg><span>حضور مباشر في سوق سلال – WMC04</span></li>
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
                    <span class="label">من نحن</span>
                    <h2 id="story-h" class="h2" style="margin-top: 14px">شركة نديمي</h2>
                    <p>تعمل شركة نديمي في توريد وتصدير الفواكه والخضروات الطازجة، بخبرة تزيد على 15 عاماً في الزراعة
                        والتوريد وتجارة المنتجات الزراعية.</p>
                    <p>يتركز عملنا اليوم على السوق العُماني. فحضورنا المباشر في سوق سلال، سوق الفواكه والخضروات في عُمان،
                        الجناح WMC04، يقرّبنا من المشترين ويتيح لنا فهم احتياجات السوق وعرض المنتجات الطازجة بانتظام.</p>
                    <p>بالاعتماد على علاقاتنا المباشرة بالمنتجين الإيرانيين وخبرتنا في اختيار المنتجات ومراقبة جودتها
                        وتغليفها ونقلها، نسعى إلى بناء طريق موثوق بين المزارع الإيرانية والسوق العُماني.</p>
                    <ul class="hero-facts">
                        <li><b>15+</b><span>عاماً من الخبرة في الزراعة والتجارة</span></li>
                        <li><b>7</b><span>أسواق تصدير</span></li>
                        <li><b>20+</b><span>صنفاً من الفواكه والخضروات</span></li>
                        <li><b>WMC04</b><span>جناحنا في سوق سلال بعُمان</span></li>
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
                        <span class="label">المؤسس</span>
                        <h2 id="founder-h" class="h2">المهندس سجاد نديمي</h2>
                        <p class="founder-role">مؤسس شركة نديمي ومديرها العام</p>
                        <div class="founder-text">
                            <p>يتمتع المهندس سجاد نديمي بخبرة تزيد على 15 عاماً في الزراعة والتوريد وتجارة وتصدير المنتجات
                                الزراعية، وهو مؤسس شركة نديمي ومديرها العام.</p>
                            <p>نشأ نشاط الشركة من سنوات من الخبرة المباشرة في القطاع الزراعي ومعرفة دقيقة بمراحل الإنتاج
                                والاختيار والتوريد، ثم توسّع بالدخول إلى أسواق التصدير.</p>
                            <p>تقوم رؤيته على جودة مستدامة والتزام في التجارة والثقة وبناء علاقات طويلة الأمد مع الشركاء
                                التجاريين.</p>
                        </div>
                        <blockquote class="founder-quote">
                            <p>«بدأت تجربتنا من المزرعة وتستمر اليوم في السوق العُماني؛ هدفنا تقديم منتج عالي الجودة وبناء
                                شراكات تدوم سنوات.»</p>
                        </blockquote>
                        <p class="founder-sign">المهندس سجاد نديمي — مؤسس شركة نديمي ومديرها العام · Nadimi International
                            LLC – Oman</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section mint" aria-labelledby="values-h">
            <div class="container">
                <div class="sec-head">
                    <span class="label">لماذا نديمي</span>
                    <h2 id="values-h" class="h2">لماذا نديمي؟</h2>
                </div>
                <div class="values">
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-globe" />
                            </svg></span><b>معرفة السوق</b>
                        <p>أتاحت لنا الخبرة في أسواق تصدير مختلفة فهماً أفضل لاختلاف الاحتياجات وتوقعات العملاء.</p>
                    </div>
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-shield" />
                            </svg></span><b>مراقبة الجودة</b>
                        <p>تُفحص المنتجات وفق المواصفات المتفق عليها من حيث الطزاجة والمظهر والحجم والفرز وظروف التغليف.</p>
                    </div>
                    <div class="value reveal"><span class="value-ic" aria-hidden="true"><svg class="ic">
                                <use href="#i-handshake" />
                            </svg></span><b>تعاون طويل الأمد</b>
                        <p>لا نبحث عن صفقة واحدة، بل عن علاقات تجارية مستدامة وموثوقة مع عملائنا وشركائنا.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" aria-labelledby="process-h">
            <div class="container">
                <div class="sec-head reveal">
                    <span class="label">كيف نعمل</span>
                    <h2 id="process-h" class="h2">من المزرعة إلى عُمان</h2>
                    <p class="lead">يبدأ عملنا باختيار المنتج المناسب ويستمر حتى وصوله إلى السوق العُماني.</p>
                </div>
                <ol class="timeline">
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-sprout" />
                            </svg></span>
                        <div>
                            <span class="tl-n">01</span>
                            <h3>اختيار المنتج وتوريده</h3>
                            <p>دراسة المنتجات المتوفرة واختيار الأنسب منها بحسب احتياجات السوق وطلب كل عميل.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-hand" />
                            </svg></span>
                        <div>
                            <span class="tl-n">02</span>
                            <h3>الحصاد</h3>
                            <p>التنسيق لحصاد المنتج في الوقت المناسب للحفاظ على طزاجته وجودته بأفضل صورة.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-filter" />
                            </svg></span>
                        <div>
                            <span class="tl-n">03</span>
                            <h3>الفحص والفرز</h3>
                            <p>فحص الجودة والمظهر والحجم، وفرز كل دفعة وفق المعيار المتفق عليه مع العميل.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-box" />
                            </svg></span>
                        <div>
                            <span class="tl-n">04</span>
                            <h3>التغليف</h3>
                            <p>تغليف مناسب لنوع المنتج وطلب العميل، مع الاتفاق على الوزن ونوع الكرتون قبل اعتماد الطلب.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-truck" />
                            </svg></span>
                        <div>
                            <span class="tl-n">05</span>
                            <h3>التحميل</h3>
                            <p>تجهيز الشحنة وتحميلها بعناية تامة تمهيداً لنقلها بأمان إلى وجهتها المحددة.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-ship" />
                            </svg></span>
                        <div>
                            <span class="tl-n">06</span>
                            <h3>الشحن إلى عُمان</h3>
                            <p>متابعة نقل الشحنة بشكل مستمر على طول مسارها حتى وصولها إلى السوق العُماني.</p>
                        </div>
                    </li>
                    <li class="tl-step reveal">
                        <span class="tl-ic"><svg class="ic">
                                <use href="#i-pin" />
                            </svg></span>
                        <div>
                            <span class="tl-n">07</span>
                            <h3>الحضور في سوق سلال</h3>
                            <p>دخول المنتج إلى السوق ومواصلة العرض بانتظام بالتعاون المباشر مع العملاء في عُمان.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>
        <section class="section mint" aria-labelledby="markets-h">
            <div class="container markets-grid">
                <div>
                    <div class="sec-head reveal">
                        <span class="label">أسواق التصدير</span>
                        <h2 id="markets-h" class="h2">خبرة في الأسواق الدولية</h2>
                        <p class="lead">خبرة في التصدير والتعاون التجاري مع سبعة أسواق، ويتركز نشاطنا اليوم على السوق
                            العُماني.</p>
                    </div>
                    <ol class="routes">
                        <li class="route-row reveal">
                            <span class="route-n">01</span>
                            <span class="route-country">عُمان<span class="route-city" dir="ltr">Souq Silal –
                                    WMC04</span></span>
                            <span class="route-via sea">السوق الرئيسي</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">02</span>
                            <span class="route-country">الإمارات العربية المتحدة</span>
                            <span class="route-via">خبرة تصدير</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">03</span>
                            <span class="route-country">المملكة العربية السعودية</span>
                            <span class="route-via">خبرة تصدير</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">04</span>
                            <span class="route-country">البحرين</span>
                            <span class="route-via">خبرة تصدير</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">05</span>
                            <span class="route-country">روسيا</span>
                            <span class="route-via">خبرة تصدير</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">06</span>
                            <span class="route-country">أرمينيا</span>
                            <span class="route-via">خبرة تصدير</span>
                        </li>
                        <li class="route-row reveal">
                            <span class="route-n">07</span>
                            <span class="route-country">أذربيجان</span>
                            <span class="route-via">خبرة تصدير</span>
                        </li>
                    </ol>
                </div>

                <aside class="office-card reveal" id="oman">
                    <img src="{{ asset('assets/images/scenes/port-800.webp') }}" alt="" width="800"
                        height="1000" loading="lazy" decoding="async">
                    <span class="label">سلطنة عُمان · سوق سلال</span>
                    <h3 class="h3">حضورنا في عُمان</h3>
                    <p>يقرّبنا حضورنا المباشر في سوق سلال، سوق الفواكه والخضروات في عُمان، الجناح WMC04، من السوق والمشترين
                        والعاملين في تجارة الفواكه والخضروات الطازجة، ويساعدنا على فهم احتياجات السوق العُماني ومتابعة ظروف
                        العرض عن قرب.</p>
                    <a class="btn btn-white" href="{{ route('contact', ['lang' => 'ar']) }}#office-om">تواصل مع مكتب
                        عُمان<svg class="ic flip">
                            <use href="#i-arrow" />
                        </svg></a>
                </aside>
            </div>
        </section>

        <section class="grow" aria-labelledby="grow-h">
            <div class="container">
                <div class="grow-card reveal">
                    <div>
                        <span class="label">للمزارعين</span>
                        <h2 id="grow-h" class="h2">هل أنتم مزارعون أو منتجون؟</h2>
                        <p>الشركة مستعدة للتعاون مع المزارعين وأصحاب البساتين والبيوت المحمية ومخازن التبريد والموردين
                            الموثوقين في إيران. ويمكن للمنتجات ذات الجودة المناسبة لأسواق التصدير أن تدخل عملية التوريد بعد
                            دراسة العينات والجودة والطاقة التوريدية والتغليف وشروط التعاون.</p>
                        <a class="btn btn-white" href="{{ route('supplier', ['lang' => 'ar']) }}">افتح نموذج الموردين<svg
                                class="ic flip">
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
