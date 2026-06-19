<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'content' => 'required|string',
            'product_image' => 'nullable|string',
        ];
    }
}
