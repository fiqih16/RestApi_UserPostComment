<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $request = $request->productId;
        $lastProduct = $user->products()->orderBy('order_id', 'DESC')->first();
        $orderId = 0;
        if($lastProduct)
        {
            if($lastProduct->pivot->status == 'cart')
            {
                $orderId = $lastProduct->pivot->order_id;
            }
            else
            {
                $orderId = $lastProduct->pivot->order_id + 1;
            }
        }

        return response(['data' => $orderId]);
    }
}
