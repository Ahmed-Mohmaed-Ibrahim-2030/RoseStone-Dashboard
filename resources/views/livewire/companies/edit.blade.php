<div class=" p-4">


    <form action="javascript:void(0)" wire:submit.prevent="update" method="post" enctype="multipart/form-data">
        @csrf
        {{--    name --}}
        <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for="name_en">Company Name</label>
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
        <div class="row row-cols-2">
            {{--        email--}}
            <div class="col form-group">
                <label> Email </label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="" wire:model="email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.input group -->
            </div>
            {{--        phone--}}
            <div class=" col form-group">
                <label>Website  url </label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-url"></i></span>
                    </div>
                    <input type="text" class="form-control" name="url" wire:model="url">
                    @error('url')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.input group -->
            </div>
        </div>





        <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for="about_en">About  Us </label>
                <textarea  name="about_en" class="form-control" placeholder="enter project about" id="about_en" rows="2" wire:model="about_en"></textarea>
                @error('about_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg form-group my-1 text-right">
                <label class="form-label" for="about_ar">عن الشركة </label>
                <textarea  name="about_ar" class="form-control" placeholder="ادخل عن الشركة " id="about_ar" rows="2" wire:model="about_ar"></textarea>
                @error('about_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for="vision_en">Our Vision</label>
                <textarea  name="vision_en" class="form-control" placeholder="enter project vision" id="vision_en" rows="2" wire:model="vision_en"></textarea>
                @error('vision_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg form-group my-1 text-right">
                <label class="form-label" for="vision_ar">رؤيتنا  </label>
                <textarea  name="vision_ar" class="form-control" placeholder="ادخل رؤيتنا  " id="vision_ar" rows="2" wire:model="vision_ar"></textarea>
                @error('vision_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>   <div class="row row-cols-lg-2">
            <div class="col-lg form-group my-1">
                <label class="form-label" for="preface_en">Company Preface</label>
                <textarea  name="preface_en" class="form-control" placeholder="enter project preface" id="preface_en" rows="2" wire:model="preface_en"></textarea>
                @error('preface_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg form-group my-1 text-right">
                <label class="form-label" for="preface_ar">تفاصيل المنتج </label>
                <textarea  name="preface_ar" class="form-control" placeholder="ادخل تفاصيل المنتج " id="preface_ar" rows="2" wire:model="preface_ar"></textarea>
                @error('preface_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>



        <div class="text-center m-3">
            <button type="submit"  class="btn btn-outline-dark "> Edit
                <i class="fa fa-edit"></i>
            </button></div>
    </form>


</div>
