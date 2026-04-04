<?php

namespace App\Services;

use App\Contracts\DiscountStrategyInterface;

class FixedDiscountStrategy implements DiscountStrategyInterface
{
    public function apply(float $amount, float $value): float
    {
        return $amount - $value;
    }
}
