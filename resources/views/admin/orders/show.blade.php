@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Просмотр заказа #{{ $id }}</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <p><strong>Пользователь:</strong> Иван Иванов</p>
                <p><strong>Товары:</strong> Товар 1, Товар 2</p>
                <p><strong>Сумма:</strong> 15000</p>
                <p><strong>Статус:</strong> В обработке</p>

                <a href="{{ url('admin/orders') }}" class="btn btn-secondary mt-3">Назад к списку заказов</a>
            </div>
        </div>
    </div>
</div>
@endsection
