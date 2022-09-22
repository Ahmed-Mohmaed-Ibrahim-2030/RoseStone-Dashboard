{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
@extends("layouts.adminDashboard")
@section('title')
    Show Courses

@endsection
@section('owner')
    Courses
@endsection

@section('content')



            <div class="box box-primary">


                <form role="form" method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>course name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="course name" value="{{old('name')}}" required />
                                </div>

                           <div class="form-group">
                                    <label>course price*</label>
                                    <input type="number" name="price" class="form-control" placeholder="course price" value="{{old('price')}}" required />
                                </div>


                            <div class="form-group">
                                    <label>course short description*</label>
                                    <input type="text" name="small_desc" class="form-control" placeholder="course short description" value="{{old('name')}}" required />
                                </div>
                                <div class="form-group">
                                    <label>course  description*</label>
                                    <input type="text" name="description" class="form-control" placeholder="course  description" value="{{old('name')}}" required />
                                </div>
                                <div class="form-group ml-3">

                                    <label for="user_image" class="form-label">
                                        <img style="width:200px;height:200px;" src="{{asset('assets/dist/img/avatar5.png')}}" class="img-thumbnail image-preview">
                                    </label>
                                    <input id="user_image" type="file" class="image" name="image" hidden>
                                </div>
                            <div class="form-group">
                            <label for="course">Select category course</label>

                            <select class="form-control" id="category_id" name="category_id" >
                            <option value="" selected disabled hidden>Choose here</option>
                            @php
                                $Categories = \App\Models\Category::all();
                            @endphp
                                @foreach ($Categories as $Categorie)
                                    <option value="{{ $Categorie->id }}">{{ $Categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">Select subcategory course</label>

                            <select class="form-control" id="sub_category_id" name="sub_category_id" >

                            @php
                                $SubCategories = \App\Models\Sub_Category::all();
                            @endphp
                                @foreach ($SubCategories as $subCategorie)
                                    <option value="{{ $subCategorie->id }}">{{ $subCategorie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">Select Instructor course</label>

                            <select class="form-control" id="instructor_id" name="instructor_id" >

                            @php
                                $Instructors = \App\Models\Instructor::all();
                            @endphp
                                @foreach ($Instructors as $Instructor)
                                    <option value="{{ $Instructor->id }}" >{{ $Instructor->account->first_name }}</option>
                                @endforeach
                            </select>
                        </div>


</div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create </button>

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


@endsection
