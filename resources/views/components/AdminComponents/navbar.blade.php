<nav id="mainNav" class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('profile')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>


        <ul class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{Auth::User()->unreadNotifications->count()}}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{Auth::User()->unreadNotifications->count()}} Notifications</span>
                <hr>
                    @foreach(Auth::User()->unreadNotifications as $notification)
                <li class="notification-box">

                        <div class="row">
                            <div class="col-lg-3 col-sm-3 col-3 ">
                                <img src="{{Auth::user()->image}}" class="w-50 rounded-circle">
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8">
                                <strong class="text-info text-left">{{$notification->data['name']}}</strong>
                            </div>
                        </div>
                        <div class="row text-end ">
                            <div class="col text-center"> <a href="{{route('contact.show',$notification->data['contact_id'])}}">show</a></div>
                        </div>
                        <div class="row text-center">
                            <small class="col text-center text-warning">{{$notification->created_at}}</small>
                        </div>

                </li>
                @endforeach
                @if(Auth::User()->unreadNotifications->count()>0)
                    <hr>
                    <div class="row text-end ">
                        <div class="col text-center"> <a href="{{route('contact.index')}}">Show All</a></div>
                    </div>

                    @endif

            </diV>
        </ul>
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
        <li class="nav-item dropdown  align-items-center justify-ev ">

        <a class="nav-link  " data-toggle="dropdown" href="#">
            {{--                <i class="far fa-bell"></i>--}}
            {{--                <span class="badge badge-warning navbar-badge">15</span>--}}
            {{Auth::user()->first_name .' '.Auth::user()->last_name}}

            <img src="{{Auth::user()->image?asset('assets/images/users/admins/'.Auth::user()->image):asset('assets/dist/img/avatar5.png')}}" style="width: 30px;height:30px; max-height:100%" class="img-circle elevation-2 " alt="User Image">
        </a>
{{--<div class="col-2 ">--}}

{{--</div>--}}



            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                {{--                <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="dropdown-item"   onclick="event.preventDefault();
                                        this.closest('form').submit();">

                        {{--                    <span class="float-right text-muted text-sm">3 mins</span>--}}
                        Logout
                    </a>

                </form>


            </div>
        </li>
    </ul>
</nav>
