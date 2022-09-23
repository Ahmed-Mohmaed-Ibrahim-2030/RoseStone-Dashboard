{{--@if ($message = Session::get('success'))--}}
{{--    <div id="alert-message" class="alert alert-success alert-block" >--}}
{{--        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </div>--}}
{{--@endif--}}


{{--@if ($message = Session::get('error'))--}}
{{--    <div id="alert-message" class="alert alert-danger alert-block">--}}
{{--        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </div>--}}
{{--@endif--}}


{{--@if ($message = Session::get('warning'))--}}
{{--    <div id="alert-message" class="alert alert-warning alert-block">--}}
{{--        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </div>--}}
{{--@endif--}}


{{--@if ($message = Session::get('info'))--}}
{{--    <div id="alert-message" class="alert alert-info alert-block">--}}
{{--        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </div>--}}
{{--@endif--}}


{{--@if ($errors->any())--}}
{{--    <div id="alert-message" class="alert alert-danger">--}}
{{--        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>--}}
{{--        Please check the form below for errors--}}
{{--    </div>--}}
{{--@endif--}}
@if (session()->has('success'))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">
         <div id="alert-message" class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
     {{ session()->get('success') }}
         </div>
 </div>
@endif

@if (session()->has('danger'))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">
         <div id="alert-message" class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
     {{ session()->get('danger') }}
         </div>
 </div>
@endif
@if (session()->has('warning'))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">
         <div id="alert-message" class="alert alert-warning">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
     {{ session()->get('warning') }}
         </div>
 </div>
@endif
@if (session()->has('info'))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">
         <div id="alert-message" class="alert alert-info">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
     {{ session()->get('info') }}
         </div>
 </div>
@endif
@if ($errors->any()))
 <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show">
         <div id="alert-message" class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
             Please check the form below for errors
         </div>
 </div>
@endif


