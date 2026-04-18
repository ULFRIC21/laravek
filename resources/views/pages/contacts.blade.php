@extends('layouts.main')

@section('title', 'Контакты — ЯСТРЕБ')

@section('content')
<nav aria-label="breadcrumb" class="bg-light border-top" style="padding:8px 0;">
    <div class="site-center">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Контакты</li>
        </ol>
    </div>
</nav>

<div class="site-center py-4">
    <h1 class="mb-3">Контакты</h1>
    <div class="row g-4">
        <div class="col-12 col-md-5">
            <h5 class="mb-2">Офис компании</h5>
            <p class="mb-1"><strong>Адрес:</strong> г. Москва, ул. Примерная, д. 1</p>
            <p class="mb-1"><strong>Телефон:</strong> +7 (900) 000-00-00</p>
            <p class="mb-1"><strong>E-mail:</strong> info@example.ru</p>
            <p class="mb-3"><strong>Режим работы:</strong> пн-пт с 9:00 до 19:00</p>

            <h6 class="mb-2">Для водителей и партнёров</h6>
            <p class="small mb-1">По вопросам сотрудничества и трудоустройства:</p>
            <p class="small mb-0">hr@example.ru, +7 (900) 000-00-01</p>
        </div>

        <div class="col-12 col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Оставить заявку на перевозку</h5>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Имя</label>
                                <input type="text" class="form-control" placeholder="Как к вам обращаться">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Телефон</label>
                                <input type="tel" class="form-control" placeholder="+7 (___) ___-__-__">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Откуда</label>
                                <input type="text" class="form-control" placeholder="Город / адрес погрузки">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Куда</label>
                                <input type="text" class="form-control" placeholder="Город / адрес выгрузки">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Комментарий</label>
                                <textarea class="form-control" rows="3" placeholder="Тип груза, сроки, особенности погрузки"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning fw-semibold">Отправить заявку</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
