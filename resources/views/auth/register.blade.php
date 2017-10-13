@extends('layout.forms')
@section('content')
    <body background="images/banner-bg3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div style="font-size: 18px" class="panel-heading">Register</div>
                    <div class="panel-body">
                        {{--Create a teacher as a admin--}}
                        @auth
                            @if(Auth::User()->user_type )
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                  action="/users">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                                    <label for="birthDate" class="col-md-4 control-label">Birth Date</label>

                                    <div class="col-md-6">
                                        <input id="birthDate" type="date" class="form-control" name="birthDate"
                                               value="{{ old('birthDate') }}" required autofocus>

                                        @if ($errors->has('birthDate'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('schooling') ? ' has-error' : '' }}">
                                    <label for="schooling" class="col-md-4 control-label">Schooling</label>

                                    <div class="col-md-6">
                                        <select id="schooling" class="form-control" name="schooling">
                                            @foreach($schoolings as $schooling)
                                                <option value="{{$schooling->id}}">{{$schooling->description}}</option>
                                            @endforeach}}
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                    <label for="gender" class="col-md-4 control-label">Gender</label>

                                    <div class="col-md-6">
                                        <select id="sex" class="form-control" name="sex">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                                    <label for="picture" class="col-md-4 control-label">Picture</label>

                                    <div class="col-md-6">
                                        <input id="picture" type="file" class="form-control" name="picture" autofocus>

                                        @if ($errors->has('picture'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        @endauth
                        {{--Create a student as a guest--}}
                        @guest
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                              action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label style="color: black" for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                                <label style="color: black" for="birthDate" class="col-md-4 control-label">Birth Date</label>

                                <div class="col-md-6">
                                    <input id="birthDate" type="date" class="form-control" name="birthDate"
                                           value="{{ old('birthDate') }}" required autofocus>

                                    @if ($errors->has('birthDate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label style="color: black" for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('schooling') ? ' has-error' : '' }}">
                                <label style="color: black" for="schooling" class="col-md-4 control-label">Schooling</label>

                                <div class="col-md-6">
                                    <select id="schooling" class="form-control" name="schooling">
                                        @foreach($schooling as $schooling)
                                            <option value="{{$schooling->id}}">{{$schooling->description}}</option>
                                        @endforeach}}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                <label style="color: black" for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <select id="sex" class="form-control" name="sex">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                                <label style="color: black" for="picture" class="col-md-4 control-label">Picture</label>

                                <div class="col-md-6">
                                    <input id="picture" type="file" class="form-control" name="picture" autofocus>

                                    @if ($errors->has('picture'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label style="color: black" for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="color: black" for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary registry">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
