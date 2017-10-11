@extends('layout.master');
@section('content')
    @auth
        <section id="aboutUs">
            <div class="container">
                <div class="heading text-center">
                    <div class="container">
                        @if(isset($course)) {{--Checks if the variable "course" exists or not, enters if it exists--}}
                        {{--"course" exists, ence this is an edit to an already existing course--}}
                        <h1>Edit Course</h1>
                        <form class="form-horizontal" enctype="multipart/form-data" role="form"
                              action="/courses/{{$course->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            {{--<label for="name">Name</label>
                            <input id="name" type="text" name="name" value="{{$course->name}}">--}}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{$course->name}}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<label for="description">Description</label>
                            <input id="description" type="text" name="description" value="{{$course->description}}">--}}

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description"
                                           value="{{$course->description}}">

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<label for="duration">Duration</label>
                            <input id="duration" type="number" name="duration" value="{{$course->duration}}">--}}

                            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label for="duration" class="col-md-4 control-label">Duration</label>

                                <div class="col-md-6">
                                    <input id="duration" type="text" class="form-control" name="duration" {{--TODO: change when duration is changed to number--}}
                                           value="{{$course->duration}}">

                                    @if ($errors->has('duration'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<label for="start_date">Starting Date</label>
                            <input id="start_date" type="date" name="start_date" value="{{$course->start_date}}">--}}

                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-4 control-label">Duration</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control" name="start_date"
                                           value="{{$course->start_date}}">

                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<label for="teacher">Teacher</label>
                            <div>
                                <select id="teacher" name="teacher">
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>--}}

                            <div class="form-group{{ $errors->has('teacher') ? ' has-error' : '' }}">
                                <label for="teacher" class="col-md-4 control-label">Teacher</label>

                                <div class="col-md-6">
                                    <select id="teacher" class="form-control" name="teacher">
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach}}
                                    </select>
                                    @if ($errors->has('teacher'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('teacher') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <input class="btn_submit" type="submit" value="Update">
                        </form>
                        @else
                            {{--"course" does not exist, ence this is a creation of a new course--}}
                            <h1>Create Course</h1>
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" action="/courses"
                                  method="post">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}

                                <label for="name">Name</label>
                                <input id="name" type="text" name="name">

                                <label for="description">Description</label>
                                <input id="description" type="text" name="description">

                                <label for="duration">Duration</label>
                                <input id="duration" type="number" name="duration">

                                <label for="start_date">Starting Date</label>
                                <input id="start_date" type="date" name="start_date">

                                <label for="teacher">Teacher</label>
                                <div>
                                    <select id="teacher" name="teacher">
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input class="btn_submit" type="submit" value="Create">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endauth
@endsection