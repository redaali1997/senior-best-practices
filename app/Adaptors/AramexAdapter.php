<?php

namespace App\Adaptors;

use App\Contracts\ShippingProviderInterface;
use App\Models\Order;

class AramexAdapter implements ShippingProviderInterface
{
    public function ship(Order $order): void
    {
        app(AramexApi::class)->dispatchParcel($order->weight, $order->city);
    }
}
