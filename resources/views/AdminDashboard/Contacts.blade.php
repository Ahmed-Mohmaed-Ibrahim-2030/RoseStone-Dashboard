@extends('layouts.adminDashboard')

@section('title')
    List Messages
@endsection
@section('owner')
    Admins
    {{--    <small>{{$users->total()}}</small>--}}
@endsection
@section('content')
{{--    <form method="get" action="{{ '' }}">--}}
{{--        <div class="form-group">--}}
{{--            <div class="row ">--}}
{{--                <div class="col-md-4">--}}
{{--                    <input type="search" name="search" class="form-control" value="{{request()->search}}" >--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}

{{--                    <button type="submit" class="btn btn-outline-info btn-sm  {{Auth::user()->hasPermission('users-read')?'':'disabled'}}"><i class="fa fa-search"></i> Find</button>--}}
{{--                    <a href="{{route('admins.create')}}" class="btn btn-outline-primary btn-sm  {{Auth::user()->hasPermission('users-create')?'':'disabled'}}"><i class="fa fa-plus"></i> Add</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
    <div class="card">
        <div class="card card-dark mx-3">
            <div class="card-header row ">
                <h3 class="card-title col-9">List all contacts</h3>
                <form class="col-2 text-right" method="post" action="{{route('contact.clear')}}" id="delete-form" style="display:inline-block">

                    {{csrf_field()}}
                    {{method_field('delete')}}

                    <button type="submit"  class="btn btn-outline-danger delete " {{Auth::user()->hasPermission('contacts-delete')?'':'disabled'}}><i class="fa fa-trash"></i> clear </button>
                </form>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if($contacts->count()>0)
                <table class="table table-hover text-nowrap pt-0 ">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Sender</th>
                        <th>Eamil</th>
{{--                        <th>Sender</th>--}}

                        <th>Action</th>
{{--                        <th style="width: 40px">Action</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $i=>$contact)
                        {{--{{dd($user)}}--}}
                        <tr id="{{$contact->id}}">
                            <td>{{$i+1}}</td>
                            <td>
                                <a href="{{route('contact.show',$contact->id)}}">
                                    {{$contact->name}}</a></td>

                            <td>{{$contact->email}}</td>
{{--                            <td>{{$contact->name}}</td>--}}

                            <td>

                                <form method="post" action="{{route('contact.destroy',['contact'=>$contact->id])}}" id="delete-form" style="display:inline-block">

                                    {{csrf_field()}}
                                    {{method_field('delete')}}

                                    <button type="submit"  class="btn btn-outline-danger delete " {{Auth::user()->hasPermission('contacts-delete')?'':'disabled'}}><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--                        {{dd($user)}}--}}
{{--                {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}--}}
            @else
                <h3>
                    No Messages Found
                </h3>
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

    {{--      {{  $users->links()}}--}}
@endsection
