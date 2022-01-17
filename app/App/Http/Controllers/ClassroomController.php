<?php

namespace App\Http\Controllers;

use Domains\Course\Models\Level;
use Domains\Course\Models\Topic;
use Domains\Course\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Domains\Course\Models\UserCourse;
use Illuminate\Support\Facades\Route;
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
            'userCourses' => auth()->user()->courses->filter(fn ($course) => $course->paymentStatus() !== 'Pending Purchase'),
        ]);
    }

    public function show($course, $level, $topic)
    {
        $course = $this->courseRepository->getByColumn($course, 'slug');
        
        $level = $course->levels()->whereTitle($level)->first();

        $topic = $level->topics()->whereSlug($topic)->first();

        $userCourse = auth()->user()->courses()->where('course_id', $course->id)->first();

        if($userCourse->progress() == 0) {
            $userCourse->started_at = now();
            $userCourse->save();
        }

        if ($userCourse->progress() == 100) {
            $userCourse->finished_at = now();
            $userCourse->save();
        }

        $userCourse->userCompletedCourseTopics()->firstOrCreate(['topic_id' => $topic->id], [
            'time_visited' => now(),
            'is_current' => true
        ]);
        
        View::composer('partials.menus.classroom', function ($view) use($userCourse) {

            if (request('course') && Route::is('classroom.*')) {
                $view->with('userCourse', $userCourse);
            }
        });
        
        return view('classroom.show', [
            'course' => $course,
            'topic' => $topic,
            'level' => $level,
            'userCourse' => $userCourse
        ]);
    }
}
