<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerRequest;
use App\Models\Partner;

class PartnerRequestController extends Controller
{
    // список заявок (если понадобится)
    public function index()
    {
        $requests = PartnerRequest::latest()->get();

        return response()->json($requests);
    }

    // ОДОБРИТЬ
    public function approve($id)
    {
        $request = PartnerRequest::findOrFail($id);

        Partner::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => $request->password,
            'description' => $request->description,
            'logo'        => $request->logo,
            'status'      => 'active',
        ]);

        $request->status = 'approved';
        $request->save();

        return response()->json([
            'message' => 'Партнёр одобрен'
        ]);
    }

    // ОТКЛОНИТЬ
    public function reject($id)
    {
        $request = PartnerRequest::findOrFail($id);

        $request->status = 'rejected';
        $request->save();

        return response()->json([
            'message' => 'Заявка отклонена'
        ]);
    }
}