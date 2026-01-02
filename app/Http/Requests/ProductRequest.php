<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|integer',
            'discount' => 'nullable|string',
            'image' => 'nullable|image',
        ];
    }
}
