@extends('layouts.AdminDashboard')
@section('title')
    Update User
@endsection
@section('owner')
    Users
@endsection

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Update User</h3>
        </div>
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{$error}}
            </div>
        @endforeach

        <form method="post" action="{{route('users.update',$user->id)}}"  enctype="multipart/form-data">
            {{  csrf_field()}}
            {{  method_field('put')}}
            <div class="card-body">
                <div class="row row-cols-2">
                    <div class="col form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="first_name" placeholder="" value="{{old('first_name',$user->first_name)}}">
                    </div>


                    <div class="col form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" id="" name="last_name" placeholder="" value="{{old('last_name',$user->last_name)}}">
                    </div>




                    <!-- /.input group -->
                </div>

                <div class="row row-cols-2">
                    <div class=" col form-group">
                        <label> phone </label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="phone" value="{{old('phone',$user->phone) }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class=" col  form-group">


                        <label> Email </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="" value="{{old('email',$user->email)}}">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label> Username </label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" name="" readonly placeholder="Username" value="{{old('username', $user->username)}}">
                    </div>
                    <!-- /.input group -->
                </div>

                <!-- /.card-body -->
<div class="form-group">

    <label for="user_image" class="form-label">
        <img style="width:200px;height:200px;" src="{{$user->image?asset('assets/images/users/admins/'.$user->image):asset('assets/dist/img/avatar5.png')}}" class="img-thumbnail">
    </label>
    <input id="user_image" type="file" name="image" hidden>
</div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-dark"><i class="fa fa-edit"></i> Update</button>
            </div>
        </form>

@endsection

