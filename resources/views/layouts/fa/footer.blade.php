<footer class="footer">

    <div class="container">

        <div class="footer-top">

            <p class="h2">قیمت می‌خواهید؟ یک پیام بفرستید.</p>

            <a class="btn btn-white" href="{{ route('home', ['lang' => 'fa']) }}#inquiry">درخواست استعلام
                <svg class="ic flip">
                    <use href="#i-arrow" />
                </svg>
            </a>

        </div>


        <div class="footer-grid">

            <div class="footer-brand">

                <a href="{{ route('home', ['lang' => 'fa']) }}" class="logo" aria-label="اکسپرس ندیمی — خانه">
                    <img class="logo-mark" src="{{ asset('assets/images/logo/nadimi-logo-96.webp') }}"
                        srcset="{{ asset('assets/images/logo/nadimi-logo-192.webp') }} 2x" width="50" height="50"
                        alt="" decoding="async">
                    <span class="logo-text">
                        <span class="logo-name">ندیمی</span>
                        <span class="logo-sub">صادرکننده محصولات تازه کشاورزی</span>
                    </span>
                </a>
                <p>تأمین و صادرات میوه و سبزیجات تازه از ایران به بازار عمان؛ حاضر در سوق سلال – WMC04.</p>

                <div class="footer-social" aria-label="ما را دنبال کنید">

                    <a href="https://wa.me/989144172605" aria-label="WhatsApp" target="_blank" rel="noopener">
                        <svg class="ic">
                            <use href="#i-whatsapp" />
                        </svg>
                    </a><a href="https://www.instagram.com/export_nadimi" aria-label="Instagram" target="_blank"
                        rel="noopener">
                        <svg class="ic">
                            <use href="#i-instagram" />
                        </svg>
                    </a>

                </div>

            </div>


            <div>

                <h2 class="footer-h">دسترسی سریع</h2>

                <ul class="footer-list">

                    <li><a href="{{ route('home', ['lang' => 'fa']) }}">خانه</a></li>

                    <li><a href="{{ route('products', ['lang' => 'fa']) }}">محصولات</a></li>

                    <li><a href="{{ route('about', ['lang' => 'fa']) }}">درباره ما</a></li>

                    <li><a href="{{ route('contact', ['lang' => 'fa']) }}">تماس با ما</a></li>

                </ul>

            </div>


            <div>
                <h2 class="footer-h">محصولات</h2>

                <ul class="footer-list footer-cols">
                    @forelse ($footerProducts as $product)
                        @php
                            $productName = is_array($product->name)
                                ? $product->name['fa'] ?? ($product->name['en'] ?? $product->slug)
                                : ($product->name ?:
                                $product->slug);
                        @endphp

                        <li>
                            <a
                                href="{{ route('product.show', [
                                    'lang' => 'fa',
                                    'slug' => $product->slug,
                                ]) }}">
                                {{ $productName }}
                            </a>
                        </li>
                    @empty
                        <li>محصولی برای نمایش وجود ندارد.</li>
                    @endforelse

                    <li>
                        <a href="{{ route('products', ['lang' => 'fa']) }}">
                            همه محصولات
                        </a>
                    </li>
                </ul>
            </div>


            <div>

                <h2 class="footer-h">دفتر ایران</h2>

                <ul class="footer-list footer-contact">

                    <li>
                        <svg class="ic">
                            <use href="#i-phone" />
                        </svg>
                        <a href="tel:+989124361450" dir="ltr">+98 912 436 1450</a>
                    </li>

                    <li>
                        <svg class="ic">
                            <use href="#i-whatsapp" />
                        </svg>
                        <a href="https://wa.me/989144172605" dir="ltr" target="_blank" rel="noopener">+98 914
                            417 2605</a>
                    </li>

                    <li>
                        <svg class="ic">
                            <use href="#i-mail" />
                        </svg>
                        <a href="mailto:info@nadimiinternational.com">
                            info@nadimiinternational.com
                        </a>
                    </li>

                </ul>

            </div>

            <div>

                <h2 class="footer-h">دفتر عمان</h2>

                <ul class="footer-list footer-contact">

                    <li>
                        <svg class="ic">
                            <use href="#i-pin" />
                        </svg>
                        <span>سوق سلال – WMC04، سلطنت عمان</span>
                    </li>

                    <li>
                        <svg class="ic">
                            <use href="#i-phone" />
                        </svg>
                        <a href="tel:+96899482094" dir="ltr">+968 9948 2094</a>
                    </li>

                    <li>
                        <svg class="ic">
                            <use href="#i-phone" />
                        </svg>
                        <a href="tel:+96899504094" dir="ltr">+968 9950 4094</a>
                    </li>

                    <li>
                        <svg class="ic">
                            <use href="#i-mail" />
                        </svg>
                        <a href="mailto:info@nadimiinternational.com">
                            info@nadimiinternational.com
                        </a>
                    </li>

                </ul>

            </div>

        </div>


        <div class="footer-word" aria-hidden="true">Nadimi</div>

        <div class="footer-bottom">

            <p>© ۲۰۲۶ Nadimi International. تمامی حقوق محفوظ است.</p>

            <p>اکسپورت ندیمی برند تجاری شرکت Nadimi International است.</p>

            <p>ساخته شده توسط <a href="https://tetateam.com" target="_blank" rel="noopener" style="color: #10B981">TETA
                    Team</a></p>

        </div>

    </div>

</footer>

<nav class="mbar" aria-label="درخواست استعلام">
    <a href="tel:+96899482094">
        <svg class="ic">
            <use href="#i-phone" />
        </svg>
        <span>تماس</span></a>
    <a href="https://wa.me/989144172605" target="_blank" rel="noopener" class="mbar-wa">
        <svg class="ic">
            <use href="#i-whatsapp" />
        </svg>
        <span>واتساپ</span></a>
    <a href="{{ route('home', ['lang' => 'fa']) }}#inquiry" class="mbar-quote">
        <svg class="ic">
            <use href="#i-file" />
        </svg>
        <span>استعلام</span></a>
</nav>
