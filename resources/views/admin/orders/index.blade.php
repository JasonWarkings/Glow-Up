@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h3>Заказы</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Пользователь</th>
                    <th>Товары</th>
                    <th>Сумма</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                {{-- Пример заказа --}}
                <tr>
                    <td>1</td>
                    <td>Иван Иванов</td>
                    <td>Товар 1, Товар 2</td>
                    <td>15000</td>
                    <td>
                        <a href="{{ url('admin/orders/show/1') }}" class="btn btn-sm btn-info">Просмотр</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
