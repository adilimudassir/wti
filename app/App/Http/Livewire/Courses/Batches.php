<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use Domains\Course\Models\Batch;
use Domains\Course\Models\Course;

class Batches extends Component
{
    public Course $course;

    public Batch $batch;

    public $showForm = false;
    public $confirming;
    public $start_date;
    public $end_date;

    public function mount()
    {
        $this->batch = new Batch();

        $this->start_date = now()->toDateString();
        $this->end_date = now()->addMonth(3)->toDateString();
    }

    public function toggleForm()
    {
        if ($this->showForm) {
            $this->showForm = false;
        } else {
            $this->showForm = true;
        }

        $this->batch = new Batch();
        $this->start_date = now()->toDateString();
        $this->end_date = now()->addMonth(3)->toDateString();
    }

    protected $rules = [
        'batch.name' => 'required',
        'start_date' => 'date|required',
        'end_date' => 'date|required',
        'batch.active' => 'required'
    ];

    public function save()
    {
        $this->batch->course_id = $this->course->id;
        $this->batch->start_date = $this->start_date;
        $this->batch->end_date = $this->end_date;

        $this->validate();

        if ($this->batch->active) {
            $this->course->batches()->where('active', true)->update(['active' => false]);
        }

        if ($this->course->batches->count() === 0) {
            $this->batch->active = true;
        }

        $this->batch->save();

        $this->toggleForm();

        $this->course->load('batches');

        alert()->success('Batch Added')->toToast();
    }

    public function delete($id)
    {
        $batch = Batch::find($id);

        $batch->delete();

        $this->course->load('batches');

        alert()->success('Batch deleted')->toToast();
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function cancelDelete()
    {
        $this->confirming = null;
    }

    public function render()
    {
        return view('livewire.courses.batches', [
        ]);
    }
}
