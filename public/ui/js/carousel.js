
 document.addEventListener('DOMContentLoaded', function () {
  const swiper = new Swiper('.mySwiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    centeredSlides: true,
    loop: true,
    loopedSlides: 5, // sama dengan jumlah slide asli
    grabCursor: true,
    effect: 'coverflow',
    coverflowEffect: {
      rotate: 10,
      stretch: 0,  // biar posisi tengah simetris
      depth: 250,
      modifier: 1.2,
      slideShadows: false,
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      576: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
        centeredSlides: true,
      },
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      init() {
        // Perbaikan posisi awal
        this.slideToLoop(2, 0); // tampilkan slide tengah (indeks ke-2 dari 0..4)
      },
    },
  });
});

    document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.paketSwiper', {
            slidesPerView: 'auto',
            spaceBetween: 10,
            centeredSlides: true,
            loop: false,
            grabCursor: true,
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 15, // Slight rotation for side items
                stretch: 0,
                depth: 100, // Depth for 3D feel (larger center)
                modifier: 1.5,
                slideShadows: false,
            },
            breakpoints: {
                576: { slidesPerView: 1 },
                768: { slidesPerView: 3 },
            },
            initialSlide: 1,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
    });
});