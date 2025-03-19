@extends('layout')
@section('title', 'Registration')
@section('content')
    <div><p>&nbsp;</p></div>
    <div style="width:70%"  class="ms-auto me-auto mt-4">
        <div class="row account-selection">
            <div class="col-6">
                <div class="account-selection-text employer">
                    <span>
                        <h1 class="text-darkbluegreen fw-bolder">I'm an Employer</h1>
                        <h5>Looking for amazing talents</h5>
                        <h5><a class="btn btn-success" href="{{ route('signup', ['account_type' => 'employer'])}}">Start Hiring</a></h5>
                    </span>
                </div>
            </div>
            <div class="col-6">
                <div class="account-selection-text jobseeker">
                    <span>
                        <h1 class="mt-10 fw-bolder">I'm a Jobseeker</h1>
                        <h5>Actively searching for jobs</h5>
                        <h5><a class="btn btn-success" href="{{ route('signup', ['account_type' => 'jobseeker'])}}">Start Finding Jobs</a></h5>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection