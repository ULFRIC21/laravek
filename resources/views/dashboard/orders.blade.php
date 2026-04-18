@extends('layouts.main')

@section('title', 'Активные заказы — ЯСТРЕБ')

@section('content')

<div class="site-center py-4">
    <h1 class="mb-3">Список активных заказов</h1>
    <p class="text-muted mb-4">Заказы со статусом «Новый» и «В работе». Назначьте водителя и отметьте завершение.</p>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(auth()->user()->isClient())
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title mb-2">Новый заказ</h5>
            <form action="{{ route('orders.store') }}" method="post" class="row g-2 align-items-end">
                @csrf
                <div class="col-md-3">
                    <label class="form-label small">Откуда</label>
                    <input type="text" name="from_address" class="form-control form-control-sm" placeholder="Адрес погрузки" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label small">Куда</label>
                    <input type="text" name="to_address" class="form-control form-control-sm" placeholder="Адрес выгрузки" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label small">Телефон</label>
                    <input type="text" name="contact_phone" class="form-control form-control-sm" placeholder="Контактный номер" value="{{ old('contact_phone', auth()->user()->phone) }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label small">Вес, кг</label>
                    <input type="number" name="weight" class="form-control form-control-sm" placeholder="—" step="0.01" min="0">
                </div>
                <div class="col-md-2">
                    <label class="form-label small">Объём, м³</label>
                    <input type="number" name="volume" class="form-control form-control-sm" placeholder="—" step="0.01" min="0">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-sm w-100">Создать</button>
                </div>
            </form>
        </div>
    </div>
    @elseif(auth()->user()->isAdmin())
    <div class="alert alert-info">Вы видите все активные заказы. Назначьте исполнителей и завершайте рейсы.</div>
    @elseif(auth()->user()->isDriver())
    <div class="alert alert-info">Это ваш кабинет водителя. Здесь отображаются только заказы, назначенные вам.</div>
    @elseif(auth()->user()->isLoader())
    <div class="alert alert-info">Это ваш кабинет грузчика. Здесь отображаются только заявки с вашим назначением.</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>№</th>
                    <th>Откуда → Куда</th>
                    <th>Дата</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->from_address }} → {{ $order->to_address }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        @if($order->status === 'new')
                        <span class="badge bg-secondary">Новый</span>
                        @elseif($order->status === 'in_progress')
                        <span class="badge bg-primary">В работе</span>
                        @elseif($order->status === 'postponed')
                        <span class="badge bg-warning text-dark">Отложен</span>
                        @elseif($order->status === 'cancelled')
                        <span class="badge bg-danger">Отменён</span>
                        @else
                        <span class="badge bg-success">Завершён</span>
                        @endif
                    </td>
                    <td>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('orders.execute', $order->id) }}" class="btn btn-sm btn-outline-primary">В работу</a>
                        <a href="{{ route('orders.complete', $order->id) }}" class="btn btn-sm btn-outline-success">Завершить</a>
                    @endif
                </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-muted text-center py-4">Пока нет активных заказов.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
