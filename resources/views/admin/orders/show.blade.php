@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Просмотр заказа #{{ $order->id }}</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Пользователь:</strong> {{ $order->customer_name }}</p>

                <p>
                    <strong>Статус:</strong>
                    @if($order->status === 'processing')
                        <span class="badge bg-warning text-dark">В обработке</span>
                    @else
                        <span class="badge bg-success">Завершён</span>
                    @endif
                </p>

                <p>
                    <strong>Сумма:</strong>
                    {{ number_format($order->total_price, 0, '', ' ') }} тг
                </p>
            </div>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
            Назад к заказам
        </a>

    </div>
</div>
@endsection
