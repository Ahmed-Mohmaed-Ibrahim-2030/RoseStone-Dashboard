@if ($message = Session::get('success'))
    <div id="alert-message" class="alert alert-success alert-block" >
        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div id="alert-message" class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div id="alert-message" class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div id="alert-message" class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())
    <div id="alert-message" class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
        Please check the form below for errors
    </div>
@endif
