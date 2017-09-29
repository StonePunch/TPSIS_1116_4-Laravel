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
            @foreach($courses as $course)
                <div id="portfolio">
                    <ul class="filters list-inline">
                        <li> Name: {{$course->name}} </li>
                        <li> Description: {{$course->description}} </li>
                        <li> Duration: {{$course->duration}}</li>
                        <li> Starting date: {{$course->start_date}}</li>
                        <li> Teacher: {{$course->teacher_id }} </li>
                    </ul>
            @endforeach
            </div>
        </div>
    </div>
</div>
</section>
@stop