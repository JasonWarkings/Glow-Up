@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Добавить товар</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input class="form-control mb-2" name="title" placeholder="Название">

            <select name="category" class="form-control mb-2">
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <select name="brand" class="form-control mb-2">
                <option value="">Выберите бренд</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                @endforeach
            </select>

            <input class="form-control mb-2" name="price" type="number" placeholder="Цена">

            <select name="discount" class="form-control mb-2">
                <option value="">Нет акции</option>
                @foreach($promotions as $promotion)
                    <option value="{{ $promotion->discount }}">
                        {{ $promotion->title }} – {{ $promotion->discount }}%
                    </option>
                @endforeach
            </select>

            <input class="form-control mb-2" name="image" type="file">

            <button class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection
