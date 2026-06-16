<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;

class BrandApiController extends Controller
{
    public function index()
    {
        $brands = Partner::where('status', 'approved')->get()->map(fn($p) => [
            'id'         => $p->id,
            'name'       => $p->name,
            'email'      => $p->email,
            'logo'       => $p->logo,
            'created_at' => $p->created_at,
        ]);

        return response()->json([
            'brands' => $brands,
            'stats'  => [
                'total'     => $brands->count(),
                'with_logo' => $brands->filter(fn($b) => !empty($b['logo']))->count(),
            ],
        ]);
    }
    public function show($id)
    {
        $partner  = Partner::where('status', 'approved')->findOrFail($id);
        $products = \App\Models\Product::where('brand', $partner->name)
            ->withCount('reviews')
            ->latest()
            ->take(6)
            ->get();

        $brandStats = [
            'products_count' => \App\Models\Product::where('brand', $partner->name)->count(),
            'orders_count'   => 0,
            'total_sum'      => 0,
            'avg_price'      => round(\App\Models\Product::where('brand', $partner->name)->avg('price') ?? 0),
        ];

        return response()->json([
            'brand'      => [
                'id'         => $partner->id,
                'name'       => $partner->name,
                'email'      => $partner->email,
                'logo'       => $partner->logo,
                'created_at' => $partner->created_at,
                'updated_at' => $partner->updated_at,
            ],
            'stats'      => $brandStats,
            'products'   => $products,
        ]);
    }
}