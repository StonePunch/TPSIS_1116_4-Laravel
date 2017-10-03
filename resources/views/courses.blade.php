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
                 w       @endguest
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
            @foreach($courses as $course)
                <div id="portfolio">
                    <ul class="filters list-inline">
                        <li> Name: {{$course->name}} </li>
                        <li> Description: {{$course->description}} </li>
                        <li> Duration: {{$course->duration}}</li>
                        <li> Starting date: {{$course->start_date}}</li>
                        <li> Teacher: {{$course->getTeacher->name }} </li>
                        @auth
                        @if(Auth::User()->getUserType->name === 'Student' and Auth::User()->course_id === null)
                        {
                            <form action="/users/{{Auth::user()->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <input type="hidden" name="course" value="{{$course->id}}">
                                <input class="btn" type="submit" value="Apply now">
                            </form>
                        }
                        @else
                            @if(Auth::user()->course_id === $course->id)
                            <form action="/users/{{Auth::user()->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <input type="hidden" name="course" value="{{$course->id = null}}">
                                <input class="btn" type="submit" value="Unapply">
                            </form>

                            @endif
                        @endif
                        @endauth
                    </ul>
            @endforeach

            </div>
        </div>
    </div>
</div>
</section>
@stop