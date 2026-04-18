@extends('layouts.main')

@section('title', 'Исполнение заказа — ЯСТРЕБ')

@section('content')

<div class="site-center py-4">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Заказы</a></li>
            <li class="breadcrumb-item active">Исполнение #{{ $order->id }}</li>
        </ol>
    </nav>

    <h1 class="mb-3">Исполнение заказа #{{ $order->id }}</h1>
    <div class="card mb-4">
        <div class="card-body">
            <p class="mb-1"><strong>Маршрут:</strong> {{ $order->from_address }} → {{ $order->to_address }}</p>
            @if($order->weight)<p class="mb-1 small">Вес: {{ $order->weight }} кг</p>@endif
            @if($order->volume)<p class="mb-1 small">Объём: {{ $order->volume }} м³</p>@endif
            <p class="mb-1 small"><strong>Клиент:</strong> {{ $order->user->name ?? '—' }}</p>
            <p class="mb-1 small"><strong>Email:</strong> {{ $order->user->email ?? '—' }}</p>
            <p class="mb-0 small"><strong>Телефон:</strong> {{ $order->contact_phone ?? $order->user->phone ?? '—' }}</p>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <form action="{{ route('orders.assign', $order->id) }}" method="post" class="mb-4">
        @csrf
        <input type="hidden" name="action" value="assign">
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label">Цена клиента, ₽</label>
                <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $order->price) }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Телефон клиента</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone', $order->contact_phone ?? $order->user->phone) }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Запланировано</label>
                <input type="datetime-local" name="scheduled_at" value="{{ old('scheduled_at', $order->scheduled_at ? $order->scheduled_at->format('Y-m-d\TH:i') : '') }}" class="form-control">
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Дата и время приезда</label>
                <input type="datetime-local" name="arrival_at" value="{{ old('arrival_at', $order->arrival_at ? $order->arrival_at->format('Y-m-d\TH:i') : '') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Статус сейчас</label>
                <input type="text" class="form-control" value="{{ $order->status }}" disabled>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Водитель</label>
                <select class="form-select" name="driver_id">
                    <option value="">— Выберите —</option>
                    @foreach($drivers as $u)
                    <option value="{{ $u->id }}" {{ $order->driver_id == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Грузчик</label>
                <select class="form-select" name="loader_id">
                    <option value="">— Не требуется —</option>
                    @foreach($loaders as $u)
                    <option value="{{ $u->id }}" {{ $order->loader_id == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <button type="submit" class="btn btn-primary">Назначить и в работу</button>
            <button type="submit" name="action" value="postpone" class="btn btn-outline-secondary">Отложить</button>
        </div>
    </form>

    <form action="{{ route('orders.cancel', $order->id) }}" method="post" class="mb-3">
        @csrf
        <button type="submit" class="btn btn-danger">Отменить заказ</button>
    </form>

    <p><a href="{{ route('orders.index') }}" class="small">← К списку заказов</a></p>
</div>

@endsection
