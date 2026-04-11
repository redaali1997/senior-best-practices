<?php

namespace App\Factories;

use App\Contracts\DiscountStrategyInterface;
use App\Services\FixedDiscountStrategy;
use App\Services\PercentageDiscountStrategy;
use App\Services\VipDiscountStrategy;

class DiscountTypeFactory
{
    public const TYPES = [
        'percentage' => PercentageDiscountStrategy::class,
        'fixed' => FixedDiscountStrategy::class,
        'vip' => VipDiscountStrategy::class,
    ];

    public static function make(string $type): DiscountStrategyInterface
    {
        return app(self::TYPES[$type]);
    }
}
