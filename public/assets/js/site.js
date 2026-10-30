/* Express Nadimi — small progressive enhancements. Everything works without JS. */
(() => {
    'use strict';

    const $ = (s, r = document) => r.querySelector(s);
    const $$ = (s, r = document) => [...r.querySelectorAll(s)];
    const html = document.documentElement;
    const lang = html.lang || 'en';
    const reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;
    const fmt = new Intl.NumberFormat(lang === 'fa' ? 'fa-IR' : 'en-US');

    /* ---------- Set active menu item based on current route ---------- */
    const setActiveMenu = () => {
        const normalize = (url) => url.replace(/\/$/, '');
        const currentPath = normalize(location.pathname);
        $$('nav.nav a, .mnav-links a').forEach((link) => {
            const href = link.getAttribute('href');
            const linkPath = normalize(new URL(href, location.origin).pathname);
            const isActive = currentPath === linkPath;
            link.setAttribute('aria-current', isActive ? 'page' : '');
        });
    };
    setActiveMenu();


    const header = $('[data-header]');
    const mnav = $('[data-mnav]');
    const menuBtn = $('[data-menu-toggle]');
    const menuOpen = () => mnav?.classList.contains('is-open');
    if (header) {
        let lastY = scrollY;
        let ticking = false;
        const update = () => {
            const y = scrollY;
            header.classList.toggle('is-solid', y > 8);
            const hide = y > lastY && y > 140 && !menuOpen();
            if (y < lastY - 4 || y < 140) {
                header.classList.remove('is-hidden');
                document.body.classList.remove('header-hidden');
            } else if (hide) {
                header.classList.add('is-hidden');
                document.body.classList.add('header-hidden');
            }
            lastY = y;
            ticking = false;
        };
        update();
        addEventListener('scroll', () => {
            if (!ticking) {
                ticking = true;
                requestAnimationFrame(update);
            }
        }, {passive: true});
        // keyboard users: bring the bar back when something inside it gets focus
        header.addEventListener('focusin', () => {
            header.classList.remove('is-hidden');
            document.body.classList.remove('header-hidden');
        });
    }

    /* ---------- Mobile menu: opens downward under the bar ---------- */
    if (mnav && menuBtn) {
        const setOpen = (open) => {
            mnav.classList.toggle('is-open', open);
            menuBtn.setAttribute('aria-expanded', String(open));
            $$('a', mnav).forEach((a) => {
                a.tabIndex = open ? 0 : -1;
            });
        };
        setOpen(false);
        menuBtn.addEventListener('click', () => setOpen(!menuOpen()));
        $$('a', mnav).forEach((a) => a.addEventListener('click', () => setOpen(false)));
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && menuOpen()) {
                setOpen(false);
                menuBtn.focus();
            }
        });
        matchMedia('(min-width: 1024px)').addEventListener('change', (m) => {
            if (m.matches) setOpen(false);
        });
    }

    /* ---------- Small language menu: close when clicking elsewhere ---------- */
    $$('details.lang-mini').forEach((d) => {
        document.addEventListener('click', (e) => {
            if (d.open && !d.contains(e.target)) d.open = false;
        });
    });

    /* ---------- Reveal on scroll (only for content below the fold) ---------- */
    const revealables = $$('.reveal');
    if ('IntersectionObserver' in window && !reduceMotion) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((en) => {
                if (!en.isIntersecting) return;
                en.target.classList.add('is-in');
                en.target.classList.remove('is-pending');
                io.unobserve(en.target);
            });
        }, {rootMargin: '0px 0px -8% 0px', threshold: 0.08});
        const fold = innerHeight * 0.92;
        revealables.forEach((el) => {
            if (el.getBoundingClientRect().top > fold) {
                el.classList.add('is-pending');
                io.observe(el);
            } else el.classList.add('is-in');
        });
    } else {
        revealables.forEach((el) => el.classList.add('is-in'));
    }

    /* ---------- Forms: busy state on submit (WhatsApp forms are handled by whatsapp-form.js) ---------- */
    $$('form:not([data-whatsapp-form])').forEach((form) => {
        form.addEventListener('submit', () => {
            const btn = $('button[type="submit"]', form);
            if (!btn || btn.classList.contains('is-busy')) return;
            setTimeout(() => {
                btn.classList.add('is-busy');
                const busy = form.dataset.busyText;
                const label = [...btn.childNodes].find((n) => n.nodeType === 3 && n.textContent.trim());
                if (busy && label) label.textContent = busy + ' ';
            }, 0);
            const note = $('[data-upload-note]', form);
            if (note) note.hidden = false;
        });
    });

    /* Scroll success / error notices into view */
    const notice = $('[data-autofocus]');
    if (notice) {
        notice.setAttribute('tabindex', '-1');
        setTimeout(() => {
            notice.scrollIntoView({block: 'center', behavior: reduceMotion ? 'auto' : 'smooth'});
            notice.focus({preventScroll: true});
        }, 120);
    }
    /* ---------- Products: filter by category + search ---------- */
    /* ---------- Products: server-side filters + scroll restoration ---------- */
    const productsGrid = $('[data-products]');

    if (productsGrid) {
        const searchInput = $('[data-search]');
        const filterLinks = $$('[data-filter]');
        const paginationLinks = $$('.products-pagination a');

        // Restore the previous scroll position after navigating to another
        // category or pagination page.
        const scrollKey = 'products-scroll-position';

        try {
            const savedScroll = sessionStorage.getItem(scrollKey);

            if (savedScroll !== null) {
                sessionStorage.removeItem(scrollKey);

                const scrollY = Number(savedScroll);

                if (Number.isFinite(scrollY) && scrollY >= 0) {
                    requestAnimationFrame(() => {
                        window.scrollTo({
                            top: scrollY, behavior: 'instant'
                        });
                    });
                }
            }
        } catch (error) {
            // Scrolling still works if sessionStorage is unavailable.
        }

        // Save scroll position before navigating through product filters.
        const saveScrollPosition = (link) => {
            if (!link || link.target === '_blank') return;
            if (link.hasAttribute('download')) return;

            try {
                sessionStorage.setItem(scrollKey, String(window.scrollY));
            } catch (error) {
                // Ignore storage restrictions.
            }
        };

        filterLinks.forEach((link) => {
            link.addEventListener('click', () => {
                // Allow the browser to follow the link normally.
                saveScrollPosition(link);
            });
        });

        paginationLinks.forEach((link) => {
            link.addEventListener('click', () => {
                saveScrollPosition(link);
            });
        });

        // Submit the search to Laravel (server-side) and swap the results in
        // place. This searches across every page, not only the current one.
        if (searchInput) {
            const params = new URLSearchParams(window.location.search);
            searchInput.value = params.get('search') || '';

            let searchTimer;
            let controller = null;

            const replaceResults = (doc) => {
                const newGrid = doc.querySelector('[data-products]');
                const currentGrid = document.querySelector('[data-products]');

                if (newGrid && currentGrid) {
                    currentGrid.innerHTML = newGrid.innerHTML;
                }

                const newPagination = doc.querySelector('.products-pagination');
                const currentPagination = document.querySelector('.products-pagination');

                if (currentPagination && newPagination) {
                    currentPagination.innerHTML = newPagination.innerHTML;
                } else if (currentPagination) {
                    currentPagination.remove();
                }

                const newCount = doc.querySelector('[data-count]');
                const currentCount = document.querySelector('[data-count]');

                if (newCount && currentCount) {
                    currentCount.innerHTML = newCount.innerHTML;
                    if (newCount.dataset.many) {
                        currentCount.dataset.many = newCount.dataset.many;
                    }
                }
            };

            searchInput.addEventListener('input', () => {
                clearTimeout(searchTimer);

                searchTimer = setTimeout(() => {
                    const url = new URL(window.location.href);
                    const query = searchInput.value.trim();

                    if (query) {
                        url.searchParams.set('search', query);
                    } else {
                        url.searchParams.delete('search');
                    }

                    // Start at page 1 for a new search.
                    url.searchParams.delete('page');

                    try {
                        sessionStorage.setItem(scrollKey, String(window.scrollY));
                    } catch (error) {
                        // Ignore storage restrictions.
                    }

                    if (controller) {
                        controller.abort();
                    }
                    controller = new AbortController();

                    fetch(url.toString(), {
                        method: 'GET', signal: controller.signal, headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            replaceResults(parser.parseFromString(html, 'text/html'));
                            history.replaceState(null, '', url.toString());
                        })
                        .catch(error => {
                            if (error.name === 'AbortError') {
                                return;
                            }
                            console.error('Error fetching products:', error);
                            window.location.assign(url.toString()); // Fallback
                        });
                }, 400);
            });
        }
    }
    /* ---------- Harvest calendar: category tabs ---------- */
    /* ---------- Availability calendar: category tabs ---------- */
    const cal = $('[data-cal]');

    if (cal) {
        const tabs = $$('[data-cal-filter]', cal);
        const groups = $$('[data-cal-group]', cal);

        tabs.forEach((tab) => {
            tab.addEventListener('click', () => {
                const category = tab.dataset.calFilter || '';

                tabs.forEach((item) => {
                    item.setAttribute('aria-pressed', String(item === tab));
                });

                groups.forEach((group) => {
                    group.hidden = Boolean(category && group.dataset.calGroup !== category);
                });
            });
        });
    }

    /* ---------- Contact: message type + office clocks + copy ---------- */
    const typeInputs = $$('input[name="type"]');
    if (typeInputs.length) {
        const sync = () => {
            const t = typeInputs.find((i) => i.checked)?.value;
            $$('[data-show-for]').forEach((el) => {
                el.hidden = el.dataset.showFor !== t;
            });
        };
        typeInputs.forEach((i) => i.addEventListener('change', sync));
        sync();
    }

    const clocks = $$('[data-clock]');
    if (clocks.length) {
        const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const locale = lang === 'fa' ? 'fa-IR' : lang === 'ar' ? 'ar-OM' : 'en-GB';
        const tick = () => {
            const now = new Date();
            clocks.forEach((c) => {
                const tz = c.dataset.tz;
                const [d1, d2] = c.dataset.days.split(',').map(Number);
                const [h1, h2] = c.dataset.hours.split(',').map(Number);
                const parts = Object.fromEntries(new Intl.DateTimeFormat('en-US', {
                    timeZone: tz,
                    weekday: 'short',
                    hour: '2-digit',
                    minute: '2-digit',
                    hourCycle: 'h23'
                }).formatToParts(now).map((p) => [p.type, p.value]));
                const day = DAYS.indexOf(parts.weekday);
                const hr = +parts.hour + +parts.minute / 60;
                const inDays = d1 <= d2 ? day >= d1 && day <= d2 : day >= d1 || day <= d2;
                const isOpen = inDays && hr >= h1 && hr < h2;
                $('[data-clock-time]', c).textContent = new Intl.DateTimeFormat(locale, {
                    timeZone: tz,
                    hour: '2-digit',
                    minute: '2-digit',
                    hourCycle: 'h23'
                }).format(now);
                const badge = $('[data-clock-badge]', c);
                badge.textContent = isOpen ? c.dataset.open : c.dataset.closed;
                badge.classList.toggle('is-open', isOpen);
            });
        };
        tick();
        setInterval(tick, 30000);
    }

    document.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-copy]');
        if (!btn || !navigator.clipboard) return;
        navigator.clipboard.writeText(btn.dataset.copy).then(() => {
            btn.classList.add('is-done');
            const label = btn.getAttribute('aria-label');
            btn.setAttribute('aria-label', btn.dataset.done || label);
            setTimeout(() => {
                btn.classList.remove('is-done');
                btn.setAttribute('aria-label', label);
            }, 1500);
        });
    });

    /* ---------- Price inquiry: multiple products ---------- */
    const inquiryProducts = $('#inquiry-products');
    const addInquiryProduct = $('#add-inquiry-product');

    if (inquiryProducts && addInquiryProduct) {
        const maxProducts = 30;

        const updateInquiryRows = () => {
            const rows = $$('.inquiry-product-row', inquiryProducts);

            rows.forEach((row) => {
                const removeBtn = $('.remove-inquiry-product', row);

                if (removeBtn) {
                    removeBtn.disabled = rows.length === 1;
                }
            });

            addInquiryProduct.disabled = rows.length >= maxProducts;
        };

        addInquiryProduct.addEventListener('click', () => {
            const rows = $$('.inquiry-product-row', inquiryProducts);

            if (rows.length >= maxProducts) return;

            const newRow = rows[0].cloneNode(true);
            const index = rows.length;

            $$('input, select, textarea', newRow).forEach((field) => {
                const match = field.name.match(/^products\[\d+\]\[(product|quantity|packaging)\]$/);

                if (match) {
                    field.name = `products[${index}][${match[1]}]`;
                }

                if (field.tagName === 'SELECT') {
                    field.selectedIndex = 0;
                } else {
                    field.value = '';
                }

                field.classList.remove('is-invalid');
                field.removeAttribute('aria-invalid');
            });

            // Remove validation errors cloned from the original row.
            $$('[data-validation-error], .field-error', newRow).forEach((el) => {
                el.remove();
            });

            // Also remove ordinary error paragraphs, if present.
            $$('p', newRow).forEach((el) => {
                if (el.classList.contains('error') || el.classList.contains('text-danger')) {
                    el.remove();
                }
            });

            inquiryProducts.appendChild(newRow);
            updateInquiryRows();
        });

        inquiryProducts.addEventListener('click', (event) => {
            const removeBtn = event.target.closest('.remove-inquiry-product');

            if (!removeBtn) return;

            const rows = $$('.inquiry-product-row', inquiryProducts);

            if (rows.length <= 1) return;

            removeBtn.closest('.inquiry-product-row').remove();

            // Re-index names so Laravel receives a continuous array.
            $$('.inquiry-product-row', inquiryProducts).forEach((row, index) => {
                $$('input, select, textarea', row).forEach((field) => {
                    const match = field.name.match(/^products\[\d+\]\[(product|quantity|packaging)\]$/);

                    if (match) {
                        field.name = `products[${index}][${match[1]}]`;
                    }
                });
            });

            updateInquiryRows();
        });

        updateInquiryRows();
    }


    /* ---------- Supplier form: progress, conditional questions, previews ---------- */
    const sform = $('[data-supplier]');
    if (sform) {
        const isMultistep = sform.dataset.multistep !== undefined;
        const ring = $('[data-ring]');
        const pct = $('[data-pct]');
        const rail = $('[data-rail-box]');
        const sections = $$('.ssec', sform);
        const steps = $$('.sstep');
        const stepNum = $('[data-step-num]');
        const prevBtn = $('[data-prev-step]');
        const nextBtn = $('[data-next-step]');
        const submitBtn = $('[data-submit-step]');
        const pfmt = new Intl.NumberFormat(lang === 'fa' ? 'fa-IR' : 'en-US', {style: 'percent'});
        let currentStep = 0;

        const filled = (el) => {
            if (el.type === 'file') return el.files.length > 0;
            if (el.type === 'checkbox') return el.checked;
            if (el.type === 'radio') return !!$(`input[name="${el.name}"]:checked`, sform);
            return el.value.trim() !== '';
        };
        const required = () => {
            const seen = new Set();
            return $$('[data-req]', sform).filter((el) => {
                if (el.type === 'radio') {
                    if (seen.has(el.name)) return false;
                    seen.add(el.name);
                }
                return true;
            });
        };
        const fieldLabels = {
            en: {
                name: 'full name',
                mobile: 'mobile number',
                whatsapp: 'WhatsApp number',
                province: 'province',
                city: 'city',
                role: 'type of activity',
                product: 'product name',
                variety: 'variety',
                origin: 'production location',
                quantity_tons: 'available quantity',
                frequency: 'supply frequency',
                capacity: 'supply capacity',
                ready_from: 'harvest start date',
                ready_until: 'supply availability date',
                grade: 'quality grade',
                size: 'size',
                sorted: 'sorting status',
                state: 'product status',
                visit: 'visit option',
                packing: 'packaging',
                pack_weight: 'pack weight',
                custom_pack: 'custom packaging',
                change_pack: 'packaging change',
                price: 'price',
                payment_terms: 'payment terms',
                price_terms: 'price terms',
                years: 'years of experience',
                export_history: 'export history',
                export_markets: 'export markets',
                long_term: 'long-term cooperation',
                'photos[]': 'product photos',
                'packaging_photos[]': 'packaging photos',
                video: 'video',
                notes: 'notes',
                confirm: 'confirmation'
            }, fa: {
                name: 'نام و نام خانوادگی',
                mobile: 'شماره موبایل',
                whatsapp: 'شماره واتساپ',
                province: 'استان',
                city: 'شهر',
                role: 'نوع فعالیت',
                product: 'نام محصول',
                variety: 'رقم محصول',
                origin: 'محل تولید',
                quantity_tons: 'مقدار بار',
                frequency: 'میزان تأمین',
                capacity: 'ظرفیت تأمین',
                ready_from: 'زمان آماده بودن بار',
                ready_until: 'پایان زمان تأمین',
                grade: 'درجه کیفی',
                size: 'سایز محصول',
                sorted: 'سورت محصول',
                state: 'وضعیت محصول',
                visit: 'امکان بازدید',
                packing: 'بسته‌بندی',
                pack_weight: 'وزن بسته',
                custom_pack: 'بسته‌بندی سفارشی',
                change_pack: 'تغییر بسته‌بندی',
                price: 'قیمت',
                payment_terms: 'نحوه تسویه',
                price_terms: 'شرایط قیمت',
                years: 'سابقه فعالیت',
                export_history: 'سابقه صادرات',
                export_markets: 'بازارهای صادراتی',
                long_term: 'همکاری بلندمدت',
                'photos[]': 'عکس محصول',
                'packaging_photos[]': 'عکس بسته‌بندی',
                video: 'ویدئو',
                notes: 'توضیحات',
                confirm: 'تأیید اطلاعات'
            }, ar: {
                name: 'الاسم الكامل',
                mobile: 'رقم الجوال',
                whatsapp: 'رقم واتساب',
                province: 'المحافظة',
                city: 'المدينة',
                role: 'نوع النشاط',
                product: 'اسم المنتج',
                variety: 'الصنف',
                origin: 'مكان الإنتاج',
                quantity_tons: 'الكمية المتاحة',
                frequency: 'معدل التوريد',
                capacity: 'طاقة التوريد',
                ready_from: 'تاريخ بدء الحصاد',
                ready_until: 'تاريخ انتهاء التوريد',
                grade: 'درجة الجودة',
                size: 'الحجم',
                sorted: 'حالة الفرز',
                state: 'حالة المنتج',
                visit: 'خيار الزيارة',
                packing: 'التعبئة',
                pack_weight: 'وزن العبوة',
                custom_pack: 'التعبئة المخصصة',
                change_pack: 'تغيير التعبئة',
                price: 'السعر',
                payment_terms: 'شروط الدفع',
                price_terms: 'شروط السعر',
                years: 'سنوات الخبرة',
                export_history: 'سجل التصدير',
                export_markets: 'أسواق التصدير',
                long_term: 'التعاون طويل الأمد',
                'photos[]': 'صور المنتج',
                'packaging_photos[]': 'صور التعبئة',
                video: 'الفيديو',
                notes: 'ملاحظات',
                confirm: 'تأكيد المعلومات'
            }
        };

        const fieldRules = {
            name: {required: true, maxlength: 255},
            mobile: {required: true, pattern: /^[0-9\+\-\s\(\)]+$/},
            whatsapp: {pattern: /^[0-9\+\-\s\(\)]+$/},
            city: {required: true, maxlength: 255},
            province: {required: true},
            role: {required: true},
            product: {required: true, maxlength: 255},
            variety: {maxlength: 255},
            origin: {required: true, maxlength: 255},
            quantity_tons: {required: true, numeric: true, min: 0.1},
            frequency: {},
            capacity: {maxlength: 255},
            ready_from: {required: true, date: true},
            ready_until: {date: true, afterOrEqual: 'ready_from'},
            grade: {maxlength: 255},
            size: {maxlength: 255},
            sorted: {},
            state: {},
            visit: {},
            packing: {},
            pack_weight: {numeric: true, min: 0},
            custom_pack: {},
            change_pack: {},
            price: {numeric: true, min: 0},
            payment_terms: {maxlength: 255},
            price_terms: {},
            years: {numeric: true, min: 0, max: 100},
            export_history: {},
            export_markets: {maxlength: 255},
            long_term: {},
            notes: {maxlength: 4000},
            confirm: {required: true},
            'photos[]': {fileMaxCount: 8, mimes: ['image/jpeg', 'image/png', 'image/webp'], maxFile: 8192},
            'packaging_photos[]': {fileMaxCount: 8, mimes: ['image/jpeg', 'image/png', 'image/webp'], maxFile: 8192},
            video: {mimes: ['video/mp4', 'video/quicktime', 'video/webm'], maxFile: 51200}
        };

        const ruleMessages = {
            en: {
                required: (l) => `${l} is required`,
                numeric: (l) => `${l} must be a number`,
                min: (l, v) => `${l} must be at least ${v}`,
                max: (l, v) => `${l} must not be greater than ${v}`,
                maxlength: (l, v) => `${l} must not be longer than ${v} characters`,
                pattern: (l) => `${l} format is invalid`,
                date: (l) => `${l} is not a valid date`,
                afterOrEqual: (l, o) => `${l} must be a date after or equal to ${o}`,
                mimes: (l, v) => `${l} must be a file of type: ${v}`,
                maxFile: (l, v) => `${l} must not be greater than ${v} kilobytes`,
                maxFileCount: (l, v) => `${l} must not have more than ${v} files`
            }, fa: {
                required: (l) => `فیلد ${l} الزامی است`,
                numeric: (l) => `فیلد ${l} باید عدد باشد`,
                min: (l, v) => `فیلد ${l} باید حداقل ${v} باشد`,
                max: (l, v) => `فیلد ${l} نباید بیشتر از ${v} باشد`,
                maxlength: (l, v) => `فیلد ${l} نباید بیشتر از ${v} کاراکتر باشد`,
                pattern: (l) => `فرمت فیلد ${l} معتبر نیست`,
                date: (l) => `فیلد ${l} یک تاریخ معتبر نیست`,
                afterOrEqual: (l, o) => `فیلد ${l} باید تاریخی برابر یا بعد از ${o} باشد`,
                mimes: (l, v) => `فیلد ${l} باید فایلی از نوع ${v} باشد`,
                maxFile: (l, v) => `حجم فیلد ${l} نباید بیشتر از ${v} کیلوبایت باشد`,
                maxFileCount: (l, v) => `فیلد ${l} نباید بیشتر از ${v} فایل داشته باشد`
            }, ar: {
                required: (l) => `حقل ${l} مطلوب`,
                numeric: (l) => `يجب أن يكون حقل ${l} رقماً`,
                min: (l, v) => `يجب ألا يقل حقل ${l} عن ${v}`,
                max: (l, v) => `يجب ألا يزيد حقل ${l} عن ${v}`,
                maxlength: (l, v) => `يجب ألا يزيد حقل ${l} عن ${v} حرفاً`,
                pattern: (l) => `تنسيق حقل ${l} غير صالح`,
                date: (l) => `حقل ${l} ليس تاريخاً صالحاً`,
                afterOrEqual: (l, o) => `يجب أن يكون حقل ${l} تاريخاً مساوياً أو بعد ${o}`,
                mimes: (l, v) => `يجب أن يكون حقل ${l} ملفاً من النوع ${v}`,
                maxFile: (l, v) => `يجب ألا يزيد حجم حقل ${l} عن ${v} كيلوبايت`,
                maxFileCount: (l, v) => `يجب ألا يحتوي حقل ${l} على أكثر من ${v} ملفات`
            }
        };

        const fieldLabel = (el) => el.dataset.label || fieldLabels[lang]?.[el.name] || el.name;
        const valueOf = (name) => {
            const radio = $(`input[type="radio"][name="${name}"]:checked`, sform);
            if (radio) return radio.value;
            const el = $(`[name="${name}"]`, sform);
            return el ? el.value : '';
        };
        const isConditionallyHidden = (el) => !!el.closest('[data-if][hidden]');

        const validateField = (el, spec) => {
            const t = ruleMessages[lang] || ruleMessages.en;
            const label = fieldLabel(el);
            const required = spec.required || el.hasAttribute('data-req');
            const empty = !filled(el);
            const errors = [];

            if (required && empty) {
                errors.push(t.required(label));
                return errors;
            }
            if (empty) return errors;

            const value = el.type === 'radio' ? valueOf(el.name) : el.value;

            if (spec.numeric && (value === '' || isNaN(Number(value)))) {
                errors.push(t.numeric(label));
                return errors;
            }
            if (spec.min !== undefined && Number(value) < spec.min) errors.push(t.min(label, spec.min));
            if (spec.max !== undefined && Number(value) > spec.max) errors.push(t.max(label, spec.max));
            if (spec.maxlength && String(value).length > spec.maxlength) errors.push(t.maxlength(label, spec.maxlength));
            if (spec.pattern && !spec.pattern.test(value)) errors.push(t.pattern(label));
            if (spec.date && isNaN(Date.parse(value))) errors.push(t.date(label));
            if (spec.afterOrEqual) {
                const other = valueOf(spec.afterOrEqual);
                if (other && Date.parse(value) < Date.parse(other)) {
                    errors.push(t.afterOrEqual(label, fieldLabels[lang]?.[spec.afterOrEqual] || spec.afterOrEqual));
                }
            }
            if (spec.mimes && el.type === 'file' && el.files.length) {
                if (spec.fileMaxCount && el.files.length > spec.fileMaxCount) {
                    errors.push(t.maxFileCount(label, spec.fileMaxCount));
                }
                [...el.files].forEach((file) => {
                    if (!spec.mimes.includes(file.type)) {
                        errors.push(t.mimes(label, spec.mimes.join(', ')));
                    }
                    if (spec.maxFile && file.size > spec.maxFile * 1024) {
                        errors.push(t.maxFile(label, spec.maxFile));
                    }
                });
            }
            return errors;
        };

        const validateSection = (stepIdx) => {
            const section = sections[stepIdx];
            if (!section) return [];
            const seen = new Set();
            const errors = [];
            $$('input, select, textarea', section).forEach((el) => {
                const name = el.name;
                if (!name || seen.has(name) || !fieldRules[name]) return;
                seen.add(name);
                if (el.disabled || isConditionallyHidden(el)) return;
                const messages = validateField(el, fieldRules[name]);
                if (messages.length) {
                    (el.closest('.field') || el.closest('fieldset'))?.classList.add('bad');
                    errors.push(...messages);
                }
            });
            return errors;
        };

        const modalLabels = {
            en: {title: 'Please fix the following errors:', button: 'Got it'},
            fa: {title: 'لطفا خطاهای زیر را اصلاح کنید:', button: 'فهمیدم'},
            ar: {title: 'يرجى إصلاح الأخطاء التالية:', button: 'حسناً'}
        };
        const showModal = (items) => {
            const msg = modalLabels[lang] || modalLabels.en;
            let backdrop = $('[data-modal-backdrop]');
            if (!backdrop) {
                backdrop = document.createElement('div');
                backdrop.dataset.modalBackdrop = '';
                backdrop.className = 'modal-backdrop';
                document.body.append(backdrop);
            }
            backdrop.innerHTML = '<div class="modal"><h3></h3><ul class="modal-errors"></ul><div class="modal-close"><button type="button" class="btn-ok"></button></div></div>';
            backdrop.querySelector('h3').textContent = msg.title;
            backdrop.querySelector('.btn-ok').textContent = msg.button;
            backdrop.querySelector('.btn-ok').addEventListener('click', () => backdrop.classList.remove('is-open'));
            const list = backdrop.querySelector('.modal-errors');
            items.forEach((text) => {
                const li = document.createElement('li');
                li.textContent = text;
                list.append(li);
            });
            backdrop.classList.add('is-open');
        };
        const validateStep = (stepIdx) => {
            const errors = validateSection(stepIdx);
            if (errors.length > 0) {
                showModal(errors);
                return false;
            }
            return true;
        };

        const normalizeDigits = (value) => value
            .replace(/[۰-۹]/g, (d) => String(d.charCodeAt(0) - 1776))
            .replace(/[٠-٩]/g, (d) => String(d.charCodeAt(0) - 1632));
        const digitsOnly = (value) => normalizeDigits(value).replace(/[^0-9]/g, '');
        const phoneOnly = (value) => normalizeDigits(value).replace(/[^0-9+\-() ]/g, '');
        const decimalOnly = (value) => {
            const cleaned = normalizeDigits(value).replace(/[^0-9.]/g, '');
            const parts = cleaned.split('.');
            return parts.length > 2 ? `${parts.shift()}.${parts.join('')}` : cleaned;
        };
        const noDigits = (value) => value.replace(/[0-9٠-٩۰-۹]/g, '');

        const inputFilters = {
            name: noDigits,
            city: noDigits,
            mobile: phoneOnly,
            whatsapp: phoneOnly,
            quantity_tons: decimalOnly,
            price: decimalOnly,
            pack_weight: decimalOnly,
            years: (value) => digitsOnly(value).slice(0, 3)
        };

        $$('input', sform).forEach((el) => {
            const filter = inputFilters[el.name];
            if (!filter) return;
            el.addEventListener('input', () => {
                const before = el.value;
                const next = filter(before);
                if (next === before) return;
                const caret = el.selectionStart ?? next.length;
                el.value = next;
                const position = Math.max(0, caret - (before.length - next.length));
                try {
                    el.setSelectionRange(position, position);
                } catch (err) {
                    // number inputs may not support selection range
                }
            });
        });

        $$('input[type="number"]', sform).forEach((el) => {
            el.addEventListener('keydown', (e) => {
                if (['e', 'E', '+', '-'].includes(e.key)) e.preventDefault();
            });
        });

        const update = () => {
            const req = required();
            const p = req.length ? req.filter(filled).length / req.length : 0;
            ring.style.strokeDashoffset = String(214 * (1 - p));
            pct.textContent = pfmt.format(p);
            rail.classList.toggle('is-full', p === 1);
            sections.forEach((s, i) => {
                const r = $$('[data-req]', s);
                const any = $$('input, select, textarea', s).some((el) => el.type !== 'hidden' && filled(el));
                const done = r.length ? r.every(filled) : any;
                steps[i]?.classList.toggle('is-done', done);
            });
        };
        const conditions = () => {
            $$('[data-if]', sform).forEach((el) => {
                const [name, vals] = el.dataset.if.split(':');
                const c = $(`input[name="${name}"]:checked`, sform);
                el.hidden = !(c && vals.split(',').includes(c.value));
            });
        };
        const showStep = (idx) => {
            if (idx < 0 || idx >= sections.length) return;
            sections.forEach((s, i) => s.hidden = i !== idx);
            steps.forEach((s, i) => s.classList.toggle('is-on', i === idx));
            currentStep = idx;
            if (stepNum) stepNum.textContent = String(idx + 1);
            const isLast = idx === sections.length - 1;
            const isFirst = idx === 0;
            if (prevBtn) prevBtn.hidden = isFirst;
            if (nextBtn) nextBtn.hidden = isLast;
            if (submitBtn) submitBtn.hidden = !isLast;
            conditions();
            sform.scrollIntoView({block: 'start', behavior: 'smooth'});
        };

        ['input', 'change'].forEach((ev) => sform.addEventListener(ev, (e) => {
            e.target.closest('.field')?.classList.remove('bad');
            e.target.closest('fieldset')?.classList.remove('bad');
            conditions();
            update();
        }));

        $$('.drop input[type="file"]', sform).forEach((inp) => inp.addEventListener('change', () => {
            const box = inp.closest('.field').querySelector('.thumbs');
            box.textContent = '';
            [...inp.files].slice(0, 12).forEach((f) => {
                if (f.type.startsWith('image/')) {
                    const img = new Image();
                    img.alt = f.name;
                    img.src = URL.createObjectURL(f);
                    img.onload = () => URL.revokeObjectURL(img.src);
                    box.append(img);
                } else {
                    const s = document.createElement('span');
                    s.className = 'fn';
                    s.textContent = f.name;
                    box.append(s);
                }
            });
        }));

        if (isMultistep) {
            if (nextBtn) nextBtn.addEventListener('click', () => {
                if (validateStep(currentStep)) {
                    showStep(currentStep + 1);
                }
            });
            if (prevBtn) prevBtn.addEventListener('click', () => showStep(currentStep - 1));
            steps.forEach((s) => s.addEventListener('click', () => {
                const idx = parseInt(s.dataset.step, 10);
                showStep(idx);
            }));
            showStep(0);
            sform.addEventListener('submit', (e) => {
                e.preventDefault();
                const groups = [];
                let hasError = false;

                for (let i = 0; i < sections.length; i++) {
                    const errors = validateSection(i);
                    if (errors.length > 0) {
                        hasError = true;
                        groups.push({step: i + 1, errors});
                    }
                }

                if (hasError) {
                    const items = [];
                    groups.forEach((item) => {
                        const stepLabel = lang === 'fa' ? 'مرحله ' + item.step : lang === 'ar' ? 'الخطوة ' + item.step : 'Step ' + item.step;
                        items.push(stepLabel + ':');
                        items.push(...item.errors);
                    });
                    showModal(items);
                    if (submitBtn) {
                        submitBtn.classList.remove('is-busy');
                        const busy = sform.dataset.busyText;
                        const label = [...submitBtn.childNodes].find((n) => n.nodeType === 3 && n.textContent.trim());
                        if (busy && label) label.textContent = label.textContent.replace(busy + ' ', '');
                    }
                    return false;
                }
                sform.submit();
            });
        } else {
            // highlight the section being read (original behavior)
            if ('IntersectionObserver' in window) {
                const so = new IntersectionObserver((entries) => {
                    entries.forEach((en) => {
                        if (!en.isIntersecting) return;
                        const i = sections.indexOf(en.target);
                        steps.forEach((s, j) => s.classList.toggle('is-on', j === i));
                    });
                }, {rootMargin: '-35% 0px -55% 0px'});
                sections.forEach((s) => so.observe(s));
            }
        }

        conditions();
        update();

        const serverErrors = $('[data-server-errors]');
        if (serverErrors) {
            try {
                const items = JSON.parse(serverErrors.textContent || '[]');
                if (Array.isArray(items) && items.length) {
                    showModal(items);
                }
            } catch (e) {
                // ignore malformed payload
            }
        }
    }
})();
