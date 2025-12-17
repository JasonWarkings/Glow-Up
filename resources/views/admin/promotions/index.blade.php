@extends('layouts.admin')

@section('content')
<div class="app-content-header d-flex justify-content-between align-items-center">
    <h3>Акции и скидки</h3>
    <a href="{{ url('admin/promotions/create') }}" class="btn btn-primary">Добавить акцию</a>
</div>

<div class="app-content">
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название акции</th>
                    <th>Описание</th>
                    <th>Скидка (%)</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Летняя распродажа</td>
                    <td>Скидка на все косметические товары</td>
                    <td>15</td>
                    <td>
                        <a href="{{ url('admin/promotions/edit/1') }}" class="btn btn-sm btn-warning">Редактировать</a>
                        <a href="{{ url('admin/promotions') }}" class="btn btn-sm btn-danger">Удалить</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
