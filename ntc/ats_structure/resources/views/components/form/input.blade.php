@props(['type', 'name', 'value'])

<div class="col-12  col-sm-12 col-md-12">
    <label class="form-label">{{ucfirst($name)}}</label>
    <input type="{{$type}}" class="form-control" name="{{$name}}"  value="{{$value}}">
    @if($errors->has("{{$name}}"))
    <div class="text-danger">{{ $errors->first($name) }}</div>
@endif
</div>