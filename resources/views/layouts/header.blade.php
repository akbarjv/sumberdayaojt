<style>
    .navbar-transparent {
        background: transparent !important;
        transition: background-color 0.3s ease-in-out;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1030;
    }

    .navbar-scrolled {
        background: white !important;
        transition: background-color 0.3s ease-in-out;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1030;
        padding: 0 11.5%;
    }
</style>

<div class="b-container">
    <nav class="navbar navbar-expand-lg py-3 py-lg-3 nav navbar-transparent" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <div class="logo-box">
                <a class="navbar-brand" href="/"><img src="{{asset('ui/images/logo.png')}} " alt="Main Logo"
                        class="img-fluid" style="max-width: 45%;"></a>
            </div>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" style="background: red"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header" id="offcanvasNavbarLabel">
                    <div class="logo-box">
                        <a class="navbar-brand" href="/"><img src="{{asset('ui/images/logo.png')}}" alt="Drawer Logo"
                                class="img-fluid"></a>
                    </div>
                    <button type="button" class="btn-close bg-accent-color-2 p-3" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-row justify-content-start justify-content-lg-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link offcanvas-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link offcanvas-link" href="#tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link offcanvas-link" href="#motor">Daftar Motor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link offcanvas-link" href="#paket">Pelayanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link offcanvas-link" href="#kontak">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.nav');
        if (window.scrollY > 50) {
            navbar.classList.add('fixed-top');
            navbar.classList.add('navbar-scrolled');
             navbar.classList.add('shadow-sm');
        } else {
            navbar.classList.remove('fixed-top');
            navbar.classList.remove('navbar-scrolled');
            navbar.classList.remove('shadow-sm');
        }
    });

    document.querySelectorAll('.nav-link[href^="#"]').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      const navbarHeight = document.querySelector('.nav').offsetHeight;
      const targetPosition = target.offsetTop - navbarHeight;

      window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
      });
    }
  });
});

document.querySelectorAll('.offcanvas-link').forEach(link => {
  link.addEventListener('click', function() {
    document.querySelectorAll('.offcanvas-link').forEach(l => l.classList.remove('active'));
    this.classList.add('active');
  });
});

document.addEventListener("DOMContentLoaded", function() {
  const links = document.querySelectorAll('.offcanvas-link');
  
  // ✅ Set the first link (Home) active by default
  if (links.length > 0) {
    links[0].classList.add('active');
  }

  // ✅ Add click event to update active state
  links.forEach(link => {
    link.addEventListener('click', function() {
      links.forEach(l => l.classList.remove('active'));
      this.classList.add('active');
    });
  });
});
</script>