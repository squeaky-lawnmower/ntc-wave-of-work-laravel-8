@extends('layout')
@section('title', 'Candidates')
@section('content')
<div><p>&nbsp;</p></div>
<div><p>&nbsp;</p></div>
<div><p>&nbsp;</p></div>
<div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6"  height=100px>
    <div class="row">
        <div class="col-12">
            <div class="row">
                    <h4 class="text-center">Candidate list</h4>
                </div>
            </div>
        </div>
        <div class="row"  class="fixed-content">
            <div class="col-12">
                <div class="row">
                    <table class="table text-center">
                        <thead class="">
                            <tr>
                            <th scope="col">Candidate Name</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($candidates as $candidate)
                                <tr>
                                    <td scope="row"><a class="anchor-regular" target="_blank" 
                                        href="{{route('profile', ['id'=>$candidate->id])}}">
                                        {{$candidate->firstname}} {{$candidate->lastname}}
                                    </td>
                                    <td>
                                        <form action="{{route('messages.start', ['id' => $candidate->id])}}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary"><i class="fa fa-envelope">&nbsp;&nbsp;</i>Message</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td scope="row" colspan="3">No Records Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>       
</div>
<div class="mt-8"><h3>&nbsp;</h3></div>
@endsection

