<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewApiController extends Controller
{
    public function index(Request $request, $id)
{
    $currentUserId = null;

    try {
        $token = $request->bearerToken();
        if ($token) {
            $personalToken = \Laravel\Sanctum\PersonalAccessToken::findToken($token);
            $currentUserId = $personalToken?->tokenable_id;
        }
    } catch (\Exception $e) {
        //
    }

    $reviews = Review::where('product_id', $id)
        ->latest()
        ->get()
        ->map(function ($review) use ($currentUserId) {
            $review->is_mine = $currentUserId && $review->user_id === $currentUserId;
            return $review;
        });

    return response()->json($reviews);
}

    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|min:2'
        ]);

        $user = $request->user();

        $review = Review::create([
            'product_id' => $id,
            'user_id'    => $user->id,
            'user_name'  => $user->name,
            'content'    => $request->content
        ]);

        $review->is_mine = true;

        return response()->json($review, 201);
    }

   public function update(Request $request, $productId, $reviewId)
{
    $request->validate([
        'content' => 'required|string|min:2'
    ]);

    $review = Review::where('id', $reviewId)
        ->where('product_id', $productId)
        ->firstOrFail();

    // если user_id null — значит отзыв старый, запрещаем
    if (!$review->user_id || $review->user_id !== $request->user()->id) {
        return response()->json(['message' => 'Нет доступа'], 403);
    }

    $review->update(['content' => $request->content]);
    $review->is_mine = true;

    return response()->json($review);
}

public function destroy(Request $request, $productId, $reviewId)
{
    $review = Review::where('id', $reviewId)
        ->where('product_id', $productId)
        ->firstOrFail();

    if (!$review->user_id || $review->user_id !== $request->user()->id) {
        return response()->json(['message' => 'Нет доступа'], 403);
    }

    $review->delete();

    return response()->json(['message' => 'Удалено']);
}
}