@extends('layouts.adminDashboard')

@section('title')
List Users
    @endsection
@section('owner')
    Users
    @endsection
@section('content')
    <?php
    if(!Illuminate\Support\Facades\Auth::user()->hasPermission('users.read'))
        {
            redirect('users.profile');
        }
    ?>
    <form method="post" action="">
        <div class="form-group">
            <div class="row ">
                <div class="col-md-4">
                    <input type="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-4">

                    <button type="submit" class="btn btn-primary  {{Auth::user()->hasPermission('users-read')?'':'disabled'}}"><i class="fa fa-search"></i> Find</button>
                    <a href="{{route('users.create')}}" class="btn btn-primary  {{Auth::user()->hasPermission('users-create')?'':'disabled'}}"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">List all Users</h3>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if($users->count()>0)
            <table class="table table-hover text-nowrap ">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Full Name </th>
                    <th>Role</th>
                    <th>Eamil</th>
                    <th style="width: 40px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $i=>$user)

                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$user->first_name.' '.$user->last_name}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->email}}</td>

                    <td>
<a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-outline-warning {{Auth::user()->hasPermission('users-update')?'':'disabled'}} " >Edit</a>
<form method="post" action="{{route('users.destroy',['user'=>$user])}}" style="display:inline-block">
    {{csrf_field()}}
    {{method_field('delete')}}

                        <button type="submit"  class="btn btn-outline-danger " {{Auth::user()->hasPermission('users-delete')?'':'disabled'}}>Delete</button>
</form>
                    </td>
                </tr>
@endforeach
                </tbody>
            </table>
            @else
                <h2>
                    No Users Founded
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
