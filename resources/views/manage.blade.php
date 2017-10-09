@extends('layout.master');
@section('content')
    @auth
    <section id="aboutUs">
        <div class="container">
            <div class="heading text-center">
                <div class="container">
                    <h1>Edit Profile</h1>
                    <hr>
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" action="/users/{{Auth::user()->id}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-3 {{ $errors->has('picture') ? ' has-error' : '' }}">
                            <div class="text-center">
                                <img src="{{('uploads/') . Auth::user()->picture}}" width="200" height="200" class="avatar img-circle" alt="avatar">
                                <h6>Upload a different photo...</h6>
                                <input type="file" name="picture" value="" class="form-control">
                                @if ($errors->has('picture'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- edit form column -->
                        <div class="col-md-9 personal-info">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-lg-3 control-label">Name</label>
                                <div class="col-lg-8">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ auth::User()->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="email" type="text" value="{{ auth::User()->email }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label">Password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="password" type="text" value="">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                                <label for="birthDate" class="col-lg-3 control-label">Birth Date</label>
                                <div class="col-md-8">
                                    <input id="birthDate" type="date" class="form-control" name="birthDate"
                                           value="{{auth::User()->birth_date}}" required autofocus>

                                    @if ($errors->has('birthDate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-primary" value="Save Changes">
                                        <span></span>
                                        <input type="reset" class="btn btn-default" value="Cancel">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
    </section>
    @endauth
@stop