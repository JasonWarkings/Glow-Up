@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <h3>Редактировать бренд</h3>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('admin.brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Название бренда</label>
                <input type="text" name="name" class="form-control" value="{{ $brand->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Логотип</label>
                <input type="file" name="logo" class="form-control">
                @if($brand->logo)
                <img src="{{ asset('storage/' . $brand->logo) }}" style="width:150px;height:150px;object-fit:cover;margin-top:10px;border-radius:5px">
                @endif
            </div>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Назад</a>
            <button class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>
@endsection
