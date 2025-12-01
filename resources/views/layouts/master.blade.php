<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('ui/images/logo.png')}}" type="image/x-icon">
    <!-- Animation On Scroll (AOS) -->
    <link rel="stylesheet" href="{{asset('ui/css/vendor/aos.css') }}">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('ui/css/vendor/slick.css')}}">
    <!-- FANCYBOX CSS  -->
    <link rel="stylesheet" href="{{asset('ui/css/vendor/fancybox.css')}} ">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('ui/css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('ui/css/ui.css')}} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>

  <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-smooth-scroll="true" tabindex="0">

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')




    <!-- Scripts -->
    <!-- jQuery -->
    <script src=" {{asset('ui/js/vendor/jquery.min.js')}} "></script>
    <!-- Animation On Scroll (AOS) -->
    <script src=" {{asset('ui/js/vendor/aos.js')}} "></script>
    <!-- Slick JS -->
    <script src=" {{asset('ui/js/vendor/slick.min.js')}} "></script>
    <!-- FANCY BOX -->
    <script src=" {{asset('ui/js/vendor/fancybox.umd.js')}} "></script>
    <!-- Bootstrap JS -->
    <script src=" {{asset('ui/js/vendor/bootstrap.bundle.min.js')}} "></script>
    <!-- Custom JS -->
    <script src=" {{asset('ui/js/script-counter.js')}} "></script>
    <script src=" {{asset('ui/js/submit-form.js')}} "></script>
    <script src=" {{asset('ui/js/script.js')}} "></script>
    <!-- Include Swiper JS -->
    <script src=" https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">
    </script>
    <script src="{{asset('ui/js/carousel.js')}} "></script>
    <script src="{{asset('ui/js/sidebar.js')}} "></script>

    <script>
      (function () {
              const options = {
                root: null,
                rootMargin: '0px 0px -10% 0px', // trigger a bit before element fully in view
                threshold: 0.12
              };
            
              let observer = null;
            
              function onIntersect(entries, obs) {
                entries.forEach(entry => {
                  const el = entry.target;
                  if (entry.isIntersecting) {
                    el.classList.add('in-view');
            
                    // if data-animate-duration/delay present, they are already applied as CSS vars
                    // unobserve if "once"
                    const once = el.getAttribute('data-animate-once');
                    if (once === 'true' || once === '') obs.unobserve(el);
                  } else {
                    const once = el.getAttribute('data-animate-once');
                    if (!once || once === 'false') el.classList.remove('in-view');
                  }
                });
              }
            
              function init() {
                if ('IntersectionObserver' in window === false) {
                  // fallback: show everything
                  document.querySelectorAll('[data-animate]').forEach(el => el.classList.add('in-view'));
                  return;
                }
            
                observer = new IntersectionObserver(onIntersect, options);
            
                document.querySelectorAll('[data-animate]').forEach(el => {
                  // set CSS var from data attributes if provided
                  const d = el.getAttribute('data-animate-duration'); // in ms
                  const delay = el.getAttribute('data-animate-delay'); // in ms
                  if (d) el.style.setProperty('--anim-duration', `${d}ms`);
                  if (delay) el.style.setProperty('--anim-delay', `${delay}ms`);
            
                  // support parent stagger: <div data-animate-stagger="80"> ... children with data-animate ... </div>
                  const staggerParent = el.closest('[data-animate-stagger]');
                  if (staggerParent) {
                    const children = Array.from(staggerParent.querySelectorAll('[data-animate]'));
                    const idx = children.indexOf(el);
                    const step = parseInt(staggerParent.getAttribute('data-animate-stagger') || 80, 10);
                    const base = parseInt(el.getAttribute('data-animate-delay') || 0, 10);
                    el.style.setProperty('--anim-delay', `${base + idx * step}ms`);
                  }
            
                  observer.observe(el);
                });
              }
            
              // expose refresh for dynamic content insertion
              window.AnimOnScroll = {
                refresh() {
                  if (!observer) init();
                  document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));
                }
              };
            
              if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
              } else init();
            })();
    </script>

  </body>

</html>