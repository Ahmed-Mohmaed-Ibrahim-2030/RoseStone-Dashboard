<div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <b class=""> Products </b>
                    @if(Auth::user()->hasPermission('products-create'))
                    <a href="javascript:void(0)" wire:click="toggle_create" class="btn btn-outline-primary d-inline-block btn-sm ml-auto"><i class="fa fa-plus"></i> Product </a>
               @endif
                </div>
                <div>
                  @include('partial.flash')
                </div>
                @if($showCreateProduct)
                <livewire:products.create />
                @endif
                @if($showAddImage)
                <livewire:products.add-image />
                @endif
                @if($showEditProduct)
                <livewire:products.edit />
                @endif
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table ">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name </th>
                                <th>Owner</th>
                                <th>Category</th>
                                <th>Action </th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if(!empty($product->images()->first()->image))

                                            <img src="{{asset('assets/images/products/'.$product->images()->first()->image)}}" alt="{{$product->title}}"  width="100" alt=""></td>
                                    @endif
                                    <td>
                                        <a href="javascript:void(0)" wire:click="show_post({{$product->id}})" >  {{$product->name_en}}</a>
                                    </td>
                                    <td>{{$product->user->first_name ." ".$product->user->last_name}}</td>
                                    <td>{{$product->category->name_en}}</td>
                                    <td>
                                        @if(Auth::user()->hasPermission('products-update'))
                                        <a href="javascript:void(0)"  wire:click="add_image({{$product->id}})"  class="btn btn-outline-primary btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit this Product "> <i class="fa fa-plus"></i> Img</a>
                                        <a href="javascript:void(0)"  wire:click="edit_product({{$product->id}})"  class="btn btn-outline-warning btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit this Product "> <i class="fa fa-edit"></i></a>
                                          @endif
                                            @if(Auth::user()->hasPermission('products-delete'))
<a href="javascript:void(0)" wire:click="deleteId({{$product->id}})"  class="btn btn-outline-danger  btn-sm ms-2" data-bs-toggle="tooltip" data-bs-placement="left" title="delete this product" data-toggle="modal" data-target="#exampleModal">  <i class="fa fa-trash"></i></a>
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
                                        <button type="button" wire:click.prevent="delete_product()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-end">
                        {!! $products->withQueryString()->links() !!}
                    </div>


                </div>

            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        setTimeout(function () {
            console.log(document.getElementById('alert-message'))
            document.getElementById('alert-message').style.display='none';
        },5000)
        // // $(document).ready(function(){
        // //     window.livewire.on('alert_remove',()=>{
        // //         setTimeout(function(){ $("#alert-message").fadeOut('fast');
        // //         }, 3000); // 3 secs
        // //     });
        // // });
        // var timeout = 3000; // in miliseconds (3*1000)
        // $('#alert-message').delay(timeout).fadeOut(300);
    </script>
@endpush
