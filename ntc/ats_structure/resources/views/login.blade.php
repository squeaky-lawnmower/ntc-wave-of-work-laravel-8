@extends('layout')
@section('title', 'Login')
@section('content')
<div class="mt-5"><h3>&nbsp;</h3></div>
<div class="body-contents-container">
    <div class="card-container ms-auto me-auto mt-4 p-4 bg-light rounded" style="max-width: 500px;">
        <form class="ms-auto me-auto mt-10" action="{{route('login.post')}}" method="POST">
            @csrf
            <div class="mb-5 text-center">
                <h1 class="text-darkbluegreen">{{config('app.name')}}</h1>
                <p>Log-in to your account to use all features.</p>
            </div>
            <div class="col-12 mb-3">
                <x-form.input type="email" name="email" value="{{ old('email')}}" />
            </div>
            <div class="col-12 mb-3">
                <x-form.input type="password" name="password" value="{{ old('password')}}" />
            </div>
            <div class="col-12 text-end mb-3">
                <p><a class="anchor-italic" href="{{ route('forgotpass') }}">Forgot Password?</a></p>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Log In</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection