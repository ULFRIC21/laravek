@extends('layouts.main')

@section('title', 'Заявки на работу — Админ-панель')

@section('content')
<div class="site-center py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">Заявки на работу</h1>
            <p class="text-muted mb-0">Здесь администратор может утвердить заявки водителей и грузчиков.</p>
        </div>
        <a href="{{ route('admin') }}" class="btn btn-outline-secondary">Вернуться в админку</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Электронная почта</th>
                    <th>Роль</th>
                    <th>Телефон</th>
                    <th>Информация о машине</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role === 'driver_request' ? 'Водитель' : 'Грузчик' }}</td>
                        <td>{{ $user->phone ?? '-' }}</td>
                        <td>{{ $user->vehicle_info ?? '-' }}</td>
                        <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.requests.approve', $user->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Одобрить</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Нет заявок.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection