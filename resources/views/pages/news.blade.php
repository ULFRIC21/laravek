@extends('layouts.main')

@section('title', 'Новости — ЯСТРЕБ')

@section('content')

<nav aria-label="breadcrumb" class="bg-light border-top mb-3">
    <div class="site-center py-2">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Новости</li>
        </ol>
    </div>
</nav>

<div class="site-center py-4">
    <h1 class="mb-3">Новости компании</h1>
    <p class="text-muted">Здесь можно публиковать новости, акции и обновления сервиса.</p>
</div>

@endsection
