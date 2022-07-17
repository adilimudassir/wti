<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domains\Course\Models\Course;

class CourseStudentsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {
        return view('courses.students', [
            'course' => Course::whereSlug($slug)->first()
        ]);
    }
}
