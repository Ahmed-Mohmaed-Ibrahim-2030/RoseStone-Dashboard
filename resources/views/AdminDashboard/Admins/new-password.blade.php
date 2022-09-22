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
            <h3 class="card-title">New Admin</h3>
        </div>
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{$error}}
            </div>
        @endforeach

        <form method="post" action="{{route('admins.new-password',$admin->id)}}" enctype="multipart/form-data">
            {{  csrf_field()}}
            {{  method_field('put')}}
            <div class="card-body">
    >
                <!-- /.card-body -->
                <div class="row row-cols">

                    <div class="col form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="col form-group">
                        <label for="exampleInputPassword1">Confirmed Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name= "password_confirmation" placeholder="Password">
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-dark"><i class="fa fa-edit"></i> Reset</button>
            </div>
        </form>
@endsection
