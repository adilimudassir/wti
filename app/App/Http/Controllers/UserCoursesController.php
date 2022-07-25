<?php

namespace App\Http\Controllers;

use Domains\Course\Models\UserCourse;
use Domains\Course\Repositories\CourseRepository;

class UserCoursesController extends Controller
{
    /**
     * create an instance of the class
     */
    public function __construct(private CourseRepository $courseRepository)
    {
        $this->middleware('auth');
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

        $userCourse = UserCourse::query()
            ->where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->firstOrFail();

        return view('user-courses.show', [
            'userCourse' => $userCourse
        ]);
    }
}
