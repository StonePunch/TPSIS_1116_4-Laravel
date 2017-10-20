<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/btn.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css"/>
</head>
@auth
    <div class="container">
        <div class="heading text-center">
            <div class="container">
                @if(isset($course)) {{--Checks if the variable "course" exists or not, enters if it exists--}}
                {{--"course" exists, once this is an edit to an already existing course--}}
                <h1 style="color: black; margin-top: 5%; margin-bottom: 3%">Edit Course</h1>
                <form class="form-horizontal" enctype="multipart/form-data" role="form"
                      action="/courses/{{$course->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label style="color: black" for="name" class="col-md-4 control-label">Name</label>

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

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label style="color: black" for="description" class="col-md-4 control-label">Description</label>

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

                    <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                        <label style="color: black" for="duration" class="col-md-4 control-label">Duration</label>

                        <div class="col-md-6">
                            <input id="duration" type="number" class="form-control" name="duration"
                                   value="{{$course->duration}}">

                            @if ($errors->has('duration'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                        <label style="color: black" for="start_date" class="col-md-4 control-label">Duration</label>

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

                    <div class="form-group{{ $errors->has('teacher') ? ' has-error' : '' }}">
                        <label style="color: black" for="teacher" class="col-md-4 control-label">Teacher</label>

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

                    <input style="background-color: gold; color: black; margin-top: 1%; width: 100px; font-size: 16px"
                           class="btn button" type="submit" value="Update">
                </form>
                @else
                    {{--"course" does not exist, ence this is a creation of a new course--}}
                    <h1 style="color: black; margin-top: 5%; margin-bottom: 3%">Create Course</h1>
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" action="/courses"
                          method="post">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label style="color: black" for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label style="color: black" for="description"
                                   class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label style="color: black" for="duration" class="col-md-4 control-label">Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" class="form-control" name="duration">

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label style="color: black" for="start_date" class="col-md-4 control-label">Start
                                Date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date">

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('teacher') ? ' has-error' : '' }}">
                            <label style="color: black" for="teacher" class="col-md-4 control-label">Teacher</label>

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
                        <input style="background-color: gold; color: black; margin-top: 1%; width: 100px; font-size: 16px"
                               class="btn button" type="submit" value="Create">
                    </form>
                    </body>
                @endif

            </div>
        </div>
    </div>
    </section>
@endauth
