<header>
    <!--#1.1 Start upper-bar-->
    <section class='upper-bar'>
        <section class='container'>
            <section class='row'>
                <section class='socil col-md '>
                    <ul>
                        <li class="nav-item"><a class="nav-link" title='facebook' target="_blank" href='{{explode('|',$settings->social)[0]}}'><i class="fab fa-facebook"></i></a></li>
                        <li class="nav-item"><a class="nav-link" title='twitter' target="_blank" href='{{explode('|',$settings->social)[1]}}'><i class="fab fa-twitter"></i></a></li>
                        <li class="nav-item"><a class="nav-link" title='instagram' target="_blank" href='{{explode('|',$settings->social)[2]}}'><i class="fab fa-instagram"></i></a></li>
                        <li class="nav-item"><a class="nav-link" title='youtube' target="_blank" href='{{explode('|',$settings->social)[3]}}'><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </section>
                <section class='mode col-md'>
                    <section class="switch"><section class="circle"></section></section>
                </section>
            </section>
        </section>
    </section>
    <!--#1.1 End upper-bar-->
    <!--#1.2 Start NavBar-->
    <section class='myNavbar'>
        <nav id='header' class="navbar navbar-expand-lg navbar-light px-5" dir="rtl">
            <section class="container-fluid">
                <section class='logo'>
                    <a href='{{route('home.index')}}'><img src='{{asset('site/images/'.$settings->logo)}}' alt='Logo'>{{$settings->name}}</a>
                </section>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <section class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                تنظيف منازل
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">جدة</a></li>
                                <li><a class="dropdown-item" href="#">مكة</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">المدينة المنورة</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">الرياض</a></li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">تنظيف بالرياض</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#">مكافحة حشرات</a></li>
                                                <li><a class="dropdown-item" href="#">تنظيف خزانات</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#">نقل عفش</a></li>
                                            </ul>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">شركة نقل عفش</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#">تنظيف بجدة</a></li>
                                                <li><a class="dropdown-item" href="#">شركة تنظيف بجدة </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#">شركة ممافحة حشرات بجدة</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="#">القصيم</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">مكافحة حشرات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">تنظيف خزانات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">تنظيف بالبخار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">نقل عفش</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">سياسة الخصوصية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">من نحن</a>
                        </li>
                        @auth
                            <li class="dropdown">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    </div>
                                </ul>
                            </li>
                        @else
                            <li><a  class="nav-link" href="{{route('login')}}"><i class="fas fa-sign-in-alt" aria-hidden="true"></i></a></li>
                        @endauth
                    </ul>
                </section>
            </section>
        </nav>
    </section>
    <!--#1.2 End NavBar-->
</header>
