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
                            @php
                              $iframeRoute = route('jobs.details.listing', ['jobId' => $job->id]);
                            @endphp
                            <button class="btn job-card" onclick="showJobDetails('{{ $iframeRoute }}')">
                                <p class="p-m">{{ ucwords($job->job_title) }} ({{ ucwords($job->job_code) }})</p>
                                <p class="p-xs">
                                  @php echo ucwords($job->creator->company); @endphp<br />
                                </p>
                                <p><span class="job-tag job-tag-responsive">{{ str_replace('_', '-', ucwords($job->contract_type))}}</span></p>
                            </button>
                </div>       
            @endforeach
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
  </body>
</html>

