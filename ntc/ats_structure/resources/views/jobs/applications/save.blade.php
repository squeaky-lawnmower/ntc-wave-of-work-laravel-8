@extends('layout')
@section('title', 'Job Applications')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="mt-2"><h3>&nbsp;</h3></div>
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <p>You are applying to: </p>
            <h5>{{ $creator->company }} </h5>
            <h3>{{ $job->job_title }}( {{ $job->job_code}} )</h3>
        </div>
        <hr />
        <div class="row">
            @if(auth()->user()->phone != null) 
                <p>Your profile: </p>
                @include('profile.contents_main', 
                [
                    'id' => auth()->user()->id, 
                    'profile' => auth()->user(),
                    'about' => $about,
                    'experiences' => $experiences,
                    'education' => $education,
                    'skills' => $skills,
                    'canEditProfile' => false
                ])
                
                @php
                    $data = [ 
                        'jobId' => $job->id
                    ];
                @endphp
                <form action="{{route('jobs.save.applications.post', $data)}}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Submit Application</button>
                </form>
            @else
                <p>Please update your profile first. Click
                <a class="anchor-regular" href="{{ route('profile', ['id' => auth()->user()->id])}}">HERE</a>. </p>
            @endif
            
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection