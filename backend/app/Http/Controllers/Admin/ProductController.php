<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $promotions = Promotion::all();

        return view('admin.products.create', compact(
            'categories',
            'brands',
            'promotions'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'brand'    => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price'    => 'required|numeric',
            'discount' => 'nullable|numeric',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $promotions = Promotion::all();

        return view('admin.products.edit', compact(
            'product',
            'categories',
            'brands',
            'promotions'
        ));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'brand'    => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price'    => 'required|numeric',
            'discount' => 'nullable|numeric',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
