<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use Domains\Course\Models\UserCourse;

class ListPayments extends Component
{
    public UserCourse $userCourse;

    public function render()
    {
        return view('livewire.payments.list-payments');
    }
}
