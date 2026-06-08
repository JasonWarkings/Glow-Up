<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PartnerAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,email',
            'password' => 'required|min:6'
        ]);

        $partner = Partner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Заявка отправлена на рассмотрение',
            'partner' => $partner
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $partner = Partner::where('email', $request->email)->first();

        if (!$partner) {
            return response()->json([
                'message' => 'Партнер не найден'
            ], 404);
        }

        if (!Hash::check($request->password, $partner->password)) {
            return response()->json([
                'message' => 'Неверный пароль'
            ], 401);
        }

        if ($partner->status === 'pending') {
            return response()->json([
                'message' => 'Ваша заявка еще не одобрена'
            ], 403);
        }

        if ($partner->status === 'rejected') {
            return response()->json([
                'message' => 'Ваша заявка была отклонена'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'message' => 'Вход выполнен',
            'partner' => $partner
        ]);
    }
}