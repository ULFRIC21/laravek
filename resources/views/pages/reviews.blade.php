{{--
  Bootstrap на этой странице:
  - .breadcrumb — цепочка навигации (Главная / Отзывы).
  - .list-group + .list-group-item — вертикальный список; .list-group-item-action — кликабельные пункты; .active — активный пункт (подсветка).
  - data-bs-spy="scroll" + data-bs-target="#list-example" — Scrollspy: при скролле правого блока активным становится соответствующий пункт списка. Контейнеру нужна ограниченная высота (в layout: .scrollspy-example).
  - .row / .col-12 .col-md-4 / .col-md-8 — сетка: на мобильных колонки друг под другом, от md — 4 и 8 колонок.
  - .text-uppercase, .text-muted, .border, .rounded, .p-3 — утилиты Bootstrap для оформления.
--}}
@extends('layouts.main')

@section('title', 'Отзывы — ЯСТРЕБ')

@section('content')

<nav aria-label="breadcrumb" class="bg-light border-top" style="padding:8px 0;">
    <div class="site-center">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Главная</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Отзывы</li>
        </ol>
    </div>
</nav>
<div class="site-center py-4">
    <h1 class="mb-2 text-uppercase">ОТЗЫВЫ КЛИЕНТОВ</h1>
    <p class="text-muted mb-4">Здесь собраны реальные отзывы компаний и частных клиентов, которые доверили нам свои грузы.</p>

    <div class="row">
        <div class="col-12 col-md-4">
            <div id="list-example" class="list-group">
                <a class="list-group-item list-group-item-action active" href="#list-item-1">Отзыв 1</a>
                <a class="list-group-item list-group-item-action" href="#list-item-2">Отзыв 2</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Отзыв 3</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Отзыв 4</a>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example border rounded p-3" tabindex="0">
                <h4 id="list-item-1">Отзыв 1</h4>
                <p>ООО «СтройИнвест», Ижевск, Удмуртская ул., дом 1. Работаем с компанией уже больше года. Понравилась оперативность доставки и честный подход: всегда заранее предупреждают о рисках и помогают подобрать оптимальный тариф. Рекомендуем.</p>
                <h4 id="list-item-2">Отзыв 2</h4>
                <p>ИП Петров А. В., Новосибирск — Омск. Нужно было срочно доставить оборудование. Менеджер быстро рассчитал маршрут, водитель был на погрузке вовремя, груз приехал целым. Обязательно будем обращаться ещё.</p>
                <h4 id="list-item-3">Отзыв 3</h4>
                <p>АО «Логистик», Екатеринбург — Казань. Заказывали перевозку паллет. Цена фиксированная, без доплат. Документы оформили за один день. Удобно и прозрачно.</p>
                <h4 id="list-item-4">Отзыв 4</h4>
                <p>Частный заказчик, Краснодар — Ростов. Переезд квартиры. Подобрали машину под габариты, грузчики помогли. Всё приехало в срок, без повреждений. Спасибо.</p>
            </div>
        </div>
    </div>
</div>


@endsection