<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderApiController extends Controller
{
    public function index(Request $request)
        {
            $user = $request->user();

            $orders = Order::with('items.product')
                ->where('user_id', $user->id)
                ->latest()
                ->get();

            return response()->json($orders->map(function ($order) {
                return [
                    'id' => $order->id,
                    'status' => $order->status,
                    'statusText' => $this->getStatusText($order->status),
                    'date' => $order->created_at->format('d.m.Y H:i'),
                    'total' => $order->total_price,
                    'itemsCount' => $order->items->count(),
                    'items' => $order->items->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'name' => $item->product->title ?? '',
                            'brand' => $item->product->brand ?? '',
                            'quantity' => $item->quantity,
                            'price' => $item->price,
                            'icon' => '🛍️'
                        ];
                    }),
                ];
            }));
        }
    public function adminIndex()
        {
            $orders = Order::with('items.product')
                ->latest()
                ->get();

            return response()->json([
                'data' => $orders
            ]);
        }
}

