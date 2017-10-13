@extends('layout.master')
@section('content')
    <section id="work" class="page-section page">
        <div class="container text-center">
            <div class="heading">
                @guest

                @endguest

                @auth
                @if(Auth::User()->user_type === 3)
                    <h2>All comments</h2>
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

                        .mytd {
                            border: none;
                        }

                        .button {
                            display: inline-block;
                            text-align: center;
                            vertical-align: middle;
                            padding: 7px 20px;
                            border: 1px solid #000000;
                            border-radius: 8px;
                            background: #ffdd00;
                            background: -webkit-gradient(linear, left top, left bottom, from(#ffdd00), to(#ffdd00));
                            background: -moz-linear-gradient(top, #ffdd00, #ffdd00);
                            background: linear-gradient(to bottom, #ffdd00, #ffdd00);
                            font: normal normal normal 18px arial;
                            color: #000000;
                            text-decoration: none;
                            margin-bottom: 2%;
                        }

                        .button:hover,
                        .button:focus {
                            background: #ffff00;
                            background: -webkit-gradient(linear, left top, left bottom, from(#ffff00), to(#ffff00));
                            background: -moz-linear-gradient(top, #ffff00, #ffff00);
                            background: linear-gradient(to bottom, #ffff00, #ffff00);
                            color: #000000;
                            text-decoration: none;
                        }

                        .button:active {
                            background: #998500;
                            background: -webkit-gradient(linear, left top, left bottom, from(#998500), to(#ffdd00));
                            background: -moz-linear-gradient(top, #998500, #ffdd00);
                            background: linear-gradient(to bottom, #998500, #ffdd00);
                        }
                    </style>
                    <table>
                        <tr class="table">
                            <th class="font">Student Name</th>
                            <th class="font">Course Name</th>
                            <th class="font">Teacher Name</th>
                            <th class="font">Grade</th>
                            <th class="font">Comment</th>
                        </tr>
                        @foreach($grades as $grade)
                            <div id="portfolio">
                                <tr class="table">
                                    <td class="font2 body">{{$grade->getStudent->name}}</td>
                                    <td class="font2 body center">{{$grade->getCourse->name}}</td>
                                    <td class="font2 body center">{{$grade->getCourse->getTeacher->name}}</td>
                                    <td class="font2 body center">{{$grade->grade}}</td>
                                    <td class="font2 body center">{{$grade->comment}}</td>
                                    {{--Admin--}}
                                    {{--@if(Auth::User()->user_type == 3)
                                        --}}{{--Edit--}}{{--
                                        <form action="/courses/{{$course->id}}/edit" method="post">
                                            {{csrf_field()}}
                                            {{method_field('GET')}}

                                            <input type="hidden" name="course" value="{{$course->id}}">
                                            <td class="font2 body2 mytd">
                                                <input class="btn" type="submit" value="Edit">
                                            </td>
                                        </form>
                                        --}}{{--Delete--}}{{--
                                        <form action="/courses/{{$course->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}

                                            <input type="hidden" name="course" value="{{$course->id}}">
                                            <td class="font2 body2 mytd">
                                                <input class="btn button" type="submit" value="Delete">
                                            </td>
                                        </form>
                                    @endif--}}
                                </tr>
                            </div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop