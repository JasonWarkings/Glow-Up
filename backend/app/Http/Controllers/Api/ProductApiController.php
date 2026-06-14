<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    // Список всех продуктов
    public function index()
    {
        $products = Product::with('promotions')->get()->map(function ($product) {

            $discount = $product->promotions->max('discount') ?? 0;

            $finalPrice = $discount > 0
                ? $product->price - ($product->price * $discount / 100)
                : $product->price;

            return [
                'id' => $product->id,
                'title' => $product->title,
                'brand' => $product->brand,
                'category' => $product->category,
                'price' => $product->price,
                'discount' => $discount,
                'final_price' => $finalPrice,
                'image' => $product->image,
                'description' => $product->description ?? '',
                'partner_id' => $product->partner_id,
            ];
        });

        return response()->json($products);
    }

    // Детали одного продукта
    public function show($id)
        {
            $product = Product::with('promotions')->findOrFail($id);

            $discount = $product->promotions->max('discount') ?? 0;

            $finalPrice = $discount > 0
                ? $product->price - ($product->price * $discount / 100)
                : $product->price;

            return response()->json([
                'id' => $product->id,
                'title' => $product->title,
                'brand' => $product->brand,
                'category' => $product->category,
                'price' => $product->price,
                'discount' => $discount,
                'final_price' => $finalPrice,
                'image' => $product->image,
                'description' => $product->description ?? '',
            ]);
        }

    // Добавление нового продукта (для админки)
    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string',
        'brand'       => 'required|string',
        'category'    => 'required|string',
        'price'       => 'required|numeric',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
    ]);

    $data = $request->only(['title', 'brand', 'category', 'price', 'description']);
    $data = $request->only([
        'title',
        'brand',
        'category',
        'price',
        'description',
        'partner_id'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product = Product::create($data);

    return response()->json(['message' => 'Продукт создан', 'product' => $product]);
}

public function partnerIndex(Request $request)
{
    $partnerId = $request->partner_id;

    $products = Product::where('partner_id', $partnerId)->get()->map(function($product) {
        return [
            'id'          => $product->id,
            'title'       => $product->title,
            'brand'       => $product->brand,
            'category'    => $product->category,
            'price'       => $product->price,
            'image'       => $product->image,
            'description' => $product->description ?? '',
        ];
    });

    return response()->json($products);
} 

public function destroy($id)
{
    $product = Product::findOrFail($id);
    
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }
    
    $product->delete();
    
    return response()->json(['message' => 'Товар удалён']);
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $data = $request->only(['title', 'brand', 'category', 'price', 'description']);

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return response()->json(['message' => 'Товар обновлён', 'product' => $product]);
}

}
