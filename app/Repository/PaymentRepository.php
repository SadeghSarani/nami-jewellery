<?php

namespace App\Repository;

use App\Models\Payment;

class PaymentRepository
{
    private Payment $payment;
    public function __construct()
    {
        $this->payment = app(Payment::class);
    }

    public function create($data)
    {
        $this->payment->create($data);
    }

    public function getAmount($authority)
    {
       return $this->payment->query()->where('authority', $authority)->value('total_amount');
    }

}
