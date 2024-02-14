        <!--start header wrapper-->
        <div class="header-wrapper">
            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand gap-3">
                        <div class="topbar-logo-header d-none d-lg-flex">
                            <div class="">
                                <a href="{{ route('admin.dashboard') }}"><img
                                        src="{{ asset('admin/assets/images/logo-white.png') }}" class="logo-icon"
                                        alt="logo icon"></a>

                                <input type="hidden" name="logo_url" id="logo_url"
                                    value="{{ asset('admin/assets/images/NeorkProfile-logo.png') }}">

                            </div>

                        </div>
                        <div class="mobile-toggle-menu d-block d-lg-none" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar"><i class='bx bx-menu'></i></div>
                        <div class="position-relative search-bar d-lg-block d-none">
                            <input class="form-control px-5" placeholder="Search">
                            <span
                                class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                                    class='bx bx-search'></i></span>
                        </div>
                        <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center gap-1">
                                <ul class="navbar-nav align-items-center gap-1">
                                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                                        data-bs-target="#SearchModal">
                                        <a class="nav-link" href="avascript:;"><i class='fa fa-search'></i>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown dropdown-large">
                                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                            href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
                                            <i class='bx bx-bell'></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:;">
                                                <div class="msg-header">
                                                    <p class="msg-header-title">Notifications</p>
                                                    <p class="msg-header-badge">8 New</p>
                                                </div>
                                            </a>
                                            <div class="header-notifications-list">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="notify bg-light-danger text-danger">dc
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">You have new mail <span
                                                                    class="msg-time float-end">2 min
                                                                    ago</span></h6>
                                                            <p class="msg-info">Lorem Ipsum is simply dummy text of the
                                                                printing </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="notify bg-light-danger text-danger">dc
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">You have new mail <span
                                                                    class="msg-time float-end">2 min
                                                                    ago</span></h6>
                                                            <p class="msg-info">Lorem Ipsum is simply dummy text of the
                                                                printing </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="user-online">
                                                            <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                                class="msg-avatar" alt="user avatar">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">You have new mail <span
                                                                    class="msg-time float-end">14
                                                                    sec ago</span></h6>
                                                            <p class="msg-info">Lorem Ipsum is simply dummy text of the
                                                                printing </p>
                                                        </div>
                                                    </div>
                                                </a>



                                            </div>
                                            <a href="javascript:;">
                                                <div class="text-center msg-footer">
                                                    <a href="notification.html" class="btn btn-primary w-100"> View All
                                                        Notifications </a>

                                                </div>
                                            </a>
                                        </div>
                                    </li>


                                </ul>
                            </ul>
                        </div>

                        <div class="user-box dropdown px-3">
                            <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if (Auth::user()->profile_image != '')
                                    <img src="{{ asset('admin/assets/uploads/profile_image/' . Auth::user()->profile_image) }}"
                                        class="user-img" alt="user avatar">
                                @else
                                    <img src="{{ asset('admin/assets/images/avatars/default-user.png') }}"
                                        class="user-img" alt="user avatar">
                                @endif
                                <div class="user-info">
                                    <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                    {{-- <p class="designattion mb-0">Web Designer</p> --}}
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            class="fa fa-user fs-5"></i><span>Profile</span></a>
                                </li>
                                @if (hasPermission('site-settings'))
                                    <li><a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('site-settings') }}"><i
                                                class="fa fa-wrench fs-5"></i><span>Settings</span></a>
                                    </li>
                                @endif
                                <li><a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal"
                                        data-bs-target="#logoutModal"><i
                                            class="fa fa-sign-out"></i><span>Logout</span></a>
                                </li>



                            </ul>

                        </div>

                    </nav>

                </div>
            </header>

            <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">

                        </div>
                        <div class="modal-body">
                            <h2 style="text-align: center;font-size: 22px;"> Are you sure you want
                                to log out?</h2>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <div class="modal-footer text-center">


                            <button type="button" class="btn template-btn px-5 confirmYes"
                                data-bs-toggle="offcanvas" href="#userEditForm" role="button"
                                aria-controls="offcanvasExample1"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Yes
                            </button>

                            <button type="button" class="btn template-btn" data-bs-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end header -->
            <!--navigation-->
            <div class="primary-menu">
                <nav class="navbar navbar-expand-lg align-items-center">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <a href="{{ route('admin.dashboard') }}"><img
                                            src="{{ asset('admin/assets/images/NeorkProfile-logo.svg') }}"
                                            class="logo-icon" alt="logo icon"></a>
                                </div>

                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav align-items-center flex-grow-1">



                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                        data-bs-toggle="dropdown">
                                        <div class="parent-icon"><i class='fa fa-cog'></i>
                                        </div>
                                        <div class="menu-title d-flex align-items-center"></div>
                                        <!-- <div class="ms-auto dropy-icon"><i class='fa fa-angle-down'></i></div> -->
                                    </a>
                                    <ul class="dropdown-menu stay_open">
                                        <li class="dropdown">
                                            <a class="dropdown-item " href="{{ route('role') }}" >
                                                <i class="fa fa-table"></i>Masters</a>
                                         
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item " href="{{ route('emp-dashboard-hr') }}" >
                                                <i class="fa fa-table"></i>Employee</a>
                                         
                                        </li>
                                       

                                        <!-- @if (hasPermission('users'))
                                            <li><a class="dropdown-item" href="{{ route('users') }}"><i
                                                        class="fa fa-tags"></i>Users</a></li>
                                        @endif

                                       -->

                                        @if (hasPermission('notifications'))
                                            <li><a class="dropdown-item" href="{{ route('notifications') }}"><i
                                                        class="fa fa-tags"></i>Notifications</a></li>
                                        @endif

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle  " href="javascript:;" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-table"></i>Site Settings</a>
                                            <ul class="dropdown-menu submenu-new" aria-labelledby="dropdownMenuLink">
                                                    @if (hasPermission('policy'))
                                                        <li><a class="dropdown-item" href="{{ route('policy') }}"><i
                                                                    class="fa fa-tags"></i>Policies</a></li>
                                                    @endif
                                            </ul>
                                        </li>   


                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!--end navigation-->
        </div>
        <!--end header wrapper-->
