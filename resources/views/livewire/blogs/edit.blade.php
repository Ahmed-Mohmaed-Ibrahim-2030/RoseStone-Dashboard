<div class=" p-4">


    <form action="javascript:void(0)" wire:submit.prevent="update" method="post" enctype="multipart/form-data">
        @csrf
        {{--    name --}}
        <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for=title_en">Title</label>
                <input type="text" name=title_en" class="form-control" placeholder="enter the blog name in english " id=title_en" wire:model="title_en">
                @error('title_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg form-group my-1 text-right">
                <label class="form-label " for=title_ar">عنوان المقال   </label>
                <input type="text" name=title_ar" class="form-control text-right" placeholder="ادخل  عنوان المقال العربية" id=title_ar" wire:model="title_ar">
                @error('title_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>


        {{--    code && Category--}}
        <div class="row row-cols-lg-2">
            <div class="col  form-group my-1">
                <label class="form-label" for="code">type</label>
                <input  name="type " class="form-control" placeholder="body" id="type"  wire:model="type">
                @error('type')
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

        {{--    body--}}
        <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for="body_en">body_en</label>
                <textarea  name="body_en" class="form-control" placeholder="enter blog body_en" id="body_en" rows="2" wire:model="body_en"></textarea>
                @error('body_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg form-group my-1 text-right">
                <label class="form-label" for="body_ar">محتوي المقال  </label>
                <textarea  name="body_ar" class="form-control" placeholder="ادخل محتوي المقال " id="body_ar" rows="2" wire:model="body_ar"></textarea>
                @error('body_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        {{--    date--}}


        <div class="form-group">
            <img src="{{asset('assets/images/blogs/'.$image_org)}}" alt="{{$title_en}}" width="100" height="100">
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
