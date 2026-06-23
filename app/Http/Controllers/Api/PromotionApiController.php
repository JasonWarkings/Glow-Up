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
                Promotion::with('category')->latest()->get()
            );
        }

    public function show($id)
        {
            return response()->json(
                Promotion::with('category')->findOrFail($id)
            );
        }
}