<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayInterface;
use App\Events\OrderCreated;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. إنشاء الطلب
        $order = Order::create($request->validated());

        OrderCreated::dispatch($order);
        return response()->json(['message' => 'Order placed successfully']);
    }

    public function checkout(Request $request, PaymentGatewayInterface $paymentGateway)
    {
        $paymentGateway->pay($request->total_amount);

        return response()->json(['message' => 'Order completed successfully']);
    }
}
