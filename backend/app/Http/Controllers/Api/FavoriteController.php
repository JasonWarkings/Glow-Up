<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // список избранного
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([], 401);
        }

        return $user->favoriteProducts()->get();
    }

    // toggle избранного
    public function toggle(Request $request, $productId)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated'
            ], 401);
        }

        // проверяем есть ли уже
        $exists = $user->favoriteProducts()
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            $user->favoriteProducts()->detach($productId);

            return response()->json([
                'favorite' => false
            ]);
        }

        $user->favoriteProducts()->attach($productId);

        return response()->json([
            'favorite' => true
        ]);
    }
}