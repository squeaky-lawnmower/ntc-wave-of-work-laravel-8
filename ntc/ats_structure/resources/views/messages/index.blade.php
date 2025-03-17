@extends('layout')
@section('title', 'Messages')
@section('content')
    <div><p>&nbsp;</p></div>
    
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
                <iframe width="100%" height="700px" src="{{ route('messages.list', ['id' => auth()->user()->id]) }}" title="Iframe Example"></iframe>
            </div>
            <div class="col-8">
                <iframe width="100%" height="450px" name="frame_message_convo" ></iframe>
                <form action="{{route('messages.send', ['id' => auth()->user()->id])}}" method="POST">
                    @csrf
                    <x-form.input type="hidden" name="message_id" value="" />
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