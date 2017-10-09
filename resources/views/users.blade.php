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
            <div class="container">
                @if(isset($details) and Auth::User()->getUserType->name === 'Admin')
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>Sample User details</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Picture:</th>
                            <th>Name:</th>
                            <th>Email:</th>
                            <th>Birth Date:</th>
                            <th>Sex:</th>
                            <th>Course:</th>
                            <th>Schooling:</th>
                            <th>Role:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $usersAdmin)
                            <tr>
                                <td><img src="{{'uploads/' . $usersAdmin->picture}}" alt="" border=3  height=100 width=100></img></td>
                                <td>{{$usersAdmin->name}}</td>
                                <td>{{$usersAdmin->email}}</td>
                                <td>{{$usersAdmin->birth_date}}</td>
                                <td>{{$usersAdmin->sex}}</td>
                                <td>{{$usersAdmin->getCourse['name']}}</td>
                                <td>{{$usersAdmin->getSchooling->description}}</td>
                                <td>{{$usersAdmin->getUserType->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @elseif(isset($details) and Auth::User()->getUserType->name === 'Teacher')
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>Sample User details</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Picture:</th>
                            <th>Name:</th>
                            <th>Email:</th>
                            <th>Birth Date:</th>
                            <th>Sex:</th>
                            <th>Course:</th>
                            <th>Schooling:</th>
                            <th>Role:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $usersTeacher)
                            @if ($usersTeacher->course_id === Auth::User()->getCourse->id and $usersTeacher->user_type === 1)
                                <div id="portfolio">
                                    <tr>
                                        <td><img src="{{'uploads/' . $usersTeacher->picture}}" alt="" border=3  height=100 width=100></img></td>
                                        <td>{{$usersTeacher->name}}</td>
                                        <td>{{$usersTeacher->email}}</td>
                                        <td>{{$usersTeacher->birth_date}}</td>
                                        <td>{{$usersTeacher->sex}}</td>
                                        <td>{{$usersTeacher->getCourse['name']}}</td>
                                        <td>{{$usersTeacher->getSchooling->description}}</td>
                                        <td>{{$usersTeacher->getUserType->name}}</td>
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
                            <th>Picture:</th>
                            <th>Name:</th>
                            <th>Email:</th>
                            <th>Birth Date:</th>
                            <th>Sex:</th>
                            <th>Course:</th>
                            <th>Schooling:</th>
                            <th>Role:</th>
                        </tr>
                        @foreach($usersAdmin as $user)
                            <div id="portfolio">
                                <tr>
                                    <td><img src="{{'uploads/' . $user->picture}}" alt="" border=3  height=100 width=100></img></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->birth_date}}</td>
                                    <td>{{$user->sex}}</td>
                                    @if($user->getCourse['name'] === null)
                                    <td>There are no courses available to show!</td>
                                    @else
                                    <td>{{$user->getCourse['name']}}</td>
                                    @endif
                                    <td>{{$user->getSchooling->description}}</td>
                                    <td>{{$user->getUserType->name}}</td>
                                </tr>
                            </div>
                        @endforeach
                    </table>
                    <br>
                    <div>{{ $usersAdmin->links() }}</div>
                    @elseif(!isset($details) and Auth::User()->getUserType->name === 'Teacher')
                    <table>
                        <tr class="table">
                            <th>Picture:</th>
                            <th>Name:</th>
                            <th>Email:</th>
                            <th>Birth Date:</th>
                            <th>Sex:</th>
                            <th>Course:</th>
                            <th>Schooling:</th>
                            <th>Role:</th>
                        </tr>
                        @foreach($usersTeacher as $user)
                                @if ($user->course_id === Auth::User()->getCourse->id and $user->user_type === 1)
                                    <div id="portfolio">
                                        <tr>
                                            <td><img src="{{'uploads/' . $user->picture}}" alt="" border=3  height=100 width=100></img></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->birth_date}}</td>
                                            <td>{{$user->sex}}</td>
                                            <td>{{$user->getCourse['name']}}</td>
                                            <td>{{$user->getSchooling->description}}</td>
                                            <td>{{$user->getUserType->name}}</td>
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