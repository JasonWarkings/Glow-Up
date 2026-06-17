<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class OrderApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $orders = Order::where('user_id', $user->id)
            ->with('items')
            ->latest()
            ->get()
            ->map(function ($order) {
                return [
                    'id'         => $order->id,
                    'date'       => $order->created_at->format('d F Y'),
                    'status'     => $order->status,
                    'statusText' => $this->getStatusText($order->status),
                    'total'      => $order->total_price,
                    'itemsCount' => $order->items->count(),
                    'items'      => $order->items->map(fn($item) => [
                        'id'       => $item->id,
                        'name'     => $item->title,  // ← исправлено: Vue ждёт name
                        'brand'    => $item->brand,
                        'price'    => $item->price,
                        'quantity' => $item->quantity,
                        'image'    => $item->image,  // относительный путь
                    ]),
                ];
            });

        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'items'              => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.title'      => 'required|string',
            'items.*.brand'      => 'required|string',
            'items.*.price'      => 'required|integer',
            'items.*.quantity'   => 'required|integer|min:1',
            'items.*.image'      => 'nullable|string',  // ← добавлено
            'total_price'        => 'required|integer',
            'promo_code'         => 'nullable|string',
            'promo_discount'     => 'nullable|integer',
            'discount_amount'    => 'nullable|integer',
        ]);

        $promo = null;

        if ($request->promo_code) {
            $promo = \App\Models\PromoCode::where('code', strtoupper($request->promo_code))
                ->where('is_active', true)
                ->first();

            if (!$promo) {
                return response()->json([
                    'message' => 'Промокод недействителен'
                ], 400);
            }

            if ($promo->limit !== null && $promo->used_count >= $promo->limit) {
                return response()->json([
                    'message' => 'Лимит использований исчерпан'
                ], 400);
            }
        }

        $order = Order::create([
            'user_id'        => $user->id,
            'total_price'    => $request->total_price,
            'items_count'    => count($request->items),
            'promo_code'     => $request->promo_code,
            'promo_discount' => $request->promo_discount ?? 0,
            'discount_amount'=> $request->discount_amount ?? 0,
            'status'         => 'processing',
        ]);

        foreach ($request->items as $item) {
            // Убираем полный URL если фронт прислал его
            $image = $item['image'] ?? null;
            if ($image && str_starts_with($image, 'http://127.0.0.1:8001/storage/')) {
                $image = str_replace('http://127.0.0.1:8001/storage/', '', $image);
            }

            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item['product_id'],
                'title'      => $item['title'],
                'brand'      => $item['brand'],
                'price'      => $item['price'],
                'quantity'   => $item['quantity'],
                'image'      => $image,  // ← сохраняем только относительный путь
            ]);
        }

        if ($promo) {
            $promo->increment('used_count');
        }

        Cart::where('user_id', $user->id)->delete();

        return response()->json([
            'message'  => 'Заказ оформлен успешно',
            'order_id' => $order->id,
        ], 201);
    }

    private function getStatusText($status)
    {
        return match($status) {
            'processing' => 'В обработке',
            'completed'  => 'Завершён',
            'cancelled'  => 'Отменён',
            default      => 'Неизвестно',
        };
    }
}