@extends('layouts.main')

@section('title', 'Кабинет водителя — ЯСТРЕБ')

@section('content')

<div class="site-center py-4">
    <h1 class="mb-3">Личный кабинет водителя</h1>
    <p class="text-muted mb-4">Мои назначенные рейсы.</p>

    <div class="row g-3">
        @forelse($orders as $order)
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Рейс #{{ $order->id }}</h5>
                    <p class="card-text small mb-0">{{ $order->from_address }} → {{ $order->to_address }}</p>
                    <p class="card-text small text-muted mb-2">Создан: {{ $order->created_at->format('d.m.Y H:i') }}</p>
                    <a href="{{ route('orders.complete', $order->id) }}" class="btn btn-sm btn-success">Завершить доставку</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-light border">Пока нет назначенных рейсов.</div>
        </div>
        @endforelse
    </div>
</div>

@endsection
