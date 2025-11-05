@extends('courses.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Course</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('courses.index') }}">Back to home page</a>
            </div>
        </div>
    </div>

    @if($errors->any())

    <div class="alert alert-danger">
        <strong>Warninng!</strong> There were some problems with your input.</br></br>

        <ul>
            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

    @endif

    <form action="{{ route('courses.update',$course->id) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Course Name:</strong>
                    <input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control" placeholder="Enter Course Name" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Start Date:</strong>
                    <input type="date" name="start_date" value="{{ $course->start_date }}" class="form-control" placeholder="Enter Start Date" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date" name="end_date" value="{{ $course->end_date }}" class="form-control" placeholder="Enter End Date" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comments:</strong>
                    <input type="text" name="comments" value="{{ $course->comments }}" class="form-control" placeholder="Enter Comments" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>


    </form>
@endsection