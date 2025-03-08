@extends('layout')
@section('title', 'View Job')
@section('content')
<div class="mt-2"><h3>&nbsp;</h3></div>
    <div class="card-container-no-shadow ms-auto me-auto mt-10 mb-10">
        <div class="row">
            <div class="col-8 col-md-8 col-sm-8 me-auto ms-auto">
                <div class="row">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="row job-detail-card">
                                <div class="col-sm-8 col-md-8">
                                    <h5 class="text-darkbluegreen">{{$job->job_title}} ({{$job->job_code}})</h5>
                                    <p>
                                        {{ucwords(auth()->user()->company)}}<br />
                                    </p>
                                </div>
                                <div class="col-sm-4 col-md-4 text-end align-middle">
                                    <p>
                                        @if('jobseeker' == auth()->user()->account_type) 
                                            <a class="btn btn-primary">Apply Now</a>
                                        @else
                                            <a class="btn btn-primary" href="{{ route('jobs.edit.listing', ['id' => auth()->user()->id , 'jobId'=> $job->id]) }}">Edit</a>
                                        @endif
                                    </p>
                                </div>
                                <hr />
                                <h6>Job Details</h6>        
                                <p>
                                    {{$job->job_description}}
                                </p>                    
                                <h6>Applicants</h6>        
                                                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection