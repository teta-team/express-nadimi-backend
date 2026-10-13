/* Express Nadimi — small progressive enhancements. Everything works without JS. */
(() => {
  'use strict';

  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => [...r.querySelectorAll(s)];
  const html = document.documentElement;
  const lang = html.lang || 'en';
  const reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const fmt = new Intl.NumberFormat(lang === 'fa' ? 'fa-IR' : 'en-US');

  /* ---------- Header: shadow once scrolled; slides away going down, comes back going up ---------- */
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
    addEventListener('scroll', () => { if (!ticking) { ticking = true; requestAnimationFrame(update); } }, { passive: true });
    // keyboard users: bring the bar back when something inside it gets focus
    header.addEventListener('focusin', () => { header.classList.remove('is-hidden'); document.body.classList.remove('header-hidden'); });
  }

  /* ---------- Mobile menu: opens downward under the bar ---------- */
  if (mnav && menuBtn) {
    const setOpen = (open) => {
      mnav.classList.toggle('is-open', open);
      menuBtn.setAttribute('aria-expanded', String(open));
      $$('a', mnav).forEach((a) => { a.tabIndex = open ? 0 : -1; });
    };
    setOpen(false);
    menuBtn.addEventListener('click', () => setOpen(!menuOpen()));
    $$('a', mnav).forEach((a) => a.addEventListener('click', () => setOpen(false)));
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && menuOpen()) { setOpen(false); menuBtn.focus(); } });
    matchMedia('(min-width: 1024px)').addEventListener('change', (m) => { if (m.matches) setOpen(false); });
  }

  /* ---------- Small language menu: close when clicking elsewhere ---------- */
  $$('details.lang-mini').forEach((d) => {
    document.addEventListener('click', (e) => { if (d.open && !d.contains(e.target)) d.open = false; });
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
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    const fold = innerHeight * 0.92;
    revealables.forEach((el) => {
      if (el.getBoundingClientRect().top > fold) { el.classList.add('is-pending'); io.observe(el); }
      else el.classList.add('is-in');
    });
  } else {
    revealables.forEach((el) => el.classList.add('is-in'));
  }

  /* ---------- Forms: busy state on submit ---------- */
  $$('form').forEach((form) => {
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
    setTimeout(() => { notice.scrollIntoView({ block: 'center', behavior: reduceMotion ? 'auto' : 'smooth' }); notice.focus({ preventScroll: true }); }, 120);
  }

  /* ---------- Products: filter by category + search ---------- */
  const grid = $('[data-products]');
  if (grid) {
    const cards = $$('[data-product]', grid);
    const buttons = $$('[data-filter]');
    const search = $('[data-search]');
    const meta = $('[data-count]');
    const empty = $('[data-empty]');
    let cat = buttons.find((b) => b.getAttribute('aria-pressed') === 'true')?.dataset.filter || '';

    const apply = () => {
      const q = (search?.value || '').trim().toLowerCase();
      let n = 0;
      cards.forEach((c) => {
        const ok = (!cat || c.dataset.category === cat) && (!q || c.dataset.name.includes(q));
        c.hidden = !ok;
        if (ok) n++;
      });
      if (meta) meta.textContent = (n === 1 ? meta.dataset.one : meta.dataset.many).replace(':count', fmt.format(n));
      if (empty) empty.hidden = n > 0;
    };
    buttons.forEach((b) => b.addEventListener('click', (e) => {
      e.preventDefault();
      cat = b.dataset.filter;
      buttons.forEach((x) => x.setAttribute('aria-pressed', String(x === b)));
      const url = new URL(location.href);
      cat ? url.searchParams.set('category', cat) : url.searchParams.delete('category');
      history.replaceState(null, '', url);
      apply();
    }));
    search?.addEventListener('input', apply);
    apply();
  }

  /* ---------- Harvest calendar: category tabs ---------- */
  const cal = $('[data-cal]');
  if (cal) {
    const tabs = $$('[data-cal-filter]', cal);
    tabs.forEach((t) => t.addEventListener('click', () => {
      tabs.forEach((x) => x.setAttribute('aria-pressed', String(x === t)));
      $$('[data-cal-group]', cal).forEach((g) => { g.hidden = !!t.dataset.calFilter && g.dataset.calGroup !== t.dataset.calFilter; });
    }));
  }

  /* ---------- Contact: message type + office clocks + copy ---------- */
  const typeInputs = $$('input[name="type"]');
  if (typeInputs.length) {
    const sync = () => {
      const t = typeInputs.find((i) => i.checked)?.value;
      $$('[data-show-for]').forEach((el) => { el.hidden = el.dataset.showFor !== t; });
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
        const parts = Object.fromEntries(new Intl.DateTimeFormat('en-US', { timeZone: tz, weekday: 'short', hour: '2-digit', minute: '2-digit', hourCycle: 'h23' }).formatToParts(now).map((p) => [p.type, p.value]));
        const day = DAYS.indexOf(parts.weekday);
        const hr = +parts.hour + +parts.minute / 60;
        const inDays = d1 <= d2 ? day >= d1 && day <= d2 : day >= d1 || day <= d2;
        const isOpen = inDays && hr >= h1 && hr < h2;
        $('[data-clock-time]', c).textContent = new Intl.DateTimeFormat(locale, { timeZone: tz, hour: '2-digit', minute: '2-digit', hourCycle: 'h23' }).format(now);
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
      setTimeout(() => { btn.classList.remove('is-done'); btn.setAttribute('aria-label', label); }, 1500);
    });
  });

  /* ---------- Supplier form: progress, conditional questions, previews ---------- */
  const sform = $('[data-supplier]');
  if (sform) {
    const ring = $('[data-ring]');
    const pct = $('[data-pct]');
    const rail = $('[data-rail-box]');
    const sections = $$('.ssec', sform);
    const steps = $$('.sstep');
    const pfmt = new Intl.NumberFormat(lang === 'fa' ? 'fa-IR' : 'en-US', { style: 'percent' });

    const filled = (el) => {
      if (el.type === 'file') return el.files.length > 0;
      if (el.type === 'checkbox') return el.checked;
      if (el.type === 'radio') return !!$(`input[name="${el.name}"]:checked`, sform);
      return el.value.trim() !== '';
    };
    const required = () => {
      const seen = new Set();
      return $$('[data-req]', sform).filter((el) => {
        if (el.type === 'radio') { if (seen.has(el.name)) return false; seen.add(el.name); }
        return true;
      });
    };
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
    ['input', 'change'].forEach((ev) => sform.addEventListener(ev, (e) => {
      e.target.closest('.field')?.classList.remove('bad');
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

    // highlight the section being read
    if ('IntersectionObserver' in window) {
      const so = new IntersectionObserver((entries) => {
        entries.forEach((en) => {
          if (!en.isIntersecting) return;
          const i = sections.indexOf(en.target);
          steps.forEach((s, j) => s.classList.toggle('is-on', j === i));
        });
      }, { rootMargin: '-35% 0px -55% 0px' });
      sections.forEach((s) => so.observe(s));
    }

    conditions();
    update();
  }
})();
