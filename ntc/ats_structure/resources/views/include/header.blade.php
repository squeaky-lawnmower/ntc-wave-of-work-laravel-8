<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="col-sm-4 col-md-4 col-4">
        <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" height="50px" width="auto" class="me-5">
        <!--a class="navbar-brand" href="#">{{config('app.name')}}</a-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="col-4 col-sm-4 col-md-4 me-auto ms-auto ">
        @auth
          <form class="col-md-12 text-center me-auto ms-auto" role="search">
            <div class="input-group">
              @if('employer' === auth()->user()->account_type)
                @php
                  $placeholder = "Candidate Name, Position..."
                @endphp
              @else
                @php
                  $placeholder = "Job Title, Keyword, Company..."
                @endphp
              @endif
              <input type="text" class="form-control" placeholder="{{$placeholder}}" aria-label="Search" aria-describedby="find_job">
                <button class="btn btn-primary" type="button" id="find_job">Search</button>
            </div>
          </form>
          @endauth
      </div>
      <div class="col-4 col-sm-4 col-md-4">
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            @auth
              <li class="nav-item">
                <a class="nav-link" href="{{route('jobs.index', ['id' => auth()->user()->id])}}">Jobs</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('profile', ['id' => auth()->user()->id])}}">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('messages')}}">Messages</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
            @else
              <li class="nav-item">
                  <a class="nav-link" href="{{route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('registration')}}">Register</a>
              </li>
            @endauth
          </ul>
          <span class="navbar-text">
              @auth
                  {{auth()->user()->name}}
              @endauth
          </span>
        </div>
      </div>
    </div>
  </nav>