@extends('layout')
@section('title', 'Messages')
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
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-8">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <span>
                    <h1 class="text-darkbluegreen">Messages</h1>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <button class="message-list-button">
                        <h6>Norwegian Training Center</h6>
                    </button>
                </div>
                <div class="row">
                <button class="message-list-button">
                        <h6>Triova Tech</h6>
                    </button>
                </div>
                <div class="row">
                <button class="message-list-button">
                        <h6>Google</h6>
                    </button>
                </div>
            </div>
            <div class="col-8">
                <div class="message-frame">
                    <div class="row">
                        <div class="message-bubble sender-bubble me-auto mb-3">
                            <span class="font-10">Norwegian Training Center</span>
                            <h6>Hello Jobseeker</h6>
                        </div>            
                    </div>
                    <div class="row">
                        <div class="message-bubble receiver-bubble ms-auto">
                            <span class="font-10">You</span>
                            <h6>Hello Employer</h6>
                        </div>
                    </div>    
                </div>        
                <form action="{{route('registration.post')}}" method="POST">
                    @csrf
                    <div class="row mb-3 mt-1">
                        <div class="input-group">
                            <textarea class="form-control" name="message"></textarea>
                            <button type="submit" class="btn btn-primary ">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection