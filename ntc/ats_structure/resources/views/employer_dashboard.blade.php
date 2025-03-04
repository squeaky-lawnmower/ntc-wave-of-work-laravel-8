<div style="width:400px"  class="card-container ms-auto me-auto mt-10 mb-10">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h4>Logged-in as, {{auth()->user()->firstname}} {{auth()->user()->lastname}}</h4><h2>({{auth()->user()->company}})</h2>
            </div>
        </div>
    </div>
</div>
@include('joblisting')
