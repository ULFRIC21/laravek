@extends('layouts.main')

@section('title', 'Новости — ЯСТРЕБ')

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
    <h1 class="mb-3">Новости компании</h1>
    <p class="text-muted mb-4">Рассказываем о новых направлениях, спецпредложениях и обновлениях сервиса.</p>

    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Запущено новое направление по Дальнему Востоку</h5>
                <small class="text-muted">01.02.2026</small>
            </div>
            <p class="mb-1 small">Теперь мы выполняем регулярные перевозки контейнеров по маршруту Москва — Владивосток с фиксированными сроками доставки.</p>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Снижение тарифов для постоянных клиентов</h5>
                <small class="text-muted">15.01.2026</small>
            </div>
            <p class="mb-1 small">Для компаний с ежемесячным объёмом перевозок предусмотрены индивидуальные условия и персональный менеджер.</p>
        </a>
    </div>
</div>


@endsection