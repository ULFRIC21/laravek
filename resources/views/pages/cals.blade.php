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
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Тип транспорта</label>
                            <select class="form-select">
                                <option>Газель</option>
                                <option>5-тонник</option>
                                <option>Фура 20 тонн</option>
                                <option>Контейнер ЖД</option>
                            </select>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Откуда</label>
                                <input type="text" class="form-control" placeholder="Город погрузки">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Куда</label>
                                <input type="text" class="form-control" placeholder="Город выгрузки">
                            </div>
                        </div>
                        <div class="row g-3 mt-1">
                            <div class="col-md-6">
                                <label class="form-label">Вес груза, кг</label>
                                <input type="number" class="form-control" placeholder="Например, 1500">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Объём, м³</label>
                                <input type="number" class="form-control" placeholder="Например, 12">
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
                        <button type="submit" class="btn btn-warning fw-semibold mt-3">Рассчитать</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title mb-3">Ориентировочная стоимость</h5>
                    <p class="display-6 mb-2">от 5 000 ₽</p>
                    <p class="small text-muted mb-0">Точная стоимость зависит от километража, типа транспорта, сезона и дополнительных услуг. После отправки заявки менеджер уточнит детали и подтвердит окончательную цену.</p>
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
@endsection
