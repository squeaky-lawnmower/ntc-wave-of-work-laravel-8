
<div><p>&nbsp;</p></div>
<div class='mt-5'>
    @if(session()->has('error'))
        <div class='alert alert-danger'>{{session('error')}}</div>
    @endif
    @if(session()->has('success'))
        <div class='alert alert-success'>{{session('success')}}</div>
    @endif
</div>
<div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="text-center">MY JOB LISTINGS</h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="text-center"><a href="/jobs/add" class="btn btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;</i>Create new Job</a></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <table class="table text-center">
                        <thead class="">
                            <tr>
                            <th scope="col">Job Code</th>
                            <th scope="col">Position</th>
                            <th scope="col">Status</th>
                            <th scope="col"># of Applicants</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">C25DH</td>
                                <td><a href="#" class="anchor-regular">Deckhand</a></td>
                                <td><span class='fw-bold text-success'>Open</span></td>
                                <td><a href="#" class="anchor-regular">10</a></td>
                                <td>
                                    <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/jobs/view/">View</a></li>
                                        <li><a class="dropdown-item" href="#">Open</a></li>
                                        <li><a class="dropdown-item" href="#">Close</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">C25MT</td>
                                <td><a href="#" class="anchor-regular">Maintenance Technician</a></td>
                                <td><span class='fw-bold text-success'>Open</span></td>
                                <td><a href="#" class="anchor-regular">6</a></td>
                                <td>
                                    <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
                                        <li><a class="dropdown-item" href="#">Open</a></li>
                                        <li><a class="dropdown-item" href="#">Close</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td scope="row">C25AV</td>
                                <td><a href="#" class="anchor-regular">Audio Visual Technician</a></td>
                                <td><span class='fw-bold text-danger'>Closed</span></td>
                                <td><a href="#" class="anchor-regular">0</a></td>
                                <td>
                                    <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
                                        <li><a class="dropdown-item" href="#">Open</a></li>
                                        <li><a class="dropdown-item" href="#">Close</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td scope="row">C25CC</td>
                                <td><a href="#" class="anchor-regular">Captain</a></td>
                                <td><span class='fw-bold text-success'>Open</span></td>
                                <td><a href="#" class="anchor-regular">2</a></td>
                                <td>
                                    <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
                                        <li><a class="dropdown-item" href="#">Open</a></li>
                                        <li><a class="dropdown-item" href="#">Close</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">C25FO</td>
                                <td><a href="#" class="anchor-regular">First Officer</a></td>
                                <td><span class='fw-bold text-success'>Open</span></td>
                                <td><a href="#" class="anchor-regular">5</a></td>
                                <td>
                                    <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
                                        <li><a class="dropdown-item" href="#">Open</a></li>
                                        <li><a class="dropdown-item" href="#">Close</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">C25CC</td>
                                <td><a href="#" class="anchor-regular">Cruise Consultant</a></td>
                                <td><span class='fw-bold text-danger'>Closed</span></td>
                                <td><a href="#" class="anchor-regular">0</a></td>
                                <td>
                                    <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
                                        <li><a class="dropdown-item" href="#">Open</a></li>
                                        <li><a class="dropdown-item" href="#">Close</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">C25BS</td>
                                <td><a href="#" class="anchor-regular">Boatswain</a></td>
                                <td><span class='fw-bold'>New</span></td>
                                <td><a href="#" class="anchor-regular">0</a></td>
                                <td>
                                    <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
                                        <li><a class="dropdown-item" href="#">Open</a></li>
                                        <li><a class="dropdown-item" href="#">Close</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>       
</div>
<div class="mt-8"><h3>&nbsp;</h3></div>


