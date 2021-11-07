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

    public function __invoke($course)
    {
        return view('courses.overview', [
            'course' => Course::whereSlug($course)->first()
        ]);
    }
}
