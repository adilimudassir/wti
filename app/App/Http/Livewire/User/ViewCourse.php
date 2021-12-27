<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Domains\Payment\Models\Payment;
use Domains\Course\Models\UserCourse;

class ViewCourse extends Component
{
    use WithFileUploads;
    
    public UserCourse $userCourse;

    public ?Payment $payment = null;

    public $receipt = null;

    public $showForm = false;

    protected $rules = [
        'payment.type' => 'required|string',
        'payment.amount' => 'integer',
        'payment.method' => 'required|string',
        'payment.receipt' => "required_if:method,'Deposit'",
    ];

    public function mount(UserCourse $userCourse)
    {
        $this->userCourse = $userCourse;
    }

    public function toggleForm()
    {
        if ($this->showForm) {
            $this->showForm = false;
        } else {
            $this->showForm = true;
        }

        $this->payment = new Payment;
        $this->payment->type = Payment::$types['Complete'];
        $this->payment->amount = $this->userCourse->course->cost;
    }

    public function updatedPayment()
    {
        if($this->payment->type === 'Complete') {
            $this->payment->amount = $this->userCourse->course->cost;
        }

        if($this->payment->method === 'Online') {
            $this->payment->receipt = null;
        }
    }

    public function save()
    {
        $this->validate();

        $this->payment->receipt = $this->receipt->store('receipts');
        $this->payment->user_course_id = $this->userCourse->id;
        $this->payment->user_id = auth()->user()->id;
        $this->payment->date = now();
        $this->payment->save();

        $this->toggleForm();

        $this->userCourse->load('payment');

        alert()->success('Payment Saved!')->toToast();
    }

    public function render()
    {
        return view('livewire.user.view-course', [
            'paymentMethods' => Payment::$methods,
            'paymentTypes' => Payment::$types,
        ]);
    }
}
