<div class=" p-4">


<form action="javascript:void(0)" wire:submit.prevent="save" method="post" enctype="multipart/form-data">
    @csrf
{{--    name --}}
    <div class="row row-cols-lg-2">
        <div class="col-lg form-group my-1">
            <label class="form-label" for="title">Product Name</label>
            <input type="text" name="name_ar" class="form-control" placeholder="enter the product name in english " id="title" wire:model="name_en">
            @error('name_ar')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-lg form-group my-1 text-right">
            <label class="form-label " for="title">اسم المنتج  </label>
            <input type="text" name="name_en" class="form-control text-right" placeholder="ادخل اسم المنتج بالعربية" id="title" wire:model="name_ar">
            @error('name_en')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
{{--    price and time--}}
    <div class="row row-cols-lg-2">
        <div class="col-lg form-group my-1">
            <label class="form-label" for="details_en">Price</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price" class="form-control" placeholder=" " id="title" wire:model="price">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
            @error('price')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-lg form-group my-1 ">

            <label class="form-label" for="details_en">Expected Time</label>
            <div class="input-group">
                <input type="number" name="expected_time" class="form-control" placeholder=" Expected Time in Dayies" id="title" wire:model="expected_time">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
            @error('expected_time')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
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
{{--    details--}}
    <div class="row row-cols-lg-2">
        <div class="col-lg form-group my-1">
            <label class="form-label" for="details_en">Product Details</label>
            <textarea  name="details_en" class="form-control" placeholder="enter product details" id="details_en" rows="2" wire:model="details_en"></textarea>
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

    <div class="form-group my-2">
        <label class="form-label" for="image">Image</label>
        {{--                            <label class="form-label" for="image"><img src="" alt="image"></label>--}}
        <input type="file" name="image" class="" id="image" wire:model="image">
        @error('image')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="text-center m-3">
        <button type="submit"  class="btn btn-outline-primary "> Create
            <i class="fa fa-plus"></i>
        </button></div>
</form>


</div>
