@extends('layout.master');
@section('content')
    <section id="work" class="page-section page">
        <br/>
        <div class="container text-center">
            <br/><br/><br/><br/>
            <!-- Search Bar Starts -->
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="row row2">
                    <div class="col-sm-2">
                    </div>
                    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                    <div id="flipkart-navbar">
                        <div class="container">
                            <div class="row row1">
                            </div>
                            <div class="row row2">
                                <div class="col-sm-2">
                                </div>
                                <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                                    <div class="row">
                                        <input class="flipkart-navbar-input col-xs-11" type="text"
                                               placeholder="Search For Users by name..." name="search">
                                        <button class="flipkart-navbar-button col-xs-1">
                                            <svg width="15px" height="15px">
                                                <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="cart largenav col-sm-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="mySidenav" class="sidenav">
                    </div>
                </div>
            </form>
            <!-- Search Bar Ends -->
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
                    {{--<div class="container">--}}
                    @if(isset($details) and Auth::User()->user_type === 3)
                        {{--Create Teacher--}}
                        <form action="/users/create" method="post">
                            {{csrf_field()}}
                            {{method_field('GET')}}

                            <button type="submit" class="btn button">Create Teacher</button>
                        </form>
                        <table>
                            <tr class="table font">
                                <th>Pic</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Birth Date</th>
                                <th>Sex</th>
                                <th>Course</th>
                                <th>Schooling</th>
                                <th>Role</th>
                            </tr>
                            @foreach($details as $usersAdmin)
                                <div id="portfolio">
                                    <tr class="table">
                                        <td class="font2 body center"><img src="{{'uploads/' . $usersAdmin->picture}}"
                                                                           alt=""
                                                                           border=3 height=100 width=100></td>
                                        <td class="font2 body center">{{$usersAdmin->name}}</td>
                                        <td class="font2 body center">{{$usersAdmin->email}}</td>
                                        <td class="font2 body center">{{$usersAdmin->birth_date}}</td>
                                        <td class="font2 body center">{{$usersAdmin->sex}}</td>
                                        @if($usersAdmin->getCourse['name'] === null)
                                            <td class="font2 body center">N/A</td>
                                        @else
                                            <td class="font2 body center">{{$usersAdmin->getCourse['name']}}</td>
                                        @endif
                                        <td class="font2 body center">{{$usersAdmin->getSchooling->description}}</td>
                                        <td class="font2 body center">{{$usersAdmin->getUserType->name}}</td>
                                        @if($usersAdmin->user_type == 1 || $usersAdmin->user_type == 2)
                                            {{--Delete--}}
                                            <form action="/users/{{$usersAdmin->id}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                                <input type="hidden" name="users" value="{{$usersAdmin->id}}">
                                                <td class="font2 body2 mytd">
                                                    <input class="btn" type="submit" value="Delete">
                                                </td>
                                            </form>
                                        @endif
                                    </tr>
                                </div>
                            @endforeach
                        </table>
                    @elseif(isset($details) and Auth::User()->user_type === 2)
                        <table>
                            <tr class="table">
                                <th class="font">Pic</th>
                                <th class="font">Name</th>
                                <th class="font">Email</th>
                                <th class="font">Birth Date</th>
                                <th class="font">Sex</th>
                                <th class="font">Course</th>
                                <th class="font">Schooling</th>
                                <th class="font">Role</th>
                            </tr>
                            @foreach($details as $usersTeacher)
                                @if ($usersTeacher->course_id === Auth::User()->getCourse->id and $usersTeacher->user_type === 1)
                                    <div id="portfolio">
                                        <tr class="table">
                                            <td class="font2 body center"><img
                                                        src="{{'uploads/' . $usersTeacher->picture}}" alt="" border=3
                                                        height=100 width=100></img></td>
                                            <td class="font2 body center">{{$usersTeacher->name}}</td>
                                            <td class="font2 body center">{{$usersTeacher->email}}</td>
                                            <td class="font2 body center">{{$usersTeacher->birth_date}}</td>
                                            <td class="font2 body center">{{$usersTeacher->sex}}</td>
                                            @if($usersTeacher->getCourse['name'] === null)
                                                <td class="font2 body center">N/A</td>
                                            @else
                                                <td class="font2 body center">{{$usersTeacher->getCourse['name']}}</td>
                                            @endif
                                            <td class="font2 body center">{{$usersTeacher->getSchooling->description}}</td>
                                            @php($count = 0)
                                            @foreach($usersTeacher->getGrade as $grade)
                                                @if($grade->course_id == Auth::User()->getCourse->id and $grade->grade !== null)
                                                    @php($count = 1)
                                                @endif
                                            @endforeach
                                            @if($count == 0)
                                                <td class="font2 body center">N/A</td>
                                                <div class="input-group">
                                                    <form action="/grades" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('POST') }}
                                                        <input type="hidden" name="user_id"
                                                               value="{{$usersTeacher->id}}">
                                                        <td class="font2 body2 center">
                                                            <input style="color: black; width: 80%" type="number"
                                                                   name="grade" min="0" max="20">
                                                            <input style="margin-top: 15%" class="btn" type="submit"
                                                                   value="Evaluate">
                                                        </td>
                                                    </form>
                                                </div>
                                            @else
                                                <td class="font2 body center">{{$grade->grade}}</td>
                                            @endif
                                        </tr>
                                    </div>
                                @endif
                            @endforeach
                        </table>
                    @elseif(isset($details) and Auth::User()->user_type === 1)
                        <script>window.location.href = "http://localhost:8000/users_no_permission_error";</script>
                    @elseif(!isset($details) and Auth::User()->user_type === 3)
                        @if($usersAdmin->count() > 0)
                            {{--Create Teacher--}}
                            <form action="/users/create" method="post">
                                {{csrf_field()}}
                                {{method_field('GET')}}

                                <button type="submit" class="btn button">Create Teacher</button>
                            </form>
                            <table>
                                <tr class="table">
                                    <th class="font">Pic</th>
                                    <th class="font">Name</th>
                                    <th class="font">Email</th>
                                    <th class="font">Birth Date</th>
                                    <th class="font">Sex</th>
                                    <th class="font">Course</th>
                                    <th class="font">Schooling</th>
                                    <th class="font">Role</th>
                                </tr>
                                @endif
                                @foreach($usersAdmin as $user)
                                    <div id="portfolio">
                                        <tr>
                                            <td class="font2 body center"><img class="img"
                                                                               src="{{'uploads/' . $user->picture}}"
                                                                               alt=""></td>
                                            <td class="font2 body center">{{$user->name}}</td>
                                            <td class="font2 body center">{{$user->email}}</td>
                                            <td class="font2 body center">{{$user->birth_date}}</td>
                                            <td class="font2 body center">{{$user->sex}}</td>
                                            @if($user->getCourse['name'] === null)
                                                <td class="font2 body center">N/A</td>
                                            @else
                                                <td class="font2 body center">{{$user->getCourse['name']}}</td>
                                            @endif
                                            <td class="font2 body center">{{$user->getSchooling->description}}</td>
                                            <td class="font2 body center">{{$user->getUserType->name}}</td>
                                            @if($user->user_type == 1 && Count(\App\Grade::where([['user_id','=',$user->id],['','!=',null]])->get()) == 0)
                                                {{--TODO: finish this, edit grade--}}
                                            @endif
                                            @if($user->user_type == 1 || $user->user_type == 2)
                                                {{--Delete--}}
                                                <form action="/users/{{$user->id}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                    <input type="hidden" name="users" value="{{$user->id}}">
                                                    <td class="font2 body2">
                                                        <input class="btn" type="submit" value="Delete">
                                                    </td>
                                                </form>
                                            @endif
                                        </tr>
                                    </div>
                                @endforeach
                            </table>
                            <br>
                            @if($usersAdmin->count() > 0)
                                <div>{{ $usersAdmin->links() }}</div>
                            @else
                                <p>User doesn't exist!</p>
                            @endif
                        @elseif(!isset($details) and Auth::User()->user_type === 2)
                            @if($usersTeacher->count() > 0)
                                <table>
                                    <tr class="table">
                                        <th class="font">Pic</th>
                                        <th class="font">Name</th>
                                        <th class="font">Email</th>
                                        <th class="font">Birth Date</th>
                                        <th class="font">Sex</th>
                                        <th class="font">Course</th>
                                        <th class="font">Schooling</th>
                                        <th class="font">Grade</th>
                                    </tr>
                                    @endif
                                    @foreach($usersTeacher as $user)
                                        @if ($user->course_id === Auth::User()->getCourse->id and $user->user_type === 1)
                                            <div id="portfolio">
                                                <tr class="table">
                                                    <td class="font2 body center"><img
                                                                src="{{'uploads/' . $user->picture}}" alt="" border=3
                                                                height="100" width="100"></img></td>
                                                    <td class="font2 body center">{{$user->name}}</td>
                                                    <td class="font2 body center">{{$user->email}}</td>
                                                    <td class="font2 body center">{{$user->birth_date}}</td>
                                                    <td class="font2 body center">{{$user->sex}}</td>
                                                    @if($user->getCourse['name'] === null)
                                                        <td class="font2 body center">N/A</td>
                                                    @else
                                                        <td class="font2 body center">{{$user->getCourse['name']}}</td>
                                                    @endif
                                                    <td class="font2 body center">{{$user->getSchooling->description}}</td>
                                                    @php($count = 0)
                                                    @foreach($user->getGrade as $grade)
                                                        @if($grade->course_id == Auth::User()->getCourse->id and $grade->grade !== null)
                                                            @php($count = 1)
                                                        @endif
                                                    @endforeach
                                                    @if($count == 0)
                                                        <td class="font2 body center">N/A</td>
                                                        <div class="input-group">
                                                            <form action="/grades" method="post">
                                                                {{ csrf_field() }}
                                                                {{ method_field('POST') }}
                                                                <input type="hidden" name="user_id"
                                                                       value="{{$user->id}}">
                                                                <td class="font2 body2 center">
                                                                    <input style="color: black; width: 80%"
                                                                           type="number" name="grade" min="0" max="20">
                                                                    <input style="margin-top: 15%" class="btn"
                                                                           type="submit" value="Evaluate">
                                                                </td>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <td class="font2 body center">{{$grade->grade}}</td>
                                                    @endif
                                                </tr>
                                            </div>
                                        @endif
                                    @endforeach
                                </table>
                                <br>
                                @if($usersTeacher->count() > 0)
                                    <div>{{ $usersTeacher->links() }}</div>
                                @else
                                    <p>User doesn't exist!</p>
                                @endif
                            @elseif(!isset($details) and Auth::User()->user_type === 1)
                                <script>window.location.href = "http://localhost:8000/users_no_permission_error";</script>
                </div>
                @endif
            </div>
        </div>
        </div>
    </section>
@stop