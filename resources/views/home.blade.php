@extends('layout.master')
@section('content')
    <div id="#top"></div>
    <section id="home">
        <div class="banner-container">
            <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item"><img src="images/banner-bg.jpg" alt="banner"/></div>
                    <div class="item"><img src="images/banner-bg2.jpg" alt="banner"/></div>
                    <div class="item"><img src="images/banner-bg3.jpg" alt="banner"/></div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
                    <!-- Carousel nav ends -->
                </div>
            </div>
        </div>
        <div class="container hero-text2">
            <div class="col-md-9">
                <h2 style="color: white; font-family: Montserrat">Why B-School?</h2>
                <p style="color: white"><br>Our school has a proud tradition that offers excellent educational
                    opportunities. Your academic progress is in the first place.</br>
                    We trainers are committed to show enthusiasm, dedication and high level.
                    We constantly strive to create an environment in which each student is
                    supported to achieve the highest levels of success.
                </p>
            </div>
            <div class="col-md-3">
                <a style="margin-top: 26%" class="btn btn-apply" href="#"><i class="fa fa-play-circle"></i>Escolha
                    um
                    curso!</a>
            </div>
        </div>
        </div>
    </section>
    <section id="Features" class="page-section colord">
        <div class="container">
            <div class="row">
                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="box-item">
                        <i class="circle"><img src="images/5.png" alt=""/></i>
                        <h3>Courses</h3>
                        <p></p>
                    </div>
                </div>
                <!-- end: -->

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="box-item">
                        <i class="circle"> <img src="images/1.png" alt=""/></i>
                        <h3>Knowledge</h3>
                        <p></p>
                    </div>
                </div>
                <!-- end: -->

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="box-item">
                        <i class="circle"> <img src="images/3.png" alt=""/></i>
                        <h3>Innovation</h3>
                        <p></p>
                    </div>
                    <!-- end:-->
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>

    <!--/.footer-->
@endsection
