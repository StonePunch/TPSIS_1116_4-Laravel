@extends('layout.master')
@section('content')
    <section id="work" class="page-section page">
        <div class="container text-center">
            <div class="heading">
                <br>
                @auth
                    @if(Auth::User()->user_type === 1)
                        <h2>My Grades</h2>
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

                    @if(count($grades) > 0)
                        <table>
                            <tr class="table">
                                <th class="font">Course</th>
                                <th class="font">Duration</th>
                                <th class="font">Starting Date</th>
                                <th class="font">Teacher</th>
                                <th class="font">Grade</th>
                                <th class="font">Comment</th>
                            </tr>
                            @foreach($grades as $grade)
                                <div id="portfolio">
                                    <tr class="table">
                                        <td class="font2 body center">{{$grade->getCourse->name}}</td>
                                        <td class="font2 body center">{{$grade->getCourse->duration . ' hours'}}</td>
                                        <td class="font2 body center">{{$grade->getCourse->start_date}}</td>
                                        <td class="font2 body center">{{$grade->getCourse->getTeacher->name}}</td>
                                        <td class="font2 body center">{{$grade->grade}}</td>
                                        @if($grade->comment === null)
                                            {{-- Comment Grade --}}
                                            <form action="/grades/{{Auth::user()->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}

                                                <input type="hidden" name="grade_id" value="{{$grade->id}}">
                                                <td class="font2 body2 center">
                                                    <input style="color: black;" type="text" name="comment" value="">
                                                    <input class="btn" type="submit" value="comment">
                                                </td>
                                            </form>
                                        @else
                                            <td class="font2 body center">{{$grade->comment}}</td>
                                        @endif
                                    </tr>
                                </div>
                            @endforeach
                        </table>
                    @else
                        There are no grades to show!
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop