<footer class="footer">

    <div class="container">

        <div class="footer-top">

            <p class="h2">تحتاجون سعراً؟ راسلونا.</p>

            <a class="btn btn-white" href="{{ route('home', ['lang' => 'ar']) }}#inquiry">طلب عرض سعر<svg class="ic flip">
                    <use href="#i-arrow" />
                </svg></a>

        </div>



        <div class="footer-grid">

            <div class="footer-brand">

                <a href="{{ route('home', ['lang' => 'ar']) }}" class="logo" aria-label="إكسبرس نديمي — الرئيسية">
                    <img class="logo-mark" src="{{ asset('assets/images/logo/nadimi-logo-96.png') }}"
                        srcset="{{ asset('assets/images/logo/nadimi-logo-192.png') }} 2x" width="50" height="50"
                        alt="" decoding="async">
                    <span class="logo-text">
                        <span class="logo-name">نديمي</span>
                        <span class="logo-sub">مُصدِّر المنتجات الطازجة</span>
                    </span>
                </a>
                <p>توريد وتصدير الفواكه والخضروات الطازجة من إيران إلى السوق العُماني، بحضور مباشر في سوق سلال – WMC04.
                </p>

                <div class="footer-social" aria-label="تابعونا">

                    <a href="https://wa.me/989144172605" aria-label="WhatsApp" target="_blank" rel="noopener"><svg
                            class="ic">
                            <use href="#i-whatsapp" />
                        </svg></a><a href="https://www.instagram.com/" aria-label="Instagram" target="_blank"
                        rel="noopener"><svg class="ic">
                            <use href="#i-instagram" />
                        </svg></a>

                </div>

            </div>



            <div>

                <h2 class="footer-h">روابط سريعة</h2>

                <ul class="footer-list">

                    <li><a href="{{ route('home', ['lang' => 'ar']) }}">الرئيسية</a></li>

                    <li><a href="{{ route('products', ['lang' => 'ar']) }}">المنتجات</a></li>

                    <li><a href="{{ route('about', ['lang' => 'ar']) }}">من نحن</a></li>

                    <li><a href="{{ route('contact', ['lang' => 'ar']) }}">اتصل بنا</a></li>

                    <li><a href="{{ route('supplier', ['lang' => 'ar']) }}">كن مورّداً</a></li>

                    <li><a href="{{ route('contact', ['lang' => 'ar', 'type' => 'complaint']) }}#contact-form">الاقتراحات
                            والشكاوى</a></li>

                </ul>

            </div>



            <div>

                <h2 class="footer-h">المنتجات</h2>

                <ul class="footer-list footer-cols">

                    <li><a href="{{ route('product', ['lang' => 'ar']) }}">طماطم</a></li>

                    <li><a href="{{ route('product', ['lang' => 'ar']) }}">ملفوف</a></li>

                    <li><a href="{{ route('product', ['lang' => 'ar']) }}">قرنبيط</a></li>

                    <li><a href="{{ route('product', ['lang' => 'ar']) }}">خس</a></li>

                    <li><a href="{{ route('product', ['lang' => 'ar']) }}">مشمش</a></li>

                    <li><a href="{{ route('product', ['lang' => 'ar']) }}">كرز</a></li>

                    <li><a href="{{ route('product', ['lang' => 'ar']) }}">نكتارين</a></li>

                    <li><a href="{{ route('product', ['lang' => 'ar']) }}">رمان</a></li>

                </ul>

            </div>



            <div>

                <h2 class="footer-h">مكتب إيران</h2>

                <ul class="footer-list footer-contact">

                    <li><svg class="ic">
                            <use href="#i-phone" />
                        </svg><a href="tel:+989124361450" dir="ltr">+98 912 436 1450</a></li>

                    <li><svg class="ic">
                            <use href="#i-whatsapp" />
                        </svg><a href="https://wa.me/989144172605" dir="ltr" target="_blank" rel="noopener">+98 914
                            417 2605</a></li>

                    <li><svg class="ic">
                            <use href="#i-mail" />
                        </svg><a href="mailto:iran@nadimi.example">iran@nadimi.example</a></li>

                </ul>

            </div>

            <div>

                <h2 class="footer-h">مكتب عُمان</h2>

                <ul class="footer-list footer-contact">

                    <li><svg class="ic">
                            <use href="#i-pin" />
                        </svg><span>سوق سلال – WMC04، سلطنة عُمان</span></li>

                    <li><svg class="ic">
                            <use href="#i-phone" />
                        </svg><a href="tel:+96899482094" dir="ltr">+968 9948 2094</a></li>

                    <li><svg class="ic">
                            <use href="#i-phone" />
                        </svg><a href="tel:+96899504094" dir="ltr">+968 9950 4094</a></li>

                    <li><svg class="ic">
                            <use href="#i-mail" />
                        </svg><a href="mailto:oman@nadimi.example">oman@nadimi.example</a></li>

                </ul>

            </div>

        </div>



        <div class="footer-word" aria-hidden="true">Nadimi</div>

        <div class="footer-bottom">

            <p>© 2026 Nadimi International LLC. جميع الحقوق محفوظة.</p>

            <p>إكسبرس نديمي علامة تجارية لشركة Nadimi International LLC.</p>

        </div>

    </div>

</footer>

<nav class="mbar" aria-label="طلب عرض سعر">
    <a href="tel:+96899482094"><svg class="ic">
            <use href="#i-phone" />
        </svg><span>اتصال</span></a>
    <a href="https://wa.me/989144172605" target="_blank" rel="noopener" class="mbar-wa"><svg class="ic">
            <use href="#i-whatsapp" />
        </svg><span>واتساب</span></a>
    <a href="{{ route('home', ['lang' => 'ar']) }}#inquiry" class="mbar-quote"><svg class="ic">
            <use href="#i-file" />
        </svg><span>عرض سعر</span></a>
</nav>
