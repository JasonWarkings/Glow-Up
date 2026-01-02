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

            @foreach($orders as $order)
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h6 class="fw-bold text-center mb-2">
                            Заказ #{{ $order->id }}
                        </h6>

                        <p class="mb-1 small">
                            <strong>Пользователь:</strong> {{ $order->customer_name }}
                        </p>

                        <p class="mb-1 small">
                            <strong>Товары:</strong> {{ $order->items_count }}
                        </p>

                        <p class="mb-1 small">
                            <strong>Сумма:</strong> {{ number_format($order->total_price, 0, '', ' ') }} тг
                        </p>

                        <p class="mb-2 small">
                            <strong>Статус:</strong>
                            @if($order->status === 'processing')
                                <span class="badge bg-warning text-dark">В обработке</span>
                            @else
                                <span class="badge bg-success">Завершён</span>
                            @endif
                        </p>

                        <a href="{{ route('admin.orders.show', $order) }}"
                           class="btn btn-sm btn-outline-primary w-100">
                            Просмотр
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
