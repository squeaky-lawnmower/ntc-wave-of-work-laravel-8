@if(!empty($job->id))
    @php 
        $data['jobId'] =  $job->id;
        $headerText = "Edit";
    @endphp
@else
    @php
        $headerText = "Create New";
    @endphp
@endif

@extends('layout')
@section('title', $headerText.' Job')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1">
                <h3><a href="{{route('jobs.index', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-left">&nbsp;&nbsp;</i></a></h3>
            </div>
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h3 class="text-darkbluegreen">{{$headerText}} Job Listing</h3>
                </span>
            </div>
        </div>
        @php $data['id'] = auth()->user()->id; @endphp
        @if(!empty($job->id)) 
            @php
                $routeName = 'jobs.edit.listing.post';
                $methodType = 'PUT';
            @endphp
        @else
            @php
                $routeName = 'jobs.add.listing.post';
                $methodType = 'POST';
            @endphp
        @endif
        
        <div class="row">
            <div class="col-12" style="background: #FAFAFA;" class="border-r rounded-r-lg">            
                <form action="{{route($routeName, $data)}}" method="POST">
                    @method($methodType)
                    @csrf
                    <div class="row mt-3">
                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="mb-3 ">
                                <x-form.input type="text" name="job_code" value="{{$job ? $job->job_code : old('job_code')}}" />
                            </div>
                        </div>
                        <div class="col-8 col-sm-8 col-md-8">
                            <div class="mb-3 ">
                                <x-form.input type="text" name="job_title" value="{{$job ? $job->job_title : old('job_title')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="mb-3 ">
                                <x-form.textarea name="job_description" value="{{$job ? $job->job_description : old('job_description')}}" rows=3 />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="mb-3 ">
                                <x-form.textarea name="job_tasks" value="{{$job ? $job->job_tasks : old('job_tasks')}}" rows=3 />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6">
                            <div class="mb-3 ">
                                <x-form.input type="date" value="{{$job ? $job->hiring_start_date : old('hiring_start_date')}}" name="hiring_start_date" />
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                            <div class="mb-3 ">
                                <x-form.input type="date" value="{{$job ? $job->hiring_end_date : old('hiring_end_date')}}" name="hiring_end_date" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6">
                            @php
                                $row = [];
                                $row['draft'] = 'draft';
                                $row['open'] = 'open';
                                $row['close'] = 'close';

                                $options = http_build_query($row, '', ',');
                                
                            @endphp
                            <div class="mb-3 ">
                                <x-form.select value="{{$job ? $job->status : old('status')}}" name="status" options={{$options}}/>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                            @php
                                $row = [];
                                $row['full_time'] = 'full-time';
                                $row['part_time'] = 'part-time';
                                $row['contract_based'] = 'contract-based';

                                $options = http_build_query($row, '', ',');
                                
                            @endphp
                            <div class="mb-3 ">
                                <x-form.select value="{{$job ? $job->contract_type : old('contract_type')}}" name="contract_type" options={{$options}}/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  col-sm-12 col-md-12 mt-3 mb-3">
                            <button type="submit" class="btn btn-primary full-width">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection