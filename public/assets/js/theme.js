/* Runs in <head> before first paint. Light is the default; dark only when the visitor picks it. */
(() => {
  const root = document.documentElement;
  let saved = null;
  try { saved = localStorage.getItem('theme'); } catch (e) { /* storage blocked */ }

  const apply = (theme) => {
    root.dataset.theme = theme;
    document.querySelector('meta[name="theme-color"]')?.setAttribute('content', theme === 'dark' ? '#121513' : '#fdfdfc');
    document.querySelectorAll('[data-theme-toggle]').forEach((b) => b.setAttribute('aria-pressed', String(theme === 'dark')));
  };
  apply(saved === 'dark' ? 'dark' : 'light');

  document.addEventListener('click', (e) => {
    if (!e.target.closest('[data-theme-toggle]')) return;
    const next = root.dataset.theme === 'dark' ? 'light' : 'dark';
    try { localStorage.setItem('theme', next); } catch (e2) { /* ignore */ }

    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (document.startViewTransition && !reduce) {
      // One smooth cross-fade of the whole page: every colour changes together.
      document.startViewTransition(() => apply(next));
    } else {
      root.classList.add('theme-anim');
      apply(next);
      setTimeout(() => root.classList.remove('theme-anim'), 450);
    }
  });
  document.addEventListener('DOMContentLoaded', () => apply(root.dataset.theme));
})();
