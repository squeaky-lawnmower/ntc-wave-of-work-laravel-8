<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> 
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.ico')}}">

    <script defer src="{{ asset('/js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script defer src="{{ asset('/js/jquery.js') }}"></script>
    <script defer src="{{ asset('/js/script.js') }}"></script>
</head>
<body style="background: #FFFFFF !important;">
    <div class="card-container-no-shadow" height=100%>
        <div class="row"  height=100%>
            <div class="col-sm-8 col-md-8">
                <h5 class="text-darkbluegreen">{{$job->job_title}} ({{$job->job_code}})</h5>
                <a href="{{ route('profile', ['id' => $creator->id])}}" class="anchor-regular" target="_blank">
                    <p>
                        {{ucwords($creator->company)}}<br />
                    </p>
                </a>
                <p><span class="job-tag mb-4">{{ str_replace('_', '-', ucwords($job->contract_type))}}</span></p>
            </div>
            <div class="col-sm-4 col-md-4 text-end align-middle">
                <p>
                    @if($canApply) 
                        <a class="btn btn-primary" href="{{ route('jobs.save.applications', ['jobId'=> $job->id]) }}" target="_blank">Apply Now</a>
                    @elseif($hasApplied)
                        <a class="btn btn-dark" >Already Applied</a>
                    @endif
                </p>
            </div>
            <hr />
            <h6>Job Description</h6>        
            <p>
                {!! $job->job_description !!}
            </p>               
            <h6>Job Tasks</h6>        
            <p>
                {!! $job->job_tasks !!}
            </p>                                                                            
        </div>
    </div>
</body>
</html>
