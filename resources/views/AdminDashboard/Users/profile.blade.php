@extends('layouts.adminDashboard')

@section('title')
 Profile
@endsection
@section('owner')
    Users
@endsection
@section('content')
<div class="">

    <?php
   $user=Illuminate\Support\Facades\Auth::user();
   //$//user =App\Http\Controllers\Users\UserController::userInfo();
//dd($user);
    ?>
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">{{$user->first_name .' '. $user->last_name}}</h3>
            <h5 class="widget-user-desc">{{$user->role}}</h5>
        </div>
        <div class="widget-user-image">

            <img class="img-circle elevation-2" src="{{$user->image?asset('assets/images/users/admins/'.$user->image):asset('assets/dist/img/avatar5.png')}}">
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">ُEmail</h5>
                        <span class="description-text">{{$user->email}}</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">Username</h5>
                        <span class="description-text">{{$user->username}}</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">Phone</h5>
                        <span class="description-text">{{$user->phone}}</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>

        </div>
        <div class="text-center py-3 bg-dark">
            <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-outline-warning {{Auth::user()->hasPermission('users-update')?'':'disabled'}} " ><i class="fa fa-edit"> </i> Edit</a>

              @if(!$user->hasRole('super_admin'))
            <form method="post" action="{{route('users.destroy',['user'=>$user])}}" style="display:inline-block">
                {{csrf_field()}}
                {{method_field('delete')}}

                    <button type="submit"  class="btn btn-outline-danger " {{Auth::user()->hasPermission('users-delete')?'':'disabled'}}><i class="fa fa-trash"></i>Delete</button>
            </form>
            @endif
            <a href="{{route('edit-reset',['admin'=>$user->id])}}" class="btn  btn-outline-secondary">reset password</a>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.widget-user -->
</div>
@endsection
