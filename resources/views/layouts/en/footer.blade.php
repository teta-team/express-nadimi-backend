<footer class="footer">

    <div class="container">

        <div class="footer-top">

            <p class="h2">Need a price? Send us a message.</p>

            <a class="btn btn-white" href="{{ route('home', ['lang' => 'en']) }}#inquiry">Request a quote<svg
                    class="ic flip">
                    <use href="#i-arrow" />
                </svg></a>

        </div>



        <div class="footer-grid">

            <div class="footer-brand">

                <a href="{{ route('home', ['lang' => 'en']) }}" class="logo" aria-label="Express Nadimi — Home">
                    <img class="logo-mark" src="{{ asset('assets/images/logo/nadimi-logo-96.png') }}"
                        srcset="{{ asset('assets/images/logo/nadimi-logo-192.png') }} 2x" width="50" height="50"
                        alt="" decoding="async">
                    <span class="logo-text">
                        <span class="logo-name">Nadimi</span>
                        <span class="logo-sub">Express · Fresh export</span>
                    </span>
                </a>
                <p>Fresh produce supply and export from Iran to the Oman market — present at Souq Silal, WMC04.</p>

                <div class="footer-social" aria-label="Follow us">

                    <a href="https://wa.me/989144172605" aria-label="WhatsApp" target="_blank" rel="noopener"><svg
                            class="ic">
                            <use href="#i-whatsapp" />
                        </svg></a><a href="https://www.instagram.com/export_nadimi?mdxt=MTV2cHA3c3NzZmd4bg=="
                        aria-label="Instagram" target="_blank" rel="noopener"><svg class="ic">
                            <use href="#i-instagram" />
                        </svg></a>

                </div>

            </div>



            <div>

                <h2 class="footer-h">Quick links</h2>

                <ul class="footer-list">

                    <li><a href="{{ route('home', ['lang' => 'en']) }}">Home</a></li>

                    <li><a href="{{ route('products', ['lang' => 'en']) }}">Products</a></li>

                    <li><a href="{{ route('about', ['lang' => 'en']) }}">About us</a></li>

                    <li><a href="{{ route('contact', ['lang' => 'en']) }}">Contact</a></li>

                    <li><a href="{{ route('supplier', ['lang' => 'en']) }}">Become a supplier</a></li>

                    <li><a href="{{ route('contact', ['lang' => 'en', 'type' => 'complaint']) }}#contact-form">Suggestions
                            &amp; complaints</a></li>

                </ul>

            </div>



            <div>
                <h2 class="footer-h">Products</h2>

                <ul class="footer-list footer-cols">
                    @forelse ($footerProducts as $product)
                        @php
                            $productName = is_array($product->name)
                                ? $product->name['en'] ?? ($product->name['fa'] ?? $product->slug)
                                : ($product->name ?:
                                $product->slug);
                        @endphp

                        <li>
                            <a
                                href="{{ route('product.show', [
                                    'lang' => 'en',
                                    'slug' => $product->slug,
                                ]) }}">
                                {{ $productName }}
                            </a>
                        </li>
                    @empty
                        <li>No products to display.</li>
                    @endforelse

                    <li>
                        <a href="{{ route('products', ['lang' => 'en']) }}">
                            All products
                        </a>
                    </li>
                </ul>
            </div>



            <div>

                <h2 class="footer-h">Iran office</h2>

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

                <h2 class="footer-h">Oman office</h2>

                <ul class="footer-list footer-contact">

                    <li><svg class="ic">
                            <use href="#i-pin" />
                        </svg><span>Souq Silal – WMC04, Sultanate of Oman</span></li>

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

            <p>© 2026 Nadimi International LLC. All rights reserved.</p>

            <p>Express Nadimi is a brand of Nadimi International LLC.</p>

            <p>Powered by <a href="https://tetateam.com" target="_blank" rel="noopener">TETA Team</a></p>

        </div>

    </div>

</footer>

<nav class="mbar" aria-label="Request a quote">
    <a href="tel:+96899482094"><svg class="ic">
            <use href="#i-phone" />
        </svg><span>Call</span></a>
    <a href="https://wa.me/989144172605" target="_blank" rel="noopener" class="mbar-wa"><svg class="ic">
            <use href="#i-whatsapp" />
        </svg><span>WhatsApp</span></a>
    <a href="{{ route('home', ['lang' => 'en']) }}#inquiry" class="mbar-quote"><svg class="ic">
            <use href="#i-file" />
        </svg><span>Quote</span></a>
</nav>
