<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="300" />
    <title>@yield('title', 'Norwegian Training Center')</title>
    <link href="{{ asset('/css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> 
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.ico')}}">

    <script defer src="{{ asset('/js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script defer src="{{ asset('/js/jquery.js') }}"></script>
    <script defer src="{{ asset('/js/script.js') }}"></script>
  </head>
  <body  style="background: rgb(250, 247, 247)" onload="window.scroll(0, document.documentElement.scrollHeight)">
    <div class="col-sm-12" style="background: rgb(250, 247, 247)">
    <div class="row">
            @foreach($exchanges as $exchange)
                @if($exchange->sender_id != auth()->user()->id)
                    @php $class = "message-bubble sender-bubble me-auto"; @endphp
                @else
                    @php $class = "message-bubble receiver-bubble ms-auto"; @endphp
                @endif
                <div class="row">
                    <div class="{{$class}}">
                        <span class="font-10">
                            @if($exchange->sender->account_type == 'jobseeker')
                                {{ $exchange->sender->firstname}} {{ $exchange->sender->lastname}}
                            @else
                                {{ $exchange->sender->company}}
                            @endif

                            @if($exchange->sender->id == auth()->user()->id)
                                ( You )
                            @endif
                        </span>
                        <h6>{{$exchange->message}}</h6>
                    </div>            
                </div>
            @endforeach
        </div>       
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
  </body>
</html>

