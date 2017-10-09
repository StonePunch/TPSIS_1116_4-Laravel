@extends('layout.master')
@section('content')
    <div id="#top"></div>
    <section id="home">

        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item"><img src="images/banner-bg.jpg" alt="banner" /></div>
            <div class="item"><img src="images/banner-bg2.jpg" alt="banner" /></div>
            <div class="item"><img src="images/banner-bg3.jpg" alt="banner" /></div>
        </div>

    <div class="container hero-text2">
        <div class="col-md-9">
            <h2>Porquê Nós?</h2>
                <br>A nossa escola tem uma orgulhosa tradição que oferece excelentes oportunidades educacionais. O seu progresso académico
                    está em primeiro lugar.</br>
                    Temos formadores comprometidos em exibir entusiasmo, dedicação e habilidades de ensino de alto nível.
                    Esforçamo-nos constantemente para criar um ambiente no qual cada aluno seja apoiado para alcançar os mais altos níveis de sucesso.
                </p>
        </div>
        <div class="col-md-3">
            <a class="btn btn-apply" href="#"><i class="fa fa-play-circle"></i>Escolha um curso!</a>
        </div>
    </div>
</section>
<section id="Features" class="page-section colord">
    <div class="container">
        <div class="row">
            <!-- item -->
            <div class="col-md-4 text-center">
                <div class="box-item">
                    <i class="circle"><img src="images/5.png" alt="" /></i>
                    <h3>Cursos</h3>
                   <p></p>
                </div>
            </div>
            <!-- end: -->

            <!-- item -->
            <div class="col-md-4 text-center">
                <div class="box-item">
                    <i class="circle"> <img src="images/1.png" alt="" /></i>
                    <h3>Conhecimento</h3>
                    <p></p>
                </div>
            </div>
            <!-- end: -->

            <!-- item -->
            <div class="col-md-4 text-center">
                <div class="box-item">
                    <i class="circle"> <img src="images/3.png" alt="" /></i>
                    <h3>Inovação</h3>
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
