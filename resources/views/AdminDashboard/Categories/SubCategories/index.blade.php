@extends('layouts.adminDashboard')

@section('title')
List SubCategories
    @endsection
@section('owner')
    Categories
    @endsection
@section('content')
    <form method="get" action="{{route('getSubCategories',$category->id)}}">
        <div class="form-group">
            <div class="row ">
                <div class="col-md-4">
                    <input type="search" name="search" class="form-control"  placeholder="search">
                </div>
                <div class="col-md-4">

                    <button type="submit" class="btn btn-primary  {{Auth::user()->hasPermission('subcategories-read')?'':'disabled'}}"><i class="fa fa-search"></i> Find</button>
                    <a href="{{route('SubCategory.create')}}" class="btn btn-primary  {{Auth::user()->hasPermission('subcategories-create')?'':'disabled'}}"><i class="fa fa-plus"></i> Add</a>
                    <a href="{{route('create.course')}}" class="btn btn-primary  {{Auth::user()->hasPermission('courses-create')?'':'disabled'}}"><i class="fa fa-plus"></i> Add Course</a>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">List SubCategories  of {{$category
->name}}</h3>

            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if($subCategories->count()>0)
<div class="row row-cols-lg-4 justify-between g-2 row cols-md-2">
    @foreach($subCategories as $subCategory)
        <div class="col">
            <a href="{{route('getCourseBySubCategoryId',$subCategory->id)}}">
            <div class="card mb-2 bg-gradient-dark">
                <img class="card-img-top" src="{{asset('assets/dist/img/SubCategory-images/'.$subCategory->image)}}" style="height:200px" alt="Dist Photo 1">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white">{{$subCategory->name}}</h5>
{{--                    <p class="card-text text-white pb-2 pt-1">{{$subCategory->slug}}</p>--}}
                    <a href="{{route('SubCategory.edit',['SubCategory'=>$subCategory->id])}}" class="btn btn-outline-warning {{Auth::user()->hasPermission('subcategories-update')?'':'disabled'}} " >  <i class="fa fa-edit"></i>Edit</a>
                    <form method="post"  action="{{route('SubCategory.destroy',['SubCategory'=>$subCategory])}}" class="mt-2"  style="display:inline-block">
                        {{csrf_field()}}
                        {{method_field('delete')}}

                        <button type="submit"  class="btn delete  btn-outline-danger w-100 " {{Auth::user()->hasPermission('subcategories-delete')?'':'disabled'}}> <i class="fa fa-trash"></i>Delete</button>
                    </form>
                </div>
            </div>
            </a>
        </div>





@endforeach


</div>
            @else
                <h2>
                    No SubCategories Founded
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
