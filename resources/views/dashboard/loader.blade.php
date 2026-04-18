@extends('layouts.main')

@section('title', 'Кабинет грузчика — ЯСТРЕБ')

@section('content')

<div class="site-center py-4">
    <h1 class="mb-3">Личный кабинет грузчика</h1>
    <p class="text-muted mb-4">Заявки на погрузку и разгрузку.</p>

    <div class="row g-3">
        @forelse($tasks as $task)
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Заказ #{{ $task->id }}</h5>
                    <p class="card-text small mb-1">Маршрут: {{ $task->from_address }} → {{ $task->to_address }}</p>
                    <p class="card-text small text-muted mb-0">Создан: {{ $task->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-light border">Пока нет заявок.</div>
        </div>
        @endforelse
    </div>
</div>

@endsection
