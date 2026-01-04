@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h3>Промокоды</h3>
        <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
            <i class="bi bi-plus"></i> Добавить промокод
        </a>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Код</th>
                    <th>Скидка (%)</th>
                    <th>Статус</th>
                    <th>Срок действия</th>
                    <th width="180">Действия</th>
                </tr>
            </thead>
            <tbody>
            @forelse($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->id }}</td>
                    <td><strong>{{ $coupon->code }}</strong></td>
                    <td>{{ $coupon->discount }}%</td>
                    <td>
                        @if($coupon->is_active)
                            <span class="badge bg-success">Активен</span>
                        @else
                            <span class="badge bg-secondary">Не активен</span>
                        @endif
                    </td>
                    <td>
                        {{ $coupon->starts_at ?? '—' }} – {{ $coupon->ends_at ?? '—' }}
                    </td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-sm btn-warning">
                            Редактировать
                        </a>

                        <form action="{{ route('admin.coupons.delete', $coupon) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Удалить промокод?')">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Промокодов пока нет
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
