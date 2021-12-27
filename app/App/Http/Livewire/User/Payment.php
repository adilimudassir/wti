<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Domains\Course\Models\UserCourse;
use Domains\Payment\Models\Payment as PaymentModel;

class Payment extends Component
{
    use WithFileUploads;

    public PaymentModel $payment;

    public $receipt = null;

    public $showForm = false, $updateReceipt = false, $verifying = false;

    protected $rules = [
        'payment.type' => 'nullable',
        'payment.amount' => 'nullable',
        'payment.method' => 'nullable',
        'payment.receipt' => "nullable",
    ];

    public function mount(PaymentModel $payment)
    {
        $this->payment = $payment;
    }

    public function toggleForm()
    {
        if ($this->showForm) {
            $this->showForm = false;
        } else {
            $this->showForm = true;
        }
    }

    public function toggleReceiptForm()
    {
        if ($this->updateReceipt) {
            $this->updateReceipt = false;
        } else {
            $this->updateReceipt = true;
        }
    }

    public function updatedPayment()
    {
        if ($this->payment->type === 'Complete') {
            $this->payment->amount = $this->userCourse->course->cost;
        }
    }

    public function save()
    {
        $this->validate();
        
        $this->payment->save();

        $this->toggleForm();

        alert()->success('Payment Updated!')->toToast();
    }

    public function saveReceipt()
    {
        $this->validate();
        $this->payment->receipt = $this->receipt->store('receipts');
        $this->payment->save();

        $this->toggleReceiptForm();

        alert()->success('Payment Updated!')->toToast();
    }

    public function confirmVerify()
    {
        $this->verifying = true;
    }

    public function cancelVerify()
    {
        $this->verifying = false;
    }

    public function verify()
    {
        $this->payment->verified = true;

        if($this->payment->status() === 'Complete') {
            $this->payment->completed = true;
        }

        $this->payment->save();
        
        $this->verifying = false;

        alert()->success('Payment Verified')->toToast();
    }

    public function render()
    {
        return view('livewire.user.payment', [
            'paymentMethods' => PaymentModel::$methods,
            'paymentTypes' => PaymentModel::$types,
        ]);
    }
}
