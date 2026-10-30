/* 404 page: one file, three languages (fa / en / ar).
   Language order: saved choice -> language folder of the missing URL or referrer -> browser language -> fa.
   Also: "go back" button and a light pointer parallax for the floating icons. */
(() => {
    'use strict';

    const html = document.documentElement;
    const SUPPORTED = ['fa', 'en', 'ar'];
    const DIR = {fa: 'rtl', ar: 'rtl', en: 'ltr'};

    const TEXT = {
        fa: {
            title: '404 — این صفحه پیدا نشد | اکسپرس ندیمی',
            desc: 'صفحه‌ای که دنبال آن بودید پیدا نشد. از خانه، محصولات یا تماس با ما ادامه دهید.',
            home: 'اکسپرس ندیمی — خانه',
            langs: 'زبان',
            theme: 'تغییر حالت روشن/تیره',
            locale: 'fa_IR',
        }, en: {
            title: '404 — Page not found | Express Nadimi',
            desc: 'The page you were looking for could not be found. Continue from home, products or contact.',
            home: 'Express Nadimi — Home',
            langs: 'Language',
            theme: 'Toggle light / dark mode',
            locale: 'en_US',
        }, ar: {
            title: '404 — لم يتم العثور على الصفحة | إكسبرس نديمي',
            desc: 'لم يتم العثور على الصفحة التي تبحث عنها. تابع من الرئيسية أو المنتجات أو اتصل بنا.',
            home: 'إكسبرس نديمي — الرئيسية',
            langs: 'اللغة',
            theme: 'تبديل الوضع الفاتح / الداكن',
            locale: 'ar_AR',
        },
    };

    const fromPath = (path) => {
        const m = String(path || '').match(/\/(fa|en|ar)(?:\/|$)/i);
        return m ? m[1].toLowerCase() : null;
    };
    const fromReferrer = () => {
        try {
            const ref = new URL(document.referrer);
            return ref.origin === location.origin ? fromPath(ref.pathname) : null;
        } catch (e) {
            return null;
        }
    };
    const fromBrowser = () => (navigator.languages || [navigator.language || ''])
        .map((l) => String(l).slice(0, 2).toLowerCase())
        .find((l) => SUPPORTED.includes(l)) || null;
    const saved = () => {
        try {
            const v = localStorage.getItem('lang');
            return SUPPORTED.includes(v) ? v : null;
        } catch (e) {
            return null;
        }
    };

    const setMeta = (sel, attr, value) => document.querySelector(sel)?.setAttribute(attr, value);

    const apply = (lang) => {
        const t = TEXT[lang];
        html.lang = lang;
        html.dir = DIR[lang];
        document.title = t.title;
        setMeta('meta[name="description"]', 'content', t.desc);
        setMeta('meta[property="og:title"]', 'content', t.title);
        setMeta('meta[property="og:locale"]', 'content', t.locale);

        const home = document.querySelector('[data-home]');
        if (home) {
            const homeUrl = home.getAttribute('data-home-url-' + lang);
            if (homeUrl) home.href = homeUrl;
            home.setAttribute('aria-label', t.home);
        }
        const group = document.querySelector('[data-lang-switch]');
        if (group) group.setAttribute('aria-label', t.langs);
        document.querySelectorAll('[data-theme-toggle]').forEach((b) => {
            b.setAttribute('aria-label', t.theme);
            b.title = t.theme;
        });

        document.querySelectorAll('[data-set-lang]').forEach((b) => {
            if (b.dataset.setLang === lang) b.setAttribute('aria-current', 'true'); else b.removeAttribute('aria-current');
        });
    };

    apply(saved() || fromPath(location.pathname) || fromReferrer() || fromBrowser() || 'fa');

    document.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-set-lang]');
        if (btn) {
            const lang = btn.dataset.setLang;
            try {
                localStorage.setItem('lang', lang);
            } catch (err) { /* storage blocked */
            }
            apply(lang);
            return;
        }
        const back = e.target.closest('[data-back]');
        if (back && history.length > 1 && document.referrer) {
            e.preventDefault();
            history.back();
        }
    });

    /* Pointer parallax: floating icons lean slightly away from the pointer (fine pointers, motion allowed). */
    const section = document.querySelector('.errp');
    const canMove = section && matchMedia('(hover: hover) and (pointer: fine)').matches && !matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (canMove) {
        let raf = 0;
        section.addEventListener('pointermove', (e) => {
            if (raf) return;
            raf = requestAnimationFrame(() => {
                const r = section.getBoundingClientRect();
                section.style.setProperty('--mx', ((e.clientX - r.left) / r.width - 0.5).toFixed(3));
                section.style.setProperty('--my', ((e.clientY - r.top) / r.height - 0.5).toFixed(3));
                raf = 0;
            });
        });
    }
})();
