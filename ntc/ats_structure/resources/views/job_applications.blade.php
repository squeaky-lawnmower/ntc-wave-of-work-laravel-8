@extends('layout')
@section('title', 'Job Applications')
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
            <div class="col-12">
                <div class="row">
                    <h4 class="text-center">MY JOB LISTINGS</h4>
                    <table class="table text-center">
                        <thead class="">
                            <tr>
                            <th scope="col">Company</th>
                            <th scope="col">Job Code</th>
                            <th scope="col">Position</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"><a href="#" class="anchor-regular">Norwegian Training Center (NTC)</a></td>
                                <td scope="row">C25DH</td>
                                <td><a href="#" class="anchor-regular">Deckhand</a></td>
                                <td><span class='fw-bold text-success'>Resume Submitted</span></td>
                                <td>
                                    <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
        
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View Job</a></li>
                                        <li><a class="dropdown-item" href="#">Withdraw Application</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection

