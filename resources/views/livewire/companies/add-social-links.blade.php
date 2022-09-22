<div class=" p-4">
@php

    $site_names=['facebook','instgram','twitter','linkedin','google','whatsapp']

    @endphp

    <form action="javascript:void(0)" wire:submit.prevent="add" method="post" enctype="multipart/form-data">
        @csrf
        {{--    name --}}
        <div class=" form-group my-2">
            <label class="form-label" for="title">Company Name</label>
            <input type="text"  class="form-control " readonly placeholder="enter the project name in english " id="title" wire:model="name_en">

        </div>

@if($company)

        @foreach(\App\Models\Company::find($company['id'])->social_links as $social_link)
                <div class="row row-cols-lg-2">


                    <div class="col form-group my-1">

                        <label class="form-label"for="site_name{{$social_link->id}}">Website Name</label>
                        <input type="text"  class="form-control " readonly  id="site_name{{$social_link->id}}" value="{{$social_link->site_name}}">
                    </div>
                    <div class=" col form-group my-1">
                        <label class="form-label " for="url{{$social_link->id}}">Company Account</label>

                        <input type="text"  class="form-control " readonly   id="url{{$social_link->id}}" value="{{$social_link->url}}">
                    </div>
                        <!-- /.input group -->
                    </div>

            @endforeach
        @endif
        <div class="row row-cols-lg-2">


        <div class="col form-group my-2">

            <label class="form-label"for="site_name">Website Name</label>
            <select name="site_name" id="site_name" wire:model="site_name" class="form-control" >
                <option value=""></option>
                @foreach($site_names as $site_name)
                    <option value="{{$site_name}}" {{old('site_name')==$site_name?'selected':''}}>{{ucfirst($site_name)}}</option>
                @endforeach
            </select>
            @error('site_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
            <div class=" col form-group my-2">
                <label>Company Account</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                    </div>
                    <input type="text" class="form-control" name="url" wire:model="url">
                    @error('url')
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
