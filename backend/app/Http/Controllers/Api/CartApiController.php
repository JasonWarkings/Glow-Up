<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartApiController extends Controller
{
    // Получить товары в корзине
    public function index()
    {
        $userId = 1; // тестовый пользователь, или Auth::id()
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        $data = $cartItems->map(function($item){
            return [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'title' => $item->product->title,
                'brand' => $item->product->brand,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'image' => $item->product->image,
            ];
        });

        return response()->json($data);
    }

    // Добавить товар в корзину
    public function add(Request $request)
    {
        $userId = 1; // Auth::id() если авторизация есть
        $productId = $request->product_id;

        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
        if ($cartItem) {
            return response()->json(['message' => 'Товар уже в корзине'], 409);
        }

        $cartItem = Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => 1,
        ]);

        return response()->json($cartItem, 201);
    }

    // Обновить количество
    public function update(Request $request, $id)
    {
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
