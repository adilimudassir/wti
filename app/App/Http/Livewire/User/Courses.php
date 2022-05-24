<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Domains\Auth\Models\User;
use Domains\Course\Models\Course;
use Domains\Course\Models\UserCourse;

class Courses extends Component
{
    public User $user;

    public UserCourse $userCourse;

    public $joinCourse = false;

    protected $rules = [
        'userCourse.batch_id' => 'required'
    ];

    protected $messages = [
        'userCourse.batch_id.required' => 'Please select training batch',
    ];


    public function toggleJoin()
    {
        if ($this->joinCourse) {
            $this->joinCourse = false;
        } else {
            $this->joinCourse = true;
        }

        $this->userCourse = new UserCourse;
    }

    /**
     * Join a course
     */
    public function joinCourse($id)
    {
        $this->validate();
        
        $this->userCourse->user_id = $this->user->id;
        $this->userCourse->course_id = $id;
        $this->userCourse->save();
        $this->user->givePermissionTo('create-payments');

        $this->toggleJoin();

        $this->user->load('courses');

        alert()->success('Course Joined');
    }

    public function render()
    {
        return view('livewire.user.courses', [
            'userCourses' => $this->user->courses->fresh(),
            'courses' => Course::whereNotIn('id', $this->user->courses->pluck('course_id'))
                ->where('is_active', true)->get()
        ]);
    }
}
