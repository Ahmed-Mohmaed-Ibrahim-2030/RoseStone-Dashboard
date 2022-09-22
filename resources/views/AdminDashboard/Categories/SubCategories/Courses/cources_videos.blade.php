@extends("layouts.adminDashboard")
@section('title')
    add videos

    @endsection
@section('owner')
Courses
    @endsection

@section('content')

    <form method="get" action="{{ 'admins' }}">
        <div class="form-group">
            <div class="row ">
                <div class="col-md-4">
                    <input type="search" name="search" class="form-control" value="{{request()->search}}" >
                </div>
                <div class="col-md-4">

                    <button type="submit" class="btn btn-outline-info btn-sm  {{Auth::user()->hasPermission('courses-read')?'':'disabled'}}"><i class="fa fa-search"></i> Find</button>
                    <a href="{{route('course.video.create',$course->id)}}" class="btn btn-outline-primary btn-sm  {{Auth::user()->hasPermission('courses-update')?'':'disabled'}}"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">List Courses</h3>
            </div>

            <!-- /.card-body -->
        </div>
@if($courses->count()>0)
@foreach ($courses as $course)

<iframe width="560" height="315" src="{{str_replace('watch?v=', 'embed/', $course->source)}}" frameborder="0" allowfullscreen></iframe>
{{--<video src="{{$course->source}}" controls></video>--}}
@endforeach
{{--    {{$courses->links()}}--}}
    {!! $courses->withQueryString()->links('pagination::bootstrap-5') !!}
        @else
            <h3 class="alert alert-warning mx-2">
                Now Videos Added Yet
            </h3>
    @endif
    @endsection
