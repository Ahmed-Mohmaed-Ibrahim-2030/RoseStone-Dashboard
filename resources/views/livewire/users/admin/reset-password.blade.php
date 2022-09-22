<div>
    <form action="javascript:void(0)" wire:submit.prevent="add" method="post" enctype="multipart/form-data">
        @csrf
        {{--    name --}}
        <div class=" form-group my-2">
            <label class="form-label" for="title">Company Name</label>
            <input type="text"  class="form-control " readonly  id="title" wire:model="name_en">

        </div>



        <div class=" form-group">
            <label> Email </label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" name="phone" wire:model="email">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- /.input group -->
        </div>

        <div class="text-center m-3">
            <button type="submit"  class="btn btn-outline-dark "> Edit
                <i class="fa fa-edit"></i>
            </button></div>
    </form>
</div>
