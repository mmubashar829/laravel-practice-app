<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
echo 'request got into controller to decide related action<br>';
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $environment = App::environment();
        $value = Config::get('app.timezone', 'default');
        Log::error(['use of env variable', env('DB_DATABASE', 'default'), $environment, $value]);
        echo 'request got into action and performing logic building related to request<br>';
        $courses = Course::latest()->paginate(5);
        echo 'end request with returing response<br>';
        return view('courses.index',compact('courses'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'comments'=>'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')
        ->with('success','Courses created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'comments'=>'required',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
        ->with('success','Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
        ->with('success','Course deleted successfully.');
    }
}
