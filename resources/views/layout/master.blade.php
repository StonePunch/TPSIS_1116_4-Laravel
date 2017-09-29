<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
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
                    <li><a href="/contact" class="scroll-link">Contatos</a></li>
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
    <!--/.container-->
</header>

@yield('content')
<!--/.header-->

<!--/.footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="col">
                    <h4>Contacte-nos</h4>
                    <ul>
                        <li>Avenida da Liberdade, São João da Madeira</li>
                        <li>Telefone: 910 452 345 | Fax: 910 452 356 </li>
                        <li>Email: <a href="mailto:info@example.com" title="Email">bschool@edu.bschool.com</a></li>
                        <li>Skype: <a href="skype:my.test?call" title="Skype">b-school</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col">
                    <h4>Newsletter</h4>
                    <p>Subscreva à nossa newsletter para ficar a par das nossas novidades!</p>
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="email...">
                            <span class="input-group-btn">
                                <button class="btn" type="button">Validar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col col-social-icons">
                    <h4>Siga-nos</h4>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                    <a href="#"><i class="fa fa-flickr"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-skype"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col">
                    <h4>Últimas Notícias</h4>
                    <p>
                        B-SCHOOL vai formar jovens para emprego com futuro na PANIKE! ÚLTIMAS VAGAS!</br>
                        A Panike elegeu a B-SCHOOL como entidade formadora do Curso de Formação para...
                        <br><br>
                        <a href="#" class="btn">Mais Notícias</a>
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
            <div class="col-sm-12 text-center"> Copyright 2017 | Todos os Direitos Reservados - B-School </div>
        </div>
        <!-- / .row -->
    </div>
</section>
<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

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
<script src="{{ asset('js/app.js') }}">

</script>
</body>
</html>