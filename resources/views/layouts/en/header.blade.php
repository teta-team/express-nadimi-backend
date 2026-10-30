@php
    // Language switcher: link to the same page in the other language (falls back to home)
    $langUrl = function (string $target) {
        try {
            $current = request()->route();
            $name = $current ? $current->getName() : null;

            if ($name && $name !== 'home') {
                $params = array_filter($current->parameters(), 'is_scalar');

                return route($name, array_merge($params, ['lang' => $target]));
            }
        } catch (\Throwable $e) {
            // fall through to the home page
        }

        return route('home', ['lang' => $target]);
    };
@endphp
  <svg xmlns="http://www.w3.org/2000/svg" class="sprite" aria-hidden="true" focusable="false">

      <defs>

          <symbol id="i-arrow" viewBox="0 0 24 24">
              <path d="M5 12h14" />
              <path d="m12 5 7 7-7 7" />
          </symbol>

          <symbol id="i-chevron" viewBox="0 0 24 24">
              <path d="m6 9 6 6 6-6" />
          </symbol>

          <symbol id="i-phone" viewBox="0 0 24 24">
              <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z" />
          </symbol>

          <symbol id="i-whatsapp" viewBox="0 0 24 24">
              <path d="m3 21 1.65-3.8a9 9 0 1 1 3.4 2.9L3 21" />
              <path d="M9 10a.5.5 0 0 0 1 0V9a.5.5 0 0 0-1 0v1a5 5 0 0 0 5 5h1a.5.5 0 0 0 0-1h-1a.5.5 0 0 0 0 1" />
          </symbol>

          <symbol id="i-mail" viewBox="0 0 24 24">
              <rect width="20" height="16" x="2" y="4" rx="2" />
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
          </symbol>

          <symbol id="i-pin" viewBox="0 0 24 24">
              <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
              <circle cx="12" cy="10" r="3" />
          </symbol>

          <symbol id="i-clock" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 6v6l4 2" />
          </symbol>

          <symbol id="i-globe" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
              <path d="M2 12h20" />
          </symbol>

          <symbol id="i-menu" viewBox="0 0 24 24">
              <path d="M4 7h16" />
              <path d="M4 12h16" />
              <path d="M4 17h10" />
          </symbol>

          <symbol id="i-x" viewBox="0 0 24 24">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
          </symbol>

          <symbol id="i-truck" viewBox="0 0 24 24">
              <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" />
              <path d="M15 18H9" />
              <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62l-3.48-4.35A1 1 0 0 0 17.52 8H14" />
              <circle cx="17" cy="18" r="2" />
              <circle cx="7" cy="18" r="2" />
          </symbol>

          <symbol id="i-snow" viewBox="0 0 24 24">
              <path d="M2 12h20" />
              <path d="M12 2v20" />
              <path d="m20 16-4-4 4-4" />
              <path d="m4 8 4 4-4 4" />
              <path d="m16 4-4 4-4-4" />
              <path d="m8 20 4-4 4 4" />
          </symbol>

          <symbol id="i-box" viewBox="0 0 24 24">
              <path
                  d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z" />
              <path d="M12 22V12" />
              <path d="m3.3 7 7.7 4.73a2 2 0 0 0 2 0L20.7 7" />
              <path d="m7.5 4.27 9 5.15" />
          </symbol>

          <symbol id="i-shield" viewBox="0 0 24 24">
              <path
                  d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
              <path d="m9 12 2 2 4-4" />
          </symbol>

          <symbol id="i-handshake" viewBox="0 0 24 24">
              <path d="m11 17 2 2a1 1 0 1 0 3-3" />
              <path
                  d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4" />
              <path d="m21 3 1 11h-2" />
              <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3" />
              <path d="M3 4h8" />
          </symbol>

          <symbol id="i-sprout" viewBox="0 0 24 24">
              <path d="M7 20h10" />
              <path d="M10 20c5.5-2.5.8-6.4 3-10" />
              <path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z" />
              <path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z" />
          </symbol>

          <symbol id="i-leaf" viewBox="0 0 24 24">
              <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" />
              <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12" />
          </symbol>

          <symbol id="i-check" viewBox="0 0 24 24">
              <path d="M20 6 9 17l-5-5" />
          </symbol>

          <symbol id="i-search" viewBox="0 0 24 24">
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.3-4.3" />
          </symbol>

          <symbol id="i-ship" viewBox="0 0 24 24">
              <path d="M12 10.19V14" />
              <path d="M12 2v3" />
              <path d="M19 13V7a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v6" />
              <path d="M19.38 20A11.6 11.6 0 0 0 21 14l-8.19-3.64a2 2 0 0 0-1.62 0L3 14a11.6 11.6 0 0 0 2.81 7.76" />
              <path
                  d="M2 21c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1s1.2 1 2.5 1c2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1" />
          </symbol>

          <symbol id="i-calendar" viewBox="0 0 24 24">
              <rect width="18" height="18" x="3" y="4" rx="2" />
              <path d="M16 2v4" />
              <path d="M8 2v4" />
              <path d="M3 10h18" />
          </symbol>

          <symbol id="i-file" viewBox="0 0 24 24">
              <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
              <path d="M14 2v4a2 2 0 0 0 2 2h4" />
              <path d="M10 9H8" />
              <path d="M16 13H8" />
              <path d="M16 17H8" />
          </symbol>

          <symbol id="i-tag" viewBox="0 0 24 24">
              <path
                  d="M12.59 2.59A2 2 0 0 0 11.17 2H4a2 2 0 0 0-2 2v7.17a2 2 0 0 0 .59 1.42l8.7 8.7a2.43 2.43 0 0 0 3.42 0l6.58-6.58a2.43 2.43 0 0 0 0-3.42z" />
              <circle cx="7.5" cy="7.5" r="1" />
          </symbol>

          <symbol id="i-hand" viewBox="0 0 24 24">
              <path d="m15 11-1 9" />
              <path d="m19 11-4-7" />
              <path d="M2 11h20" />
              <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4" />
              <path d="M4.5 15.5h15" />
              <path d="m5 11 4-7" />
              <path d="m9 11 1 9" />
          </symbol>

          <symbol id="i-filter" viewBox="0 0 24 24">
              <path d="M22 3H2l8 9.46V19l4 2v-8.54z" />
          </symbol>

          <symbol id="i-upload" viewBox="0 0 24 24">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
              <path d="m17 8-5-5-5 5" />
              <path d="M12 3v12" />
          </symbol>

          <symbol id="i-image" viewBox="0 0 24 24">
              <rect width="18" height="18" x="3" y="3" rx="2" />
              <circle cx="9" cy="9" r="2" />
              <path d="m21 15-3.09-3.09a2 2 0 0 0-2.82 0L6 21" />
          </symbol>

          <symbol id="i-video" viewBox="0 0 24 24">
              <path d="m16 13 5.22 3.48a.5.5 0 0 0 .78-.42V7.87a.5.5 0 0 0-.75-.43L16 10.5" />
              <rect x="2" y="6" width="14" height="12" rx="2" />
          </symbol>

          <symbol id="i-user" viewBox="0 0 24 24">
              <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
              <circle cx="12" cy="7" r="4" />
          </symbol>

          <symbol id="i-message" viewBox="0 0 24 24">
              <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
          </symbol>

          <symbol id="i-bulb" viewBox="0 0 24 24">
              <path
                  d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" />
              <path d="M9 18h6" />
              <path d="M10 22h4" />
          </symbol>

          <symbol id="i-alert" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 8v4" />
              <path d="M12 16h.01" />
          </symbol>

          <symbol id="i-copy" viewBox="0 0 24 24">
              <rect width="14" height="14" x="8" y="8" rx="2" />
              <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
          </symbol>

          <symbol id="i-instagram" viewBox="0 0 24 24">
              <rect width="20" height="20" x="2" y="2" rx="5" />
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
              <path d="M17.5 6.5h.01" />
          </symbol>

          <symbol id="i-linkedin" viewBox="0 0 24 24">
              <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z" />
              <rect width="4" height="12" x="2" y="9" />
              <circle cx="4" cy="4" r="2" />
          </symbol>

          <symbol id="i-telegram" viewBox="0 0 24 24">
              <path
                  d="M14.54 21.69a.5.5 0 0 0 .94-.03l6.5-19a.5.5 0 0 0-.64-.63l-19 6.5a.5.5 0 0 0-.02.93l7.93 3.18a2 2 0 0 1 1.11 1.11z" />
              <path d="m21.85 2.15-10.94 10.94" />
          </symbol>

          <symbol id="i-award" viewBox="0 0 24 24">
              <circle cx="12" cy="8" r="6" />
              <path d="M15.48 12.89 17 22l-5-3-5 3 1.52-9.11" />
          </symbol>

          <symbol id="i-map" viewBox="0 0 24 24">
              <path
                  d="M14.1 5.55a2 2 0 0 0 1.8 0l3.65-1.83A1 1 0 0 1 21 4.62v12.76a1 1 0 0 1-.55.9l-4.56 2.27a2 2 0 0 1-1.78 0l-4.22-2.1a2 2 0 0 0-1.78 0l-3.66 1.83A1 1 0 0 1 3 19.38V6.62a1 1 0 0 1 .55-.9l4.56-2.27a2 2 0 0 1 1.78 0z" />
              <path d="M15 5.76v15" />
              <path d="M9 3.24v15" />
          </symbol>

          <symbol id="i-building" viewBox="0 0 24 24">
              <rect width="16" height="20" x="4" y="2" rx="2" />
              <path d="M9 22v-4h6v4" />
              <path d="M8 6h.01" />
              <path d="M16 6h.01" />
              <path d="M12 6h.01" />
              <path d="M12 10h.01" />
              <path d="M12 14h.01" />
              <path d="M16 10h.01" />
              <path d="M16 14h.01" />
              <path d="M8 10h.01" />
              <path d="M8 14h.01" />
          </symbol>

          <symbol id="i-thermo" viewBox="0 0 24 24">
              <path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z" />
          </symbol>

          <symbol id="i-grid" viewBox="0 0 24 24">
              <rect width="7" height="9" x="3" y="3" rx="1" />
              <rect width="7" height="5" x="14" y="3" rx="1" />
              <rect width="7" height="9" x="14" y="12" rx="1" />
              <rect width="7" height="5" x="3" y="16" rx="1" />
          </symbol>

          <symbol id="i-inbox" viewBox="0 0 24 24">
              <path d="M22 12h-6l-2 3h-4l-2-3H2" />
              <path
                  d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
          </symbol>

          <symbol id="i-key" viewBox="0 0 24 24">
              <circle cx="7.5" cy="15.5" r="5.5" />
              <path d="m21 2-9.6 9.6" />
              <path d="m15.5 7.5 3 3L22 7l-3-3" />
          </symbol>

          <symbol id="i-logout" viewBox="0 0 24 24">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
              <path d="m16 17 5-5-5-5" />
              <path d="M21 12H9" />
          </symbol>

          <symbol id="i-trash" viewBox="0 0 24 24">
              <path d="M3 6h18" />
              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
          </symbol>

          <symbol id="i-plus" viewBox="0 0 24 24">
              <path d="M5 12h14" />
              <path d="M12 5v14" />
          </symbol>

          <symbol id="i-eye" viewBox="0 0 24 24">
              <path d="M2.06 12.35a1 1 0 0 1 0-.7 10.75 10.75 0 0 1 19.88 0 1 1 0 0 1 0 .7 10.75 10.75 0 0 1-19.88 0" />
              <circle cx="12" cy="12" r="3" />
          </symbol>

          <symbol id="i-moon" viewBox="0 0 24 24">
              <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
          </symbol>

          <symbol id="i-sun" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="4" />
              <path d="M12 2v2" />
              <path d="M12 20v2" />
              <path d="m4.93 4.93 1.41 1.41" />
              <path d="m17.66 17.66 1.41 1.41" />
              <path d="M2 12h2" />
              <path d="M20 12h2" />
              <path d="m6.34 17.66-1.41 1.41" />
              <path d="m19.07 4.93-1.41 1.41" />
          </symbol>

      </defs>

  </svg>

  <header class="site-header" data-header>
      <div class="container header-in">
          <a href="{{ route('home', ['lang' => 'en']) }}" class="logo" aria-label="Nadimi International — Home">
              <img class="logo-mark" src="{{ asset('assets/images/logo/nadimi-logo-96.png') }}"
                  srcset="{{ asset('assets/images/logo/nadimi-logo-192.png') }} 2x" width="50" height="50"
                  alt="Nadimi International" decoding="async">
              <span class="logo-text">
                  <span class="logo-name">Nadimi</span>
                  <span class="logo-sub">Express · Fresh export</span>
              </span>
          </a>

          <nav class="nav" aria-label="Main">
              <ul>
                  <li><a href="{{ route('home', ['lang' => 'en']) }}" aria-current="page">Home</a></li>
                  <li><a href="{{ route('products', ['lang' => 'en']) }}">Products</a></li>
                  <li><a href="{{ route('supplier', ['lang' => 'en']) }}">Cooperation</a></li>
                  <li><a href="{{ route('about', ['lang' => 'en']) }}">About us</a></li>
                  <li><a href="{{ route('contact', ['lang' => 'en']) }}">Contact</a></li>
              </ul>
          </nav>

          <div class="header-actions">
              <nav class="lang" aria-label="Language">
                  <a href="{{ $langUrl('en') }}" hreflang="en" lang="en" title="English"
                      aria-current="true">EN</a>
                  <a href="{{ $langUrl('fa') }}" hreflang="fa" lang="fa"
                      title="فارسی">FA</a>
                  <a href="{{ $langUrl('ar') }}" hreflang="ar" lang="ar"
                      title="العربية">AR</a>
              </nav>
              <button class="theme-btn" type="button" data-theme-toggle aria-pressed="false" aria-label="Dark mode"
                  title="Dark mode"><svg class="ic i-moon">
                      <use href="#i-moon" />
                  </svg><svg class="ic i-sun">
                      <use href="#i-sun" />
                  </svg></button>
              <a class="btn btn-sm header-quote" href="{{ route('home', ['lang' => 'en']) }}#inquiry">Request a
                  quote<svg class="ic flip">
                      <use href="#i-arrow" />
                  </svg></a>
              <button class="menu-btn" type="button" aria-expanded="false" aria-controls="mnav" data-menu-toggle>
                  <span class="menu-icon" aria-hidden="true"><i></i><i></i><i></i></span>
                  <span class="menu-label">Menu</span>
                  <span class="menu-label menu-label-close">Close</span>
              </button>
          </div>
      </div>


      <div class="mnav" id="mnav" data-mnav>
          <div class="mnav-clip">
              <div class="container mnav-in">
                  <nav class="mnav-links" aria-label="Menu">
                      <a href="{{ route('home', ['lang' => 'en']) }}" aria-current="page">
                          Home<svg class="ic flip">
                              <use href="#i-arrow" />
                          </svg>
                      </a>
                      <a href="{{ route('products', ['lang' => 'en']) }}">
                          Products<svg class="ic flip">
                              <use href="#i-arrow" />
                          </svg>
                      </a>
                      <a href="{{ route('supplier', ['lang' => 'en']) }}">
                          Cooperation<svg class="ic flip">
                              <use href="#i-arrow" />
                          </svg>
                      </a>
                      <a href="{{ route('about', ['lang' => 'en']) }}">
                          About us<svg class="ic flip">
                              <use href="#i-arrow" />
                          </svg>
                      </a>
                      <a href="{{ route('contact', ['lang' => 'en']) }}">
                          Contact<svg class="ic flip">
                              <use href="#i-arrow" />
                          </svg>
                      </a>
                  </nav>
                  <div class="mnav-foot">
                      <a class="btn btn-block" href="{{ route('home', ['lang' => 'en']) }}#inquiry">Request a
                          quote<svg class="ic flip">
                              <use href="#i-arrow" />
                          </svg></a>
                      <div class="mnav-langs">
                          <a href="{{ $langUrl('en') }}" hreflang="en" lang="en"
                              aria-current="true">English</a>
                          <a href="{{ $langUrl('fa') }}" hreflang="fa" lang="fa">فارسی</a>
                          <a href="{{ $langUrl('ar') }}" hreflang="ar" lang="ar">العربية</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>
