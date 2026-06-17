<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion;

class PromotionApiController extends Controller
{
    // СПИСОК АКЦИЙ
   public function index()
{
    $promotions = Promotion::all()->map(function ($promo) {
        $products = \App\Models\Product::where('category', $promo->category)->get();
        return [
            'id'          => $promo->id,
            'title'       => $promo->title,
            'description' => $promo->description,
            'discount'    => $promo->discount,
            'category'    => $promo->category,
            'products'    => $products->map(fn($p) => [
                'id'    => $p->id,
                'title' => $p->title,
                'brand' => $p->brand,
                'price' => $p->price,
                'image' => $p->image,
                'discounted_price' => round($p->price * (1 - $promo->discount / 100)),
            ])
        ];
    });

    return response()->json($promotions);
}

    // ОДНА АКЦИЯ
    public function show($id)
    {
        return response()->json(
            Promotion::with('products')->findOrFail($id)
        );
    }
}