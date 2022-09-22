<div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <b class="">Posts</b>
                    @if(Auth::user()->hasPermission('blogs-create'))
                    <a href="javascript:void(0)" wire:click="toggle_create" class="btn btn-outline-primary d-inline-block btn-sm ml-auto"><i class="fa fa-plus"></i> Post</a>
                    @endif
                </div>
                <div>
                  @include('partial.flash')
                </div>
                @if($showCreateBlog)
                <livewire:blogs.create />
                @endif
                @if($showAddImage)
                <livewire:blogs.add-image />
                @endif
                @if($showEditBlog)
                <livewire:blogs.edit />
                @endif
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table ">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title </th>
                                <th>Owner</th>
                                <th>Category</th>
                                <th>Action </th>
                            </tr>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        @if(!empty($blog->image))

                                            <img src="{{asset('assets/images/blogs/'.$blog->image)}}" alt="{{$blog->title}}"  width="100" alt=""></td>
                                    @endif
                                    <td>
                                        <a href="javascript:void(0)" wire:click="show_post({{$blog->id}})" >  {{$blog->title_en}}</a>
                                    </td>
                                    <td>{{$blog->user->first_name ." ".$blog->user->last_name}}</td>
                                    <td>{{$blog->category->name_en}}
                                    </td>
                                    <td>
{{--                                        <a href="javascript:void(0)"  wire:click="add_image({{$blog->id}})"  class="btn btn-outline-primary btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit this Post "> <i class="fa fa-plus"></i> Img</a>--}}
                                        @if(Auth::user()->hasPermission('blogs-update'))
                                        <a href="javascript:void(0)"  wire:click="edit_blog({{$blog->id}})"  class="btn btn-outline-warning btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit this Post "> <i class="fa fa-edit"></i></a>
                                           @endif
                                            @if(Auth::user()->hasPermission('blogs-delete'))
                                        <a href="javascript:void(0)" wire:click="deleteId({{$blog->id}})"  class="btn btn-outline-danger  btn-sm ms-2" data-bs-toggle="tooltip" data-bs-placement="left" title="delete this Post" data-toggle="modal" data-target="#exampleModal">  <i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </thead>
                        </table>
                        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true close-btn">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure want to delete?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                        <button type="button" wire:click.prevent="delete_blog()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-end">
                        {!! $blogs->withQueryString()->links() !!}
                    </div>


                </div>

            </div>
        </div>
    </div>

</div>
