@extends('layout')
@section('title', 'Create New Job')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class='mt-5'>
        @if(session()->has('error'))
            <div class='alert alert-danger'>{{session('error')}}</div>
        @endif
        @if(session()->has('success'))
            <div class='alert alert-success'>{{session('success')}}</div>
        @endif
    </div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1">
                <h3><a href="/jobs" class="anchor-regular"><i class="fa fa-angle-left">&nbsp;&nbsp;</i></a></h3>
            </div>
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h3 class="text-darkbluegreen">New Job Listing</h3>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="background: #FAFAFA;" class="border-r rounded-r-lg">            
                <form action="{{route('registration.post')}}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="mb-3 ">
                                <label class="form-label">Job Code</label>
                                <input type="text" name="job_code" class="form-control">
                              </div>
                            @if($errors->has('job_code'))
                                <div class="text-danger">{{ $errors->first('job_code') }}</div>
                            @endif 
                        </div>
                        <div class="col-8 col-sm-8 col-md-8">
                            <div class="mb-3 ">
                                <label class="form-label">Job Title</label>
                                <input type="text" name="job_title" class="form-control">
                              </div>
                            @if($errors->has('job_title'))
                                <div class="text-danger">{{ $errors->first('job_title') }}</div>
                            @endif 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="mb-3 ">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="5"></textarea>
                              </div>
                            @if($errors->has('description'))
                                <div class="text-danger">{{ $errors->first('description') }}</div>
                            @endif 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6">
                            <label class="form-label">Start Date</label>
                            <div class="input-group date" data-date-format="mm-dd-yyyy">
                                <input class="form-control" name="start_date" type="text" readonly />
                                <button class="btn btn-primary" type="button" id="find_job"><i class="fa fa-calendar"></i></button>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                            <label class="form-label">End Date</label>
                            <div class="input-group date" data-date-format="mm-dd-yyyy">
                                <input class="form-control" name="start_date" type="text" readonly />
                                <button class="btn btn-primary" type="button" id="find_job"><i class="fa fa-calendar"></i></button>
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