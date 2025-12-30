@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h3>Товары</h3>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Добавить товар</a>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row g-3 justify-content-center">

            @foreach($products as $product)
            <div class="col-md-4">
                <div class="card shadow-sm p-2">
                    <h6 class="text-center mb-2 fw-bold">{{ $product->title }}</h6>

                    <div class="text-center mb-2">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" style="width:150px;height:150px;object-fit:cover;border-radius:5px">
                        @else
                        <div style="width:150px;height:150px;background:#ddd;display:flex;align-items:center;justify-content:center;font-weight:bold;color:#555;border-radius:5px;">
                            Фото
                        </div>
                        @endif
                    </div>

                    <p class="mb-1 small"><strong>Категория:</strong> {{ $product->category }}</p>
                    <p class="mb-1 small"><strong>Бренд:</strong> {{ $product->brand }}</p>
                    <p class="mb-1 small"><strong>Цена:</strong> {{ $product->price }} тг</p>
                    <p class="mb-1 small"><strong>Акция / Скидка:</strong> {{ $product->discount ?? 'Нет' }}</p>

                    <div class="d-flex gap-1 mt-2 justify-content-center">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Редактировать</a>

                        <form action="{{ route('admin.products.delete', $product) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
