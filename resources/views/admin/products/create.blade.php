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
            <input class="form-control mb-2" name="category" placeholder="Категория">
            <input class="form-control mb-2" name="brand" placeholder="Бренд">
            <input class="form-control mb-2" name="price" type="number" placeholder="Цена">
            <input class="form-control mb-2" name="discount" placeholder="Скидка">
            <input class="form-control mb-2" name="image" type="file">
            <button class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection
