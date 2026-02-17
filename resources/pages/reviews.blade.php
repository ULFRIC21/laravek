@extends('layouts.main')

@section('title', 'Отзывы — ЯСТРЕБ')

@section('content')

<nav aria-label="breadcrumb" class="bg-light border-top" style="padding:8px 0;">
    <div class="site-center">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Главная</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Проекты</li>
        </ol>
    </div>
</nav>
<div class="site-center py-4">
    <h1 class="mb-3">Отзывы клиентов</h1>
    <p class="text-muted mb-4">Здесь собраны реальные отзывы компаний и частных клиентов, которые доверили нам свои грузы.</p>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-1">ООО «СтройИнвест»</h5>
                    <p class="small text-muted mb-2">Москва — Санкт‑Петербург</p>
                    <p class="card-text small">
                        «Работаем с компанией уже больше года. Понравилась оперативность доставки и честный подход:
                        всегда заранее предупреждают о рисках и помогают подобрать оптимальный тариф.»
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-1">ИП Петров А. В.</h5>
                    <p class="small text-muted mb-2">Новосибирск — Омск</p>
                    <p class="card-text small">
                        «Нужно было срочно доставить оборудование. Менеджер быстро рассчитал маршрут, водитель был
                        на погрузке вовремя, груз приехал целым. Обязательно будем обращаться ещё.»
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">Оставить отзыв</h5>
            <form>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Имя / компания</label>
                        <input type="text" class="form-control" placeholder="Как к вам обращаться">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Контактный телефон</label>
                        <input type="tel" class="form-control" placeholder="+7 (___) ___‑__‑__">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Отзыв</label>
                        <textarea class="form-control" rows="3" placeholder="Расскажите, как прошла перевозка"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning fw-semibold">Отправить отзыв</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection