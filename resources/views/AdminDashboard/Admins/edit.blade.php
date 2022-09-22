@extends('layouts.AdminDashboard')
@section('title')
    Update Admin
@endsection
@section('owner')
    Users
@endsection
<?php

$models=['users','categories','subCategories','courses'];
$maps=['primary'=>['create','plus'],'info'=>['read','book'],'warning'=>['update','edit'],'danger'=>['delete','']];
?>
@section('content')

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Update Admin</h3>
        </div>
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{$error}}
            </div>
        @endforeach

        <form method="post" action="{{route('admins.update',$admin)}}"  enctype="multipart/form-data">
            {{  csrf_field()}}
            {{  method_field('put')}}
            <div class="card-body">
                <div class="row row-cols-2">
                <div class="col form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="first_name" placeholder="" value="{{old('first_name',$admin->first_name)}}">
                </div>


 <div class="col form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" id="" name="last_name" placeholder="" value="{{old('last_name',$admin->last_name)}}">
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
            <input type="text" class="form-control" name="phone" value="{{old('phone',$admin->phone) }}">
        </div>
        <!-- /.input group -->
    </div>
    <div class=" col  form-group">


        <label> Email </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="" value="{{old('email',$admin->email)}}">
        </div>
    </div>

</div>
                <div class="form-group">
                    <label> Username </label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" name="" readonly placeholder="Username" value="{{old('username', $admin->username)}}">
                    </div>
                    <!-- /.input group -->
                </div>



                <!-- /.card-body -->
<div class="form-group">

    <label for="user_image" class="form-label">
        <img style="width:200px;height:200px;" src="{{$admin->image?asset('assets/images/users/admins/'.$admin->image):asset('assets/dist/img/avatar5.png')}}" class="img-thumbnail">
    </label>
    <input id="user_image" type="file" name="image" hidden>
</div>
                <div class="">
                    <div class="card card-dark card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                             @foreach($models as $index=>$model)
                                <li class="nav-item">
                                    <a class="nav-link {{$index==0?"active":""}}" id="custom-tabs-four-{{$model}}-tab" data-toggle="pill" href="#custom-tabs-four-{{$model}}" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">{{$model}}</a>
                                </li>
@endforeach
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                @foreach($models as $index=>$model)
                                <div class="tab-pane fade show {{$index==0?"active":""}}" id="custom-tabs-four-{{$model}}" role="tabpanel" aria-labelledby="custom-tabs-four-{{$model}}-tab">
                                    <div class="form-group row cols-4 align-items-center ">
                                        @foreach($maps as $index=>$map)
                                        <div class="form-check ">
                                            <input id="{{$map[0]}}_{{$model}}"  name="permissions[]" value="{{$model}}-{{$map[0]}}" {{$admin->hasPermission($model.'-'.$map[0])?'checked':""}} class="form-check-input"   type="checkbox">
                                            <label for="{{$map[0]}}_{{$model}}" class="form-check-label btn btn-sm mr-5 btn-outline-{{$index}}"><i class="fa fa-{{$map[1]}}"></i>
                                                {{$map[0]}}  </label>
                                        </div>

@endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                @php
                $token=rand(10000,9999);
@endphp
                <a href="{{route('password.reset',compact('token'))}}" class="btn btn outline-waring"><i class="fa fa-key"></i></a>
                <button type="submit" class="btn btn-outline-primary">update <i class="fa fa-edit"></i></button>
            </div>
        </form>

@endsection

