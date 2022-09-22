@extends('layouts.adminDashboard')

@section('title')
    Show Message
@endsection
@section('owner')
{{$contact->name}}
    {{--    <small>{{$users->total()}}</small>--}}
@endsection
@section('content')
    <div class="card">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">{{$contact->subject}}</h3>
            </div>

            <!-- /.card-body -->
        </div>
        <div class="card-data">
            <p class="mx-5  aler aler-success">
                Email: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
            </p>
        </div>
        <!-- /.card-header -->
        <div class="card-body text-center">

     {{$contact->message}}






                </div>

        </div>

    </div>
    @endsection
