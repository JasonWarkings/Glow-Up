<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PartnerRequest;
use Illuminate\Http\Request;
use App\Models\Partner; 

class PartnerApiController extends Controller
{
    public function index(Request $request)
    {
        $query = PartnerRequest::query();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $partners = $query->latest()->get()->map(fn($p) => [
            'id'          => $p->id,
            'name'        => $p->name,
            'email'       => $p->email,
            'status'      => $p->status,
            'logo'        => $p->logo,
            'description' => $p->description,
            'created_at'  => $p->created_at,
        ]);

        $stats = [
            'total'    => PartnerRequest::count(),
            'pending'  => PartnerRequest::where('status', 'pending')->count(),
            'approved' => PartnerRequest::where('status', 'approved')->count(),
            'rejected' => PartnerRequest::where('status', 'rejected')->count(),
        ];

        return response()->json([
            'partners' => $partners,
            'stats'    => $stats,
        ]);
    }

    public function approve($id)
        {
            $partnerRequest = PartnerRequest::findOrFail($id);
            $partnerRequest->update(['status' => 'approved']);

            // Копируем в таблицу partners
            Partner::updateOrCreate(
                ['email' => $partnerRequest->email],
                [
                    'name'        => $partnerRequest->name,
                    'email'       => $partnerRequest->email,
                    'password'    => $partnerRequest->password,
                    'description' => $partnerRequest->description ?? '',
                    'status'      => 'approved',
                ]
            );

            return response()->json(['message' => 'Партнёр принят']);
        }

    public function reject($id)
    {
        $partner = PartnerRequest::findOrFail($id);
        $partner->update(['status' => 'rejected']);
        return response()->json(['message' => 'Отклонён']);
    }

    public function destroy($id)
    {
        $partner = PartnerRequest::findOrFail($id);
        $partner->delete();
        return response()->json(['message' => 'Удалён']);
    }
    public function show($id)
    {
        $partner = PartnerRequest::findOrFail($id);

        return response()->json([
            'id'          => $partner->id,
            'name'        => $partner->name,
            'email'       => $partner->email,
            'status'      => $partner->status,
            'logo'        => $partner->logo,
            'description' => $partner->description ?? '',
            'created_at'  => $partner->created_at,
            'updated_at'  => $partner->updated_at,
        ]);
    }
}