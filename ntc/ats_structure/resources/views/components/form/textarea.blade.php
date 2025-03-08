@props(['name', 'value', 'rows'])

<div class="col-12  col-sm-12 col-md-12">
    <label class="form-label">{{ucwords(str_replace('_', ' ', $name))}}</label>
    <textarea class="form-control" name="{{$name}}" rows="{{$rows}}">{{$value}}</textarea>
    @if($errors->has("{{$name}}"))
        <div class="text-danger">{{ $errors->first($name) }}</div>
    @endif
</div>