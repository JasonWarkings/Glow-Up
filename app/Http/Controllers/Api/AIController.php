<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AIController extends Controller
{
    
    public function chat(Request $request)
        {
            $text = mb_strtolower($request->message);

            // очистка
            $text = preg_replace('/\b(мне|нужен|нужна|нужно|хочу|покажи|подбери|дай)\b/u', '', $text);
            $text = trim($text);

            logger()->info('AI cleaned', [
                'original' => $request->message,
                'cleaned' => $text
            ]);

            // поиск
            $products = Product::where('title', 'like', "%{$text}%")
                ->orWhere('brand', 'like', "%{$text}%")
                ->orWhere('category', 'like', "%{$text}%")
                ->orWhere('description', 'like', "%{$text}%")
                ->take(5)
                ->get();

            if ($products->count()) {

                $answer = "Я нашёл подходящие товары:\n\n";

                foreach ($products as $product) {
                    $answer .= "• {$product->title}\n";
                    $answer .= "  Бренд: {$product->brand}\n";
                    $answer .= "  Цена: {$product->final_price} ₸\n\n";
                }

                return response()->json([
                    'answer' => $answer
                ]);
            }

            if (str_contains($text, 'кожа')) {
                return response()->json([
                    'answer' => "Для ухода за кожей: очищение, увлажнение, SPF"
                ]);
            }

            if (str_contains($text, 'волос')) {
                return response()->json([
                    'answer' => "Для волос: маски, масла, термозащита"
                ]);
            }

            return response()->json([
                'answer' => "Попробуй: крем, шампунь, маска, бренд"
            ]);
        }
    private function expandQuery($text)
    {
        $map = [
            'кожа' => ['кожа', 'лицо', 'дерма'],
            'сухая кожа' => ['увлажнение', 'крем', 'hydrating', 'moisturizer'],
            'прыщи' => ['акне', 'высыпания', 'blemish', 'acne'],
            'волосы' => ['шампунь', 'маска', 'hair'],
            'чёрные точки' => ['blackhead', 'поры', 'очищение'],
            'увлажнение' => ['hydration', 'увлажняющий', 'moist'],
        ];

        $result = [$text];

        foreach ($map as $key => $values) {
            if (str_contains($text, $key)) {
                $result = array_merge($result, $values);
            }
        }

        return $result;
    }
    
}