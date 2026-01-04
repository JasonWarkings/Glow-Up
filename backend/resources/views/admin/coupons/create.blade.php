@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Добавить промокод</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="{{ route('admin.coupons.store') }}" method="POST" class="card p-4 col-md-6">
            @csrf

            <label class="form-label">Код промокода</label>
            <input name="code" class="form-control mb-3" required>

            <label class="form-label">Скидка (%)</label>
            <input name="discount" type="number" min="1" max="100"
                   class="form-control mb-3" required>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                <label class="form-check-label">Активен</label>
            </div>

            <label class="form-label">Дата начала</label>
            <input type="date" name="starts_at" class="form-control mb-3">

            <label class="form-label">Дата окончания</label>
            <input type="date" name="ends_at" class="form-control mb-3">

            <button class="btn btn-primary">Сохранить</button>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">
                Назад
            </a>
        </form>
    </div>
</div>
@endsection
