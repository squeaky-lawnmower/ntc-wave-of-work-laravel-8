<div style="width:400px"  class="card-container ms-auto me-auto mt-10 mb-10">
    <!--div class="row">
        <div class="col-12 text-center">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Job Title, Keyword or Company" aria-label="Search" aria-describedby="find_job">
                <button class="btn btn-primary" type="button" id="find_job">Find Job</button>
            </div>
        </div>
    </div-->
    <div class="row">
        <div class="col-12 text-center mt-3">
            <div>
                <h6><a href="{{ route('jobs.index.applications', ['id' => auth()->user()->id])}}" class="anchor-regular">View My Applications</a></h6>
            </div>
        </div>
    </div>
</div>

<div class="mt-2"><h3>&nbsp;</h3></div>
<div style="width:90%; height:800px;" class="card-container-no-shadow ms-auto me-auto mt-10 mb-10">
    <div class="row">
        <div class="col-4">
            <iframe width="100%" height="700px" src="{{ route('jobs.bubble.listing', ['id' => auth()->user()->id]) }}" title="Iframe Example"></iframe>
        </div>
        <div class="col-8">
            <iframe width="100%" height="700px"   name="frame_job_details" ></iframe>
        </div>
    </div>
</div>