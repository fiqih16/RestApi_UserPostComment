<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\carbon;


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
        $price = Product::find($productId)->$price;
        $today Carbon::now();

        $user->products()->attach($productId, [
            'order_id' => $orderId,
            'price' => $price,
            'quantity' => $request->quantity,
            'order_at' => $today,
            'status' => 'cart'
        ]);

        return response(['Status' => true]);
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $productId = $request->productId;

        $user->products()->wherePivot('status', 'cart')->detach($productId);

        return response(['status' => true]);
    }
}
