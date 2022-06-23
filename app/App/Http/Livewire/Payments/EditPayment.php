<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use Livewire\WithFileUploads;
use Domains\Payment\Models\Payment;

class EditPayment extends Component
{
    use WithFileUploads;

    public Payment $payment;

    public $receipt = null;

    public $saved = false;

    protected $rules = [
        'payment.type' => 'required',
        'payment.amount' => 'required',
        'payment.method' => 'required',
        'payment.receipt' => "required",
    ];

    public function updatedPayment()
    {
        $this->payment->amount = $this->payment->userCourse->course->getPayableCost($this->payment->type);
    }

    public function save()
    {
        $this->validate();

        if ($this->payment->method == 'Bank Transfer') {
            if ($this->receipt) {
                $this->payment->receipt = $this->receipt->store('payments');
            }
        }
        $this->payment->save();

        alert()->success('Payment Updated!')->toToast();
        $this->saved = true;
    }

    public function cancel()
    {
        return redirect()->route('payments.show', $this->payment->id);
    }

    public function render()
    {
        $paymentTypes = Payment::$types;

        if (!$this->payment->userCourse?->course?->allow_partial_payments) {
            unset($paymentTypes['Partial']);
        }

        if ($this->payment->userCourse?->paymentStatus() === 'Partial') {
            unset($paymentTypes['Complete']);
        }

        return view('livewire.payments.edit-payment', [
            'paymentMethods' => Payment::$methods,
            'paymentTypes' => $paymentTypes,
        ]);
    }
}
