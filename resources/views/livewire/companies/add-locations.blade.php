<div class=" p-4">


    <form action="javascript:void(0)" wire:submit.prevent="add" method="post" enctype="multipart/form-data">
        @csrf
        {{--    name --}}
        <div class=" form-group my-2">
            <label class="form-label" for="title">Company Name</label>
            <input type="text"  class="form-control " readonly placeholder="enter the project name in english " id="title" wire:model="name_en">

        </div>

@if($company)

        @foreach(\App\Models\Company::find($company['id'])->locations as $location)
                <div class="row row-cols-lg-2">


                    <div class="col form-group my-1">

                        <label class="form-label"for="site_name{{$location->id}}">Branch</label>
                        <input type="text"  class="form-control " readonly  id="site_name{{$location->id}}" value="{{$location->branch}}">
                    </div>
                    <div class=" col form-group my-1">
                        <label class="form-label " for="url{{$location->id}}">Location </label>

                        <input type="text"  class="form-control " readonly   id="url{{$location->id}}" value="{{$location->location}}">
                    </div>
                        <!-- /.input group -->
                    </div>

            @endforeach
        @endif
        <div class="row row-cols-lg-2">



            <div class=" col form-group my-2">
                <label>Branch</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                    </div>
                    <input type="text" class="form-control" name="branch" wire:model="branch">
                    @error('branch')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.input group -->
            </div>
            <div class=" col form-group my-2">
                <label>Location</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                    </div>
                    <input type="text" class="form-control" name="location" wire:model="location">
                    @error('location')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.input group -->
            </div>
        </div>
        <div class="text-center m-3">
            <button type="submit"  class="btn btn-outline-dark "> Edit
                <i class="fa fa-edit"></i>
            </button></div>
    </form>


</div>
