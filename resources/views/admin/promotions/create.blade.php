@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <h3>Добавить акцию</h3>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Название акции</label>
                    <input type="text" class="form-control" placeholder="Введите название">
                </div>

                <div class="mb-3">
                    <label class="form-label">Описание</label>
                    <textarea class="form-control" rows="3" placeholder="Описание акции"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Скидка (%)</label>
                    <input type="number" class="form-control" placeholder="10">
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ url('admin/promotions') }}" class="btn btn-secondary">Назад</a>
                    <a href="{{ url('admin/promotions') }}" class="btn btn-primary">Сохранить</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
