@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Отзывы</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Пользователь</th>
                    <th>Товар</th>
                    <th>Отзыв</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->user_name }}</td>
                        <td>{{ $review->product_name }}</td>
                        <td>{{ Str::limit($review->content, 40) }}</td>
                        <td>
                            <a href="{{ route('admin.reviews.show', $review) }}"
                               class="btn btn-sm btn-info">
                                Просмотр
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
