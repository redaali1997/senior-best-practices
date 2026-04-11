<?php

namespace App\Listeners;

use App\Events\OrderCreated;

class DeductInventoryStock
{
    /**
     * Create the event listener.
     */
    public function __construct(public InventoryService $inventory)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $this->inventory->deductStock($event->order->items);
    }
}
