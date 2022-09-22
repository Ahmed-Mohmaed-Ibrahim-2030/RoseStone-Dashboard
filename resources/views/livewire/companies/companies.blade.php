<div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <b class="">Company </b>
                    @if(Auth::user()->hasPermission('company-create'))
                    <a href="javascript:void(0)" wire:click="toggle_create" class="btn btn-outline-primary d-inline-block btn-sm ml-auto"><i class="fa fa-plus"></i> </a>

                    @endif
                </div>
                <div>
                  @include('partial.flash')
                </div>
                @if($showCreateCompany)
                <livewire:companies.create />
                @endif
                @if($showAddSocialLinks)
                <livewire:companies.add-social-links/>
                @endif
                @if($showEditCompany)
                <livewire:companies.edit />
                @endif
                @if($showAddPhones)
                <livewire:companies.add-phones />
                @endif
                @if($showAddLocations)
                <livewire:companies.add-locations />
                @endif
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table ">
                            <thead>
                            <tr>
{{--                                <th>Image</th>--}}
                                <th>Name </th>
                                <th>Email</th>
                                <th>Url</th>
                                <th>Action </th>
                            </tr>
                            @foreach($companies as $company)
                                <tr>
{{--                                    <td>--}}
{{--                                        @if(!empty($company->images()->first()->image))--}}

{{--                                            <img src="{{asset('assets/images/companies/'.$company->images()->first()->image)}}" alt="{{$company->title}}"  width="100" alt=""></td>--}}
{{--                                    @endif--}}
                                    <td>
                                        <a href="javascript:void(0)" wire:click="show_post({{$company->id}})" >  {{$company->name_en}}</a>
                                    </td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->web_site_url}}</td>
                                    <td>
                                        @if(Auth::user()->hasPermission('company-update'))
                                        <a href="javascript:void(0)"  wire:click="add_location({{$company->id}})"  class="btn btn-outline-dark btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Add Company Location "> <i class="fa fa-location-arrow"></i> </a>
                                        <a href="javascript:void(0)"  wire:click="add_phones({{$company->id}})"  class="btn btn-outline-secondary btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Add Company Phone"> <i class="fa fa-phone"></i> </a>
                                        <a href="javascript:void(0)"  wire:click="add_social({{$company->id}})"  class="btn btn-outline-primary btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Add Company social links "> <i class="fa fa-link"></i> </a>
                                        <a href="javascript:void(0)"  wire:click="edit_company({{$company->id}})"  class="btn btn-outline-warning btn-sm ms-2 my-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Company Information "> <i class="fa fa-edit"></i></a>
@endif
{{--                                        <a href="javascript:void(0)" wire:click="delete_company({{$company->id}})"  class="btn btn-outline-danger btn-sm ms-2" data-bs-toggle="tooltip" data-bs-placement="left" title="delete this post" onclick="if (confirm('Are You Sure?')){--}}
{{--                return false;--}}
{{--            }">  <i class="fa fa-trash"></i></a>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </thead>
                        </table>

                    </div>

                    <div class="float-end">
                        {!! $companies->withQueryString()->links() !!}
                    </div>


                </div>

            </div>
        </div>
    </div>

</div>
