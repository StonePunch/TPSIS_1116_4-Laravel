@extends('layout.master')
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
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
<section id="aboutUs">
    <div class="container">
        <div class="heading text-center">
            <!-- Heading -->
            <h2>About Us</h2>
            <p>At lorem Ipsum available, but the majority have suffered alteration in some form by injected humour.</p>
        </div>
        <div class="row feature design">
            <div class="area1 columns left">
                <h3>Our Design tells about quality</h3>
                <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat fabulas complectitur deterruisset at pro. Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea. No soleat fabulas prodesset vel, ut quo solum dicunt.
                    Nec et jority have suffered alteration. </p>
                <p>Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea. No soleat fabulas prodesset vel, ut quo solum dicunt.
                    Nec et amet vidisse mentitumsstie percipitoleat fabulas. </p>
                <a href="#" class="btn">Request Quote</a>
            </div>
            <div class="area2 columns feature-media right"> <img src="images/about-img.jpg" alt="" width="100%"> </div>
        </div>
        <div class="row dataTxt">
            <div class="col-md-4 col-sm-6">
                <h3>Our Education</h3>
                <p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat fabulas complectitur deterruisset at pro. Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea.</p>

                <br>
            </div>

            <div class="col-md-4 col-sm-6">

                <h3>Courses</h3>
                <p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                <ul class="listArrow">
                    <li>Lorem ipsum dolor consectetursit amet, consectet</li>
                    <li>Has molestie percipit an. Falli volumus efficiantur</li>
                    <li>Falli volumus efficiantur sed id, ad vel noster</li>
                    <li>Lorem ipsum dolor consectetursit amet, consectetur</li>
                    <li>Ius ut etiam vivendo, graeci iudicabit constitutoa</li>
                </ul>
                <!-- Accordion starts -->
            </div>

            <div class="col-md-4 col-sm-6">

                <h3>Latest News</h3>
                <p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                <ul  class="list3">
                    <li>Lorem ipsum dolor consectetursit</li>
                    <li>Has molestie percipit an Falli</li>
                    <li>Falli volumus efficiantur sed id</li>
                    <li>Lorem ipsum dolor consectetu</li>
                </ul>

                <!-- Accordion starts -->
            </div>

        </div>
    </div>
</section>
@stop