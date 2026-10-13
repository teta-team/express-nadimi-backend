/* Language picker page: open the visitor's browser language (fa / ar / en). */
(() => {
  const supported = ['fa', 'en', 'ar'];
  const pick = (navigator.languages || [navigator.language || 'en'])
    .map((l) => String(l).slice(0, 2).toLowerCase())
    .find((l) => supported.includes(l)) || 'en';
  location.replace(pick + '/index.html');
})();
