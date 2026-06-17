@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <h3>Добавить бренд</h3>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Название бренда</label>
                <input type="text" name="name" class="form-control" placeholder="Введите название">
            </div>
            <div class="mb-3">
                <label class="form-label">Логотип</label>
                <input type="file" name="logo" class="form-control">
            </div>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Назад</a>
            <button class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>
@endsection
