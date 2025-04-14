<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Norwegian Training Center')</title>
    <link href="{{ asset('/css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> 
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.ico')}}">

    <script defer src="{{ asset('/js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script defer src="{{ asset('/js/jquery.js') }}"></script>
    <script defer src="{{ asset('/js/script.js') }}"></script>
  </head>
  <body style="background: #FFFFFF;" onload="selectFirstMessage()">
    <div class="col-sm-12" style="background: #FFFFFF">
        <div class="row">
          @foreach($list as $li)
            
            @php
              $iframeRoute = route('messages.exchange', ['id' => $li->id]);
              $buttonId = "messageListButton".$li->id;
            @endphp

            <div class="col-12 col-sm-12 col-md-12">
                <button class="message-list-button" onclick="showMessageConvo('{{ $iframeRoute }}', {{ $li->id }})" id={{ $buttonId}}>
                  @if(auth()->user()->id == $li->original_sender_id)
                    <h6>{{$li->receiver->firstname}} {{$li->receiver->lastname}}</h6>
                  @else
                    <h6>{{$li->sender->company}}</h6>
                  @endif
                </button>
            </div>
          @endforeach
        </div>       
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
  </body>
</html>

