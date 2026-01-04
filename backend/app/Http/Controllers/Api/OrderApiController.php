<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderApiController extends Controller
{
    // Получить все заказы текущего пользователя
    public function index(Request $request)
    {
        // Для примера используем user_id = 1
        $userId = 1;

        $orders = Order::with('items')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($order) {
                return [
                    'id' => $order->id,
                    'date' => $order->created_at->format('d F Y'),
                    'status' => $order->status,
                    'statusText' => $this->getStatusText($order->status),
                    'total' => $order->total,
                    'itemsCount' => $order->items->sum('quantity'),
                    'items' => $order->items->map(function($item){
                        return [
                            'id' => $item->id,
                            'name' => $item->name,
                            'brand' => $item->brand,
                            'price' => $item->price,
                            'quantity' => $item->quantity,
                            'icon' => '✨', // можно заменить на image, если есть картинка
                        ];
                    })
                ];
            });

        return response()->json($orders);
    }

    private function getStatusText($status)
    {
        return match($status) {
            'delivered' => 'Доставлен',
            'processing' => 'В обработке',
            'shipping' => 'Доставка',
            'cancelled' => 'Отменён',
            default => 'Неизвестно',
        };
    }
}

