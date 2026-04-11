<?php

namespace App\Domains\Payment\Contracts;

interface PaymentStrategyInterface
{
    public function pay(float $amount, array $data): bool;
}
