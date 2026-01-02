<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:255',
            'items_count'   => 'required|integer|min:1',
            'total_price'   => 'required|integer|min:0',
            'status'        => 'required|in:processing,completed',
        ];
    }
}
