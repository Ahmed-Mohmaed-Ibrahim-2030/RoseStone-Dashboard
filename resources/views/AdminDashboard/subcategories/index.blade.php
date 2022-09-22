@extends('layouts.adminDashboard')

@section('title')
List Categories
    @endsection
@section('owner')
    Categories
    @endsection
@section('content')
    <form method="post" action="">
        <div class="form-group">
            <div class="row ">
                <div class="col-md-4">
                    <input type="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-4">

                    <button type="submit" class="btn btn-primary  {{Auth::user()->hasPermission('categories-read')?'':'disabled'}}"><i class="fa fa-search"></i> Find</button>
                    <a href="{{route('categories.create')}}" class="btn btn-primary  {{Auth::user()->hasPermission('categories-create')?'':'disabled'}}"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">List all Admins</h3>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if($subcategories->count()>0)
<div class="row row-cols-lg-4 row cols-md-2">
    @foreach($subcategories as $subcategory)
        <div class="">
            <div class="card mb-2 bg-gradient-dark">
                <img class="card-img-top" src="{{asset('assets/dist/img/categories-images/'.$subcategory->image}}" alt="Dist Photo 1">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white">{{$subcategory->name)}}</h5>
                    <p class="card-text text-white pb-2 pt-1">{{$subcategory->slug}}</p>
                    <a href="{{route('categories.edit',['subcategory'=>$subcategory->id])}}" class="btn btn-outline-warning {{Auth::user()->hasPermission('categories-update')?'':'disabled'}} " >  <i class="fa fa-edit"></i>Edit</a>
                    <form method="post" action="{{route('users.destroy',['subcategory'=>$subcategory])}}" style="display:inline-block">
                        {{csrf_field()}}
                        {{method_field('delete')}}

                        <button type="submit"  class="btn btn-outline-danger " {{Auth::user()->hasPermission('categories-delete')?'':'disabled'}}>Delete</button>
                    </form>
                </div>
            </div>
        </div>





@endforeach


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
