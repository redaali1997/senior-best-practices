<?php

namespace App\Contracts;

interface DiscountStrategyInterface
{
    public function apply(float $amount, float $value): float;
}