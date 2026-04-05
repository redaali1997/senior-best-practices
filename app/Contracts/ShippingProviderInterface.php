<?php

namespace App\Contracts;

use App\Models\Order;

interface ShippingProviderInterface
{
    public function ship(Order $order): void;
}