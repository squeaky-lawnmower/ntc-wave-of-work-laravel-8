<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- Logo and Toggler -->
        <div class="d-flex align-items-center justify-content-between w-100">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" height="50px" width="auto" class="me-3">
                @auth
                    <span class="d-none d-lg-inline">
                        Logged-in as, {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                        @if (auth()->user()->company && 'jobseeker' != auth()->user()->account_type)
                            ({{ auth()->user()->company }})
                        @endif
                    </span>
                @endauth
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Collapsible Content -->
        <div class="collapse navbar-collapse" id="navbarText">
            <div class="d-flex flex-lg-row w-100 navbar-responsive">
                <!-- Search Form -->
                @auth
                    <form class="d-flex flex-column flex-lg-row align-items-center my-3 my-lg-0 form-responsive" action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="input-group w-100">
                            @if ('employer' === auth()->user()->account_type)
                                @php 
                                    $placeholder = "Candidate Name, Position..."
                                @endphp
                            @else
                                @php 
                                    $placeholder = "Job Title, Keyword, Company..."
                                @endphp
                            @endif
                            <input type="text" name="searchbar" class="form-control" value="{{ request()->get('search') }}" placeholder="{{ $placeholder }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                @endauth

                <!-- Navigation Links -->
                <ul class="navbar-nav mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            @php
                                if ('jobseeker' == auth()->user()->account_type)  {
                                    $routeName = 'jobs.index.applications';
                                } else {
                                    $routeName = 'jobs.index';
                                }
                            @endphp
                            <a class="nav-link" href="{{ route($routeName, ['id' => auth()->user()->id]) }}">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile', ['id' => auth()->user()->id]) }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('messages', ['id' => auth()->user()->id]) }}">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration') }}">Register</a>
                        </li>
                    @endauth
                </ul>

                <!-- User Info -->
                <span class="navbar-text mt-3 mt-lg-0">
                    @auth
                        {{ auth()->user()->name }}
                    @endauth
                </span>
            </div>
        </div>
    </div>
</nav>