(() => {
  const header = document.querySelector('.site-header');
  const menuToggle = document.querySelector('.menu-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  const year = document.getElementById('year');
  const revealEls = [...document.querySelectorAll('.reveal')];
  const menuTabs = [...document.querySelectorAll('.menu-tab')];
  const menuCategories = [...document.querySelectorAll('.menu-category')];

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

  if (menuTabs.length && menuCategories.length) {
    menuTabs.forEach(tab => {
      tab.addEventListener('click', () => {
        menuTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const filter = tab.dataset.filter;
        menuCategories.forEach(cat => {
          cat.classList.toggle('hidden', filter !== 'all' && cat.dataset.category !== filter);
        });
        if (window.innerWidth < 680) {
          const top = document.querySelector('.menu-tabs-wrap').getBoundingClientRect().bottom + window.scrollY + 16;
          window.scrollTo({ top, behavior: 'smooth' });
        }
      });
    });
  }
})();
