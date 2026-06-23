<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Product;

class PromotionApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Promotion::latest()->get()
        );
    }

    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);

        $products = Product::where('category', $promotion->category)->get();

        return response()->json([
            'promotion' => $promotion,
            'products'  => $products,
        ]);
    }
}