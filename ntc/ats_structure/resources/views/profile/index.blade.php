@extends('layout')
@section('title', 'Profile')
@section('content')
    <div class="mt-5"><h3>&nbsp;</h3></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        @include('profile.contents_main')
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection