@extends('layouts.admin')

@section('content')
    <div class="container mt-3">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr class="{{ $user->status === 'banned' ? 'table-danger' : '' }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    <span class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ $user->status === 'active' ? 'Активен' : 'Забанен' }}
                    </span>
                    </td>
                    <td class="d-flex gap-2">
                        @if($user->status === 'active')
                            <form action="{{ route('admin.users.status', $user) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="banned">
                                <button class="btn btn-sm btn-danger">Забанить</button>
                            </form>
                        @else
                            <form action="{{ route('admin.users.status', $user) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="active">
                                <button class="btn btn-sm btn-success">Разбанить</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Пользователи не найдены</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
