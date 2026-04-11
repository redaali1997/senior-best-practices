<?php

namespace App\Domains\Payment\Services;

use App\Domains\Payment\Factories\PaymentMethodFactory;

class CheckoutService
{
    public function checkoutProcess(float $amount, string $method)
    {
        $paymentMethod = PaymentMethodFactory::make($method);
        $paymentMethod->pay($amount, []);
    }
}
