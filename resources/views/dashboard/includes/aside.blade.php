<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{URL::asset('dashboardfile/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{URL::asset('dashboardfile/images/admins/'.Auth::user('admin')->photo)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info nav nav-pills nav-sidebar flex-column">
                <a href="#" class="d-block">{{ Auth::user('admin')->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard.home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.post.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.page.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-pen-nib"></i>
                        <p>
                            Pages
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.media')}}" class="nav-link">
                        <i class="nav-icon fas fa-icons"></i>
                        <p>
                            Media
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.tag.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.review.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Reviews
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard.blog.post.index')}}" class="nav-link">
                                <i class=" nav-icon fas fa-file-powerpoint"></i>
                                <p>Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.blog.category.index')}}" class="nav-link">
                                <i class=" nav-icon fas fa-cubes"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.blog.tag.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Tags
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.comment.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>
                                    Comments
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.home')}}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Header & Footer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.admins.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Admins
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            SEO
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.settings')}}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
