<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;

class CouponApiController extends Controller
{
    public function check(Request $request)
{
    $request->validate([
        'code' => 'required|string'
    ]);

    $code = strtoupper(trim($request->code));

    $promo = PromoCode::where('code', $code)
        ->where('is_active', true)
        ->first();

    if (!$promo) {
        return response()->json([
            'message' => 'Промокод недействителен'
        ], 404);
    }

    if ($promo->limit !== null &&
        $promo->used_count >= $promo->limit) {

        return response()->json([
            'message' => 'Лимит использований исчерпан'
        ], 400);
    }

    return response()->json([
        'code' => $promo->code,
        'discount' => $promo->discount
    ]);
}
}