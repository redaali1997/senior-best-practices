<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;

class PaymobPaymentGateway implements PaymentGatewayInterface
{
    public function pay(float $amount)
    {
        return 'Paymob checkout';
    }
}
