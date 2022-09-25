@if (session()->has('success'))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },5000)" x-show="show">
         <div id="alert-message" class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
    <strong> {{ session()->get('success') }} </strong>
         </div>
 </div>
@endif

@if (session()->has('danger'))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },5000)" x-show="show">
         <div id="alert-message" class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
    <strong> {{ session()->get('danger') }} </strong>
            </div>
 </div>
@endif
@if (session()->has('warning'))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },5000)" x-show="show">
         <div id="alert-message" class="alert alert-warning">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
    <strong> {{ session()->get('warning') }} </strong>
         </div>
 </div>
@endif
@if (session()->has('info'))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },5000)" x-show="show">
         <div id="alert-message" class="alert alert-info">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
    <strong> {{ session()->get('info') }} </strong>
            </div>
 </div>
@endif
@if ($errors->any()))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },5000)" x-show="show">
         <div id="alert-message" class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
             Please check the form below for errors
         </div>
 </div>
@endif


