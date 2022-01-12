<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use Domains\Course\Models\Level;
use Domains\Course\Models\Course;

class Costs extends Component
{
    public Course $course;

    public $showForm = false, $confirming;

    public function toggleForm()
    {
        if ($this->showForm) {
            $this->showForm = false;
        } else {
            $this->showForm = true;
        }
    }

    protected $rules = [
        'course.cost' => 'nullable',
        'course.allow_partial_payments' => 'nullable',
        'course.partial_payments_allowed' => 'nullable',
    ];

    public function save()
    {

        $this->validate();

        if(! $this->course->allow_partial_payments) {
            $this->course->partial_payments_allowed = 0;
        }

        $this->course->save();

        $this->toggleForm();

        alert()->success('Payment Information Updated')->toToast();
    }

    public function render()
    {
        return view('livewire.courses.costs', [
        ]);
    }
}
