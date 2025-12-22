@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Заказы</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row g-3">

            {{-- Заказ 1 --}}
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h6 class="fw-bold text-center mb-2">Заказ #1</h6>

                    <p class="mb-1 small">
                        <strong>Пользователь:</strong> Иван Иванов
                    </p>

                    <p class="mb-1 small">
                        <strong>Товары:</strong> 2
                    </p>

                    <p class="mb-1 small">
                        <strong>Сумма:</strong> 15 000 тг
                    </p>

                    <p class="mb-2 small">
                        <strong>Статус:</strong>
                        <span class="badge bg-warning text-dark">В обработке</span>
                    </p>

                    <a href="{{ url('admin/orders/show/1') }}"
                       class="btn btn-sm btn-outline-primary w-100">
                        Просмотр
                    </a>
                </div>
            </div>

            {{-- Заказ 2 --}}
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h6 class="fw-bold text-center mb-2">Заказ #2</h6>

                    <p class="mb-1 small">
                        <strong>Пользователь:</strong> Анна Смирнова
                    </p>

                    <p class="mb-1 small">
                        <strong>Товары:</strong> 1
                    </p>

                    <p class="mb-1 small">
                        <strong>Сумма:</strong> 10 000 тг
                    </p>

                    <p class="mb-2 small">
                        <strong>Статус:</strong>
                        <span class="badge bg-success">Завершён</span>
                    </p>

                    <a href="{{ url('admin/orders/show/2') }}"
                       class="btn btn-sm btn-outline-primary w-100">
                        Просмотр
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
