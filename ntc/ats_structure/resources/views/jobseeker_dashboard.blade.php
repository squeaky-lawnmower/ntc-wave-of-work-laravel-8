<div style="width:90%"  class="card-container-no-shadow ms-auto me-auto mt-10 mb-10">
    <div class="row">
        <div class="col-12 text-center">
            <h4>Welcome, {{auth()->user()->firstname}} {{auth()->user()->lastname}}</h4>
        </div>
    </div>
</div>


<div class="mt-2"><h3>&nbsp;</h3></div>

@include('jobsearch')