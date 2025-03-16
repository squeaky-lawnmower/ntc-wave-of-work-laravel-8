@props(['route'])
<div class="col-1 col-sm-1 col-md-1 text-end d-flex flex-column justify-content-center">
    <h3><a href="{{route($route, ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-right">&nbsp;&nbsp;</i></a></h3>
</div>