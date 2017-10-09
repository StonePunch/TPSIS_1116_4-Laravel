<!doctype html>
<!--[if IE 7 ]><html lang="en-gb" class="isie ie7 oldie no-js"><![endif]-->
<!--[if IE 8 ]><html lang="en-gb" class="isie ie8 oldie no-js"><![endif]-->
<!--[if IE 9 ]><html lang="en-gb" class="isie ie9 no-js"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>B-School</title>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 8]>
    <script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link href="css/animate.css" rel="stylesheet" media="screen">
    <!-- Owl Carousel Assets -->
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/datatable.css" />
    <!-- Font Awesome -->
    <link href="font/css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <script src="/public/js/modernizr-latest.js"></script>
    <script src="/public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="/public/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/public/js/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="/public/js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="/public/js/jquery.nav.js" type="text/javascript"></script>
    <script src="/public/js/jquery.fittext.js"></script>
    <script src="/public/js/waypoints.js"></script>
    <script src="/public/contact/jqBootstrapValidation.js"></script>
    <script src="/public/contact/contact_me.js"></script>
    <script src="/public/js/custom.js" type="text/javascript"></script>
    <script src="/public/js/owl-carousel/owl.carousel.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</head>
<body>
<header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft"><b><i><img src="images/logo.png" /></i></b></a> </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="mainNav">
                    @guest
                        <script>window.location.href = "http://localhost:8000/users_no_permission_error";</script>
                    @endguest
                    @auth
                        {{--User logged in--}}
                        @if(\Illuminate\Support\Facades\Auth::user()->user_type == 3)
                                {{--Common section --}}
                                <li><a href="/grades" class="scroll-link">Grades</a></li>
                                <li><a href="/courses" class="scroll-link">Courses</a></li>
                                <li><a href="/users" class="scroll-link">Users</a></li>
                                {{--<li><a href="/courses" class="scroll-link">Teacher, not done</a> </li>--}}

                                {{--Common section--}}
                                <li class="dropdown login">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="/manage" class="scroll-link">Profile</a>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                        @else
                                <script>window.location.href = "http://localhost:8000/users_no_permission_error";</script>
                        @endif
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
{{--<a class="course_create" href="register_course.blade.php">Create Course</a>--}}
