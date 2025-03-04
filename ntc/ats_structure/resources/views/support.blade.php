@extends('layout')
@section('title', 'Support')
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
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h3 class="text-darkbluegreen">Contact Support</h3>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="background: #FAFAFA;" class="border-r rounded-r-lg">            
                <form action="{{route('registration.post')}}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-md-12">
                            <label class="form-label">Full Name</label>
                            <div class="mb-3 ">
                                <input class="form-control" type="text" name="fullname">
                            </div>
                            @if($errors->has('fullname'))
                                <div class="text-danger">{{ $errors->first('fullname') }}</div>
                            @endif 
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-md-12">
                            <label class="form-label">Email</label>
                            <div class="mb-3 ">
                                <input class="form-control" type="text" name="email">
                            </div>
                            @if($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif 
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-md-12">
                            <label class="form-label">Message</label>
                            <div class="mb-3 ">
                                <textarea class="form-control" name="about_section" rows="8"></textarea>
                              </div>
                            @if($errors->has('firstname'))
                                <div class="text-danger">{{ $errors->first('firstname') }}</div>
                            @endif 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  col-sm-12 col-md-12 mt-3 mb-3">
                            <button type="submit" class="btn btn-primary full-width">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection