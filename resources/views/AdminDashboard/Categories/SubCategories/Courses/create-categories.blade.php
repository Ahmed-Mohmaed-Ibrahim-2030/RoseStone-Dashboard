<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<section class="content" style="padding:20px 30%;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Category</h3>
                </div>
                
                <form role="form" method="POST" action="{{ route('category.store') }}">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Category name" value="{{old('name')}}" required />
                                </div>
                            </div>

                            <div class="form-group">
                            <label for="category">Select Parent Category</label>
                         
                            <select class="form-control" id="parent_id" name="parent_id" >
                            <option value="" selected disabled hidden>Choose here</option>

                                @foreach ($Categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                         

                        </div>
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