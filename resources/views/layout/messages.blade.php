@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
<div class='alert alert-success alert-dismissible successAlert'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>{{session('success')}}</strong>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible">
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>{{session('error')}}</strong>
    </div>
@endif