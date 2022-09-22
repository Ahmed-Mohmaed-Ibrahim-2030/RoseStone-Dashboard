<div class=" p-4">


<form action="javascript:void(0)" wire:submit.prevent="save" method="post" enctype="multipart/form-data">
    @csrf
{{--    name --}}

    <div class=" form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name=name" placeholder="" wire:model="name">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
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
            <label> phone </label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" name="phone" wire:model="phone">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- /.input group -->
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
