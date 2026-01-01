<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Разрешаем использовать этот реквест
     */
    public function authorize(): bool
{
    return true; // обязательно true, иначе 500 ошибка при валидации
}

public function rules(): array
{
    return [
        'name' => 'required|string|max:255|unique:brands,name,' . $this->brand ,
        'logo' => 'nullable|image|max:2048',
    ];
}

}
