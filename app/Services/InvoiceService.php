<?php

namespace App\Services;

use App\Factories\DiscountTypeFactory;

class InvoiceService
{
    public function calculateTotal($amount, $discountType, $discountValue)
    {
        $discountStrategy = DiscountTypeFactory::make($discountType);
        return $discountStrategy->apply($amount, $discountValue);
    }
}
