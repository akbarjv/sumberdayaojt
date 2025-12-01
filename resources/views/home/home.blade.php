@extends('layouts.master')
@section('title','CODA RENT')

@section('content')

<style>
    .banner {
        position: relative;
        margin: 0px 0px 0px 0px;

        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;

        color: white;
        padding: 95px 130px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 95vh;
        text-align: start;
        background-size: cover;
        background-position: center;
        filter: brightness(0.6);
    }

    .banner::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        /* adjust opacity (0.3–0.7 for desired darkness) */
        z-index: 1;
    }


    .banner>* {
        position: relative;
        z-index: 2;
    }

    .banner-text {
        max-width: 50%;
        color: #ffffff;
        padding: 20px;
        text-align: start;

    }

    /* Headings */
    .banner-text h3 {
        font-size: clamp(1.5rem, 2vw, 2.5rem);
        /* min, preferred, max */
        margin: 5px 0;
        font-weight: 700;
    }

    .banner-text h1 {
        font-size: clamp(2rem, 6vw, 4.5rem);
        font-weight: 800;
        line-height: 1.1;
        margin: 10px 0 20px;
    }

    /* Paragraphs */
    .banner-text p {
        font-size: clamp(1rem, 2vw, 1.25rem);
        margin: 10px 0 20px;
    }

    /* Map Button */
    .map-button {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background-color: #fff;
        color: #333;
        text-decoration: none;
        padding: 10px 10px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: clamp(0.9rem, 1.8vw, 1rem);
        margin-right: 15px;

    }

    .map-button:hover {
        background-color: #f0f0f0;
    }

    .map-button img {
        width: 20px;
        height: 20px;
    }


    @media (min-width: 992px) {
        .banner-text {
            margin: 0 100px;
            max-width: 65%;
        }

        /* .banner-text p {
            max-width: 100%;

        } */
    }

    @media (min-width: 1020px) and (max-width: 1040px) {
        .banner-text p {
            font-size: 1rem;

        }
    }

    @media (max-width: 768px) {
        .banner {
            padding: 60px 50px;
        }

        .banner-text {
            max-width: 100%;
            text-align: start;
            padding: 5px;

        }

        .map-button {
            justify-content: start;
            margin-bottom: 20px;
        }

        .map-button img {
            width: 15px;
            height: 15px;
        }

        .map-button p {
            font-size: 12px;
        }


        .social-icons .social-link i {
            font-size: 24px;

        }
    }

    .address {
        margin-top: 15px;
        font-size: 16px;
    }

    /* Social icons */
    .social-icons {
        display: flex;
        gap: 12px;
        position: absolute;
        top: 20px;
        right: 60px;
    }

    .social-link {
        font-size: 40px;
        color: rgb(255, 255, 255);
        transition: color 0.3s;
    }

    .social-link:hover {
        color: #df270f;
    }


    .swiper-slide {
        transition: transform 0.3s ease;
    }

    .swiper-slide-active .testimonial-box {
        transform: scale(1.5);
        /* Center item is larger */
    }

    .swiper-slide .testimonial-box {
        transform: scale(0.9);
        /* Non-center items are smaller */
    }

    @media (max-width: 576px) {
        .swiper-slide-active .testimonial-box {
            transform: scale(1.1);
            /* Slightly smaller scaling for mobile */
        }

        .swiper-slide .testimonial-box {
            transform: scale(0.9);
        }
    }

    .swiper-button-next,
    .swiper-button-prev {
        /* color: #dc3545; */
        color: #ffffffff;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        /* Bootstrap danger red */
        margin-left: 150px;
        margin-right: 150px;
    }

    @media (max-width: 768px) {

        .swiper-button-next,
        .swiper-button-prev {
            margin-left: 0;
            margin-right: 0;
        }
    }


    .swiper-pagination-bullet {
        background: #6c757d;
        /* gray */
        opacity: 0.6;
    }

    .swiper-pagination-bullet-active {
        background: #dc3545;
        /* red */
        opacity: 1;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        color: #e0e0e0;
        /* Warna sedikit gelap saat dihover */
    }


    .paket-box {
        border-radius: 1rem;
        overflow: hidden;
    }

    .paket-header {
        padding: 50px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }

    /* Optional overlay for opacity */
    .paket-header::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(202, 2, 2, 0.4);
        /* dark overlay */
        z-index: 0;
    }

    .paket-header h3,
    .paket-header p {
        position: relative;
        z-index: 1;
    }

    .card {
        width: 100%;
        max-width: 380px;
        color: white;
        background: rgba(255, 255, 255, 0.21);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5.8px);
        -webkit-backdrop-filter: blur(5.8px);
        border: 1px solid rgba(255, 255, 255, 0.14);
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .testimonial-box {
        /* max-width: 350px; */
        /* keeps each item consistent */
        width: 350px;
        margin: 0 auto;
        /* centers inside carousel */
        aspect-ratio: 1 / 1;
        /* keeps proportion */
        overflow: visible;
        /* allows bike to overflow */
        position: relative;


    }



    .testimonial-box .bike-img {
        width: auto;

        /* bike larger than red box */
        height: auto;
        left: 50%;
        transform: translateX(-50%);
        max-width: 400px;
        /* don’t let it grow too big */
    }


    @media (max-width: 768px) {
        .testimonial-box {
            width: 350px;
            /* shrink on tablet */
        }

        .testimonial-box .bike-img {
            width: auto%;
            /* max-width: 300px; */
        }
    }

    @media (max-width: 480px) {
        .testimonial-box {
            width: 350px;
        }

        .testimonial-box .bike-img {
            width: auto%;
            /* max-width: 300px; */
        }
    }

    .row.fixed-height>[class*="col-"] {
        height: 300px;

    }

    .paket-box {
        transform: scale(1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .paket-center {
        transform: scale(1.20);
        /* makes center one larger */
        z-index: 10;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .paket-center:hover {
        transform: scale(1.25);
        z-index: 5;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 767px) {
        .paket-box {
            margin-left: auto;
            margin-right: auto;
        }

        .col-sm-12.d-flex {
            justify-content: center !important;
        }

        .medalpaket {
            margin-left: auto;
            margin-right: auto;
        }

        .blog {
            margin-left: auto;
            margin-right: auto;
        }
    }


    @media (min-width: 992px) {
        .carousel-control-prev {
            left: -60px;
            /* 👈 move left arrow further from content */
        }

        .carousel-control-next {
            right: -60px;
            /* 👈 move right arrow further from content */
        }

        /* Optional: reduce padding so the icon stays compact */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 35px;
            height: 35px;
        }
    }

    .boxbottom {
        width: 55%;
        height: 700px;
        /* responsive scaling */
        z-index: 1;
    }

    /* Make sure the container can hold absolutely positioned elements */
    .position-relative {
        position: relative;
    }

    /* Align text to the bottom center of the red box */
    .boxbottomtext {
        z-index: 3;
        position: absolute;
        top: 630px;
        /* distance from bottom edge */
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        text-align: center;
    }

    .boxbottomX {
        height: 450px;
    }

    @media (max-width: 600px) {
        .boxbottomX {
            height: 300px;
        }
    }

    /* @media (max-width: 992px) {
        .topredline {
            width: 100%;
        }
    } */

    /* * {
        outline: 1px solid red;
    } */

    html,
    body {
        overflow-x: hidden;
    }

    .image-wrapper-rand {
        width: 100%;
        aspect-ratio: 1 / 1;
        margin: 5px;

        /* width: 250px; */
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);

    }

    .image-wrapper-rand img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* crop and fill nicely */
        transition: transform 0.3s ease;
        transition: opacity 0.5s ease-in-out;
    }

    .image-wrapper-rand img:hover {
        transform: scale(1.05);
    }

    .modal-image {
        display: none;
        position: fixed;
        z-index: 9999;
        padding-top: 60px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-image img {
        margin: auto;
        display: block;
        max-width: 90%;
        max-height: 90vh;
        border-radius: 10px;
        object-fit: contain;
    }

    .close-btn {
        position: absolute;
        top: 20px;
        right: 35px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.2s;
    }

    .close-btn:hover {
        color: #f44336;
    }

    .section.bg-color {
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
        background-size: cover;
        margin: 0 auto;
    }
</style>



<!-- Main Content -->
<main>

    <section id="home">

        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                @foreach($banners as $index => $banner)
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <!-- Banner Wrapper -->
            <div class="position-relative">

                <!-- Carousel Slides -->
                <div class="carousel-inner">
                    @foreach($banners as $index => $banner)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="banner" style="background-image: url('{{ asset('storage/' . $banner->gambar) }}');">
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Fixed Banner Text -->
                <div
                    class="banner-text position-absolute top-50 start-0 translate-middle-y text-start text-white ps-5 pe-3">
                    <h3 style="margin-top: 20px;">{{$datas[0]->nama}}</h3>
                    <p style="margin-top: 0px;">Motorbike Rental in Medan</p>
                    <h1>{{$datas[0]->banner_title}}</h1>
                    <p>{{$datas[0]->banner_subtitle}}</p>
                    <a href="https://www.google.com/maps?q={{ $datas[0]->google_map }}({{ $datas[0]->alamat }})"
                        target="_blank" class="map-button">
                        <img src="{{ asset('ui/images/g.png') }}" alt="Google Maps">
                        Coda Rent Office
                    </a>
                    <p class="d-none d-md-block">{{$datas[0]->alamat}}</p>
                    <a href="https://www.google.com/maps?q={{ $datas[0]->google_map_pickup }}({{ $datas[0]->alamat_pickup }})"
                        target="_blank" class="map-button">
                        <img src="{{ asset('ui/images/g.png') }}" alt="Google Maps">
                        Drop/Pickup Point
                    </a>
                    <p class="d-none d-md-block">{{$datas[0]->alamat_pickup}}</p>
                </div>

                <!-- Social Icons -->
                <div class="social-icons position-absolute bottom-0 end-0 m-3">
                    <a href="{{ $banners[0]->facebook ?? '#' }}" class="social-link" aria-label="Facebook"
                        target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{ $banners[0]->ig ?? '#' }}" class="social-link" aria-label="Instagram" target="_blank"
                        rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
                </div>

            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- #End banner -->
    <section class="section" id="tentang">

        <div class="b-container">
            <div style="width: 100%; height: 3px; background-color: #f44336;"></div>
            <div class="row  align-items-start">
                <div class="col-12 col-xl-12 ps-xl-4 mb-5" data-aos="fade-left" data-aos-delay="200"
                    data-aos-duration="1000">
                    {{-- <h2 class="my-4 fw-bold text-center">CODA <span class="fw-bold text-danger">RENT</span> </h2>
                    <h2 class="my-4 fw-bold text-center">{{$datas[0]->nama}}</span> </h2> --}}
                    @php
                    $words = explode(' ', $datas[0]->nama);
                    $lastWord = array_pop($words);
                    @endphp

                    <h2 class="my-4 fw-bold text-center">
                        {{ implode(' ', $words) }} <span class="fw-bold text-danger">{{ $lastWord }}</span>
                    </h2>
                    <p style="text-align: justify">
                        Adalah penyedia jasa sewa motor terpercaya di Kota Medan yang telah beroperasi sejak awal tahun
                        2023. Kami menyediakan berbagai jenis dan merek motor, mulai dari skuter hingga motor sport,
                        yang
                        dapat disesuaikan dengan kebutuhan perjalanan Anda. Coda Rental Motor sangat menyadari akan
                        tanggung jawab besar dalam menyediakan sepeda motor kepada para customer. Oleh karena itu,
                        seluruh
                        armada kami rutin diperbarui dan dirawat agar tetap prima. Setiap motor dilengkapi dengan helm
                        yang bersih dan perlengkapan keselamatan standart lainnya untuk kenyamanan dan keamanan Anda.
                    </p>
                </div>

                <div class="row fixed-height justify-content-start">
                    <div class="col-12 col-xl-3 ps-xl-4 col-lg-3 col-md-6 col-sm-12" data-aos="fade-right"
                        data-aos-delay="200" data-aos-duration="1000">
                        <img src="{{ asset('storage/'.$selectedBanner->gambar) }}" alt="Motorbike"
                            class="img-fluid position-relative" style="max-height:300px;">
                    </div>
                    <div class="col-12 col-xl-3 ps-xl-4 col-lg-3 col-md-6 col-sm-12 " data-aos="fade-left"
                        data-aos-delay="200" data-aos-duration="1000">


                        <h5 class="mt-sm-3 mt-2 mt-md-0">Kenapa <span class="fw-bold text-danger">Memilih</span> Kami?
                        </h5>
                        <!-- RED LINE -->
                        <div style="width: 80px; height: 3px; background-color: #f44336; margin: 8px 0 16px 0;"></div>

                        <ul class="list-unstyled mt-2">
                            <li class="mb-2"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i> Harga
                                Terjangkau
                            </li>
                            <li class="mb-2"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i> Motor
                                Bersih &
                                Terawat</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i> Proses
                                Cepat &
                                Mudah</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i> Antar &
                                Jemput
                                Lokasi</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i> Service
                                Berkala
                            </li>
                        </ul>

                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-md-none d-lg-block text-center position-relative"
                        data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">

                        <!-- Red Box -->
                        <div class="boxbottom bg-danger rounded-4 mx-auto position-relative">
                        </div>

                        <!-- Bike Image -->
                        <img src="{{ asset('ui/images/adv.png') }}" alt="Motorbike" class="img-fluid position-absolute"
                            style=" z-index:2; top:50%; left:50%; transform:translate(-50%, -50%);">

                        <!-- VISI & MISI Title -->
                        <div class="boxbottomtext text-white fw-bold fs-4 mb-3 position-absolute">
                            VISI & MISI
                        </div>

                    </div>
                </div>

                <p class="col-12 col-lg-6" style="text-align: justify">
                    Dengan pengalaman bertahun-tahun memimpin berbagai rombongan, keahlian utama
                    kami terletak pada pemetaan rute touring yang aman dan menantang serta pengetahuan
                    mendalam tentang destinasi wisata dan non-wisata di seluruh Sumatera Utara. Klien yang
                    kami dampingi sangat beragam, mencakup wisatawan lokal, domestik, hingga
                    internasional, dalam berbagai jenis kegiatan seperti touring rekreasi, wisata alam, hingga
                    perjalanan penelitian. Kami tidak hanya memandu, tetapi juga memastikan setiap
                    perjalanan menjadi pengalaman yang aman, berkesan, dan penuh wawasan tentang
                    keindahan alam dan budaya Sumatera Utara.
                </p>
                <div class="topredline d-none d-md-none d-lg-block"
                    style=" z-index:0;  width: 80%; height: 2px; background-color: #d63646;">
                </div>
                <div class="topredline d-none d-md-none d-lg-block"
                    style=" z-index:0;  width: 80%; height: 2px; background-color: #d63646; margin-top: 50px;">
                </div>
                <div class="topredline d-md-block d-lg-none"
                    style=" z-index:0;  width: 100%; height: 2px; background-color: #d63646;">
                </div>
                <div class="topredline d-md-block d-lg-none"
                    style=" z-index:0;  width: 100%; height: 2px; background-color: #d63646; margin-top: 50px;">
                </div>




            </div>

            <!-- NEXT ROW: VISI & MISI DETAIL -->
            <div class="row mt-4">
                <!-- Left stays normal -->
                <div class="col-12 col-xl-6 col-lg-6 pe-xl-4 col-md-12">
                    <p style="text-align: justify">
                        Coda Rental telah menjadi bagian dari petualangan para pelanggan, baik wisatawan lokal maupun
                        internasional,
                        dalam menjelajahi pesona Kota Medan dan sekitarnya.
                    </p>
                    <p style="text-align: justify">
                        Kami memastikan semua motor yang dimiliki dilengkapi dengan perlengkapan keselamatan yang
                        diperlukan,
                        seperti helm yang selalu bersih dan dalam kondisi yang baik.
                    </p>

                    <img style="width: 50%" src="{{asset('ui/images/engine.jpg')}}" alt="" class="d-none d-lg-block">

                </div>


                <div class="col-xl-6 col-lg-6 d-md-block mb-3 d-lg-none text-center align-content-center justify-content-center"
                    data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">

                    <!-- Red Box (background only, does not affect image width) -->
                    <div class="boxbottomX bg-danger rounded-4"
                        style="width: 40%;  z-index:1; position: relative; margin: 0 auto;">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- Bike Image -->
                            <img src="{{ asset('ui/images/adv.png') }}" alt="Motorbike"
                                class=" img-fluid position-absolute"
                                style=" max-width: 55%; z-index:2; top:50%; left:50%; transform:translate(-50%, -50%);">
                        </div>
                        <div class="col-12">
                            <!-- VISI & MISI Title -->
                            <div class="boxbottomtextX text-white fw-bold fs-4 mb-3" style="z-index:3; position: absolute; left: 50%;
        transform: translateX(-50%);bottom: 10px;">
                                VISI & MISI
                            </div>
                        </div>
                    </div>





                </div>


                <!-- Right starts lower (stagger effect) -->
                <div class="col-12 col-xl-6 ps-xl-4 mt-xl-5 col-md-6">
                    <h4 class="fw-bold">VISI</h4>
                    <p style="text-align: justify">
                        Menjadi perusahaan rental motor terpercaya di Medan yang berkomitmen pada inovasi, integritas,
                        dan pelayanan terbaik demi kepuasan pelanggan.
                    </p>

                    <h4 class="fw-bold mt-3">MISI</h4>
                    <ul>
                        <li>Memberikan pelayanan yang profesional, berkualitas, dan ramah kepada seluruh pelanggan.</li>
                        <li>Menjadikan kepuasan pelanggan sebagai prioritas utama.</li>
                        <li>Menawarkan harga sewa kompetitif dan transparan.</li>
                        <li>Terus berinovasi mengikuti perkembangan teknologi serta kebutuhan pelanggan.</li>
                    </ul>
                </div>
            </div>
            <div style="width: 100%; height: 3px; background-color: #f44336;"></div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section" id="motor">


        <div style="text-align: center; width: 100%">
            <div style="height: 3px; background-color: #f44336;max-width: 1280px; margin: 0 auto;"></div>
            <div class="row d-flex align-items-center text-center">
                <div class="col-12 col-xl-12 pe-xl-4" data-animate="fade-left" data-animate-delay="120"
                    data-animate-duration="500">
                    <h2 class="my-4">Daftar <span class="fw-bold text-danger">Motor</span> Yang Tersedia</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <!-- Carousel Container -->
                    @if ($motors->count() >= 10)
                    @if ($chunk1->count() > 0)
                    <div class="swiper mySwiper" style="padding: 0px 0; height: 500px ">
                        <div class="swiper-wrapper">
                            @foreach ($chunk1 as $motor)
                            <div class="swiper-slide d-flex justify-content-center">
                                <div class="testimonial-box position-relative d-flex justify-content-center">
                                    <!-- Red Box -->
                                    <div class="bg-danger rounded-4 d-flex flex-column justify-content-start align-items-center text-white fw-bold"
                                        style="box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.3); z-index: 1; position: relative; width: 100%; ">
                                        <!-- Profile Info -->
                                        <div
                                            class="position-absolute top-0 start-50 translate-middle-x mt-3 text-center">
                                            <h5 class="mb-0">{{ $motor->nama }}</h5>
                                            <span class="text-small">{{ $motor->kategori }}</span>
                                            <h5>Rp {{ number_format($motor->harga, 0, ',', '.') }}</h5>
                                        </div>
                                    </div>
                                    <!-- Bike Image -->
                                    <img src="{{ asset('storage/'.$motor->gambar) }}" alt="{{ $motor->nama }}"
                                        class="bike-img img-fluid position-absolute bottom-0"
                                        style="z-index: 2; height: 315px;">
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    @endif
                    @if ($chunk2->count() > 0)
                    <div class="swiper mySwiper" style="padding: 0px 0; height: 500px">
                        <div class="swiper-wrapper">
                            @foreach ($chunk2 as $motor)
                            <div class="swiper-slide d-flex justify-content-center">
                                <div class="testimonial-box position-relative d-flex justify-content-center">
                                    <!-- Red Box -->
                                    <div class="bg-danger rounded-4 d-flex flex-column justify-content-start align-items-center text-white fw-bold"
                                        style="box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.3); z-index: 1; position: relative; width: 100%; ">
                                        <!-- Profile Info -->
                                        <div
                                            class="position-absolute top-0 start-50 translate-middle-x mt-3 text-center">
                                            <h5 class="mb-0">{{ $motor->nama }}</h5>
                                            <span class="text-small">{{ $motor->kategori }}</span>
                                            <h5>Rp {{ number_format($motor->harga, 0, ',', '.') }}</h5>
                                        </div>
                                    </div>
                                    <!-- Bike Image -->
                                    <img src="{{ asset('storage/'.$motor->gambar) }}" alt="{{ $motor->nama }}"
                                        class="bike-img img-fluid position-absolute bottom-0"
                                        style="z-index: 2; height: 315px;">
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    @endif
                    @else
                    <div class="swiper mySwiper" style="padding: 0px 0; height: 500px">
                        <div class="swiper-wrapper">
                            @foreach ($motors as $motor)
                            <div class="swiper-slide d-flex justify-content-center">
                                <div class="testimonial-box position-relative d-flex justify-content-center">
                                    <!-- Red Box -->
                                    <div class="bg-danger rounded-4 d-flex flex-column justify-content-start align-items-center text-white fw-bold"
                                        style="box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.3); z-index: 1; position: relative; width: 100%; ">
                                        <!-- Profile Info -->
                                        <div
                                            class="position-absolute top-0 start-50 translate-middle-x mt-3 text-center">
                                            <h5 class="mb-0">{{ $motor->nama }}</h5>
                                            <span class="text-small">{{ $motor->kategori }}</span>
                                            <h5>Rp {{ number_format($motor->harga, 0, ',', '.') }}</h5>
                                        </div>
                                    </div>
                                    <!-- Bike Image -->
                                    <img src="{{ asset('storage/'.$motor->gambar) }}" alt="{{ $motor->nama }}"
                                        class="bike-img img-fluid position-absolute bottom-0"
                                        style="z-index: 2; height: 315px;">
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    @endif
                </div>
            </div>

            <div style="height: 3px; background-color: #f44336;max-width: 1280px; margin: 20px auto;"></div>
        </div>

        </div>

    </section>
    <!-- #testimonials -->







    <!-- Pricing Plan -->
    <section class="section bg-color-special" id="paket">
        <div class="b-container">
            <div style="width: 100%; height: 3px; background-color: #f44336;"></div>
            <div class="row d-flex align-items-center justify-content-center align-content-center mb-5">
                <div class="col-12 text-center" data-animate="fade-left" data-animate-delay="120"
                    data-animate-duration="500">
                    <h2 class="my-4">
                        <span class="fw-bold text-danger">Promo</span> dan <span
                            class="fw-bold text-danger">Paket</span>
                        Touring
                    </h2>
                </div>
            </div>


            <div class="row justify-content-center align-content-center" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                @foreach ($pakets as $index => $paket)
                @php
                // Choose medal image and determine if it's the center card
                $medal = match ($index) {
                0 => 'bronze.png', // first
                1 => 'gold.png', // center
                2 => 'silver.png', // third
                default => 'gold.png', // fallback
                };

                $isCenter = $index === 1; // true only for the center item
                @endphp

                <div class="col-md-4 col-sm-12 mb-4 d-flex flex-column justify-content-center align-content-center">
                    <div class="card bg-secondary-color mb-5 rounded-2 d-flex flex-column paket-box {{ $isCenter ? 'paket-center' : '' }}"
                        style=" position: relative; transition: all 0.3s ease;">

                        <!-- Paket Header -->
                        <div class="paket-header text-white text-center"
                            style="background-image: url('{{ asset('ui/images/bottom.jpg') }}'); ">
                            <h3 class="m-0">{{ strtoupper($paket->nama) }}</h3>
                            <p class="m-0" style="padding-bottom: 15px;">{{
                                $paket->deskripsi }}</p>
                            <div style="height: 30px;"></div>

                            <img class="img-fluid" src="{{ asset('ui/images/' . $medal) }}" alt="Medal"
                                style="width: 50px; position: absolute; left: 10px; bottom: 10px;">
                        </div>






                    </div>
                    <img class="img-fluid medalpaket" src="{{ asset('ui/images/check.png') }}" alt="Medal"
                        style="width: 40px;">
                </div>
                @endforeach
            </div>
        </div>
        <p style="text-align: center; font-size: 24px; font-family: sans-serif;">
            Kami Menyediakan Paket Sewa <span style="color: #ff3366;">Mingguan</span><br>
            dan Paket Sewa <span style="color: #ff3366;">Bulanan</span>.
        </p>
        <p style="text-align: center; font-size: 24px; font-family: sans-serif;">
            Serta Layanan <span style="color: #ff3366;">Antar Jemput</span> Sepeda Motor.
        </p>

        <div class="text-center mt-4">
            @php
            $phone = preg_replace('/\D/', '', $datas[0]->no_hp); // keep only digits

            if (strpos($phone, '0') === 0) {
            // replace leading 0 with 62
            $phone = '62' . substr($phone, 1);
            } elseif (strpos($phone, '62') === 0) {
            // already good
            $phone = $phone;
            } elseif (strpos($phone, '62') !== 0 && strpos($phone, '+62') !== 0) {
            // fallback just in case
            $phone = '62' . $phone;
            }
            @endphp

            <a href="https://wa.me/{{ $phone }}" class="btn btn-cta-primary text-white p-3" style="max-width: 50%">
                Pesan Sekarang!
            </a>

        </div>

        <div style="width: 100%; height: 3px; background-color: #f44336; margin-top: 50px"></div>
        </div>
    </section>
    <!-- #pricing plan -->



    <!-- Our Blog -->
    <section class="section bg-color"
        style=" overflow: hidden;background-image: url('{{asset('ui/images/bottom.jpg')}}')">

        <div class="b-container">
            <div class="row mb-5">
                <div class="col-12 d-flex flex-column align-items-center" data-animate="fade-left"
                    data-animate-delay="150" data-animate-duration="700">

                    <h2 class="my-4 text-center max-w-950 text-white">6 Alasan Kenapa Memilih Kami
                    </h2>
                </div>
            </div>
            <div class="row d-flex align-content-center">

                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-4 mt-md-0" data-animate="fade-left"
                    data-animate-delay="150" data-animate-duration="700" data-animate-once="true">

                    <h4 class="my-3 text-center text-white">Harga Bersaing</h4>

                    <div class="card blog position-relative">


                        <div class="blog-content">


                            <p class="m-0 blog-excerpt">Kami menawarkan harga sewa yang
                                Terjangkau dan kompetitif
                                Dibandingkan rental motor lainnya, Tanpa mengorbankan kualitas Pelayanan kami.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-4 mt-md-0" data-animate="fade-left"
                    data-animate-delay="150" data-animate-duration="700" data-animate-once="true">

                    <h4 class="my-3 text-center text-white">Proses Cepat</h4>

                    <div class="card blog position-relative">


                        <div class="blog-content">


                            <p class="m-0 blog-excerpt">Coda menyediakan sistem yang
                                fleksibel untuk memudahkan Anda
                                dalam menghemat waktu, tanpa
                                ribet, dan tetap profesional</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-4 mt-md-0" data-animate="fade-left"
                    data-animate-delay="150" data-animate-duration="700" data-animate-once="true">

                    <h4 class="my-3 text-center text-white">Motor Terawat</h4>

                    <div class="card blog position-relative">


                        <div class="blog-content">


                            <p class="m-0 blog-excerpt">Motor Coda selalu dalam keadaan
                                prima dan rutin di maintenance.
                                Sepeda Motor Coda sudah dalam
                                kondisi siap pakai dan pastinya
                                bersih.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-4 mt-md-0" data-animate="fade-left"
                    data-animate-delay="150" data-animate-duration="700" data-animate-once="true">

                    <h4 class="my-3 text-center text-white">Area Kota Medan</h4>

                    <div class="card blog position-relative">


                        <div class="blog-content">


                            <p class="m-0 blog-excerpt">Dengan persediaan motor yang
                                selalu ada serta prima, Coda siap
                                melayani rental sewa motor untuk
                                area Kota Medan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-4 mt-md-0" data-animate="fade-left"
                    data-animate-delay="150" data-animate-duration="700" data-animate-once="true">

                    <h4 class="my-3 text-center text-white">Pembayaran Mudah</h4>

                    <div class="card blog position-relative">


                        <div class="blog-content">


                            <p class="m-0 blog-excerpt">Sistem pembayaran Coda Rental
                                yang sangat fleksibel dan mudah.
                                Bisa dilakukan secara tunai maupun
                                via transfer.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-4 mt-md-0" data-animate="fade-left"
                    data-animate-delay="150" data-animate-duration="700" data-animate-once="true">

                    <h4 class="my-3 text-center text-white">Fast Respon</h4>

                    <div class="card blog position-relative">


                        <div class="blog-content">


                            <p class="m-0 blog-excerpt">Pelayanan yang sangat cepat, serta
                                mudah. Kami melayani customer via
                                online maupun offline (datang
                                langsung).</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- #our blog -->


    <section class="section bg-color-special" id="paket">
        <div class="">
            <div style="width: 100%; height: 3px; background-color: #f44336;"></div>
            <div class="row d-flex align-items-center justify-content-center align-content-center mb-5">
                <div class="col-12 text-center" data-animate="fade-left" data-animate-delay="120"
                    data-animate-duration="500">
                    <h2 class="my-4">
                        Terima Kasih
                    </h2>
                    <h2>
                        Sudah Mempercayai <span class="fw-bold text-danger">CODARENT</span> Rental <span
                            class="fw-bold text-danger">Sepeda Motor</span>
                        Medan
                    </h2>
                </div>
            </div>
            <div id="randomGallery" class="row justify-content-center">
                @foreach ($randomimg->chunk(5) as $row)
                <div class="row mb-3 justify-content-center">
                    @foreach ($row as $img)
                    <div class="col-12 col-md-6 col-lg-2 text-center">
                        <div class="image-wrapper-rand">
                            <img src="{{ asset('ui/pics/' . $img) }}" alt="img" class="clickable-image"
                                onclick="showFullImage('{{ asset('ui/pics/' . $img) }}')">
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>

            <!-- Modal (hidden by default) -->
            <div id="imageModal" class="modal-image" onclick="closeFullImage()">
                <span class="close-btn">&times;</span>
                <img class="modal-content" id="fullImage">
            </div>


        </div>




        <div style="width: 100%; height: 3px; background-color: #f44336; margin-top: 50px"></div>
        </div>
    </section>






</main>
<!-- End Main Content -->

@endsection

<script>
    function showFullImage(src) {
    const modal = document.getElementById("imageModal");
    const fullImg = document.getElementById("fullImage");
    modal.style.display = "block";
    fullImg.src = src;
}

function closeFullImage() {
    document.getElementById("imageModal").style.display = "none";
}

 
</script>

<script>
    function refreshGallery() {
    $.ajax({
        url: '/random-images',
        type: 'GET',
        success: function(images) {
            // Build new gallery HTML
            let html = '';
            for (let i = 0; i < images.length; i += 5) {
                html += '<div class="row mb-3 justify-content-center">';
                for (let j = i; j < i + 5 && j < images.length; j++) {
                    html += `
                        <div class="col-12 col-md-6 col-lg-2 text-center">
                            <div class="image-wrapper-rand">
                                <img src="/ui/pics/${images[j]}" alt="img" class="clickable-image"
                                    onclick="showFullImage('/ui/pics/${images[j]}')">
                            </div>
                        </div>
                    `;
                }
                html += '</div>';
            }

            // Fade out, replace, fade in
            $('#randomGallery').fadeOut(600, function() {
                $(this).html(html).fadeIn(600);
            });
        }
    });
}

// Refresh every 5 seconds
setInterval(refreshGallery, 6000);
</script>