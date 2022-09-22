@extends('layouts.AdminDashboard')
@section('title')
 New Category
    @endsection
@section('owner')
    Categories
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

    <form method="post" action="{{route('SubCategory.store')}}" enctype="multipart/form-data">


        {{  csrf_field()}}
      {{  method_field('post')}}
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
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="" value="{{old('name')}}">
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="exampleInputEmail1">Slug</label>--}}
{{--                <input type="text" class="form-control" id="exampleInputEmail1" name="slug" placeholder="" value="{{old('slug')}}">--}}
{{--            </div>--}}


                <!-- /.input group -->

            </div>
        <?php
        $categories = \App\Models\Category::all();
        ?>
        @if($categories->count()>0)
<div class="form-group ml-3">
   <div>
       <label for="" class="form-label"> Category</label>
       <select class="form-select w-75 mb-3 form-control" name="category_id" aria-label=".form-select-lg example">
           @foreach($categories as $category)
               <option value="{{$category->id}}" >{{$category->name}}</option>
           @endforeach
       </select>
   </div>
</div>
        @endif
        <div class="form-group ml-3">

            <label for="user_image" class="form-label">
                <img style="width:200px;height:200px;" src="{{asset('assets/dist/img/avatar5.png')}}" class="img-thumbnail image-preview">
            </label>
            <input id="user_image" type="file" class="image" name="image" hidden>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-outline-primary">ADD SubCategory </button>
        </div>
    </form>

    @endsection
