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
            <style>
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                td, th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                tr:nth-child(even) {
                    background-color: #e9e9e9;
                }
            </style>
            <table>
                <tr class="table">
                    <th class="font">Name</th>
                    <th class="font">Description</th>
                    <th class="font">Duration</th>
                    <th class="font">Starting Date</th>
                    <th class="font">Teacher</th>
                    @auth
                    @if(Auth::User()->course_id === null and Auth::User()->getUserType->name === 'Student')
                    <th class="font">Join</th>
                    @elseif (Auth::User()->course_id !== null and Auth::User()->getUserType->name === 'Student')
                    <th class="font">Quit</th>
                    @endif
                    @endauth
                </tr>
                @foreach($courses as $course)
                    <div id="portfolio">
                        <tr>
                            <td class="font2 body">{{$course->name}}</td>
                            <td class="font2 body">{{$course->description}}</td>
                            <td class="font2 body center">{{$course->duration}}</td>
                            <td class="font2 body center">{{$course->start_date}}</td>
                            <td class="font2 body center">{{$course->getTeacher->name }}</td>
                            @auth
                            @if(Auth::User()->getUserType->name === 'Student' and Auth::User()->course_id === null)
                                <form action="/users_courses/{{Auth::user()->id}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <input type="hidden" name="course" value="{{$course->id}}">
                                    <td class="font2 body2"><input class="btn" type="submit" value="Apply now">
                                </form>
                            @else
                                @if(Auth::user()->course_id === $course->id)
                                    <form action="/users_courses/{{Auth::user()->id}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <input type="hidden" name="course" value="{{$course->id = null}}">
                                        <td class="font2 body2"><input class="btn" type="submit" value="Unapply"></td>
                                    </form>
                                @endif
                            @endif
                            @endauth
                        </tr>
                @endforeach
            </table>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@stop