<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ЯСТРЕБ — Грузоперевозки')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        html, body { width: 100%; min-height: 100%; margin: 0; padding: 0; font-family: 'Nunito', sans-serif; background-color: #f5f3ee; }
        .site-header {
            position: fixed; top: 0; left: 0; right: 0; z-index: 50;
            display: flex; justify-content: center; padding: 12px 16px;
        }
        .header-capsule {
            width: 100%; max-width: 1200px; height: 56px;
            background: #f8f6f0; border-radius: 9999px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
            display: flex; align-items: center; padding: 0 20px; box-sizing: border-box;
        }
        .header-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; margin-right: 24px; }
        .logo-icon { width: 40px; height: 28px; flex-shrink: 0; }
        .logo-text { display: flex; flex-direction: column; line-height: 1.2; }
        .logo-title { font-size: 1.1rem; font-weight: 700; color: #e85d04; letter-spacing: 0.02em; }
        .logo-subtitle { font-size: 0.7rem; font-weight: 600; color: #e85d04; letter-spacing: 0.04em; }
        .header-nav { flex: 1; display: flex; align-items: center; gap: 28px; flex-wrap: wrap; }
        .header-link { font-size: 0.9rem; font-weight: 600; color: #2d2d2d; text-decoration: none; white-space: nowrap; }
        .header-link:hover { color: #e85d04; }
        .header-link--long { white-space: normal; max-width: 160px; }
        .header-user {
            width: 40px; height: 40px; border-radius: 50%; background: #f8f6f0; border: 1px solid #e8e6e0;
            display: flex; align-items: center; justify-content: center; margin-left: 16px; flex-shrink: 0; text-decoration: none;
        }
        .header-user:hover { background: #eeece6; }
        .user-icon { width: 22px; height: 22px; }
        .page-content { padding: 80px 24px 40px; max-width: 1200px; margin: 0 auto; box-sizing: border-box; }
        /* Общий контейнер страниц (special, news, contacts и т.д.): отступы и ширина */
        .site-center { max-width: 1200px; margin: 0 auto; padding: 0 16px; box-sizing: border-box; }
        .page-content h1 { font-size: 1.5rem; color: #1a1a1a; margin: 0 0 1rem; }
        .page-content p { margin: 0 0 0.5rem; color: #444; line-height: 1.5; }
        /* Отступы между карточками на странице «Спец техника» и др. — можно менять mb-4 в шаблоне или здесь */
        .page-content .card.mb-4 { margin-bottom: 1.5rem !important; }
        /* Контейнер для Scrollspy: при скролле внутри него подсвечивается пункт в list-group */
        .scrollspy-example { max-height: 360px; overflow-y: auto; position: relative; }
        /* .promotion__sybtitle{ font-weight: 600; font-size: 25px; color: #303030; margin-top: 25px; margin-bottom: 20px; line-height: 40px;} */
    </style>
</head>
<body>
<header class="site-header">
    <div class="header-capsule">
        <a href="{{ url('/') }}" class="header-logo">
            <img src="./image/qwerqwer.png" alt="">
        </a>
        <nav class="header-nav">
            <a href="{{ route('special') }}" class="header-link">Спец техника</a>
            <a href="{{ route('reviews') }}" class="header-link">Отзывы</a>
            <a href="{{ route('contacts') }}" class="header-link">Контакты</a>
            <a href="{{ route('news') }}" class="header-link">Новости</a>
            <a href="{{ route('calc') }}" class="header-link header-link--long">Расчет оплаты и комиссии</a>
        </nav>
        <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="header-user" aria-label="Личный кабинет">
            <svg class="user-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="#1a1a1a"/>
            </svg>
        </a>
    </div>
</header>
<main class="page-content">
    @yield('content')
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
