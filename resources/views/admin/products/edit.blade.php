@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Редактировать товар</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="#" method="POST">
            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" class="form-control" value="Товар 1">
            </div>
            <div class="mb-3">
                <label class="form-label">Фото</label>
                <input type="file" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Цена</label>
                <input type="number" class="form-control" value="1000">
            </div>
            <a href="{{ url('admin/products') }}" class="btn btn-success">Сохранить</a>
        </form>
    </div>
</div>
@endsection
