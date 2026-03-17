<?php

namespace App\Domains\Payment\Factories;

use App\Domains\Payment\Contracts\PaymentStrategyInterface;
use App\Domains\Payment\Strategies\CashPayment;
use App\Domains\Payment\Strategies\PaypalPayment;
use Exception;

class PaymentMethodFactory {
    private const METHODS = [
        'paypal' => PaypalPayment::class,
        'cash' => CashPayment::class,
    ];

    public static function make(string $method): PaymentStrategyInterface {
        if (! array_key_exists($method, self::METHODS)) {
            throw new Exception("Payment method not found");
        }
        
        return app(self::METHODS[$method]);
    }
}
