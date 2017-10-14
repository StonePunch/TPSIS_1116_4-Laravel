<!doctype html>
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
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen"/>
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen"/>
    <link href="css/animate.css" rel="stylesheet" media="screen">
    <!-- Owl Carousel Assets -->
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/datatable.css"/>
    <link rel="stylesheet" href="css/search.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/number.css"/>
    <!-- Font Awesome -->
    <link href="font/css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            {{--B_School Image--}}
            @guest
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                            data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                    <a href="/home" class="navbar-brand scroll-top logo animated bounceInLeft">
                        <b>
                            <i><img src="images/logo.png"/></i>
                        </b>
                    </a>
                </div>
            @endguest
            @auth
                @if(\Illuminate\Support\Facades\Auth::user()->user_type == 3)
                    {{--Image for when the is admin logged in--}}
                    <div class="navbar-header">
                        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                                data-target="#main-nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <a href="/courses" class="navbar-brand scroll-top logo animated bounceInLeft">
                            <b>
                                <i><img src="images/logo.png"/></i>
                            </b>
                        </a>
                    </div>
                @else
                    {{--Image for when the admin is not logged in--}}
                    <div class="navbar-header">
                        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                                data-target="#main-nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <a href="/home" class="navbar-brand scroll-top logo animated bounceInLeft">
                            <b>
                                <i><img src="images/logo.png"/></i>
                            </b>
                        </a>
                    </div>
                @endif
            @endauth
            {{--Navigation Bar--}}
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="mainNav">
                    @guest
                        {{--User not logged in--}}
                        <li class="active" id="firstLink"><a href="/" class="scroll-link">Home</a></li>
                        <li><a href="/courses" class="scroll-link">Courses</a></li>
                        <li><a href="/news" class="scroll-link">News</a></li>
                        <li><a href="/about" class="scroll-link">About</a></li>
                        <li><a href="/contacts" class="scroll-link">Contacts</a></li>
                        <li class="login"><a href="{{ route('login') }}">Login</a></li>
                        <li class="login"><a href="{{ route('registry') }}">Register</a></li>
                    @endguest
                    @auth
                        {{--User logged in--}}
                        @if(\Illuminate\Support\Facades\Auth::user()->user_type == 3)
                            {{--Admin section--}}
                            <li class="active" id="firstLink"><a href="" class="scroll-link">Courses</a></li>
                            <li><a href="/users" class="scroll-link">Users</a></li>
                            <li><a href="/grades" class="scroll-link">Comments</a></li>

                            {{--Common section--}}
                            <li class="dropdown login">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/manage" class="scroll-link">Profile</a>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->user_type == 2)
                            {{--Techer section--}}

                            <li class="active" id="firstLink"><a href="/" class="scroll-link">Home</a></li>
                            <li><a href="/courses" class="scroll-link">Courses</a></li>
                            <li><a href="/users" class="scroll-link">Users</a></li>
                            <li><a href="/news" class="scroll-link">News</a></li>
                            <li><a href="/about" class="scroll-link">About</a></li>
                            <li><a href="/contacts" class="scroll-link">Contacts</a></li>

                            {{--Common section--}}
                            <li class="dropdown login">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/manage" class="scroll-link">Profile</a>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            {{--User section--}}
                            <li class="active" id="firstLink"><a href="/" class="scroll-link">Home</a></li>
                            <li><a href="/courses" class="scroll-link">Courses</a></li>
                            <li><a href="/grades" class="scroll-link">Grades</a></li>
                            <li><a href="/news" class="scroll-link">News</a></li>
                            <li><a href="/about" class="scroll-link">About</a></li>
                            <li><a href="/contacts" class="scroll-link">Contacts</a></li>

                            {{--Common section--}}
                            <li class="dropdown login">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/manage" class="scroll-link">Profile</a>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>

@section('content')
    {{--Page content goes here--}}
@show
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="col">
                    <h4 style="color: white">Contact us!</h4>
                    <ul style="color: white">
                        <li>Address: Avenida da Liberdade, São João da Madeira</li>
                        <li>Telephone: 910 452 345 | Fax: 910 452 356</li>
                        <li style="text-decoration: underline">Email: <a href="mailto:info@example.com" title="Email">bschool@edu.bschool.com</a></li>
                        <li style="text-decoration: underline">Skype: <a href="skype:my.test?call" title="Skype">b-school</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col">
                    <h4 style="color: white">Newsletter</h4>
                    <p style="color: white">Subscreva à nossa newsletter para ficar a par das nossas novidades!</p>
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="email...">
                            <span class="input-group-btn">
                                    <button class="btn" type="button">Validate</button>
                                </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col col-social-icons">
                    <h4 style="color: white">Siga-nos</h4>
                    <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                    <a href="https://plus.google.com"><i class="fa fa-google-plus"></i></a>
                    <a href="https://youtube.com"><i class="fa fa-youtube-play"></i></a>
                    <a href="https://flickr.com"><i class="fa fa-flickr"></i></a>
                    <a href="https://linkedin.com"><i class="fa fa-linkedin"></i></a>
                    <a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                    <a href="https://skype.com"><i class="fa fa-skype"></i></a>
                    <a href="https://pinterest.com"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col">
                    <h4 style="color: white">Latest News</h4>
                    <p style="color: white">
                        The Navigator Company elected B-School, as the main entity formation for the courses of
                        Programming
                        Languages...</br></br>
                        <a href="/news" class="btn">More News!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/.page-section-->
<section class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center"> Copyright 2017 | All Rights Reserved - B-School</div>
        </div>
        <!-- / .row -->
    </div>
</section>
<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>
<!--[if lte IE 8]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
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
<script src="/public/js/number.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
