<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Domains\Course\Models\UserCourse;
use Domains\Payment\Models\Payment as PaymentModel;

class Payment extends Component
{
    use WithFileUploads;

    public ?PaymentModel $payment = null;

    public UserCourse $userCourse;

    public $receipt = null;

    public $create = false;
    public $edit = false;
    public $updateReceipt = false;
    public $paymentToBeVerified = false;

    protected $rules = [
        'payment.type' => 'nullable',
        'payment.amount' => 'nullable',
        'payment.method' => 'nullable',
        'payment.receipt' => "nullable",
    ];

    public function createForm()
    {
        if ($this->create) {
            $this->create = false;
        } else {
            $this->create = true;
            $this->payment = new PaymentModel();
        }
    }

    public function editForm($id)
    {
        if ($this->edit) {
            $this->edit = false;
        } else {
            $this->edit = true;
            $this->payment = PaymentModel::find($id);
        }
    }

    public function closeForms()
    {
        $this->create = false;
        $this->edit = false;
        $this->updateReceipt = false;
        $this->paymentToBeVerified = false;
    }

    public function toggleReceiptForm($id)
    {
        if ($this->updateReceipt) {
            $this->updateReceipt = false;
        } else {
            $this->updateReceipt = true;
        }
    }

    public function updatedPayment()
    {
        $this->payment->amount = $this->userCourse->course->getPayableCost($this->payment->type);
    }

    public function save()
    {
        $this->validate();

        if ($this->payment->method == 'Bank Transfer') {
            $this->payment->receipt = $this->receipt->store('receipts');
        }

        $this->payment->user_course_id = $this->userCourse->id;
        $this->payment->user_id = auth()->user()->id;
        $this->payment->date = now();
        $this->payment->save();

        $this->create = false;
        $this->userCourse->load('payments');
        alert()->success('Payment Saved!')->toToast();
    }

    public function update()
    {
        $this->validate();

        $this->payment->save();

        $this->edit = false;
        $this->userCourse->load('payments');
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

    public function confirmVerify($id)
    {
        $this->paymentToBeVerified = $id;
    }

    public function cancelVerify()
    {
        $this->paymentToBeVerified = null;
    }

    public function verify()
    {
        $this->payment = Payment::find($this->paymentToBeVerified);
        $this->payment->verified = true;

        if ($this->payment->status() === 'Complete') {
            $this->payment->completed = true;
        }

        $this->payment->save();

        $this->paymentToBeVerified = null;

        alert()->success('Payment Verified!')->toToast();
    }

    public function render()
    {
        $paymentTypes = PaymentModel::$types;

        if (!$this->userCourse->course->allow_partial_payments) {
            unset($paymentTypes['Partial']);
        }

        if ($this->userCourse->paymentStatus() === 'Partial') {
            unset($paymentTypes['Complete']);
        }

        return view('livewire.payment', [
            'paymentMethods' => PaymentModel::$methods,
            'paymentTypes' => $paymentTypes,
            'payments' => $this->userCourse->payments
        ]);
    }
}
