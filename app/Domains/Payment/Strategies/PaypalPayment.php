<?php

namespace App\Domains\Payment\Strategies;

use App\Domains\Payment\Contracts\PaymentStrategyInterface;

class PaypalPayment implements PaymentStrategyInterface
{
    public function pay(float $amout, array $data): bool
    {
        return true;
    }
}
