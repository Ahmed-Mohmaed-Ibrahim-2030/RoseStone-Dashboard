<div class=" p-4">


    <form action="javascript:void(0)" wire:submit.prevent="add" method="post" enctype="multipart/form-data">
        @csrf
        {{--    name --}}
        <div class=" form-group my-2">
            <label class="form-label" for="title">Project Name</label>
            <input type="text"  class="form-control " readonly placeholder="enter the project name in english " id="title" wire:model="name_en">

        </div>

        <div class="form-group my-2">
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
