<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use Domains\Course\Models\Course;

class Costs extends Component
{
    public Course $course;

    public $showForm = false;
    public $confirming;

    public $partials;
    public $partialItems = [];
    public $partialItem = 0;

    public function toggleForm()
    {
        if ($this->showForm) {
            $this->showForm = false;
        } else {
            $this->showForm = true;
        }
    }

    public function mount()
    {
        if (filled($this->course->partial_payments)) {
            for($i = 1; $i <= count($this->course->partial_payments); $i++) {
                $this->partialItem = $i;
                array_push($this->partialItems, $i);
                $j = $i + 1;
                $this->partials[$j] = $this->course->partial_payments['partial_' . $i];
            }
        }
    }

    protected $rules = [
        'course.cost' => 'nullable',
        'course.allow_partial_payments' => 'nullable',
        'course.partial_payments_allowed' => 'nullable',
    ];

    public function addPartial($i)
    {
        $i += 1;
        $this->partialItem = $i;
        array_push($this->partialItems, $i);
    }

    public function removePartial($index)
    {
        unset($this->partialItems[$index]);
    }

    public function save()
    {
        $this->validate();

        if (! $this->course->allow_partial_payments) {
            $this->course->partial_payments_allowed = 0;
        }

        $this->course->partial_payments = collect($this->partials)->mapWithKeys(function ($partial, $key) {
            return [
                'partial_' . --$key => $partial,
            ];
        });
                

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
