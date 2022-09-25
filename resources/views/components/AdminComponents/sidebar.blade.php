<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{env('APP_URL')}}" class="brand-link">
        <img src="{{asset('assets/images/logo/logo.png')}}" alt="E-L-Platform Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RoseStone</span>
    </a>
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{Auth::user()->image?asset('assets/images/users/admins/'.Auth::user()->image):asset('assets/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{route('profile')}}" class="d-block"> {{Auth::user()->first_name .' '.Auth::user()->last_name}}</a>

        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            @if(Auth::user()->hasPermission('users-read'))
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Admin Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(Auth::user()->hasPermission('company-read'))
                    <li class="nav-item">
                        <a href="{{route('company')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Company</p>
                        </a>
                    </li>
                    @endif
                        @if(Auth::user()->hasPermission('admins-read'))
                        <li class="nav-item">
                        <a href="{{route('admins.index')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                        @endif
                        @if(Auth::user()->hasPermission('categories-read'))
                    <li class="nav-item">
                        <a href="{{route('Category.index')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categories</p>
                        </a></li>
                        @endif
                        @if(Auth::user()->hasPermission('products-read'))
                    <li class="nav-item">
                        <a href="{{route('products')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Products</p>
                        </a>
                    </li>
                        @endif
                        @if(Auth::user()->hasPermission('projects-read'))
                    <li class="nav-item">
                        <a href="{{route('projects')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                        @endif
                        @if(Auth::user()->hasPermission('partners-read'))
                    <li class="nav-item">
                        <a href="{{route('partners')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Partners</p>
                        </a>
                    </li>
                        @endif
                        @if(Auth::user()->hasPermission('blogs-read'))
                    <li class="nav-item">
                        <a href="{{route('blogs')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blogs</p>
                        </a>

                    </li>
                        @endif
                        @if(Auth::user()->hasPermission('contacts-read'))
                    <li class="nav-item">
                                                <a href="{{route('contact.index')}}" class="nav-link ">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Contacts</p>
                                                </a>
                                            </li>
@endif
                </ul>
            </li>
            @endif
{{--            @if(Auth::user()->hasPermission('categories-read'))--}}
{{--            <li class="nav-item menu-open">--}}
{{--                <a href="#" class="nav-link ">--}}
{{--                    <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                    <p>--}}
{{--                        Categories--}}
{{--                        <i class="right fas fa-angle-left"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('Category.index')}}" class="nav-link active">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Categories</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    @if(Auth::user()->hasPermission('categories-create'))--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('Category.create')}}" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Add Category </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    @endif--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            @endif--}}






{{--            @if(Auth::user()->hasRole('admin')||Auth::user()->hasRole('super_admin'))--}}
{{--                <li class="nav-item menu-open">--}}
{{--                    <a href="#" class="nav-link active">--}}
{{--                        <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                        <p>--}}
{{--                            Contact Us--}}
{{--                            <i class="right fas fa-angle-left"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}

{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('contact-form')}}" class="nav-link active">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Contacts</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}



{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endif--}}
                  </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
</aside>
