<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>EZRyderz</title>   use if we want only one title for entire site   -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css" type="text/css"/>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{URL::asset('/img/logo.png')}}" alt="EZRyderz" height="30" width="230">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                            <!-- The user's name and profile picture displayed -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('schedule') }}"><i class="fa fa-btn fa-user"></i>Make a Schedule</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('carinformation') }}"><i class="fa fa-btn fa-user"></i>Insert Car Information</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('driverslist') }}"><i class="fa fa-btn fa-user"></i>Ride Offers</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('carpoolerslist') }}"><i class="fa fa-btn fa-user"></i>Ride Requests</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('myoffers') }}"><i class="fa fa-btn fa-user"></i>My Offers</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('myrequests') }}"><i class="fa fa-btn fa-user"></i>My Requests</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('displayRequests') }}"><i class="fa fa-btn fa-user"></i>Received Requests</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <footer class=footer>
            Use of this site constitutes acceptance of our User Agreement &copy; 2017 EZRyderz inc. All rights reserved.
        </footer>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="../js/jquery-1.11.2.min.js"></script>
    <script src="../js/jquery.barrating.min.js"></script>
    <script src="../js/examples.js"></script>
</body>
</html>
