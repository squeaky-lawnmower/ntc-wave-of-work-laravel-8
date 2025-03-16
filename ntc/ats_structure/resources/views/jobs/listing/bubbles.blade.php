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
  <body>
    <div class="col-sm-12" style="background: #FFFFFF">
        <div class="row">
            @foreach($jobs as $job)
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                            @php
                              $iframeRoute = "/jobs/listing/".$job->id."/details";
                            @endphp
                            <button class="btn job-card" onclick="showJobDetails('{{ $iframeRoute }}')">
                                <h5 class="text-darkbluegreen">{{ ucwords($job->job_title) }} ({{ ucwords($job->job_code) }})</h5>
                                <p>
                                  @php echo ucwords($job->creator->company); @endphp<br />
                                </p>
                                <p><span class="job-tag mb-4">{{ str_replace('_', '-', ucwords($job->contract_type))}}</span></p>
                            </button>
                    </div>
                </div>       
            @endforeach
        </div>       
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
  </body>
</html>

