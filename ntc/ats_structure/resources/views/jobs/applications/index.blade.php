@extends('layout')
@section('title', 'Jobs Applications')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="mt-2"><h3>&nbsp;</h3></div>

    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-center">MY JOB APPLICATIONS</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <table class="table text-center">
                            <thead class="">
                                <tr>
                                <th scope="col">Job Code</th>
                                <th scope="col">Position</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($job_applications)) 
                                    <tr>
                                        <td colspan=5>No Job Applications Yet</td>
                                    </tr>
                                @else
                                    @foreach($job_applications as $job)
                                    <tr>
                                        <td scope="row">{{$job->jobDetails->job_code}}</td>
                                        <td><a href="#" class="anchor-regular">{{strtoupper($job->jobDetails->job_title)}}</a></td>
                                        <td><span class='fw-bold text-success'>{{strtoupper($job->status)}}</span></td>
                                        <td><a class='btn btn-primary' href="{{ route('jobs.edit.listing', ['id' => auth()->user()->id , 'jobId'=> $job->id]) }}"><i class="fa fa-pencil">&nbsp;&nbsp;</i>Withdraw</a></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>       
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection