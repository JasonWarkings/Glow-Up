<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brand',
        'category',
        'price',
        'image',
        'description',
        'partner_id',

        'discount_active',
        'discount_price',
        'discount_percent',
        'discount_start',
        'discount_end',
    ];

    // 💥 финальная цена
    public function getFinalPriceAttribute()
    {
        $price = $this->price;

        // если скидка включена
        if ($this->discount_active) {

            // если задана фикс цена
            if ($this->discount_price) {
                $price = $this->discount_price;
            }

            // если задан процент
            elseif ($this->discount_percent) {
                $price = $price - ($price * $this->discount_percent / 100);
            }
        }

        return $price;
    }

    // удобно для фронта
    public function getHasDiscountAttribute()
    {
        return $this->final_price < $this->price;
    }

    private function applySellerDiscount($price)
    {
        if (
            $this->discount_active &&
            (!$this->discount_start || now() >= $this->discount_start) &&
            (!$this->discount_end || now() <= $this->discount_end)
        ) {
            if ($this->discount_price) {
                return $this->discount_price;
            }

            if ($this->discount_percent) {
                return $price - ($price * $this->discount_percent / 100);
            }
        }

        return $price;
    }

}
