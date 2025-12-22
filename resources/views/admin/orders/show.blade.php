@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Просмотр заказа #{{ $id }}</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        {{-- Информация о заказе --}}
        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Пользователь:</strong> Иван Иванов</p>
                <p>
                    <strong>Статус:</strong>
                    <span class="badge bg-warning text-dark">В обработке</span>
                </p>
                <p><strong>Сумма:</strong> 15 000 тг</p>
            </div>
        </div>

        <h5 class="mb-3">Товары в заказе</h5>

        <div class="row g-3">

            {{-- Товар 1 --}}
            <div class="col-md-4">
                <div class="card shadow-sm p-2">
                    <h6 class="text-center fw-bold mb-2">Товар 1</h6>

                    <div class="text-center mb-2">
                        <div
                            style="
                                width:150px;
                                height:150px;
                                background-color:#ddd;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                font-weight:bold;
                                color:#555;
                                margin:0 auto;
                                border-radius:5px;
                            ">
                            Фото
                        </div>
                    </div>

                    <p class="small mb-1"><strong>Цена:</strong> 10 000 тг</p>
                    <p class="small mb-1"><strong>Количество:</strong> 1</p>
                </div>
            </div>

            {{-- Товар 2 --}}
            <div class="col-md-4">
                <div class="card shadow-sm p-2">
                    <h6 class="text-center fw-bold mb-2">Товар 2</h6>

                    <div class="text-center mb-2">
                        <div
                            style="
                                width:150px;
                                height:150px;
                                background-color:#ddd;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                font-weight:bold;
                                color:#555;
                                margin:0 auto;
                                border-radius:5px;
                            ">
                            Фото
                        </div>
                    </div>

                    <p class="small mb-1"><strong>Цена:</strong> 5 000 тг</p>
                    <p class="small mb-1"><strong>Количество:</strong> 1</p>
                </div>
            </div>

        </div>

        <a href="{{ url('admin/orders') }}" class="btn btn-secondary mt-4">
            Назад к заказам
        </a>

    </div>
</div>
@endsection
