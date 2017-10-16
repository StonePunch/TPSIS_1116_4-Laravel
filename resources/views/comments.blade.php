@extends('layout.master')
@section('content')
    <section id="work" class="page-section page">
        <div class="container text-center">
        <br/><br/>
            <div class="heading">
                <h2 style="font-family: 'Montserrat Light'">All comments</h2>
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
                    </style>
                    @if(count($grades) > 0)
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
                                        <td class="font2 body center">{{$grade->getStudent->name}}</td>
                                        <td class="font2 body center">{{$grade->getCourse->name}}</td>
                                        <td class="font2 body center">{{$grade->getCourse->getTeacher->name}}</td>
                                        <td class="font2 body center">{{$grade->grade}}</td>
                                        @if($grade->comment !== null)
                                            <td class="font2 body center">{{$grade->comment}}</td>
                                        @else
                                            <td class="font2 body center">N/A</td>
                                        @endif
                                        @if(Auth::User()->user_type == 2)
                                            <form action="/grades/{{$grade->id}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                                <td class="font2 body2 mytd">
                                                    <input class="btn" type="submit" value="Delete Comment">
                                                </td>
                                            </form>
                                        @endif
                                        @if(Auth::User()->user_type == 3)
                                            <form action="/grades/{{$grade->id}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                                <td class="font2 body2 mytd">
                                                    <input class="btn" type="submit" value="Delete Grade & Comment">
                                                </td>
                                            </form>
                                        @endif
                                    </tr>
                                </div>
                            @endforeach
                        </table>
                    @else
                        There are no comments to show!
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop