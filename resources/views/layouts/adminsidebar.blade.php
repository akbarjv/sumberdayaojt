<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{'/dashboard'}}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{asset('ui/images/logowhite.png')}} " alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">CodaRent Admin</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item">
                    <a href="{{'/dashboard'}}" class="nav-link">
                        <i class="fa-solid fa-gauge"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('data_perusahaans.index') }}" class="nav-link">
                        <i class="fa-solid fa-building"></i>
                        <p>Data Perusahaan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('banners.index') }}" class="nav-link">
                        <i class="fa-regular fa-image"></i>
                        <p>Banner</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('motors.index') }}" class="nav-link">
                        <i class="fa-solid fa-motorcycle"></i>
                        <p>Daftar Motor</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pakets.index') }}" class="nav-link">
                        <i class="fa-solid fa-box-open"></i>
                        <p>Daftar Paket</p>
                    </a>
                </li>

                {{-- <li class="nav-item" style="margin-top: 100%">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="fa-solid fa-home"></i>
                        <p>Preview Website</p>
                    </a>
                </li> --}}







            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->