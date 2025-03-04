@props(['name', 'label', 'monthValue', 'yearValue'])

<div class="row">
    <label class="form-label">{{ucfirst($name)}}</label>
    <div class="col-6  col-sm-6 col-md-6">
        <select class="form-select" name="{{$name}}_month">
            {{ $now = date('M') }}
            @if ($monthValue == "") 
                @php
                    // Get the current date
                    $date = new DateTime();
                    $monthValue = (int)$date->format('m');
                @endphp
            @endif
            @for($i=1; $i<=12; $i++)
                @php
                    echo $monthValue;
                    $dateObj   = DateTime::createFromFormat('!m', $i);
                    $month = $dateObj->format('F');
                @endphp
                @if ($monthValue == $i)
                    @php
                        $selected = 'selected';
                    @endphp 
                @else
                    @php
                        $selected = '';
                    @endphp 
                @endif

                <option value="{{$i}}" {{$selected}}>{{$month}}</option>
            @endfor
        </select>
        @if($errors->has($name.'_date'))
            <div class="text-danger">{{ $errors->first($name.'_date') }}</div>
        @endif
    </div>
    <div class="col-6  col-sm-6 col-md-6">
        <select class="form-select" name="{{$name}}_year">
            {{ $last= date('Y')-100 }}
            {{ $now = date('Y') }}
        
            @for ($i = $now; $i >= $last; $i--)
                
                @if ($yearValue == $i)
                    @php
                        $selected = 'selected';
                    @endphp 
                @else
                    @php
                        $selected = '';
                    @endphp 
                @endif
                <option value="{{ $i }}" {{$selected}}>{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>