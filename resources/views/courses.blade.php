@extends('layout.master');
@section('content')
</head>
<header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft"><b><i><img src="images/logo.png" /></i></b></a> </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="mainNav">
                    <li class="active" id="firstLink"><a href="/" class="scroll-link">Home</a></li>
                    <li><a href="/courses" class="scroll-link">Cursos</a></li>
                    <li><a href="/news" class="scroll-link">Notícias</a></li>
                    <li><a href="/about" class="scroll-link">Sobre nós</a></li>
                    <li><a href="/contacts" class="scroll-link">Contatos</a></li>
                    <!--/ .login starts-->
                    @guest
                        <li class="login"><a href="{{ route('login') }}">Login</a></li>
                        <li class="login"><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown login">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/manage" class="scroll-link">Profile</a>
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
                        @endguest
                        <!--/ .login ends-->
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
    <!--/.container-->
</header>
<section id="work" class="page-section page">
<div class="container text-center">
    <div class="heading">
        <h2>Os nossos cursos</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quos ab.</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="portfolio">
                <ul class="filters list-inline">
                    <li> <a class="active" data-filter="*" href="#">All</a> </li>
                    <li> <a data-filter=".photography" href="#">Events</a> </li>
                    <li> <a data-filter=".branding" href="#">Games</a> </li>
                    <li> <a data-filter=".web" href="#">Science fair</a> </li>
                </ul>
                <ul class="items list-unstyled clearfix animated fadeInRight showing" data-animation="fadeInRight" style="position: relative; height: 438px;">
                    <li class="item branding" style="position: absolute; left: 0px; top: 0px;">
                        <figure class="effect-bubba">
                            <img src="images/work/1.jpg" alt="img02"/>
                            <figcaption>
                                <h2>B-Events</h2>
                                <a href="images/work/1.jpg" class="fancybox">View more</a>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="item photography" style="position: absolute; left: 292px; top: 0px;">
                        <figure class="effect-bubba">
                            <img src="images/work/2.jpg" alt="img02"/>
                            <figcaption>
                                <h2>B-Events</h2>
                                <a href="images/work/2.jpg" class="fancybox">View more</a>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="item branding" style="position: absolute; left: 585px; top: 0px;">
                        <figure class="effect-bubba">
                            <img src="images/work/3.jpg" alt="img02"/>
                            <figcaption>
                                <h2>B-Events</h2>
                                <a href="images/work/3.jpg" class="fancybox">View more</a>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="item photography" style="position: absolute; left: 877px; top: 0px;">
                        <figure class="effect-bubba">
                            <img src="images/work/4.jpg" alt="img02"/>
                            <figcaption>
                                <h2>B-Events</h2>
                                <a href="images/work/4.jpg" class="fancybox">View more</a>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="item photography" style="position: absolute; left: 0px; top: 219px;">
                        <figure class="effect-bubba">
                            <img src="images/work/5.jpg" alt="img02"/>
                            <figcaption>
                                <h2>B-Events</h2>
                                <a href="images/work/5.jpg" class="fancybox">View more</a>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="item web" style="position: absolute; left: 292px; top: 219px;">
                        <figure class="effect-bubba">
                            <img src="images/work/6.jpg" alt="img02"/>
                            <figcaption>
                                <h2>B-Events</h2>
                                <a href="images/work/6.jpg" class="fancybox">View more</a>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="item photography" style="position: absolute; left: 585px; top: 219px;">
                        <figure class="effect-bubba">
                            <img src="images/work/7.jpg" alt="img02"/>
                            <figcaption>
                                <h2>B-Events</h2>
                                <a href="images/work/7.jpg" class="fancybox">View more</a>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="item web" style="position: absolute; left: 877px; top: 219px;">
                        <figure class="effect-bubba">
                            <img src="images/work/8.jpg" alt="img02"/>
                            <figcaption>
                                <h2>B-Events</h2>
                                <a href="images/work/8.jpg" class="fancybox">View more</a>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
    @stop