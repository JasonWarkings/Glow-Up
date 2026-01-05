<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;

class ProfileApiController extends Controller
{
    // Заказы пользователя
    public function orders(Request $request)
    {
        $user = $request->user();

        $orders = Order::with('items')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->filter(function($order) {
                // Оставляем только заказы, у которых есть хотя бы один товар с названием
                return $order->items->whereNotNull('title')->where('title', '!=', '')->count() > 0;
            })
            ->map(function($order) {
                return [
                    'id' => $order->id,
                    'date' => $order->created_at->format('d F Y'),
                    'status' => $order->status,
                    'statusText' => $this->getStatusText($order->status),
                    'total' => $order->total_price,
                    'itemsCount' => $order->items->sum('quantity'),
                    'items' => $order->items->whereNotNull('title')->where('title', '!=', '')->map(function($item){
                        return [
                            'id' => $item->id,
                            'name' => $item->title,
                            'brand' => $item->brand,
                            'price' => $item->price,
                            'quantity' => $item->quantity,
                            'icon' => '🛍️'
                        ];
                    })->values(),
                ];
            })->values();

        return response()->json($orders);
    }

    // Адреса пользователя
    public function addresses(Request $request)
    {
        $user = $request->user();

        $addresses = Address::where('user_id', $user->id)
            ->whereNotNull('title')
            ->where('title', '!=', '')
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->orderBy('is_default', 'desc')
            ->get()
            ->values();

        return response()->json($addresses);
    }

    // Статус заказа
    private function getStatusText($status)
    {
        return match($status) {
            'delivered' => 'Доставлен',
            'processing' => 'В обработке',
            'shipping' => 'В пути',
            'cancelled' => 'Отменен',
            default => 'Неизвестно',
        };
    }
}
