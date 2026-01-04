@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Детали отзыва #{{ $review->id }}</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <span class="text-muted">Пользователь</span>
                            <h6 class="fw-bold">{{ $review->user_name }}</h6>
                        </div>

                        <div class="mb-3">
                            <span class="text-muted">Товар</span>
                            <h6 class="fw-bold">{{ $review->product_name }}</h6>
                        </div>

                        <div class="mb-3">
                            <span class="text-muted">Отзыв</span>
                            <div class="border rounded p-3 bg-light">
                                {{ $review->content }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-center">
                        <span class="text-muted d-block mb-2">Фото товара</span>

                        <img
                            src="{{ $review->product_image ?? 'https://via.placeholder.com/200' }}"
                            style="width:200px;height:200px;object-fit:cover;border-radius:8px;"
                        >
                    </div>

                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                        Назад к списку
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
