@extends('layout')
@section('title', 'Jobs')
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
    <div class="mt-2"><h3>&nbsp;</h3></div>
@if ('jobseeker' == auth()->user()->account_type) 
    @include('jobsearch')
@else 
    @include('joblisting')
@endif
