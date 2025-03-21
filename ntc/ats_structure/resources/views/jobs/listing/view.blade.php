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
                                        @if($canApply) 
                                            <a class="btn btn-primary">Apply Now</a>
                                        @elseif($hasApplied) 
                                            <a class="btn btn-dark">Already Applied</a>
                                        @elseif($canEdit)
                                            <a class="btn btn-primary" href="{{ route('jobs.edit.listing', ['id' => auth()->user()->id , 'jobId'=> $job->id]) }}">Edit</a>
                                        @endif
                                    </p>
                                </div>
                                <hr />
                                <h6>Job Details</h6>        
                                <p>
                                    {{$job->job_description}}
                                </p>  
                                @if($canViewApplicants)
                                    <hr />     
                                    <h6 class="text-center">Applicants</h6>     
                                    <table class="table text-center">
                                        <thead class="">
                                            <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" colspan="6">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                            @forelse($job_applications as $application)
                                                <tr>
                                                    <td scope="row">
                                                        <a class="anchor-regular" href={{route('profile', ['id' => $application->applicants->id])}} alt="Click to view profile" target="_blank" title="Click to view profile">
                                                            {{$application->applicants->lastname}}, {{$application->applicants->firstname}} {{$application->applicants->middlename}}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <p>{{ucfirst($application->status)}}</p>
                                                    </td>
                                                    <td colspan="3">
                                                        @if($application->status == 'pending')
                                                            <td class="text-end">
                                                                <form action="{{route('jobs.update.applications.post', ['jobApplicationId' => $application->id])}}" method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <x-form.input type="hidden" name="status" value="accepted" />
                                                                    <button class="btn btn-success"><i class="fa fa-check">&nbsp;&nbsp;</i>Accept</button>
                                                                </form>
                                                            </td>
                                                            <td class="text-center">
                                                                <form action="{{route('jobs.update.applications.post', ['jobApplicationId' => $application->id])}}" method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <x-form.input type="hidden" name="status" value="declined" />
                                                                    <button class="btn btn-danger"><i class="fa fa-ban">&nbsp;&nbsp;</i>Decline</button>
                                                                </form>
                                                            </td>
                                                            <td class="text-start">
                                                                <form action="{{route('messages.start', ['id' => $application->applicants->id])}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-primary"><i class="fa fa-envelope">&nbsp;&nbsp;</i>Message</button>
                                                                </form>
                                                    
                                                            </td>
                                                            @else
                                                                <td colspan="3">
                                                                    <p>No action required</p>
                                                                </td>
                                                            @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3"><p>No applicants yet</p></td>
                                                </tr>
                                            @endforelse                      
                                        </tbody>
                                    </table>
                                @endif                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection