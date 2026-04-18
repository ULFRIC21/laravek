@extends('layouts.main')

@section('title', 'Админ-панель — ЯСТРЕБ')

@section('content')

<div class="site-center py-4">
    <h1 class="mb-3">Админ-панель</h1>
    <p class="text-muted mb-4">Сводка по заказам.</p>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4">
            <div class="card border-primary">
                <div class="card-body text-center">
                    <div class="h4 mb-0">{{ $stats['orders_new'] }}</div>
                    <small class="text-muted">Новых заказов</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card border-warning">
                <div class="card-body text-center">
                    <div class="h4 mb-0">{{ $stats['orders_in_progress'] }}</div>
                    <small class="text-muted">В работе</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card border-success">
                <div class="card-body text-center">
                    <div class="h4 mb-0">{{ $stats['orders_completed'] }}</div>
                    <small class="text-muted">Завершено</small>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="{{ route('admin.requests') }}" class="btn btn-outline-secondary">Заявки на работу</a>
    </div>

    <h2 class="h5 mb-2">Последние заказы</h2>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead class="table-light">
                <tr>
                    <th>№</th>
                    <th>Маршрут</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->from_address }} → {{ $order->to_address }}</td>
                    <td>
                        @if($order->status === 'new')
                        <span class="badge bg-secondary">Новый</span>
                        @elseif($order->status === 'in_progress')
                        <span class="badge bg-primary">В работе</span>
                        @else
                        <span class="badge bg-success">Завершён</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('orders.execute', $order->id) }}" class="btn btn-sm btn-outline-primary">Исполнение</a>
                        <a href="{{ route('orders.complete', $order->id) }}" class="btn btn-sm btn-outline-success">Завершить</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-muted text-center py-3">Нет заказов.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="mt-3">
        <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-sm">Список активных заказов</a>
    </p>
</div>

@endsection
