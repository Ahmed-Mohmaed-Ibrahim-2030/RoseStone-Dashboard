@extends('layouts.adminDashboard')

@section('title')
List Categories
    @endsection
@section('owner')
    Categories
    @endsection
@section('content')
    <form method="get" action="{{route('Category.index')}}">
        <div class="form-group">
            <div class="row ">
                <div class="col-md-4">
                    <input type="search" name="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-4">

                    <button type="submit" class="btn btn-outline-secondary  {{Auth::user()->hasPermission('categories-read')?'':'disabled'}}"><i class="fa fa-search"></i> </button>
                    <a href="{{route('Category.create')}}" class="btn btn-outline-secondary  {{Auth::user()->hasPermission('categories-create')?'':'disabled'}}"><i class="fa fa-plus"></i> </a>
{{--                    <a href="{{route('SubCategory.create')}}" class="btn btn-primary  {{Auth::user()->hasPermission('categories-create')?'':'disabled'}}"><i class="fa fa-plus"></i> Add SubCategory</a>--}}
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">List all Categories</h3>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if($categories->count()>0)
<div class="row row-cols-lg-4 justify-between g-2 row cols-md-2">
    @foreach($categories as $category)
        <div class="col">
            <a href="{{route('getSubCategories',$category)}}">
                <div class="card mb-2 bg-gradient-dark">

                    <img class="card-img-top" src="{{asset('assets/images/categories/'.$category->image)}}" style="height:200px" alt="Dist Photo 1">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-primary text-white">{{$category->name}}</h5>
                        <p class="card-text text-white pb-2 pt-1">{{$category->slug}}</p>
                        <a href="{{route('Category.edit',['Category'=>$category->id])}}" class="btn btn-outline-warning {{Auth::user()->hasPermission('categories-update')?'':'disabled'}} " >  <i class="fa fa-edit"></i>Edit</a>
{{--                        <form method="post" id="delete-form" action="{{route('Category.destroy',['Category'=>$category->id])}}" class="mt-2"  style="display:inline-block">--}}
                        <form method="post"  action="{{route('Category.destroy',['Category'=>$category])}}" class="mt-2"  style="display:inline-block">
                            {{csrf_field()}}
                            {{method_field('delete')}}

                            <button type="submit"  class="btn delete  btn-outline-danger w-100 " {{Auth::user()->hasPermission('categories-delete')?'':'disabled'}}> <i class="fa fa-trash"></i>
                                {{$category->id}} Delete</button>
                        </form>
                    </div>
                </div>
            </a>

        </div>





@endforeach


</div>

                <div class="my-3 float-right ">
                    {{$categories->links()}}
                </div>
            @else
                <h2>
                    No Categories Founded
                </h2>
            @endif
        </div>
        <!-- /.card-body -->
{{--        <div class="card-footer clearfix">--}}
{{--            <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </div>

    @endsection
