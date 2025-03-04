@extends('layout')
@section('title', 'View Job')
@section('content')
<div class="mt-2"><h3>&nbsp;</h3></div>
    <div style="width:100%"  class="card-container-no-shadow ms-auto me-auto mt-10 mb-10">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="row job-detail-card">
                                <div class="col-sm-8 col-md-8">
                                    <h5 class="text-darkbluegreen">Captain(C25CC)</h5>
                                    <p>
                                        Norwegian Training Center (NTC) <br />
                                        Pasay City
                                    </p>
                                </div>
                                <div class="col-sm-4 col-md-4 text-end align-middle">
                                    <p>
                                        @if('jobseeker' == auth()->user()->account_type) 
                                            <span class="btn btn-primary">Apply Now</span>
                                        @else
                                            <span class="btn btn-primary">Edit</span>
                                        @endif
                                    </p>
                                </div>
                                <hr />
                                <h6>Job Details</h6>        
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>                    
                                <h6>Qualifications</h6>        
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br />
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br />
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br />
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                </p>                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection