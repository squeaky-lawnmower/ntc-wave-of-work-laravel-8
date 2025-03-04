@extends('layout')
@section('title', 'Dashboard')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="mt-2"><h3>&nbsp;</h3></div>
    @if (auth()->user()->account_type == 'jobseeker')
        @include('jobseeker_dashboard')
    @else
        @include('employer_dashboard')
    @endif
    
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection