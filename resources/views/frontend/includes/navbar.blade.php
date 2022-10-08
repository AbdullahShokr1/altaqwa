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






                <div class="mode col-md" itemscope itemtype="https://schema.org/WebSite">
                    <meta itemprop="url" content="{{route('home.index')}}"/>
                    <form class="d-flex" method="get" action="{{route('home.search')}}" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
                        <meta itemprop="target" content="{{route('home.search')}}?query={query}"/>
                        <input class="form-control me-2" itemprop="query-input" type="search" name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
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
                        @if(!empty($topNavItems))
                            @foreach($topNavItems as $nav)
                                @if(!empty($nav->children[0]))
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="{{route('home.category',$nav->slug)}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach($nav->children[0] as $childNav)
                                                @if($childNav->type == 'custom')
                                                    <li><a class="dropdown-item" href="{{$childNav->slug}}">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>
                                                @elseif($childNav->type == 'category')
                                                    <li><a class="dropdown-item" href="{{route('home.category',$childNav->slug)}}">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>
                                                @else
                                                    <li><a class="dropdown-item" href="{{route('home.post',[$nav->slug,$childNav->slug])}}">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>
                                                @endif
                                                <li><hr class="dropdown-divider"></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    @if($nav->type == 'custom')
                                        <li class="nav-item"><a class="nav-link" href="{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                    @elseif($nav->type == 'category')
                                        <li class="nav-item"><a class="nav-link" href="{{route('home.category',$nav->slug)}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                        @auth
                            <li class="dropdown">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{route('home.profile',Auth::user('user')->name)}}">الملف الشخصي</a></li>
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
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



