@extends('layout.master');
@section('content')
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
    @stop