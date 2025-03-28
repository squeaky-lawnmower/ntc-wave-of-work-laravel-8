@extends('layout')
@section('title', 'Login')
@section('content')
<div class="mt-5"><h3>&nbsp;</h3></div>
<div class="body-contents-container">
    <div style="width: 400px" class="card-container ms-auto me-auto">
        <form class="ms-auto me-auto mt-10" action="{{route('login.post')}}" method="POST">
            @csrf
            <div class="mb-5 text-center">
                <h1 class="text-darkbluegreen">{{config('app.name')}}</h1>
                <p>Log-in to your account to use all features.</p>
            </div>
            <div class="mt-1 mb-3">
                <x-form.input type="email" name="email" value="{{ old('email')}}" />
            </div>
            <div class="mb-3">
                <x-form.input type="password" name="password" value="{{ old('password')}}" />
            </div>
            <div class="col-12  col-sm-12 col-md-12 mt-2 mb-10 text-end">
                <p><a class="anchor-italic" href="{{ route('forgotpass') }}">Forgot Password?</a></p>
            </div>
            <button type="submit" class="btn btn-primary full-width">Log In</button>

        </form>
    </div>
</div>
@endsection