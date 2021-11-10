<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use Domains\Course\Models\Level;
use Domains\Course\Models\Course;

class Levels extends Component
{
    public Course $course;

    public Level $level;

    public $showForm = false;

    public function mount()
    {
        $this->level = new Level;
    }

    public function toggleForm()
    {
        if ($this->showForm) {
            $this->showForm = false;
        } else {
            $this->showForm = true;
        }

        $this->level = new Level;
    }

    protected $rules = [
        'level.name' => 'required|string',
        'level.title' => 'required',
        'level.description' => 'required',
        'level.course_id' => 'required'
    ];

    public function save()
    {
        $this->level->course_id = $this->course->id;

        $this->validate();

        $this->level->save();

        $this->toggleForm();

        $this->course->load('levels');

        session()->flash('flash_success', 'Level added');
    }

    public function delete($id)
    {
        $level = Level::find($id);

        $level->delete();

        $this->course->load('levels');

        session()->flash('flash_success', 'Level deleted');
    }
    
    public function render()
    {
        return view('livewire.courses.levels', [
            'levels' => $this->course->levels->fresh()
        ]);
    }
}
