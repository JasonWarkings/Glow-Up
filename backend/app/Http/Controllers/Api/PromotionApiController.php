<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion;

class PromotionApiController extends Controller
{
    // СПИСОК АКЦИЙ
    public function index()
    {
        return response()->json(
            Promotion::with('products')->get()
        );
    }

    // ОДНА АКЦИЯ
    public function show($id)
    {
        return response()->json(
            Promotion::with('products')->findOrFail($id)
        );
    }
}