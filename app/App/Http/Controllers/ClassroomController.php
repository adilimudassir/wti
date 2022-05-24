<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\ViewModels\ClassroomViewModel;
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
        return view('classroom.index', []);
    }

    public function show($course, $level, $topic)
    {
        $viewModel = new ClassroomViewModel(
            $this->courseRepository,
            $course,
            $level,
            $topic
        );

        if (request('course') && Route::is('classroom.*')) {
            View::composer('partials.menus.classroom', function ($view) use ($viewModel) {
                $view
                    ->with('userCourse', $viewModel->userCourse())
                    ->with('level', $viewModel->level())
                    ->with('availableTopics', $viewModel->availableTopics());
            });
        }

        
        return view('classroom.show', $viewModel);
    }
}
