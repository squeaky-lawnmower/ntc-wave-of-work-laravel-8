<div class="row">
        <div class="col-11  col-sm-11 col-md-11">
            <h6>Experience</h6>        
            @foreach($experiences as $experience)
                <ul>
                    <li>
                        @php
                            $dateObj   = DateTime::createFromFormat('!m', $experience->start_month);
                            $start_month = $dateObj->format('F');
        
                            $dateObj   = DateTime::createFromFormat('!m', $experience->end_month);
                            $end_month = $dateObj->format('F');
                        @endphp
                        <p>
                            {{$experience->company}}<br />
                            {{$experience->position}}<br />
                            {{$start_month}} {{$experience->start_year}} - {{$end_month}} {{$experience->end_year}}<br />
                            {{$experience->description}}
                        <p>
                    </li>
                </ul>
            @endforeach
        </div>
        <div class="col-1 col-sm-1 col-md-1 text-end d-flex flex-column justify-content-center">
            <h3><a href="{{route('profile.edit.experience', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-right">&nbsp;&nbsp;</i></a></h3>
        </div>
    </div>
    <hr style="color: #C3C3C3"/>
    <div class="row">
        <div class="col-11  col-sm-11 col-md-11">
            <h6>Education</h6>        
            @foreach($education as $educ)
                <ul>
                    <li>
                        @php
                            $dateObj   = DateTime::createFromFormat('!m', $educ->start_month);
                            $start_month = $dateObj->format('F');
        
                            $dateObj   = DateTime::createFromFormat('!m', $educ->end_month);
                            $end_month = $dateObj->format('F');
                        @endphp
                        <p>
                            {{$educ->school}}<br />
                            {{$educ->degree}}<br />
                            {{$start_month}} {{$educ->start_year}} - {{$end_month}} {{$educ->end_year}}<br />
                        <p>
                    </li>
                </ul>
            @endforeach      
        </div>
        <div class="col-1 col-sm-1 col-md-1 text-end d-flex flex-column justify-content-center">
            <h3><a href="{{route('profile.edit.education', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-right">&nbsp;&nbsp;</i></a></h3>
        </div>
    </div>
    <hr style="color: #C3C3C3"/>
    <div class="row">
        <div class="col-11  col-sm-11 col-md-11">
            <h6>Skills</h6>        
            <ul>
                @foreach ($skills as $skill)
                    <li>{{$skill->skill_name}}</li>
                @endforeach
            </ul> 
        </div>
        <div class="col-1 col-sm-1 col-md-1 text-end d-flex flex-column justify-content-center">
            <h3><a href="{{route('profile.edit.skill', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-right">&nbsp;&nbsp;</i></a></h3>
        </div>
    </div>

</div>
<div class="mt-8"><h3>&nbsp;</h3></div>