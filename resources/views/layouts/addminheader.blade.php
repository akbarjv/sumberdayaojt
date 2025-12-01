<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <!-- Sidebar toggle button-->
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>



            {{--
            <!-- Home Link -->
            <li class="nav-item d-none d-md-inline-block">
                <a href="{{ url('/') }}" class="nav-link">Preview Website</a>
            </li> --}}
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}" role="button">
                    <i class="fa-solid fa-home" style="margin-right: 5px"></i>
                    Preview Website
                </a>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-user" style="margin-right: 20px;"></i>
                    <span class="d-none d-md-inline">{{$users->name}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        {{-- <img src="./assets/img/user2-160x160.jpg" class="rounded-circle shadow" alt="User Image" />
                        --}}
                        <p>
                            {{$users->name}}
                            <small>{{$users->email}}</small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    <!--begin::Menu Body-->

                    <!--end::Menu Body-->
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat float-end">
                            Edit password
                        </a>
                    </li>
                    <li class="user-footer">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-default btn-flat float-end">
                                Sign out
                            </button>
                        </form>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->