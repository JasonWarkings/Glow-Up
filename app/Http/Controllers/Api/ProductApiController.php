<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    // Список всех продуктов
    public function index()
    {
        $products = Product::all()->map(function($product) {
            return [
                'id' => $product->id,
                'title' => $product->title,
                'brand' => $product->brand,
                'price' => $product->price,
                'image' => $product->image,
                'description' => $product->description ?? '',
            ];
        });

        return response()->json($products);
    }

    // Детали одного продукта
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json([
            'id' => $product->id,
            'title' => $product->title,
            'brand' => $product->brand,
            'price' => $product->price,
            'image' => $product->image,
            'description' => $product->description ?? '',
        ]);
    }

    // Добавление нового продукта (для админки)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($request->all());

        return response()->json(['message' => 'Продукт создан', 'product' => $product]);
    }
}
