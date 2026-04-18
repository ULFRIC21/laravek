@extends('layouts.main')

@section('title', 'Регистрация ожидает подтверждения')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Заявка на регистрацию отправлена</div>

                <div class="card-body">
                    <p>Спасибо! Ваша заявка на регистрацию в качестве водителя/грузчика принята.</p>
                    <p>Администратор проверит ваши данные и свяжется с вами по телефону или электронной почте.</p>
                    <p>После одобрения вы сможете войти в свой личный кабинет как водитель или грузчик.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection