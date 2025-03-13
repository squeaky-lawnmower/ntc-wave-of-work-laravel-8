@extends('layout')
@section('title', 'Forgot Password')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h3 class="text-darkbluegreen">Forgot Password</h3>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="background: #FAFAFA;" class="border-r rounded-r-lg">            
                <form action="{{route('sendMail')}}" method="POST">
                    @csrf
                    <x-form.input type="hidden" name="email_type" value="forgot_password"/>
                    <div class="row mt-3">
                        <x-form.input type="text" name="email" value=""/>
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