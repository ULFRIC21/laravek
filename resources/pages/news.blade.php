@extends('layouts.main')

@section('title', 'Новости — ЯСТРЕБ')

@section('content')

<nav aria-label="breadcrumb" class="bg-light border-0" style="padding: 6px 0;">
    <div class="site-center">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Новости</li>
        </ol>
    </div>
</nav>

<div class="site-center py-3">
    <h1 class="h5 mb-1 fw-normal text-secondary">Новости компании</h1>
    <p class="small text-muted mb-4">Новые направления, акции и обновления сервиса.</p>

    @foreach($articles as $article)
    <article class="news-card mb-4 p-3 p-md-4 bg-white rounded shadow-sm">
        <div class="text-center mb-3">
            <img src="{{ $article['image_url'] }}" alt="{{ $article['title'] }}" class="img-fluid rounded" style="max-height: 280px; width: 100%; object-fit: cover;">
        </div>
        <p class="small mb-1">
            <span class="text-warning">Новости компании</span>
        </p>
        <h2 class="h6 mb-2 fw-normal lh-base">{{ $article['title'] }}</h2>
        <p class="small text-muted mb-2 lh-base">{{ $article['excerpt'] }}...</p>
        <div class="text-end">
            <a href="{{ route('news.show', $article['id']) }}" class="small text-warning text-decoration-none">
                Читать полностью
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="align-middle"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
            </a>
        </div>
    </article>
    @endforeach
</div>

@endsection
