<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index(Request $request)
    {
        // Берем ID пользователя (для теста пока 1)
        $userId = 1;

        $orders = Order::where('user_id', $userId)
            ->with('items') // связь с таблицей товаров заказа
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'date' => $order->created_at->format('d F Y'),
                    'status' => $order->status,
                    'statusText' => ucfirst($order->status),
                    'total' => $order->total_price,
                    'itemsCount' => $order->items_count,
                    'items' => $order->items->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'title' => $item->title,
                            'brand' => $item->brand,
                            'price' => $item->price,
                            'quantity' => $item->quantity,
                            'image' => $item->image,
                        ];
                    }),
                ];
            });

        return response()->json($orders);
    }
}
