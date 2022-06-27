<?php

namespace App\Http\Controllers;

use Spatie\Html\Elements\Element;
use Illuminate\Support\Facades\View;
use App\ViewModels\ClassroomViewModel;
use App\ViewModels\ClassSchedulesViewModel;
use Domains\Course\Repositories\CourseRepository;

class ClassroomController extends Controller
{
    /**
     * create an instance of the class
     */
    public function __construct(private CourseRepository $courseRepository)
    {
        $this->middleware('classroom');
    }

    public function index()
    {
        return view('classroom.index', new ClassSchedulesViewModel());
    }

    public function show($course, $level, $topic)
    {
        $classroomViewModel = new ClassroomViewModel(
            $this->courseRepository,
            $course,
            $level,
            $topic
        );

        if (!$classroomViewModel->batchOngoing()) {
            alert()->info('Class has Not started yet');
            return redirect()->route('classroom.index');
        }
        
        if ($classroomViewModel->isLectureDay()) {
            alert()->html(
                "<h1>Hello, " . auth()->user()->name . "</h1>",
                "Welcome to today's class. <br> Today's lecture promises to be more interesting one. <br> <h3>Enjoy!</h3>",
                'info'
            );
        } else {
            alert()->html(
                "<h1>Hello, " . auth()->user()->name . "</h1>",
                "Welcome to the classroom. <br> There will not be any new lecture today. But you can go ahead and review the previous lectures <br> <h3>Enjoy!</h3>",
                'info'
            );
        }

        if (! $classroomViewModel->hasMoreTopicsForTheDay()) {
            alert()->html(
                "<h1>Oh hey, " . auth()->user()->name . "</h1>",
                "It seem you have already taken enough lectures for the day. Give it a rest already<br> <h3>See you tomorrow!</h3>",
                'info'
            );
        }

        $classroomViewModel->changeCurrentTopic();

        View::composer('partials.menus.classroom', function ($view) use ($classroomViewModel) {
            $view
                ->with('userCourse', $classroomViewModel->userCourse())
                ->with('level', $classroomViewModel->level())
                ->with('availableTopics', $classroomViewModel->availableTopics());
        });

        return view('classroom.show', $classroomViewModel);
    }
}
