<header class="site-header">
    <div class="header-capsule">
        <a href="{{ url('/') }}" class="header-logo">
            <img src="/image/qwerqwer.png" alt="ЯСТРЕБ">
        </a>

        <nav class="header-nav">
            <a href="{{ route('special') }}" class="header-link">Спец техника</a>
            <a href="{{ route('reviews') }}" class="header-link">Отзывы</a>
            <a href="{{ route('contacts') }}" class="header-link">Контакты</a>
            <a href="{{ route('news') }}" class="header-link">Новости</a>
            <a href="{{ route('calc') }}" class="header-link header-link--long">Расчет оплаты и комиссии</a>
        </nav>

        @auth
        <div class="dropdown">
            <a href="#" class="header-user dropdown-toggle" id="navbarUser" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Меню">
                <svg class="user-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="#1a1a1a"/>
                </svg>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUser">
                <li><a class="dropdown-item" href="{{ route('orders.index') }}">Заказы</a></li>
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'driver')
                <li><a class="dropdown-item" href="{{ route('driver') }}">Кабинет водителя</a></li>
                @endif
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'loader')
                <li><a class="dropdown-item" href="{{ route('loader') }}">Кабинет грузчика</a></li>
                @endif
                @if(auth()->user()->role === 'admin')
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('admin') }}">Админка</a></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="px-3 py-1">
                        @csrf
                        <button type="submit" class="btn btn-link btn-sm p-0 text-decoration-none">Выйти</button>
                    </form>
                </li>
            </ul>
        </div>
        @else
        <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="header-user" aria-label="Войти">
            <svg class="user-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="#1a1a1a"/>
            </svg>
        </a>
        @endauth
    </div>
</header>
