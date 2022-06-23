<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Domains\Course\Models\UserCourse;

class ViewCourse extends Component
{
    public UserCourse $userCourse;

    public function render()
    {
        return view('livewire.user.view-course', [

        ]);
    }
}
