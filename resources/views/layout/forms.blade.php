<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>B-School</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/btn.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css"/>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top mynav">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if (url()->current() == 'http://localhost:8000/login')
                <a style="color: white" class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Home', 'Home') }}
                </a>
                <a style="color: white" class="navbar-brand" href="{{ url('/registry') }}">
                    {{ config('Registry', 'Register') }}
                </a>
            @else
                <a style="color: white" class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Home', 'Home') }}
                </a>
                <a style="color: white" class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('Login', 'Login') }}
                </a>
            @endif
            <!-- Branding Image -->
</div>
<div class="collapse navbar-collapse" id="app-navbar-collapse">
<!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">
    &nbsp;
</ul>

<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
</ul>
</div>
</div>
</nav>
@yield('content')
</body>
</html>