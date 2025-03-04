<div name="alert_container" class='col-6 col-sm-6 col-md-6 mt-5 alert-bubble'>
    @if(session()->has('error'))
        <div class='alert alert-danger text-center'>{{session('error')}}</div>
    @endif
    @if(session()->has('success'))
        <div class='alert alert-success text-center'>{{session('success')}}</div>
    @endif
</div>