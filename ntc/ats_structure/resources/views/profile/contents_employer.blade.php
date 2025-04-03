<div class="text-center">
    <h3 class="text-darkbluegreen">Job Listings</h3>
</div>
@if(!empty($jobs))
    <div class="row row-responsive">
        <div class="col-12">
            <div class="row">
                @foreach($jobs as $job)
                    <div class="col-12 col-sm-6 col-md-4">
                            <a class="btn job-card w-100 text-start" href="{{ route('jobs.view.listing', ['id' => $job->creator_id, 'jobId' => $job->id])}}">
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