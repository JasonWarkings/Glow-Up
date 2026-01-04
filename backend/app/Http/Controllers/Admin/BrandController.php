<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    // Список брендов
    public function index()
    {
        $brands = Brand::all(); // получаем все бренды из базы
        return view('admin.brands.index', compact('brands'));
    }

    // Форма создания
    public function create()
    {
        return view('admin.brands.create');
    }

    // Сохранение нового бренда
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'logo' => 'nullable|image|max:2048',
        ]);

        // если есть файл, сохраняем его
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/brands', $filename);
            $data['logo'] = 'storage/brands/' . $filename;
        }

        Brand::create($data);

        return redirect()->route('admin.brands.index')->with('success', 'Бренд добавлен');
    }

    // Форма редактирования
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    // Обновление
    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/brands', $filename);
            $data['logo'] = 'storage/brands/' . $filename;
        }

        $brand->update($data);

        return redirect()->route('admin.brands.index')->with('success', 'Бренд обновлён');
    }

    // Удаление
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Бренд удалён');
    }
}
