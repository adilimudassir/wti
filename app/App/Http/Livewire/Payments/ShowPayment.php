<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use Domains\Payment\Models\Payment;

class ShowPayment extends Component
{
    public Payment $payment;

    public function render()
    {
        return view('livewire.payments.show-payment');
    }
}
