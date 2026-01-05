<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartApiController extends Controller
{
    // TODO: заменить на Auth::id() после настройки аутентификации
    private function getUserId()
    {
        return 1; // временный тестовый пользователь
    }

    // Получить корзину
    public function index()
    {
        $userId = $this->getUserId();

        // Берем все товары пользователя с продуктами
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        $data = $cartItems->map(function($item){
            return [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'name' => $item->product->title,
                'brand' => $item->product->brand,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'total' => $item->product->price * $item->quantity, // сразу итоговая цена
                'image' => $item->product->image ? asset('storage/' . $item->product->image) : null,
                'extra_delivery' => 0 // можно потом добавить плюсы к доставке
            ];
        });

        return response()->json($data);
    }

    // Добавить товар в корзину
    public function add(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);

        $userId = $this->getUserId();
        $productId = $request->product_id;

        // Проверяем, есть ли уже этот товар в корзине
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            $cartItem = Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        // Возвращаем полный объект для фронта
        return response()->json([
            'id' => $cartItem->id,
            'product_id' => $cartItem->product_id,
            'name' => $cartItem->product->title,
            'brand' => $cartItem->product->brand,
            'price' => $cartItem->product->price,
            'quantity' => $cartItem->quantity,
            'total' => $cartItem->product->price * $cartItem->quantity,
            'image' => $cartItem->product->image ? asset('storage/' . $cartItem->product->image) : null,
            'extra_delivery' => 0
        ], 201);
    }

    // Обновить количество товара
    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'id' => $cartItem->id,
            'product_id' => $cartItem->product_id,
            'name' => $cartItem->product->title,
            'brand' => $cartItem->product->brand,
            'price' => $cartItem->product->price,
            'quantity' => $cartItem->quantity,
            'total' => $cartItem->product->price * $cartItem->quantity,
            'image' => $cartItem->product->image ? asset('storage/' . $cartItem->product->image) : null,
            'extra_delivery' => 0
        ]);
    }

    // Удалить товар из корзины
    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return response()->json(['message' => 'Товар удален из корзины']);
    }
}
