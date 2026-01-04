<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;

class ProfileApiController extends Controller
{
    public function user(Request $request)
    {
        return response()->json(Auth::user());
    }

    public function updateUser(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'name'  => $request->input('name', $user->name),
            'email' => $request->input('email', $user->email),
        ]);

        return response()->json($user);
    }

    public function orders()
    {
        return response()->json(
            Order::where('user_id', Auth::id())->get()
        );
    }

    public function addresses()
    {
        return response()->json(
            Address::where('user_id', Auth::id())->get()
        );
    }

    public function addAddress(Request $request)
    {
        $address = Address::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
        ]);

        return response()->json($address);
    }

    public function deleteAddress($id)
    {
        Address::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return response()->json(['status' => 'ok']);
    }

    public function bonuses()
    {
        return response()->json([
            'bonuses' => Auth::user()->bonuses ?? 0
        ]);
    }
}
