@extends('layouts.main')

@section('title', 'Завершение заказа — ЯСТРЕБ')

@section('content')

<div class="site-center py-4">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Заказы</a></li>
            <li class="breadcrumb-item active">Завершение #{{ $order->id }}</li>
        </ol>
    </nav>

    <h1 class="mb-3">Завершение заказа #{{ $order->id }}</h1>
    <div class="card mb-4">
        <div class="card-body">
            <p class="mb-0"><strong>Маршрут:</strong> {{ $order->from_address }} → {{ $order->to_address }}</p>
        </div>
    </div>

    <form action="{{ route('orders.complete.store', $order->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Комментарий (по желанию)</label>
            <textarea class="form-control" name="comment" rows="2" placeholder="Замечания по доставке">{{ old('comment', $order->comment) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Заказ выполнен</button>
    </form>

    <p class="mt-3"><a href="{{ route('orders.index') }}" class="small">← К списку заказов</a></p>
</div>

@endsection
