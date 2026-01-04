@extends('layouts.admin')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <h3>Бренды</h3>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Добавить бренд</a>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row g-3">
            @foreach($brands as $brand)
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center">
                    <h6 class="fw-bold mb-2">{{ $brand->name }}</h6>
                    <img src="{{ $brand->logo }}" alt="{{ $brand->name }}" class="img-fluid mb-2" style="height:150px; object-fit:cover;">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-outline-primary">Редактировать</a>
                        <form action="{{ route('admin.brands.delete', $brand->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
