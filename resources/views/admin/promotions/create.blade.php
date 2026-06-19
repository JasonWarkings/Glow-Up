@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <h3>Добавить акцию</h3>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form method="POST" action="{{ route('admin.promotions.store') }}">
            @csrf

            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Название акции</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Скидка (%)</label>
                        <input type="number" name="discount" class="form-control">
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary">
                            Назад
                        </a>
                        <button class="btn btn-primary">Сохранить</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
