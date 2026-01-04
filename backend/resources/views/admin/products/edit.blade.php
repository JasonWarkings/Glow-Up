@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Редактировать товар</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="form-control mb-2" name="title" value="{{ $product->title }}" required>

            <select name="category" class="form-control mb-2" required>
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}" @if($product->category == $category->name) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="brand" class="form-control mb-2" required>
                <option value="">Выберите бренд</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->name }}" @if($product->brand == $brand->name) selected @endif>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>

            <select name="discount" class="form-control mb-2">
                <option value="">Нет акции</option>
                @foreach($promotions as $promotion)
                    <option value="{{ $promotion->discount }}" @if($product->discount == $promotion->discount) selected @endif>
                        {{ $promotion->title }} ({{ $promotion->discount }}%)
                    </option>
                @endforeach
            </select>

            <input class="form-control mb-2" name="price" type="number" value="{{ $product->price }}" required>
            <input class="form-control mb-2" name="image" type="file">

            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" style="width:150px;height:150px;object-fit:cover;border-radius:5px;margin-bottom:10px">
            @endif

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
</div>
@endsection
