<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PartnerRequest;
use App\Models\Partner;

class PartnerAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:partner_requests,email',
            'password'    => 'required|min:6',
            'description' => 'nullable|string',
            'logo'        => 'nullable|image|max:2048',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partners', 'public');
        }

        PartnerRequest::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => bcrypt($request->password),
            'description' => $request->description,
            'logo'        => $logoPath,
            'status'      => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Заявка отправлена на рассмотрение'
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // 1. сначала ищем в approved partners
        $partner = Partner::where('email', $request->email)->first();

        if ($partner) {

            if (!Hash::check($request->password, $partner->password)) {
                return response()->json(['message' => 'Неверный пароль'], 401);
            }

            if ($partner->status === 'rejected') {
                return response()->json([
                    'success' => false,
                    'status' => 'rejected',
                    'message' => 'Ваша заявка была отклонена'
                ], 403);
            }

            $token = $partner->createToken('partner_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'status' => 'approved',
                'partner' => $partner,
                'token' => $token,
                'message' => 'Вход выполнен'
            ]);
        }

        // 2. если нет в partners → проверяем заявки
        $requestPartner = PartnerRequest::where('email', $request->email)->first();

        if ($requestPartner) {
            return response()->json([
                'success' => false,
                'status' => $requestPartner->status, // pending / rejected
                'message' => $requestPartner->status === 'pending'
                    ? 'Ваша заявка на рассмотрении'
                    : 'Ваша заявка отклонена',
                'partner' => $requestPartner
            ], 403);
        }

        // 3. вообще нигде нет
        return response()->json([
            'success' => false,
            'message' => 'Пользователь не найден'
        ], 404);
    }
}