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
                <p><strong>Статус:</strong>
                    @if($order->status === 'processing')
                        <span class="badge bg-warning text-dark">В обработке</span>
                    @else
                        <span class="badge bg-success">Завершён</span>
                    @endif
                </p>
                <p><strong>Сумма:</strong> {{ number_format($order->total_price,0,'',' ') }} тг</p>
            </div>
        </div>

        <h5 class="mb-3">Фото товара</h5>
        <div class="text-center mb-4">
            @if($order->product_image)
                <img src="{{ $order->product_image }}" alt="Фото товара" style="max-width:200px; border-radius:8px;">
            @else
                <div style="width:200px; height:200px; background:#ddd; display:flex; align-items:center; justify-content:center; font-weight:bold; color:#555; margin:0 auto; border-radius:8px;">
                    Фото
                </div>
            @endif
        </div>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Назад к заказам</a>
    </div>
</div>
@endsection
