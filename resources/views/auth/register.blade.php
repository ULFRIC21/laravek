@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @php $selectedRole = old('role', request('role', 'client')); @endphp

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Адрес электронной почты</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Телефон</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Я хочу зарегистрироваться как</label>

                            <div class="col-md-6">
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="client"{{ $selectedRole === 'client' ? ' selected' : '' }}>Заказчик</option>
                                    <option value="driver_request"{{ $selectedRole === 'driver_request' ? ' selected' : '' }}>Водитель</option>
                                    <option value="loader_request"{{ $selectedRole === 'loader_request' ? ' selected' : '' }}>Грузчик</option>
                                </select>
                                <div class="form-text">Заказчик сразу получает доступ к оформлению заказов. Водитель и грузчик подают заявку на подтверждение.</div>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="employee-fields" class="d-none">
                            <div class="row mb-3">
                                <label for="vehicle_info" class="col-md-4 col-form-label text-md-end">Информация о машине</label>

                                <div class="col-md-6">
                                    <textarea id="vehicle_info" class="form-control @error('vehicle_info') is-invalid @enderror" name="vehicle_info" rows="3">{{ old('vehicle_info') }}</textarea>

                                    @error('vehicle_info')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">Показать</button>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Подтвердите пароль</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">Показать</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <p class="mb-0">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
        const passwordConfirm = document.getElementById('password-confirm');
        const roleSelect = document.getElementById('role');
        const employeeFields = document.getElementById('employee-fields');

        if (togglePassword && password) {
            togglePassword.addEventListener('click', function () {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.textContent = type === 'password' ? 'Показать' : 'Скрыть';
            });
        }

        if (togglePasswordConfirm && passwordConfirm) {
            togglePasswordConfirm.addEventListener('click', function () {
                const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirm.setAttribute('type', type);
                this.textContent = type === 'password' ? 'Показать' : 'Скрыть';
            });
        }

        function updateEmployeeFields() {
            if (!roleSelect) return;
            const show = roleSelect.value === 'driver_request' || roleSelect.value === 'loader_request';
            employeeFields.classList.toggle('d-none', !show);
        }

        if (roleSelect) {
            roleSelect.addEventListener('change', updateEmployeeFields);
            updateEmployeeFields();
        }
    });
</script>
@endpush
