@extends('layout')
@section('title', 'Registration')
@section('content')
    <div><p>&nbsp;</p></div>
    <div style="width:70%"  class="card-container ms-auto me-auto mt-10 mb-10">
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <span>
                        <h1 class="text-darkbluegreen">{{config('app.name')}}</h1>
                        <h5>Create a jobseeker or employer account.</h5>
                    </span>
                </div>
            </div>
            <div class="col-8" style="background: #FAFAFA;" class="border-r rounded-r-lg">            
                <form action="{{route('registration.post')}}" method="POST">
                    @csrf
                    <div class="row mt-3 mb-2">
                        <label class="form-check-label mb-2">
                            Account Type
                        </label>
                        <div class="col-6 col-sm-6 col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="account_type" value="jobseeker" checked>
                                <label class="form-check-label">
                                    Jobseeker
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="account_type" value="employer">
                                <label class="form-check-label">
                                    Employer
                                </label>
                            </div>                        
                        </div>
                        @if($errors->has('account_type'))
                            <div class="text-danger">{{ $errors->first('account_type') }}</div>
                        @endif 
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-6 col-sm-6 col-md-6">
                            <label class="form-label" name="name">First Name</label>
                            <input type="text" class="form-control" name="firstname">
                            @if($errors->has('firstname'))
                                <div class="text-danger">{{ $errors->first('firstname') }}</div>
                            @endif 
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                            <label class="form-label" name="name">Last Name</label>
                            <input type="text" class="form-control" name="lastname">
                            @if($errors->has('lastname'))
                                <div class="text-danger">{{ $errors->first('lastname') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email">
                            @if($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" name="company">
                        </div>
                    </div>
                    <hr style="color: #C3C3C3"/>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            @if($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                            <label class="form-label">Re-enter Password</label>
                            <input type="password" class="form-control" name="password_retype">
                            @if($errors->has('password_retype'))
                                <div class="text-danger">{{ $errors->first('password_retype') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  col-sm-12 col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary full-width">Sign-Up</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  col-sm-12 col-md-12 mt-4 mb-10">
                            <p>Already have an account? <a class="anchor-italic" href="{{route('login')}}">Click here to login</a></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection