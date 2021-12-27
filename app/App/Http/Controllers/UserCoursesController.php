<?php

namespace App\Http\Controllers;

use Domains\Course\Repositories\CourseRepository;

class UserCoursesController extends Controller
{
    /**
     * create an instance of the class
     */
    public function __construct(private CourseRepository $courseRepository)
    {
    }

    public function index()
    {
        return view('user-courses.index', [
            // 'userCourses' => auth()->user()->courses,
        ]);
    }

    public function show($course)
    {
        $course = $this->courseRepository->getByColumn($course, 'slug');

        $userCourse = auth()->user()->courses()->where('course_id', $course->id)->firstOrFail();

        return view('user-courses.show', [
            'userCourse' => $userCourse
        ]);
    }
}
