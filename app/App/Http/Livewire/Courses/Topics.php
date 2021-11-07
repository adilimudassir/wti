<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use Domains\Course\Models\Topic;
use Domains\Course\Models\Course;

class Topics extends Component
{
    public Course $course;

    public Topic $topicModel;

    public $level = '100';

    public function mount()
    {
        $this->topicModel = new Topic();
    }
    
    public function render()
    {
        return view('livewire.courses.topics', [
            'topics' => $this->course->topics()->where('levels.name', $this->level)->get(),
            'levels' => $this->course->levels
        ]);
    }
}
