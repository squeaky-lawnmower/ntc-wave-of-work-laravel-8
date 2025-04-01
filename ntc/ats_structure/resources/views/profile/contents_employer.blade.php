<div class="text-center">
    <h3 class="text-darkbluegreen">Job Listings</h3>
</div>
@if(!empty($jobs))
    <div class="row">
        <div class="col-11 col-sm-11 col-md-11">
            <div class="row">
                @foreach($jobs as $job)
                    <div class="col-4 col-sm-4 col-md-4">
                            <a class="btn job-card" href="{{ route('jobs.view.listing', ['id' => $job->creator_id, 'jobId' => $job->id])}}">
                                <h5 class="text-darkbluegreen">{{ ucwords($job->job_title) }}<br />({{ ucwords($job->job_code) }})</h5>
                                <p>
                                    @php echo ucwords(auth()->user()->company); @endphp<br />
                                </p>
                                <p><span class="job-tag job-tag-responsive">{{ str_replace('_', '-', ucwords($job->contract_type))}}</span></p>
                            </a>
                    </div>       
                @endforeach
            </div>
        </div>
    </div>
@endif
<div class="mt-8"><h3>&nbsp;</h3></div>