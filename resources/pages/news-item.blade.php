@extends('layouts.main')

@section('title', $article['title'] . ' — ЯСТРЕБ')

@section('content')

<nav aria-label="breadcrumb" class="bg-light border-0" style="padding: 6px 0;">
    <div class="site-center">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news') }}">Новости</a></li>
            <li class="breadcrumb-item active text-truncate" aria-current="page" style="max-width: 180px;">{{ $article['title'] }}</li>
        </ol>
    </div>
</nav>

<div class="site-center py-3">
    <article class="news-card p-3 p-md-4 bg-white rounded shadow-sm">
        <div class="text-center mb-3">
            <img src="{{ $article['image_url'] }}" alt="{{ $article['title'] }}" class="img-fluid rounded" style="max-height: 340px; width: 100%; object-fit: cover;">
        </div>
        <p class="small mb-1">
            <span class="text-warning">Новости компании</span>
        </p>
        <h1 class="h5 mb-3 fw-normal lh-base">{{ $article['title'] }}</h1>
        <div class="small text-muted lh-base">
            <p class="mb-2">{{ $article['excerpt'] }}</p>
            @if(!empty($article['body']))
            <div>{!! nl2br(e($article['body'])) !!}</div>
            @endif
        </div>
        <p class="mt-4 mb-0">
            <a href="{{ route('news') }}" class="small text-secondary">← Все новости</a>
        </p>
    </article>
</div>

@endsection
