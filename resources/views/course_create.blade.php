@php
    use App\User;
@endphp

@extends('layout.master');
@section('content')
    @auth
        <section id="aboutUs">
            <div class="container">
                <div class="heading text-center">
                    <div class="container">
                        @if(isset($course))
                            <h1>Edit Course</h1>
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" action="/courses/{{$course->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" value="{{$course->name}}">

                                <label for="description">Description</label>
                                <input id="description" type="text" name="description" value="{{$course->description}}">

                                <label for="duration">Duration</label>
                                <input id="duration" type="number" name="duration" value="{{$course->duration}}">

                                <label for="start_date">Starting Date</label>
                                <input id="start_date" type="date" name="start_date" value="{{$course->start_date}}">

                                <label for="teacher">Teacher</label>
                                <div>
                                    <select id="teacher" name="teacher">
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input class="btn_submit" type="submit" value="Update">
                            </form>
                        @else
                            <h1>Create Course</h1>
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" action="/courses/create" method="post">
                                {{ csrf_field() }}
                                {{ method_field('GET') }}

                                <label for="name">Name</label>
                                <input id="name" type="text" name="name">

                                <label for="description">Description</label>
                                <input id="description" type="text" name="description">

                                <label for="duration">Duration</label>
                                <input id="duration" type="number" name="duration">

                                <label for="start_date">Starting Date</label>
                                <input id="start_date" type="date" name="start_date">

                                <label for="teacher">Teacher</label>
                                <div>
                                    <select id="teacher" name="teacher">
                                        @foreach(User::where(['user_type','=','2'],['course_id','=',null]) as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input class="btn_submit" type="submit" value="Update">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endauth
@endsection
