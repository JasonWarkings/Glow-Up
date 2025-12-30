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
            <input class="form-control mb-2" name="title" value="{{ $product->title }}">
            <input class="form-control mb-2" name="category" value="{{ $product->category }}">
            <input class="form-control mb-2" name="brand" value="{{ $product->brand }}">
            <input class="form-control mb-2" name="price" type="number" value="{{ $product->price }}">
            <input class="form-control mb-2" name="discount" value="{{ $product->discount }}">
            <input class="form-control mb-2" name="image" type="file">

            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" style="width:150px;height:150px;object-fit:cover;border-radius:5px;margin-bottom:10px">
            @endif

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
</div>
@endsection
