@extends('layout.master');
@section('content')
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