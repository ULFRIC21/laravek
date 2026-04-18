@extends('layouts.main')

@section('title', 'Расчёт оплаты и комиссии — ЯСТРЕБ')

@section('content')
<nav aria-label="breadcrumb" class="bg-light border-top" style="padding:8px 0;">
    <div class="site-center">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Расчёт стоимости</li>
        </ol>
    </div>
</nav>

<div class="site-center py-4">
    <h1 class="mb-3">Расчёт оплаты и комиссии</h1>
    <p class="text-muted mb-4">Заполните основные параметры перевозки, и мы рассчитаем ориентировочную стоимость.</p>

    <div class="row g-4">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Параметры перевозки</h5>

                    @guest
                        <div class="alert alert-warning">
                            Для расчёта стоимости сначала зарегистрируйтесь как заказчик.
                        </div>
                        <a href="{{ route('register', ['role' => 'client']) }}" class="btn btn-primary">Зарегистрироваться как заказчик</a>
                    @else
                        @if(auth()->user()->isClient())
                        <form id="calc-form">
                            <div class="mb-3">
                                <label class="form-label">Тип транспорта</label>
                                <select class="form-select" id="transportType">
                                    <option value="gazelle">Газель</option>
                                    <option value="5ton">5-тонник</option>
                                    <option value="truck">Фура 20 тонн</option>
                                    <option value="container">Контейнер ЖД</option>
                                </select>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Откуда</label>
                                    <input type="text" id="fromCity" class="form-control" placeholder="Город погрузки">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Куда</label>
                                    <input type="text" id="toCity" class="form-control" placeholder="Город выгрузки">
                                </div>
                            </div>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <label class="form-label">Вес груза, кг</label>
                                    <input type="number" id="cargoWeight" class="form-control" placeholder="Например, 1500" min="0">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Объём, м³</label>
                                    <input type="number" id="cargoVolume" class="form-control" placeholder="Например, 12" min="0">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Дополнительные услуги</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="loaders">
                                    <label class="form-check-label" for="loaders">Услуги грузчиков</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="insurance">
                                    <label class="form-check-label" for="insurance">Страхование груза</label>
                                </div>
                            </div>
                            <button type="button" id="calculateButton" class="btn btn-warning fw-semibold mt-3">Рассчитать</button>
                        </form>
                        @else
                        <div class="alert alert-info">
                            Расчёт доступен только заказчикам. Если вы водитель или грузчик, используйте личный кабинет для своих задач.
                        </div>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title mb-3">Ориентировочная стоимость</h5>
                    <p id="estimatedPrice" class="display-6 mb-2">от 5 000 ₽</p>
                    <p id="estimateNote" class="small text-muted mb-0">Точная стоимость зависит от километража, типа транспорта, сезона и дополнительных услуг. После отправки заявки менеджер уточнит детали и подтвердит окончательную цену.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Направление</th>
                        <th>20 футов</th>
                        <th>40 футов</th>
                        <th>Вид доставки</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Абакан</td><td>178 000 руб.</td><td>183 000 руб.</td><td>дверь-дверь</td></tr>
                    <tr><td>Екатеринбург</td><td>164 000 руб.</td><td>171 000 руб.</td><td>терминал-дверь</td></tr>
                    <tr><td>Краснодар</td><td>152 000 руб.</td><td>160 000 руб.</td><td>дверь-дверь</td></tr>
                    <tr><td>Новосибирск</td><td>169 000 руб.</td><td>176 000 руб.</td><td>терминал-терминал</td></tr>
                    <tr><td>Ростов-на-Дону</td><td>146 000 руб.</td><td>154 000 руб.</td><td>дверь-дверь</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const button = document.getElementById('calculateButton');
        const price = document.getElementById('estimatedPrice');
        const note = document.getElementById('estimateNote');
        if (!button || !price) return;

        button.addEventListener('click', function () {
            const type = document.getElementById('transportType').value;
            const weight = Number(document.getElementById('cargoWeight').value) || 0;
            const volume = Number(document.getElementById('cargoVolume').value) || 0;
            const loaders = document.getElementById('loaders').checked;
            const insurance = document.getElementById('insurance').checked;

            let base = 5000;
            if (type === '5ton') base += 4000;
            if (type === 'truck') base += 9000;
            if (type === 'container') base += 12000;
            base += Math.round(weight * 2.5 + volume * 250);
            if (loaders) base += 1500;
            if (insurance) base += 1200;

            price.textContent = new Intl.NumberFormat('ru-RU').format(base) + ' ₽';
            note.textContent = 'Это ориентировочная стоимость. Менеджер уточнит детали и подтвердит окончательную цену.';
        });
    });
</script>
@endpush
@endsection
