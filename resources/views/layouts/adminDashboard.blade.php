<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets\plugins\fontawesome-free\css\all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets\plugins\tempusdominus-bootstrap-4\css\tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('assets\plugins\icheck-bootstrap\icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('assets\plugins\jqvmap\jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets\dist\css\adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets\plugins\overlayScrollbars\css\OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets\plugins\daterangepicker\daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets\plugins\summernote\summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @livewireStyles
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake img-circle" src="{{asset('assets/images/logo/logo.png')}}"  alt="E-L-Platform" height="200" width="200">
    </div>

    <!-- Navbar -->

       @include('components.AdminComponents.navbar')

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


        <!-- Sidebar -->
       @include('components.AdminComponents.sidebar')
        <!-- /.sidebar -->


    <div class="content-wrapper">
        <div class="content-header">
            <div id="owner" class="container-fluid ">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('owner')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@yield('owner')</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('flash-message')
    @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; by team 4 <a href="https://adminlte.io">RoseStone </a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->

<script src="{{asset('assets\plugins\jquery\jquery.min.js')}}"></script>
<script>
    $('.delete').click(function (e) {
        e.preventDefault();
        // var n =Noty({
        //     text:'Are You Sure You Sure "want to delete" ',
        //     type:'warning',
        //     killer:true,
        //     buttons:[
        //         Noty.button('yes','btn btn-danger',function () {
        //             that.closest('form').submit();
        //         }),
        //         Noty.button('no','btn btn-success',function () {
        //            n.close();
        //         }),
        //     ]
        // });
let confirm=window.confirm('Are you sure you want to delete');

if (confirm)
{
    // $('').submit();
    e.target.closest('form').submit();
}

    });
    $('.image').change(function (){
        if(this.files&&this.files[0]){
            let reader=new FileReader();
            reader.onload=function (e){
                $('.image-preview').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    })

</script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets\plugins\jquery-ui\jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets\plugins\bootstrap\js\bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets\plugins\chart.js\Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets\plugins\sparklines\sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets\plugins\jqvmap\jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets\plugins\jqvmap\maps\jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets\plugins\jquery-knob\jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets\plugins\moment\moment.min.js')}}"></script>
<script src="{{asset('assets\plugins\daterangepicker\daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets\plugins\tempusdominus-bootstrap-4\js\tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets\plugins\summernote\summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets\plugins\overlayScrollbars\js\jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets\dist\js\adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets\dist\js\demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets\dist\js\pages\dashboard.js')}}"></script>
@livewireScripts
@stack('scripts')
</body>
</html>
