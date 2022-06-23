<?php

namespace Domains\Payment\Repositories;

use Domains\Payment\Models\Payment;
use App\Repositories\BaseRepository;

class PaymentRepository extends BaseRepository
{
    /**
     * create an instance of the class.
     *
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }
}
