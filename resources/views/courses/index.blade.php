@extends('courses.layout')

@section('content')
<div class="pull-left">
    <h2>Courses App Using laravel</h2>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('courses.create') }}"> Create New Course </a>
        </div>
    </div>
</div>

@if($message = Session::get('success'))

    <div class="alert alert-success">
        <p>{{ $message}}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Sr.No.</th>
        <th>Course Name</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Comments</th>
        <th width="280px">Action</th>
    </tr>

    @foreach($courses as $course)
    <tr>
        <td>{{ $course->id}}</td>
        <td>{{ $course->course_name}}</td>
        <td>{{ $course->start_date}}</td>
        <td>{{ $course->end_date}}</td>
        <td>{{ $course->comments}}</td>
        <td>
            <form action="{{ route('courses.destroy',$course->id)}}" method="POST">

                <a class="btn btn-primary" href="{{ route('courses.show',$course->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('courses.edit',$course->id) }}">Edit</a>
                
                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@endsection