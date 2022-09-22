@extends('layouts.AdminDashboard')
@section('title')
    new user
    @endsection
@section('owner')
    Admins
    @endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Admin</h3>
        </div>
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{$error}}
            </div>
        @endforeach

    <form method="post" action="{{route('users.store')}}">
      {{  csrf_field()}}
      {{  method_field('post')}}
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label> Email </label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="" value="{{old('email')}}">
                </div>
                <!-- /.input group -->
            </div>      <div class="form-group">
                <label> Username </label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">
                </div>
                <!-- /.input group -->
            </div>      <div class="form-group">
                <label> phone </label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                </div>
                <!-- /.input group -->
            </div>

        <!-- /.card-body -->
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Confirmed Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name= "password_confirmation" placeholder="Password">
            </div>
            <div class="">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-user" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Admins</a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-user" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                <div class="form-group row cols-4 align-items-center ">
                                    <div class="form-check ">
                                        <input id="read_users"  name="permissions[]" value="users-read" class="form-check-input" type="checkbox">
                                        <label for="read_users" class="form-check-label btn btn-sm mr-5 btn-outline-info"><i class="fa fa-book"></i> Read  </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="create_user" name="permissions[]" value="users-create" class="form-check-input" type="checkbox">
                                        <label for="create_user"  class="form-check-label btn btn-sm mr-5 btn-outline-primary"><i class="fa fa-plus"></i> Add</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="update_user" name="permissions[]" value="users-update" class="form-check-input" type="checkbox">
                                        <label for="update_user" class="form-check-label btn btn-sm mr-5 btn-outline-warning" ><i class="fa fa-edit"></i>  Update</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="delete_user" name="permissions[]" value="users-delete" class="form-check-input" type="checkbox">
                                        <label for="delete_user" class="form-check-label btn btn-sm mr-5 btn-outline-danger"><i class="fa fa-remove"></i>Delete</label>
                                    </div>

                            </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @endsection
