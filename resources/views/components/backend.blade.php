@include('dashboard.includes.header')
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{URL::asset('dashboardfile/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('dashboard.home')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">



            <li class="nav-item">
                <a class="nav-link" href="{{route('home.index')}}" target="_blank" >
                    <i class="fas fa-home"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Admin</span>
                    <a href="" class="dropdown-item">
                        <h4><i class="fas fa-user"> Profile</i></h4>
                    </a>
                    <a href="#" class="dropdown-item">
                        <h5><i class="fas fa-envelope mr-2"> Log Out</i></h5>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" onclick="document.getElementById('logout').submit()" class="dropdown-item">
                        <i class="fas fa-sign-out-alt"> {{ __('Log Out') }} </i>
                        <form method="POST" id="logout" action="{{ route('dashboard.logout') }}">
                            @csrf
                        </form>
                    </a>
                </div>

            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('dashboard.includes.aside');
{{$slot}}
@include('dashboard.includes.footer')
