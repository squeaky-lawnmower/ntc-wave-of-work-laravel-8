@extends('layout')
@section('title', 'Registration')
@section('content')
    <div><p>&nbsp;</p></div>
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10" style="max-width: 90%;">
        <div class="row">
            <div class="col-12 col-md-4 mb-4 text-center">
                <div class="row">
                    <span>
                        <h1 class="text-darkbluegreen">{{config('app.name')}}</h1>
                        <h6>Fill-out all required fields</h6>
                    </span>
                </div>
            </div>
            <div class="col-12 col-md-8 bg-light border-r rounded-r-lg p-4">
                <form action="{{route('registration.post', ['account_type' => $account_type])}}" method="POST">
                    @csrf
                    <div class="row mt-3 mb-2">
                        <label class="form-check-label mb-2">
                            Account Type
                        </label>
                        <x-form.input type="hidden" name="account_type" value="{{$account_type}}" />
                        <label class="Form-label fw-bolder"><h4>{{ucfirst($account_type)}}</h4></label>    
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <x-form.input type="text" name="firstname" value="{{old('firstname')}}"/> 
                        </div>
                        <div class="col-12 col-md-6">
                            <x-form.input type="text" name="lastname" value="{{old('lastname')}}"/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <x-form.input type="text" name="email" value="{{old('email')}}"/>
                        </div>
                    </div>
                    @if( 'employer' == $account_type)
                        <div class="row mt-2">
                            <div class="col-12">
                                <x-form.input type="text" name="company" value="{{old('company')}}"/>
                            </div>
                        </div>
                    @endif
                    <hr style="color: #C3C3C3"/>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <x-form.input type="password" name="password" value=""/>
                        </div>
                        <div class="col-12 col-md-6">
                            <x-form.input type="password" name="password_retype" value=""/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary full-width">Sign-Up</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-4 mb-10 text-center">
                            <p>Already have an account? <a class="anchor-italic" href="{{route('login')}}">Click here to login</a></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection