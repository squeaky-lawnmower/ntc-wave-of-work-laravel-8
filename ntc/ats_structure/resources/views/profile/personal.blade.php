@extends('layout')
@section('title', 'Edit Personal Details')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1">
                <h3><a href="{{route('profile', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-left">&nbsp;&nbsp;</i></a></h3>
            </div>
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h1 class="text-darkbluegreen">Edit Personal Details</h1>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="background: #FAFAFA;" class="border-r rounded-r-lg">            
                <form action="{{route('profile.edit.personal.post', ['id' => auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col-6 col-sm-6 col-md-6">
                            <label class="form-label" name="name">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="{{auth()->user()->firstname}}">
                            @if($errors->has('firstname'))
                                <div class="text-danger">{{ $errors->first('firstname') }}</div>
                            @endif 
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                            <label class="form-label" name="name">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{auth()->user()->lastname}}">
                            @if($errors->has('lastname'))
                                <div class="text-danger">{{ $errors->first('lastname') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                            @if($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" name="company"  value="{{auth()->user()->company}}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-10  col-sm-10 col-md-10">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address"  value="{{auth()->user()->address}}">
                        </div>
                        <div class="col-2  col-sm-2 col-md-2">
                            <label class="form-label">Zip</label>
                            <input type="text" class="form-control" name="zipcode"  value="{{auth()->user()->zipcode}}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4  col-sm-4 col-md-4">
                            <select class="form-select" name="country">
                                <option selected disabled>- Country -</option>
                                <option value="1">Philippines</option>
                                <option value="2">Japan</option>
                                <option value="3">Korea</option>
                                </select>
                        </div>
                        <div class="col-4  col-sm-4 col-md-4">
                            <select class="form-select" name="state">
                                <option selected disabled>- Province -</option>
                                <option value="1">Metro Manila</option>
                                <option value="2">Cebu</option>
                                <option value="3">Davao</option>
                                </select>
                        </div>
                        <div class="col-4  col-sm-4 col-md-4">
                            <select class="form-select" name="city">
                                <option selected disabled>- City -</option>
                                <option value="1">Pasay</option>
                                <option value="2">Muntinlupa</option>
                                <option value="3">Paranaque</option>
                                </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6  col-sm-6 col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone"    value="{{auth()->user()->phone}}">
                        </div>
                        <div class="col-6  col-sm-6 col-md-6">
                            <label class="form-label">Birthdate</label>
                            <input type="date" class="form-control" name="birthdate"  value="{{auth()->user()->birthdate}}">
                        </div>
                    </div>              
                    <div class="row mt-2">
                        <div class="col-8 col-sm-8 col-md-8 mt-3">
                            <label class="form-label">Resume</label>
                            <input class="form-control " name="resume_filename" type="file">
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 mt-auto">
                            @if('jobseeker' == auth()->user()->account_type && auth()->user()->id == $id && auth()->user()->resume_filename != null)
                                <br />
                                <h6><a href="{{route('resume.download')}}" target="_blank">View Uploaded Resume</a></h6>
                            @else
                                <br />
                                <h6 class="form-label">You haven't uploaded a resume yet.</h6>               
                            @endif
                        </div>
                    </div>      
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary full-width">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection