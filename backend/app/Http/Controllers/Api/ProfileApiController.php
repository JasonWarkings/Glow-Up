<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;

class ProfileApiController extends Controller
{
    public function updateAddress(Request $request, $id)
{
    $user = $request->user();

    $address = Address::where('user_id', $user->id)
        ->where('id', $id)
        ->firstOrFail();

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'house' => 'required|string|max:255',
        'apartment' => 'nullable|string|max:255',
        'comment' => 'nullable|string',
        'is_default' => 'nullable|boolean',
    ]);

    // если делаем основным — сбрасываем другие
    if (!empty($validated['is_default'])) {
        Address::where('user_id', $user->id)
            ->update(['is_default' => false]);
    }

    $address->update($validated);

    return response()->json($address);
}
    public function addAddress(Request $request)
{
    $user = $request->user();

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'house' => 'required|string|max:255',
        'apartment' => 'nullable|string|max:255',
        'comment' => 'nullable|string',
        'is_default' => 'nullable|boolean',
    ]);

    // если новый адрес основной — сбрасываем остальные
    if (!empty($validated['is_default'])) {
        Address::where('user_id', $user->id)
            ->update(['is_default' => false]);
    }

    $address = Address::create([
        'user_id' => $user->id,
        'title' => $validated['title'],
        'city' => $validated['city'],
        'street' => $validated['street'],
        'house' => $validated['house'],
        'apartment' => $validated['apartment'] ?? null,
        'comment' => $validated['comment'] ?? null,
        'is_default' => $validated['is_default'] ?? false,
    ]);

    return response()->json($address);
}
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
        ->orderBy('is_default', 'desc')
        ->get()
        ->map(function ($a) {
            return [
                'id' => $a->id,
                'title' => $a->title,
                'city' => $a->city,
                'street' => $a->street,
                'house' => $a->house,
                'apartment' => $a->apartment,
                'comment' => $a->comment,
                'is_default' => (bool) $a->is_default,
            ];
        })
        ->values();

    return response()->json($addresses);
}

        // Обновление профиля
    public function updateUser(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|string|max:50',
        ]);

        $user->update($validated);

        return response()->json([
            'message' => 'Профиль обновлен',
            'user' => $user
        ]);
    }

    // Бонусы пользователя
    public function bonuses(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'bonuses' => $user->bonuses ?? 0,
            'history' => [
                [
                    'id' => 1,
                    'description' => 'Бонус за регистрацию',
                    'amount' => 500,
                    'type' => 'earned',
                    'date' => now()->format('d.m.Y')
                ]
            ]
        ]);
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
