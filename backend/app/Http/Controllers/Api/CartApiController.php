<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartApiController extends Controller
{
    private function getUserId()
    {
        return 1; // временно тестовый пользователь, замените на Auth::id() при авторизации
    }

    // Получить корзину
    public function index()
    {
        $userId = $this->getUserId();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        $data = $cartItems->map(function($item){
            return [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'name' => $item->product->title,
                'brand' => $item->product->brand,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'image' => $item->product->image ? asset('storage/' . $item->product->image) : null,
            ];
        });

        return response()->json($data);
    }

    // Добавить товар в корзину
    public function add(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id'
            ]);

            $userId = $this->getUserId();
            $productId = $request->product_id;

            $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
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

            return response()->json($cartItem, 201);

        } catch (\Exception $e) {
            \Log::error('Ошибка добавления в корзину: '.$e->getMessage(), $request->all());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Обновить количество
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json($cartItem);
    }

    // Удалить товар
    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return response()->json(['message' => 'Удалено']);
    }
}
