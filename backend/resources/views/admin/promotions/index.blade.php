@extends('layouts.admin')

@section('content')
<div class="app-content-header d-flex justify-content-between align-items-center">
    <h3>Акции и скидки</h3>
    <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">Добавить акцию</a>
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
                @foreach($promotions as $promotion)
                <tr>
                    <td>{{ $promotion->id }}</td>
                    <td>{{ $promotion->title }}</td>
                    <td>{{ $promotion->description }}</td>
                    <td>{{ $promotion->discount }}</td>
                    <td>
                        <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-sm btn-warning">Редактировать</a>

                        <form action="{{ route('admin.promotions.delete', $promotion) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
