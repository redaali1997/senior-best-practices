<?php

namespace App\Services;

use App\Contracts\DiscountStrategyInterface;

class VipDiscountStrategy implements DiscountStrategyInterface
{
    public function apply(float $amount, float $value): float
    {
        return $amount - ($amount * 0.20);
    }
}
