<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponApiController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $code = $request->input('code');
        $coupon = Coupon::where('code', $code)
            ->where('is_active', true)
            ->first();

        if (!$coupon) {
            return response()->json([
                'message' => 'Промокод недействителен'
            ], 404);
        }

        $now = Carbon::now()->startOfDay();

        if (($coupon->starts_at && $now->lt(Carbon::parse($coupon->starts_at))) ||
            ($coupon->ends_at && $now->gt(Carbon::parse($coupon->ends_at)))) {
            return response()->json([
                'message' => 'Промокод неактивен по дате'
            ], 400);
        }

        return response()->json([
            'code' => $coupon->code,
            'discount' => $coupon->discount // процент скидки
        ]);
    }
}
