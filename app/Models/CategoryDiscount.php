<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDiscount extends Model
{
        protected $fillable = 
        [
            'category',
            'discount_percent',
            'active',   
            'start_at',
            'end_at',
        ];
}
