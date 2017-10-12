@extends('layout.master');
@section('content')
    <section id="work" class="page-section page">
        <div class="container text-center">
            <div class="heading">
                @guest
                <h2>Our Courses</h2>
                @endguest

                @auth
                @if(Auth::User()->user_type !== 3)
                <h2>Our Courses</h2>
                @endif
                @endauth
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
                            border: 1px solid black;
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
                                {{--Student--}}
                                @if(Auth::User()->course_id === null and Auth::User()->user_type === 1)
                                    <th class="font">Join</th>
                                @elseif (Auth::User()->course_id !== null and Auth::User()->user_type === 1)
                                    <th class="font">Quit</th>
                                @endif
                            @endauth
                        </tr>
                        @foreach($courses as $course)
                            <div id="portfolio">
                                <tr class="table">
                                    <td class="font2 body">{{$course->name}}</td>
                                    <td class="font2 body center">{{$course->description}}</td>
                                    <td class="font2 body center">{{$course->duration . ' hours'}}</td>
                                    <td class="font2 body center">{{$course->start_date}}</td>
                                    <td class="font2 body center">{{$course->getTeacher['name'] }}</td>
                                    @auth
                                        {{--Student--}}
                                        @if(Auth::User()->user_type === 1 and Auth::User()->course_id === null)
                                            {{--Join Course--}}
                                            <form action="/users_courses/{{Auth::user()->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}

                                                <input type="hidden" name="course" value="{{$course->id}}">
                                                <td class="font2 body2">
                                                    <input class="btn" type="submit" value="Apply now">
                                                </td>
                                            </form>
                                        @else
                                            @if(Auth::user()->course_id === $course->id and Auth::User()->user_type === 1)
                                                {{--Leave Course--}}
                                                <form action="/users_courses/{{Auth::user()->id}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}

                                                    <input type="hidden" name="course" value="{{$course->id = null}}">
                                                    <td class="font2 body2">
                                                        <input class="btn" type="submit" value="Quit">
                                                    </td>
                                                </form>
                                            @endif
                                        @endif
                                        {{--Admin--}}
                                        @if(Auth::User()->user_type == 3)
                                            {{--Edit--}}
                                            <form action="/courses/{{$course->id}}/edit" method="post">
                                                {{csrf_field()}}
                                                {{method_field('GET')}}

                                                <input type="hidden" name="course" value="{{$course->id}}">
                                                <td class="font2 body2 mytd">
                                                    <input class="btn" type="submit" value="Edit">
                                                </td>
                                            </form>
                                            {{--Delete--}}
                                            <form action="/courses/{{$course->id}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                                <input type="hidden" name="course" value="{{$course->id}}">
                                                <td class="font2 body2 mytd">
                                                    <input class="btn button" type="submit" value="Delete">
                                                </td>
                                            </form>
                                        @endif
                                    @endauth
                                </tr>
                            </div>
                        @endforeach
                        @auth
                            @if(Auth::User()->user_type == 3)
                                {{--Create Course--}}
                                <form action="/courses/create" method="post">
                                    {{csrf_field()}}
                                    {{method_field('GET')}}

                                    <button type="submit" class="btn_create">Create Course</button>
                                </form>
                            @endif
                        @endauth
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop