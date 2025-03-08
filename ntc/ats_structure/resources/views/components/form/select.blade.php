@props([
    'name',
    'options',
    'value'
])
@php
    $options = explode(',', $options);
@endphp
<div class="row">
    <label class="form-label">{{ucwords(str_replace('_', ' ', $name))}}</label>
    <div class="col-12 col-sm-12 col-md-12">
        <select class="form-select" name="{{$name}}">
            @foreach($options as $option)
                @php 
                    $option = explode('=', $option); 
                @endphp
                @if ($option[0] == $value)
                    @php
                        $selected = 'selected';
                    @endphp 
                @else
                    @php
                        $selected = '';
                    @endphp 
                @endif
                <option value="{{$option[0]}}" {{$selected}}>{{ucwords($option[1])}}</option>
            @endforeach
        </select>
        @if($errors->has($name))
            <div class="text-danger">{{ $errors->first($name) }}</div>
        @endif
    </div>
</div>