<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request, PaymentGatewayInterface $paymentGateway)
    {
        $paymentGateway->pay($request->total_amount);

        return response()->json(['message' => 'Order completed successfully']);
    }
}
