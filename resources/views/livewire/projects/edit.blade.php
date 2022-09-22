<div class=" p-4">


    <form action="javascript:void(0)" wire:submit.prevent="update" method="post" enctype="multipart/form-data">
        @csrf
        {{--    name --}}
        <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for="name_en">Project Name</label>
                <input type="text" name="name_en" class="form-control" placeholder="enter the project name in english " id="name_en" wire:model="name_en">
                @error('name_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg form-group my-1 text-right">
                <label class="form-label " for="name_ar">اسم المنتج  </label>
                <input type="text" name="name_ar" class="form-control text-right" placeholder="ادخل اسم المنتج بالعربية" id="name_ar" wire:model="name_ar">
                @error('name_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        {{--    price and time--}}

        <div class="form-group my-1">
            <label class="form-label" for="details_en">Location</label>
            <div class="input-group">

                <input type="text" name="location" class="form-control" placeholder=" " id="title" wire:model="location">

            </div>
            @error('location')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        {{--    code && Category--}}
        <div class="row row-cols-lg-2">
            <div class="col  form-group my-1">
                <label class="form-label" for="code">Code</label>
                <input  name="code " class="form-control" placeholder="body" id="code"  wire:model="code">
                @error('code')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col form-group my-1">

                <label class="form-label"for="category">Category</label>
                <select name="category_id" id="category" wire:model="category_id" class="form-control" >
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{old('category_id')==$category->id?'selected':''}}>{{$category->name_en}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
        {{--    date--}}
        <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" placeholder="enter the project name in english " id="start_date" wire:model="start_date">
                @error('start_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg form-group my-1 ">
                <label class="form-label " for="end_date">End Date  </label>
                <input type="date" name="end_date" class="form-control text-right" placeholder="ادخل اسم المنتج بالعربية" id="end_date" wire:model="end_date">
                @error('end_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for="details_en">Project Details</label>
                <textarea  name="details_en" class="form-control" placeholder="enter project details" id="details_en" rows="2" wire:model="details_en"></textarea>
                @error('details_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg form-group my-1 text-right">
                <label class="form-label" for="details_ar">تفاصيل المنتج </label>
                <textarea  name="details_ar" class="form-control" placeholder="ادخل تفاصيل المنتج " id="details_ar" rows="2" wire:model="details_ar"></textarea>
                @error('details_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <img src="{{asset('assets/images/projects/'.$image_org)}}" alt="{{$name_en}}" width="100" height="100">
        </div>
        <div class="form-group my-2">
            <label class="form-label" for="image">Image</label>
            {{--                            <label class="form-label" for="image"><img src="" alt="image"></label>--}}
            <input type="file" name="image" class="" id="image" wire:model="image">
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="text-center m-3">
            <button type="submit"  class="btn btn-outline-dark "> Edit
                <i class="fa fa-edit"></i>
            </button></div>
    </form>


</div>
