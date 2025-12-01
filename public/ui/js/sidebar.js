document.addEventListener('DOMContentLoaded', () => {
  const offcanvasEl = document.getElementById('offcanvasNavbar');
  const offcanvas = bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl);

  const offcanvasLinks = offcanvasEl.querySelectorAll('.offcanvas-link');

  offcanvasLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      const targetEl = document.querySelector(targetId);

      if (!targetEl) return;

      // wait until offcanvas is fully closed before scrolling
      offcanvasEl.addEventListener('hidden.bs.offcanvas', function handler() {
        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
        offcanvasEl.removeEventListener('hidden.bs.offcanvas', handler);
      });

      offcanvas.hide();
    });
  });
});
