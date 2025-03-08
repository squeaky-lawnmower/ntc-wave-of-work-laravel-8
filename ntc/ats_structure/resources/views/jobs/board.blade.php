@if ('jobseeker' == auth()->user()->account_type) 
    @include('jobsearch')
@else 
    @include('jobs.listing.index')
@endif
