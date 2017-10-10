@extends('layout.master');
@section('content')
<section id="work" class="page-section page">
<div class="container text-center">
    <div class="heading">
        <h2>Our Users</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quos ab.</p>
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
            {{--<div class="container">--}}
                @if(isset($details) and Auth::User()->getUserType->name === 'Admin')
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>Sample User details</h2>
                    <table>
                        <tr class="table">
                            <th class="font">Picture:</th>
                            <th class="font">Name:</th>
                            <th class="font">Email:</th>
                            <th class="font">Birth Date:</th>
                            <th class="font">Sex:</th>
                            <th class="font">Course:</th>
                            <th class="font">Schooling:</th>
                            <th class="font">Role:</th>
                        </tr>
                        @foreach($details as $usersAdmin)
                            <tr class="table">
                                <td class="font2 body"><img src="{{'uploads/' . $usersAdmin->picture}}" alt="" border=3  height=100 width=100></img></td>
                                <td class="font2 body">{{$usersAdmin->name}}</td>
                                <td class="font2 body">{{$usersAdmin->email}}</td>
                                <td class="font2 body">{{$usersAdmin->birth_date}}</td>
                                <td class="font2 body">{{$usersAdmin->sex}}</td>
                                <td class="font2 body">{{$usersAdmin->getCourse['name']}}</td>
                                <td class="font2 body">{{$usersAdmin->getSchooling->description}}</td>
                                <td class="font2 body">{{$usersAdmin->getUserType->name}}</td>
                            </tr>
                        @endforeach
                    </table>
                @elseif(isset($details) and Auth::User()->getUserType->name === 'Teacher')
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>Sample User details</h2>
                    <table class="table table-striped">
                        <tr class="table">
                            <th class="font">Picture:</th>
                            <th class="font">Name:</th>
                            <th class="font">Email:</th>
                            <th class="font">Birth Date:</th>
                            <th class="font">Sex:</th>
                            <th class="font">Course:</th>
                            <th class="font">Schooling:</th>
                            <th class="font">Role:</th>
                        </tr>
                        @foreach($details as $usersTeacher)
                            @if ($usersTeacher->course_id === Auth::User()->getCourse->id and $usersTeacher->user_type === 1)
                                <div id="portfolio">
                                    <tr class="table">
                                        <td class="font2 body"><img src="{{'uploads/' . $usersTeacher->picture}}" alt="" border=3  height=100 width=100></img></td>
                                        <td class="font2 body">{{$usersTeacher->name}}</td>
                                        <td class="font2 body">{{$usersTeacher->email}}</td>
                                        <td class="font2 body">{{$usersTeacher->birth_date}}</td>
                                        <td class="font2 body">{{$usersTeacher->sex}}</td>
                                        <td class="font2 body">{{$usersTeacher->getCourse['name']}}</td>
                                        <td class="font2 body">{{$usersTeacher->getSchooling->description}}</td>
                                        <td class="font2 body">{{$usersTeacher->getUserType->name}}</td>
                                    </tr>
                                </div>
                                @endif
                        @endforeach
                        </tbody>
                    </table>
                @elseif(isset($details) and Auth::User()->getUserType->name === 'Student')
                    <script>window.location.href = "http://localhost:8000/users_no_permission_error";</script>
                @elseif(!isset($details) and Auth::User()->getUserType->name === 'Admin')
                    <table>
                        <tr class="table">
                            <th class="font">Picture:</th>
                            <th class="font">Name:</th>
                            <th class="font">Email:</th>
                            <th class="font">Birth Date:</th>
                            <th class="font">Sex:</th>
                            <th class="font">Course:</th>
                            <th class="font">Schooling:</th>
                            <th class="font">Role:</th>
                        </tr>
                        @foreach($usersAdmin as $user)
                            <div id="portfolio">
                                <tr>
                                    <td class="font2 body"><img class="img" src="{{'uploads/' . $user->picture}}" alt="" ></img></td>
                                    <td class="font2 body">{{$user->name}}</td>
                                    <td class="font2 body">{{$user->email}}</td>
                                    <td class="font2 body">{{$user->birth_date}}</td>
                                    <td class="font2 body">{{$user->sex}}</td>
                                    @if($user->getCourse['name'] === null)
                                    <td class="font2 body">There are no courses available to show!</td>
                                    @else
                                    <td class="font2 body">{{$user->getCourse['name']}}</td>
                                    @endif
                                    <td class="font2 body">{{$user->getSchooling->description}}</td>
                                    <td class="font2 body">{{$user->getUserType->name}}</td>
                                </tr>
                            </div>
                        @endforeach
                    </table>
                    <br>
                    <div>{{ $usersAdmin->links() }}</div>
                    @elseif(!isset($details) and Auth::User()->getUserType->name === 'Teacher')
                    <table>
                        <tr class="table">
                            <th class="font">Picture:</th>
                            <th class="font">Name:</th>
                            <th class="font">Email:</th>
                            <th class="font">Birth Date:</th>
                            <th class="font">Sex:</th>
                            <th class="font">Course:</th>
                            <th class="font">Schooling:</th>
                            <th class="font">Role:</th>
                        </tr>
                        @foreach($usersTeacher as $user)
                                @if ($user->course_id === Auth::User()->getCourse->id and $user->user_type === 1)
                                    <div id="portfolio">
                                        <tr class="table">
                                            <td class="font2 body"><img src="{{'uploads/' . $user->picture}}" alt="" border=3  height="100" width="100"></img></td>
                                            <td class="font2 body">{{$user->name}}</td>
                                            <td class="font2 body">{{$user->email}}</td>
                                            <td class="font2 body">{{$user->birth_date}}</td>
                                            <td class="font2 body">{{$user->sex}}</td>
                                            <td class="font2 body">{{$user->getCourse['name']}}</td>
                                            <td class="font2 body">{{$user->getSchooling->description}}</td>
                                            <td class="font2 body">{{$user->getUserType->name}}</td>
                                        </tr>
                                    </div>
                                @endif
                        @endforeach
                    </table>
                    <br>
                    <div>{{ $usersTeacher->links() }}</div>
                @elseif(!isset($details) and Auth::User()->getUserType->name === 'Student')
                    <script>window.location.href = "http://localhost:8000/users_no_permission_error";</script>
            </div>
                @endif
        </div>
    </div>
</div>
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" width="100px" class="form-control" name="search"
                   placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
        </div>
    </form>
        </div>
    </div>
</div>
</section>
@stop