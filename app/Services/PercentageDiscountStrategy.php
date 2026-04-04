<?php

namespace App\Services;

use App\Contracts\DiscountStrategyInterface;

class PercentageDiscountStrategy implements DiscountStrategyInterface
{
    public function apply(float $amount, float $value): float
    {
        return $amount - ($amount * ($value / 100));
    }
}
