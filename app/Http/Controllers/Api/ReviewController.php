<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends Controller
{
    // получить отзывы товара
    public function index($productId)
    {
        $reviews = Review::with('user')
            ->where('product_id', $productId)
            ->latest()
            ->get();

        $avgRating = Review::where('product_id', $productId)->avg('rating');
        $count = Review::where('product_id', $productId)->count();

        return response()->json([
            'reviews' => $reviews,
            'avg_rating' => round($avgRating, 1),
            'count' => $count,
        ]);
    }

    // создать отзыв
    public function store(Request $request, $productId)
        {
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'content' => 'required|string|max:1000',
            ]);

            $user = auth()->user();

            if (!$user) {
                return response()->json([
                    'message' => 'Не авторизован'
                ], 401);
            }

            $existing = Review::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();

            if ($existing) {
                return response()->json([
                    'message' => 'Вы уже оставляли отзыв'
                ], 409);
            }

            $review = Review::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'rating' => $request->rating,
                'content' => $request->content,
            ]);

            return response()->json([
                'message' => 'Отзыв добавлен',
                'review' => $review
            ]);
        }
    public function update(Request $request, $id)
        {
            $request->validate([
                'rating' => 'nullable|integer|min:1|max:5',
                'content' => 'required|string|max:1000',
            ]);

            $user = $request->user();

            $review = Review::where('id', $id)
                ->where('user_id', $user->id)
                ->first();

            if (!$review) {
                return response()->json([
                    'message' => 'Отзыв не найден или доступ запрещён'
                ], 404);
            }

            $review->update([
                'rating' => $request->rating ?? $review->rating,
                'content' => $request->content,
            ]);

            return response()->json([
                'message' => 'Отзыв обновлён',
                'review' => $review
            ]);
        }
}