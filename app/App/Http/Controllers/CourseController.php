<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domains\Course\Models\Course;

class CourseController extends Controller
{
    /**
     * Create an instance of the class
     *
     * @void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($course)
    {
        return view('courses.overview', [
            'course' => Course::whereSlug($course)->first()
        ]);
    }

    public function edit($slug)
    {
        return view('courses.edit', [
            'course' => Course::whereSlug($slug)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->update($request->all());
        alert()->success('Course Information Updated')->toToast();
        return redirect()->route('courses.overview', $course->slug);
    }
}
