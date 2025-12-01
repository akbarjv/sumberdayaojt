<!-- Footer -->
<footer id="kontak" class="footer">
    <div class="b-container">
        <div class="row g-4 g-xl-5 mt-0 mx-auto align-content-between justify-content-between"
            style="padding-top: 90px; padding-bottom: 90px">

            <div class="col-12 col-md-6 col-xl-6 mt-0 px-auto px-xl-0">
                <div class="footer-logo-box">
                    <img src="{{asset('ui/images/logo.png')}} " alt="Footer Logo"
                        class="h-100 object-fit-contain d-block">
                </div>
                <p class="mt-4 text-center text-md-start">penyedia jasa sewa motor terpercaya di Kota Medan yang
                    telah beroperasi sejak awal tahun 2023.
                </p>
                <div class="d-flex gap-2 justify-content-center justify-content-md-start">
                    <a href="{{$datas[0]->facebook}}"><i class="bi bi-facebook icon-social" style="color: red"></i></a>
                    <a href="{{$datas[0]->ig}}"> <i class="bi bi-instagram icon-social " style="color: red"></i></a>

                </div>
            </div>

            {{-- <div class="col-12 col-md-6 col-xl-2 mt-5 mt-xl-0">
                <h4 class="text-center text-md-start">QUICK LINKS</h4>
                <hr class="border-1 max-w-170 text-primary-color opacity-100 mx-auto mx-md-0">
                <ul class="p-0 m-0 d-flex flex-column align-items-center align-items-md-start">
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Home</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            About Us</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Services</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Our Project</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Pricing Plan</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Contact Us</a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-6 col-xl-3 mt-5 mt-xl-0 pe-0">
                <h4 class="text-center text-md-start">SERVICES</h4>
                <div class="w-100">
                    <hr class="border-1 max-w-170 text-primary-color opacity-100 mx-auto mx-md-0">
                </div>
                <ul class="p-0 m-0 d-flex flex-column align-items-center align-items-md-start">
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Car Detailing</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Paint Protection</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Interior Deep Cleaning</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Engine Bay Cleaning</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Fleet Services</a>
                    </li>
                    <li class="d-flex align-items-center list-unstyled mb-2">
                        <a href="#"><i class="bi bi-check-circle text-primary-color fs-5 me-2"></i>
                            Collision Repair</a>
                    </li>
                </ul>
            </div> --}}

            <div class="col-12 col-md-6 col-xl-6 mt-5 mt-xl-0 ps-0">
                <h4 class="text-center text-md-start">CONTACT INFO</h4>
                <hr class="border-1 max-w-170 text-primary-color opacity-100 mx-auto mx-md-0">
                <div class="d-flex mb-4 flex-column flex-md-row align-items-center align-items-md-start">
                    <a href="#" class="icon-contact me-0 me-md-3"><i class="bi bi-telephone fs-3"></i></a>
                    <div class="d-flex flex-column text-center text-md-start">
                        <p class="text-small text-color-3 mb-1">Nomor HP</p>
                        <h5 class="mb-0">{{$datas[0]->no_hp}}</h5>
                    </div>
                </div>
                {{-- <div class="d-flex mb-4 flex-column flex-md-row align-items-center align-items-md-start">
                    <a href="#" class="icon-contact me-0 me-md-3"><i class="bi bi-envelope fs-3"></i></a>
                    <div class="d-flex flex-column text-center text-md-start">
                        <p class="text-small text-color-3 mb-1">Email</p>
                        <h5 class="mb-0">{{$datas[0]->email}}</h5>
                    </div>
                </div> --}}
                <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start">
                    <a href="#" class="icon-contact me-0 me-md-3"><i class="bi bi-geo-alt fs-3"></i></i></a>
                    <div class="d-flex flex-column text-center text-md-start">
                        <p class="text-small text-color-3 mb-1">Alamat</p>
                        <h5 class="mb-0">{{$datas[0]->alamat}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top-color">
        <div class="b-container border-start border-end border-1 border-primary-color p-3">
            <div class="d-flex flex-row flex-wrap justify-content-center justify-content-md-between">
                <p class="text-color-3 m-0">© 2025 {{$datas[0]->nama}}.</p>
                {{-- <ul class="m-0 p-0 d-flex gap-3 footer-terms">
                    <li class="list-unstyled"><a href="#"
                            class="text-color-3 border-end border-1 border-primary-color pe-3">Terms &
                            Conditions</a></li>
                    <li class="list-unstyled"><a href="#" class="text-color-3">Paint Protection</a></li>
                </ul> --}}
            </div>
        </div>
    </div>
</footer>
<!-- #footer -->