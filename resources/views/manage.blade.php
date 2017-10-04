@extends('layout.master');
@section('content')
    <section id="aboutUs">
        <div class="container">
            <div class="heading text-center">
                <div class="container">
                    <h1>Edit Profile</h1>
                    <hr>
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-3">
                            <div class="text-center">
                                <img src="{{('uploads/') . Auth::user()->picture}}" class="avatar img-circle" alt="avatar">
                                <h6>Upload a different photo...</h6>
                                <input type="file" name="picture" class="form-control">
                            </div>
                        </div>

                        <!-- edit form column -->
                        <div class="col-md-9 personal-info">
                            <form class="form-horizontal" role="form" action="/users/{{Auth::user()->id}}" method="post">>
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Name:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="name" type="text" value="{{ auth::User()->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="email" type="text" value="{{ auth::User()->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="password" type="password" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">BirthDate:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="birth_date" type="date" value="{{auth::User()->birth_date}}">
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
@stop