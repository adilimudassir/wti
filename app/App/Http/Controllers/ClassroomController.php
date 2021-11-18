<?php

namespace App\Http\Controllers;

use Domains\Course\Models\Level;
use Domains\Course\Models\Topic;
use Domains\Course\Models\Course;
use Domains\Course\Repositories\CourseRepository;

class ClassroomController extends Controller
{
    /**
     * create an instance of the class
     */
    public function __construct(private CourseRepository $courseRepository)
    {}

    public function index()
    {
        return view('classroom.index', [
            'courses' => $this->courseRepository->all()
        ]);
    }

    public function show($course, $level, $topic)
    {
        $course = $this->courseRepository->getByColumn($course, 'slug');
        
        $level = $course->levels()->whereTitle($level)->first();

        $topic = $level->topics()->whereSlug($topic)->first();
        
        return view('classroom.show', [
            'course' => $course,
            'topic' => $topic,
            'level' => $level
        ]);
    }
}
