<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  padding-top: 10px;
  text-align: center;
}
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'CST-256 CLC' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>
	<?php if(session_status() != PHP_SESSION_ACTIVE){
	    session_start();
	}?>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'CST-256 CLC' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    <!-- Profile Tab Starts -->
                                    
                                    <a class="dropdown-item" href="/profile"
                                       onclick="event.preventDefault();
                                                     document.getElementById('profile').submit();">
                                        Profile
                                    </a>

                                    <form id="profile" action="{{ action('UserController@getUserProfile') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    <!-- Profile Tab Ends -->
                                    <!-- Portfolio Tab Starts -->
                                    
                                    <a class="dropdown-item" href="/portfolio"
                                       onclick="event.preventDefault();
                                                     document.getElementById('portfolio').submit();">
                                        Portfolio
                                    </a>

                                    <form id="portfolio" action="{{ action('UserController@getPortfolio') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    <!-- Portfolio Tab Ends -->
                                    <!-- Jobs Tab Starts -->
                                    <a class="dropdown-item" href="/get_jobs"
                                       onclick="event.preventDefault();
                                                     document.getElementById('jobs').submit();">
                                        Jobs
                                    </a>

                                    <form id="jobs" action="{{ action('UserController@getAllJobs') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    <!-- Jobs Tab Ends -->
                                    <!-- Affinity Groups Tab Starts -->
                                    <a class="dropdown-item" href="/get_groups"
                                       onclick="event.preventDefault();
                                                     document.getElementById('groups').submit();">
                                        Affinity Groups
                                    </a>

                                    <form id="groups" action="{{ action('UserController@getAllGroups') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    <!-- Affinity Gruops Tab Ends -->
                                    <!-- Admin Tab Starts -->
                                    @if($_SESSION['admin'] == true)
                                    <a class="dropdown-item" href="/get_profiles"
                                       onclick="event.preventDefault();
                                                     document.getElementById('admin').submit();">
                                        Admin - Edit Users
                                    </a>

                                    <form id="admin" action="{{ action('UserController@getAllProfiles') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    @endif
                                    <!-- Admin Tab Ends -->
                                </div>
                            </li>
                        @endguest
                    </ul>
 					<div style="padding-left: 5%;">
                        <form action="{{ action('UserController@getJobsBySearch') }}" class="form-inline my-2 my-lg-0" method="POST">
                        	@csrf
                          <input class="form-control mr-sm-2" name="search" id="search" type="search" placeholder="Search for Job" aria-label="Search">
                          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        
    </div>
    <main class="py-5">
            @yield('content')
    </main>
    <div class="footer bg-dark text-light" >
    @include('layouts.footer')
	</div>
</body>
</html>
