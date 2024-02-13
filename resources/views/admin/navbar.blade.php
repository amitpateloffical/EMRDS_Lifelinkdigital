<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ URL::to('admin/dashboard') }}" class="nav-link">Home</a>
        </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="image">
                    <img width="30" src="{{ asset('admin/dist/img/user1-128x128.jpg') }}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right " style="left: inherit; right: 0px;">
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right card card-widget widget-user">
                    <div class="widget-user-header bg-danger">
                        <h3 class="widget-user-username">
                            @if (Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->name }}
                            @endif
                        </h3>
                        <h5 class="widget-user-desc">
                            @if (Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->role }}
                            @endif
                        </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="../admin/dist/img/user1-128x128.jpg" alt="User Avatar">
                    </div>
                    <div class="card-footer m-2">
                        <center> <a href="{{ url('admin/logout') }}"> <i class="fas fa-lg fa-power-off text-danger"></i>
                            </a> </center>
                    </div>
                </div>
            </div>
        </li>

        @if (session()->has('adminLogin'))
            @if (session()->get('adminLogin') == true)
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/logout') }}"><button class="btn btn-danger">Logout</button></a>
                </li>
            @endif
        @endif


    </ul>
</nav>
<!-- /.navbar -->


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="{{ URL::to('admin/dashboard') }}" class="brand-link">

        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @if (session()->has('adminLogin'))
            @if (session()->get('adminLogin') == true)
            @endif
        @endif


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-flat nav-child-indent nav-sidebar flex-column " data-widget="treeview"
                role="menu" data-accordion="false">
                <li class="nav-header">Home</li>
                <li class="nav-item">
                    <a href="{{ URL('admin/dashboard') }}"
                        class="nav-link @php
if($mainmenu==" Dashboard"){ echo "active" ; } @endphp">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('department.index') }}"
                        class="nav-link @php
if($submenu==" Department"){ echo "active" ; } @endphp">
                        <i class="far fa-plus-square nav-icon"></i>
                        <p>Department</p>
                    </a>
                </li>

                    <li
                        class="nav-item {{ $mainmenu == 'Offers' || $mainmenu == 'Sliders' || $mainmenu == 'Department' || $mainmenu == 'Service Type' || $mainmenu == 'Roles' || $mainmenu == 'Staffs' ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ $mainmenu == 'Offers' || $mainmenu == 'Sliders' || $mainmenu == 'Department' || $mainmenu == 'Service Type' || $mainmenu == 'Roles' || $mainmenu == 'Staffs' ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-list-check"></i>
                            <p>
                                System Setup
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('roles') }}"
                                        class="nav-link {{ $submenu == 'Role' || $submenu == 'Role Edit' ? 'active' : '' }}">
                                        <i class="fa-solid fa-circle-user nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users') }}"
                                        class="nav-link {{ $submenu == 'Staff' ? 'active' : '' }}">
                                        <i class="fa-solid fa-users nav-icon"></i>
                                        <p>Staffs</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
