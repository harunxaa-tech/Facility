(() => {
  const header = document.querySelector('.site-header');
  const menuToggle = document.querySelector('.menu-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  const year = document.getElementById('year');
  const revealEls = [...document.querySelectorAll('.reveal')];

  if (year) year.textContent = new Date().getFullYear();
  const setHeader = () => {
    if (!header || header.classList.contains('solid-header')) return;
    header.classList.toggle('scrolled', window.scrollY > 30);
  };
  setHeader();
  window.addEventListener('scroll', setHeader, { passive: true });

  const closeMenu = () => {
    if (!menuToggle || !mobileMenu) return;
    menuToggle.classList.remove('open');
    menuToggle.setAttribute('aria-expanded', 'false');
    mobileMenu.classList.remove('open');
    mobileMenu.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('menu-open');
  };

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', () => {
      const open = !mobileMenu.classList.contains('open');
      menuToggle.classList.toggle('open', open);
      menuToggle.setAttribute('aria-expanded', String(open));
      mobileMenu.classList.toggle('open', open);
      mobileMenu.setAttribute('aria-hidden', String(!open));
      document.body.classList.toggle('menu-open', open);
    });
    mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));
    window.addEventListener('resize', () => { if (window.innerWidth > 980) closeMenu(); });
  }

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: .12, rootMargin: '0px 0px -40px' });
    revealEls.forEach((el, i) => {
      el.style.transitionDelay = `${Math.min(i % 4, 3) * 60}ms`;
      observer.observe(el);
    });
  } else {
    revealEls.forEach(el => el.classList.add('visible'));
  }

  const tabs = [...document.querySelectorAll('.catalog-tab')];
  const cats = [...document.querySelectorAll('.order-category')];
  const search = document.querySelector('#delfino-product-search');
  if (tabs.length && cats.length) {
    tabs.forEach(tab => tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const id = tab.dataset.target;
      if (id === 'all') {
        cats.forEach(c => c.hidden = false);
        window.scrollTo({top: document.querySelector('.order-catalog').offsetTop - 125, behavior:'smooth'});
      } else {
        cats.forEach(c => c.hidden = false);
        const target = document.getElementById(id);
        if (target) target.scrollIntoView({behavior:'smooth', block:'start'});
      }
    }));
  }
  if (search) {
    const items = [...document.querySelectorAll('.order-item')];
    search.addEventListener('input', () => {
      const q = search.value.trim().toLocaleLowerCase('de');
      items.forEach(item => item.classList.toggle('is-filtered', q && !item.dataset.search.includes(q)));
      cats.forEach(cat => {
        const visible = [...cat.querySelectorAll('.order-item')].some(i => !i.classList.contains('is-filtered'));
        cat.hidden = !visible;
      });
    });
  }
})();
