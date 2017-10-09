@extends('layout.master');
@section('content')
    <section id="work" class="page-section page">
        <div class="container text-center">
            <div class="heading">
                <h2>Our Courses</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quo sab.</p>
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
                                {{--Student--}}
                                @if(Auth::User()->course_id === null and Auth::User()->getUserType->name === 'Student')
                                    <th class="font">Join</th>
                                @elseif (Auth::User()->course_id !== null and Auth::User()->getUserType->name === 'Student')
                                    <th class="font">Quit</th>
                                @endif
                                {{--Admin--}}
                                @if(Auth::User()->user_type == 3)
                                    <th class="font">Delete</th>
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
                                    <td class="font2 body center">{{$course->getTeacher['name'] }}</td>
                                    @auth
                                        {{--Student--}}
                                        @if(Auth::User()->getUserType->name === 'Student' and Auth::User()->course_id === null)
                                            <form action="/users_courses/{{Auth::user()->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}

                                                <input type="hidden" name="course" value="{{$course->id}}">
                                                <td class="font2 body2"><input class="btn" type="submit" value="Apply now">
                                            </form>
                                        @else
                                            @if(Auth::user()->course_id === $course->id and Auth::User()->user_type === 1)
                                                <form action="/users_courses/{{Auth::user()->id}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}

                                                    <input type="hidden" name="course" value="{{$course->id = null}}">
                                                    <td class="font2 body2"><input class="btn" type="submit" value="Quit"></td>
                                                </form>
                                            @endif
                                        @endif
                                        {{--Admin--}}
                                        @if(Auth::User()->user_type == 3)
                                            <form action="/users_courses/{{$course->id}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}

                                                {{--TODO: finish edit course, create course, grade system--}}
                                                {{--https://laravel.com/docs/5.5/controllers#restful-partial-resource-routes--}}
                                            </form>
                                            <form action="/users_courses/{{$course->id}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                                <input type="hidden" name="course" value="{{$course->id}}">
                                                <td class="font2 body2"><input class="btn_delete" type="submit" value="Delete"></td>
                                            </form>
                                        @endif
                                    @endauth
                                </tr>
                            </div>
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