<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    // Список всех продуктов
    public function index(Request $request)
    {
        $user = $request->user();

        $favoriteIds = collect();

        if ($user) {
            $favoriteIds = $user->favoriteProducts()
                ->pluck('products.id')
                ->flip(); // ключи = id
        }

        // Максимальная скидка по категориям из активных акций (как на странице "Акции")
        $discountsByCategory = Promotion::get(['category', 'discount'])
            ->groupBy('category')
            ->map(fn($group) => $group->max('discount'));

        $products = Product::get()->map(function ($product) use ($favoriteIds, $discountsByCategory) {

            $pricing = $this->resolvePricing($product, $discountsByCategory);

            return [
                'id' => $product->id,
                'title' => $product->title,
                'brand' => $product->brand,
                'category' => $product->category,
                'price' => $product->price,
                'discount' => $pricing['discount'],
                'final_price' => $pricing['final_price'],
                'image' => $product->image,
                'description' => $product->description ?? '',
                'partner_id' => $product->partner_id,
                'is_favorite' => isset($favoriteIds[$product->id]),
                'created_at'  => $product->created_at, 
            ];
        });

        return response()->json($products);
    }

    // Детали одного продукта
    public function show(Request $request, $id)
    {
        $user = $request->user();

        $product = Product::findOrFail($id);

        $discountsByCategory = Promotion::where('category', $product->category)
            ->get(['category', 'discount'])
            ->groupBy('category')
            ->map(fn($group) => $group->max('discount'));

        $pricing = $this->resolvePricing($product, $discountsByCategory);

        $isFavorite = false;

        if ($user) {
            $isFavorite = $user->favoriteProducts()
                ->where('products.id', $id)
                ->exists();
        }

        return response()->json([
            'id' => $product->id,
            'title' => $product->title,
            'brand' => $product->brand,
            'category' => $product->category,
            'price' => $product->price,
            'discount' => $pricing['discount'],
            'final_price' => $pricing['final_price'],
            'image' => $product->image,
            'description' => $product->description ?? '',
            'is_favorite' => $isFavorite,
            'is_new' => $product->created_at >= now()->subDays(14),
        ]);
    }

    /**
     * Считает итоговую скидку и цену товара, учитывая два независимых источника:
     * 1) Акция по категории (таблица promotions, как на странице "Акции")
     * 2) Персональная скидка товара (discount_active/discount_percent/discount_price,
     *    с проверкой срока действия discount_start/discount_end если он указан)
     *
     * Возвращает тот вариант, который даёт покупателю более низкую цену.
     */
    private function resolvePricing(Product $product, $discountsByCategory): array
    {
        $price = (int) $product->price;

        // 1) Скидка по категории
        $categoryDiscount = (int) ($discountsByCategory->get($product->category) ?? 0);
        $categoryFinalPrice = $categoryDiscount > 0
            ? (int) round($price - ($price * $categoryDiscount / 100))
            : $price;

        // 2) Персональная скидка товара
        $productDiscount = 0;
        $productFinalPrice = $price;

        if ($product->discount_active) {
            $now = now();
            $startOk = !$product->discount_start || $product->discount_start <= $now;
            $endOk   = !$product->discount_end   || $product->discount_end   >= $now;

            if ($startOk && $endOk) {
                if ($product->discount_percent) {
                    $productDiscount = (int) $product->discount_percent;
                    $productFinalPrice = (int) round($price - ($price * $productDiscount / 100));
                } elseif ($product->discount_price) {
                    $productFinalPrice = (int) $product->discount_price;
                    $productDiscount = $price > 0
                        ? (int) round((1 - $productFinalPrice / $price) * 100)
                        : 0;
                }
            }
        }

        // Берём вариант, который выгоднее для покупателя
        if ($productFinalPrice < $categoryFinalPrice) {
            return ['discount' => $productDiscount, 'final_price' => $productFinalPrice];
        }

        return ['discount' => $categoryDiscount, 'final_price' => $categoryFinalPrice];
    }

    // Добавление нового продукта (для админки)
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string',
            'brand'       => 'required|string',
            'category'    => 'required|string',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = $request->only([
            'title',
            'brand',
            'category',
            'price',
            'description',
            'partner_id'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($data);

        return response()->json(['message' => 'Продукт создан', 'product' => $product]);
    }

    public function partnerIndex(Request $request)
    {
        $partnerId = $request->partner_id;

        $products = Product::where('partner_id', $partnerId)->get()->map(function($product) {
            return [
                'id'          => $product->id,
                'title'       => $product->title,
                'brand'       => $product->brand,
                'category'    => $product->category,
                'price'       => $product->price,
                'image'       => $product->image,
                'description' => $product->description ?? '',
            ];
        });

        return response()->json($products);
    } 

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        
        return response()->json(['message' => 'Товар удалён']);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->only(['title', 'brand', 'category', 'price', 'description']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return response()->json(['message' => 'Товар обновлён', 'product' => $product]);
    }

}