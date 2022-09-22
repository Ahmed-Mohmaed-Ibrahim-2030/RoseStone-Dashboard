{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
@extends("layouts.adminDashboard")
@section('title')
    add videos

@endsection
@section('owner')
    Courses
@endsection

@section('content')
<div class="card">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Add Video</h3>
        </div>

        <!-- /.card-body -->
    </div>
<section class="content" style="padding:20px 30%;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>

                <form role="form" method="POST",  action="{{ route('course.video.store') }}">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>video link*</label>
                                    <input type="text" name="source" class="form-control" placeholder="video link" value="{{old('source')}}" required />
                                </div>
                            </div>
                            <input type="hidden" name="course_id" value="{{$course->id}}" />




                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="course">Course Id</label>--}}

{{--                            <select class="form-control" id="course_id" name="course_id" >--}}
{{--                                <option value="" selected disabled hidden>Choose here</option>--}}
{{--                                @php--}}
{{--                                    $courses = \App\Models\Course::all();--}}
{{--                                @endphp--}}
{{--                                @foreach ($courses as $course)--}}
{{--                                    <option value="{{ $course->id }}" {{old(--}}
{{--                                'course_id')==$course->id?"selected":""}}>{{ $course->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>

                    </div>
                </form>

                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                @if(\Session::has('error'))
                    <div>
                        <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                    </div>
                @endif

                @if(\Session::has('success'))
                    <div>
                        <li class="alert alert-success">{!! \Session::get('success') !!}</li>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

    @endsection
