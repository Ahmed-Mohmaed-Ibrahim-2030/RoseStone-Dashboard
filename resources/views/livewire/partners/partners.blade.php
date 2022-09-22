<div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <b class=""> Partners</b>
                    @if(Auth::user()->hasPermission('partners-create'))
                    <a href="javascript:void(0)" wire:click="toggle_create" class="btn btn-outline-primary d-inline-block btn-sm ml-auto"><i class="fa fa-plus"></i> Partners</a>
               @endif
                </div>
                <div>
                  @include('partial.flash')
                </div>
                @if($showCreatePartner)
                <livewire:partners.create />
                @endif
                @if($showAddImage)
                <livewire:partners.add-image />
                @endif
                @if($showEditPartner)
                <livewire:partners.edit />
                @endif
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table ">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name </th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action </th>
                            </tr>
                            @foreach($partners as $partner)
                                <tr>
                                    <td>
                                        @if(!empty($partner->logo))

                                            <img src="{{asset('assets/images/partners/'.$partner->logo)}}" alt="{{$partner->name}}"  width="100" alt=""></td>
                                    @endif
                                    <td>
                                        <a href="javascript:void(0)" wire:click="show_post({{$partner->id}})" >  {{$partner->name}}</a>
                                    </td>
                                    <td>{{$partner->email}}</td>
                                    <td>{{$partner->phone}}
                                    </td>
                                    <td>
{{--                                        <a href="javascript:void(0)"  wire:click="add_image({{$partner->id}})"  class="btn btn-outline-primary btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit this Post "> <i class="fa fa-plus"></i> Img</a>--}}
                                        @if(Auth::user()->hasPermission('partners-update'))
                                        <a href="javascript:void(0)"  wire:click="edit_partner({{$partner->id}})"  class="btn btn-outline-warning btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit this Partner "> <i class="fa fa-edit"></i></a>
@endif
                                        @if(Auth::user()->hasPermission('partners-delete'))
                                        <a href="javascript:void(0)" wire:click="deleteId({{$partner->id}})"  class="btn btn-outline-danger  btn-sm ms-2" data-bs-toggle="tooltip" data-bs-placement="left" title="delete this partner" data-toggle="modal" data-target="#exampleModal">  <i class="fa fa-trash"></i></a>
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
                                        <button type="button" wire:click.prevent="delete_partner()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-end">
                        {!! $partners->withQueryString()->links() !!}
                    </div>


                </div>

            </div>
        </div>
    </div>

</div>
