@props(['type', 'name', 'value'])

<div class="col-12  col-sm-12 col-md-12">
    @if('hidden' != $type) <label class="form-label">{{ucwords(str_replace('_', ' ', $name))}}</label> @endif
    <input type="{{$type}}" class="form-control" name="{{$name}}"  value="{{$value}}">
    @php 
    if(current((array) $errors->has($name))) {
        echo '<div class="text-danger">'.current((array) $errors->first($name)).'</div>';
    }
    @endphp
</div>