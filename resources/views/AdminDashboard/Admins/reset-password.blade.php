@extends('layouts.AdminDashboard')
@section('title')
    new user
@endsection
@section('owner')
    Admins
@endsection
<?php
$models=['users','categories','products','projects','blogs','partners'];
$maps=['primary'=>['create','plus'],'info'=>['read','book'],'warning'=>['update','edit'],'danger'=>['delete','']];
?>
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Reset Admin Password</h3>
        </div>
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{$error}}
            </div>
        @endforeach

        <form method="post" action="{{route('admins.reset.password',$admin->id)}}" enctype="multipart/form-data">
            {{  csrf_field()}}
            {{  method_field('put')}}
            <div class="card-body">

                <div class="row row-cols-2">
                    <div class="col form-group">
                        <label> Email </label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text"  readonly="readonly"  class="form-control"   value="{{old('email',$admin->email)}}">
                        </div>
                        <!-- /.input group -->
                    </div>




                    <div class="col form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

{{--                    <div class="col form-group">--}}
{{--                        <label for="exampleInputPassword1">Confirmed Password</label>--}}
{{--                        <input type="password" class="form-control" id="exampleInputPassword1" name= "password_confirmation" placeholder="Password">--}}
{{--                    </div>--}}
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-dark"> next</button>
            </div>
        </form>
@endsection
