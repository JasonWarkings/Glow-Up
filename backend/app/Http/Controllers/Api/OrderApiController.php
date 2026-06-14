<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderApiController extends Controller
{
    // Получить все заказы текущего пользователя
public function index(Request $request)
{
    return response()->json([
        'user' => $request->user(),
        'user_id' => $request->user()?->id,
    ]);
}

    private function getStatusText($status)
    {
        return match($status) {
            'delivered' => 'Доставлен',
            'processing' => 'В обработке',
            'shipping' => 'Доставка',
            'cancelled' => 'Отменён',
            default => 'Неизвестно',
        };
    }
}

