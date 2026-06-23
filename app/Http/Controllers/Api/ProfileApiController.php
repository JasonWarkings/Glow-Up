<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\OrderItem;

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

    public function deleteAddress(Request $request, $id)
    {
        $user = $request->user();

        $address = Address::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();

        $address->delete();

        return response()->json([
            'message' => 'Адрес удален'
        ]);
    }
    // Заказы пользователя
    public function orders(Request $request)
        {
            $user = $request->user();

            return Order::with('items.product')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($order) {

                    return [
                        'id' => $order->id,
                        'date' => $order->created_at->format('d.m.Y H:i'),
                        'status' => $order->status,
                        'statusText' => $this->getStatusText($order->status),
                        'total' => $order->total_price,
                        'itemsCount' => $order->items->sum('quantity'),

                        'items' => $order->items->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'name' => $item->product->title ?? 'Товар',
                                'brand' => $item->product->brand ?? '',
                                'price' => $item->price,
                                'quantity' => $item->quantity,
                                'icon' => '🛍️'
                            ];
                        })->values(),
                    ];
                });
        }
    public function checkout(Request $request)
    {
        $user = $request->user();

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'processing',
            'total_price' => $request->total,
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'title' => $item['name'] ?? null,
                'brand' => $item['brand'] ?? null,
                'image' => $item['image'] ?? null,
            ]);
        }

        return response()->json($order);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'processing',
            'total_price' => $request->total ?? 0,
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'] ?? null,
                'price' => $item['price'] ?? 0,
                'quantity' => $item['quantity'] ?? 1,
                'title' => $item['name'] ?? 'Товар',
                'brand' => $item['brand'] ?? null,
                'image' => $item['image'] ?? null,
            ]);
        }

        return response()->json([
            'message' => 'Order created',
            'order' => $order
        ]);
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
            'name' => ['nullable', 'string', 'max:255'],
            'lastName' => ['nullable', 'string', 'max:255'],

            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('users')->ignore($user->id), // если хочешь уникальный телефон тоже
            ],

            'birthday' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female'],
        ]);

            if (isset($validated['email']) && $validated['email'] !== $user->email) {

            }

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
    public function changePassword(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:6'],
        ]);

        // проверка текущего пароля
        if (!Hash::check($validated['current_password'], $user->password)) {
            return response()->json([
                'message' => 'Текущий пароль неверный'
            ], 422);
        }

        // обновление
        $user->update([
            'password' => Hash::make($validated['new_password'])
        ]);

        return response()->json([
            'message' => 'Пароль успешно изменен'
        ]);
    }
}
