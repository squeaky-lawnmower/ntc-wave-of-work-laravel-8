@extends('layout')
@section('title', 'Profile')
@section('content')
    <div class="mt-5"><h3>&nbsp;</h3></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-8  col-sm-8 col-md-8 mt-3">
                
                <h6>{{ucfirst(trans(auth()->user()->account_type))}} Account</h6>
                @if('jobseeker' == auth()->user()->account_type)
                    <h3 class="text-darkbluegreen">{{ucfirst(trans($profile->firstname))}} {{ucfirst(trans($profile->lastname))}}</h3>
                @else
                    <h3 class="text-darkbluegreen">{{ucfirst(trans($profile->company))}}</h3>
                @endif
                @if ($profile->email)
                    <i class="fa fa-envelope">&nbsp;&nbsp;</i>{{$profile->email}}<br />
                @endif
                @if ($profile->address)
                    <i class="fa fa-location-arrow">&nbsp;&nbsp;</i>{{$profile->address}} {{$profile->zipcode}}<br />
                @endif
                @if ($profile->phone)
                    <i class="fa fa-phone">&nbsp;&nbsp;</i>{{$profile->phone}}<br />
                @endif
                @if('jobseeker' == auth()->user()->account_type && auth()->user()->id == $id && $profile->resume_filename != null)
                    <i class="fa fa-file">&nbsp;&nbsp;</i><a href="{{route('resume.download')}}" target="_blank">Download CV</a>                
                @endif
            </div>
            <div class="col-3 col-sm-3 col-md-3 text-end mt-3">
                <div class="row">
                    <div class="profile-picture" style="background-image : url({{ asset('images/user_profile.png') }})"></div>
                </div>
            </div>
            <div class="col-1 col-sm-1 col-md-1 text-end d-flex flex-column justify-content-center">
                <h3><a href="{{route('profile.edit.personal', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-right">&nbsp;&nbsp;</i></a></h3>
            </div>
        </div>    
        <hr style="color: #C3C3C3"/>
        <div class="row">
            <div class="col-11  col-sm-11 col-md-11">
                <h6>About</h6>
                <p>
                    {{$about->about}} 
                </p>
            </div>
            <div class="col-1 col-sm-1 col-md-1 text-end d-flex flex-column justify-content-center">
                <h3><a href="{{route('profile.edit.about', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-right">&nbsp;&nbsp;</i></a></h3>
            </div>
        </div>
        <hr style="color: #C3C3C3"/>
        @if('jobseeker' == auth()->user()->account_type)
            @include('profile.contents_jobseeker')
        @else
            @include('profile.contents_employer')
        @endif

    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection