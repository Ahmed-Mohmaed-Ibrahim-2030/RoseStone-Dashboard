@extends('layouts.AdminDashboard')
@section('title')
 Edit Category
    @endsection
@section('owner')
    Categories
    @endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit {{$Category->name}}</h3>
        </div>
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{$error}}
            </div>
        @endforeach

    <form method="post" action="{{route('Category.update',$Category)}}" class="p-3" enctype="multipart/form-data">
      {{  csrf_field()}}
      {{  method_field('put')}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Grayscale Image:</strong><br/>
                <img src="/uploads/{{ Session::get('fileName') }}" width="550px" />
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Name In English</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name_en" placeholder="" value="{{$Category->name_en}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Name In Arabic</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name_ar" placeholder="" value="{{$Category->name_ar}}">
            </div>


            <div class="form-group ml-3">

                <label for="user_image" class="form-label">
                    <img style="width:200px;height:200px;" src="{{asset('assets/images/categories/'.$Category->image)}}" class="img-thumbnail image-preview">
                </label>
                <input id="user_image" type="file" class="image" name="image" hidden>
            </div>
            <!-- /.card-body -->
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-outline-primary"> <i class="fa fa-edit"></i> Update </button>
        </div>
    </form>
{{--    01554270660--}}
    @endsection
