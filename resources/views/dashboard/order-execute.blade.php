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
            @if($order->volume)<p class="mb-0 small">Объём: {{ $order->volume }} м³</p>@endif
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <form action="{{ route('orders.assign', $order->id) }}" method="post" class="mb-4">
        @csrf
        <div class="row g-3">
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
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Назначить и перевести в работу</button>
            </div>
        </div>
    </form>

    <p><a href="{{ route('orders.index') }}" class="small">← К списку заказов</a></p>
</div>

@endsection
