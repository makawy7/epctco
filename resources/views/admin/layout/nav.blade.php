

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="{{route('admin.index')}}">
                <img class="brand-img d-inline-block" src="{{url('des/cp')}}/dist/img/logo-dark.png" alt="brand" />
            </a>
            <ul class="navbar-nav hk-navbar-content">

                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{url('des/cp')}}/dist/img/avatar12.jpg" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{auth()->user()->name}}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="{{route('changepassword')}}"><i class="dropdown-icon zmdi zmdi-key"></i><span>Change Password</span></a>
                        <div class="dropdown-divider"></div>
                        <form class="hidden" id="logoutform" action="{{route('logout')}}" method="post">
                          @csrf
                        </form>
                        <a class="dropdown-item" href="#" onclick="$('#logoutform').submit();"><i class="dropdown-icon zmdi zmdi-power"></i><span>Logout</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->

        <!--Horizontal Nav-->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('admin.index')}}">
                                <span class="feather-icon"><i data-feather="home"></i></span>
                                <span class="nav-link-text">Home Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('aboutpage.index')}}">
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">About Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('services')}}">
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Services Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('products')}}">
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Products Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('agents')}}">
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Agents Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('pos')}}">
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">POS Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('gallery')}}">
                                <span class="feather-icon"><i data-feather="image"></i></span>
                                <span class="nav-link-text">Gallery Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Contact Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('maindata')}}">
                                <span class="feather-icon"><i data-feather="settings"></i></span>
                                <span class="nav-link-text">Main Data</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!--/Horizontal Nav-->




                <!-- Main Content -->
                <div class="hk-pg-wrapper">
        			<!-- Container -->
                    <div class="container mt-xl-50 mt-sm-30 mt-15">
