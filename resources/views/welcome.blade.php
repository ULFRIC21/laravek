<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ЯСТРЕБ — Грузоперевозки</title>

        <!-- Bootstrap 5 (для слайдера) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            /* Фон всего сайта — меняй здесь цвет/картинку */
            html, body {
                width: 100%;
                min-height: 100%;
                margin: 0;
                padding: 0;
                font-family: 'Nunito', sans-serif;
                /* Вариант 1: один цвет */
                background-color: #f5f3ee;
                /* Вариант 2: градиент (раскомментируй и закомментируй background-color выше) */
                /* background: linear-gradient(180deg, #f8f6f0 0%, #e8e4dc 50%, #ddd8ce 100%); */
                /* Вариант 3: картинка (раскомментируй и положи изображение в public/images/) */
                /* background-image: url('/images/bg.jpg'); */
                /* background-size: cover; */
                /* background-attachment: fixed; */
            }
            /* Шапка: капсула как на макете */
            .site-header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 50;
                display: flex;
                justify-content: center;
                padding: 12px 16px;
            }
            .header-capsule {
                width: 100%;
                max-width: 960px;
                height: 56px;
                background: #f8f6f0;
                border-radius: 9999px;
                box-shadow: 0 4px 14px rgba(0,0,0,0.08);
                display: flex;
                align-items: center;
                padding: 0 20px;
                box-sizing: border-box;
            }
            .header-logo {
                display: flex;
                align-items: center;
                gap: 10px;
                text-decoration: none;
                margin-right: 24px;
            }
            .logo-icon {
                width: 40px;
                height: 28px;
                flex-shrink: 0;
            }
            .logo-text {
                display: flex;
                flex-direction: column;
                line-height: 1.2;
            }
            .logo-title {
                font-size: 1.1rem;
                font-weight: 700;
                color: #e85d04;
                letter-spacing: 0.02em;
            }
            .logo-subtitle {
                font-size: 0.7rem;
                font-weight: 600;
                color: #e85d04;
                letter-spacing: 0.04em;
            }
            .header-nav {
                flex: 1;
                display: flex;
                align-items: center;
                gap: 28px;
                flex-wrap: wrap;
            }
            .header-link {
                font-size: 0.9rem;
                font-weight: 600;
                color: #2d2d2d;
                text-decoration: none;
                white-space: nowrap;
            }
            .header-link:hover {
                color: #e85d04;
            }
            .header-link--long {
                white-space: normal;
                max-width: 160px;
            }
            .header-user {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #f8f6f0;
                border: 1px solid #e8e6e0;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left: 16px;
                flex-shrink: 0;
                text-decoration: none;
            }
            .header-user:hover {
                background: #eeece6;
            }
            .user-icon {
                width: 22px;
                height: 22px;
            }
            /* Весь сайт по центру */
            .site-center {
                width: 100%;
                max-width: 960px;
                margin: 0 auto;
                padding: 0 16px;
                box-sizing: border-box;
            }
            /* Слайдер: фиксированная высота, одна картинка на экран, без белой полосы */
            #carouselExampleSlidesOnly {
                width: 100%;
                overflow: hidden;
                border-radius: 12px;
            }
            #carouselExampleSlidesOnly .carousel-inner,
            #carouselExampleSlidesOnly .carousel-item {
                height: 420px;
            }
            #carouselExampleSlidesOnly .carousel-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            /* Полноэкранный герой + слайдер фоном */
            .hero-full {
                min-height: 100vh;
                width: 100%;
                margin: 0;
                padding: 80px 24px 40px;
                box-sizing: border-box;
                position: relative;
            }
            .hero-slider {
                position: absolute;
                inset: 0;
                z-index: 0;
            }
            .hero-slider .carousel,
            .hero-slider .carousel-inner,
            .hero-slider .carousel-item {
                height: 100%;
            }
            .hero-slider .carousel-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .hero-full::before {
                content: '';
                position: absolute;
                inset: 0;
                background: rgba(0,0,0,0.45);
                z-index: 1;
            }
            .hero-full__inner {
                position: relative;
                z-index: 2;
                max-width: 1200px;
                margin: 0 auto;
            }
            .hero-cards {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
                margin-bottom: 20px;
            }
            @media (min-width: 768px) {
                .hero-cards { grid-template-columns: repeat(3, 1fr); }
            }
            .hero-card {
                background: #fff;
                border-radius: 12px;
                padding: 14px 16px;
                box-shadow: 0 4px 14px rgba(0,0,0,0.12);
            }
            .hero-card__icon { font-size: 1.5rem; margin-bottom: 6px; }
            .hero-card__title { font-weight: 700; font-size: 0.95rem; color: #1a1a1a; margin-bottom: 4px; }
            .hero-card__desc { font-size: 0.75rem; color: #555; line-height: 1.3; margin-bottom: 6px; }
            .hero-card__price { font-weight: 700; color: #e85d04; font-size: 0.9rem; }
            .hero-form {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 12px;
                margin-bottom: 24px;
            }
            .hero-input-wrap {
                flex: 1;
                min-width: 180px;
                display: flex;
                align-items: center;
                gap: 8px;
                background: #fff;
                border-radius: 10px;
                padding: 12px 14px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            .hero-input-wrap svg { flex-shrink: 0; color: #c00; }
            .hero-input-wrap input {
                border: none;
                outline: none;
                width: 100%;
                font-size: 0.95rem;
            }
            .hero-cost { color: #fff; font-weight: 700; font-size: 1.1rem; text-shadow: 0 1px 4px rgba(0,0,0,0.5); }
            .hero-btn-order {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: #2d2d2d;
                color: #fff;
                border: none;
                padding: 14px 24px;
                border-radius: 12px;
                font-weight: 700;
                font-size: 1rem;
                cursor: pointer;
                box-shadow: 0 4px 14px rgba(0,0,0,0.3);
                text-decoration: none;
            }
            .hero-btn-order:hover { background: #1a1a1a; color: #fff; }
            .hero-btn-order svg { width: 20px; height: 20px; }
            .hero-cta {
                position: absolute;
                bottom: 40px;
                right: 24px;
                text-align: right;
                z-index: 2;
            }
            .hero-cta__text {
                color: #fff;
                font-weight: 800;
                font-size: clamp(1.5rem, 4vw, 2.5rem);
                line-height: 1.15;
                letter-spacing: 0.02em;
                text-shadow: 0 2px 12px rgba(0,0,0,0.5);
            }
        </style>
    </head>
    <body>

  <header class="site-header">
    <div class="header-capsule">
        <!-- Логотип: грузовик + ЯСТРЕБ / ГРУЗОПЕРЕВОЗКИ -->
        <a href="{{ url('/') }}" class="header-logo">
            <svg class="logo-icon" viewBox="0 0 48 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 20h6l2-6h12l2 6h6v-4l-4-8H8L4 16v4z" fill="#e85d04"/>
                <path d="M8 22a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM36 22a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" fill="#1a1a1a"/>
                <path d="M14 16h20v2H14z" fill="#e85d04" opacity="0.8"/>
                <path d="M2 18h4v2H2zM42 18h4v2h-4z" stroke="#e85d04" stroke-width="1.5" fill="none"/>
            </svg>
            <div class="logo-text">
                <span class="logo-title">ЯСТРЕБ</span>
                <span class="logo-subtitle">ГРУЗОПЕРЕВОЗКИ</span>
            </div>
        </a>

        <!-- Меню -->
        <nav class="header-nav">
            <a href="{{ route('special') }}" class="header-link">Спец техника</a>
            <a href="{{ route('reviews') }}" class="header-link">Отзывы</a>
            <a href="{{ route('contacts') }}" class="header-link">Контакты</a>
            <a href="{{ route('news') }}" class="header-link">Новости</a>
            <a href="{{ route('calc') }}" class="header-link header-link--long">Расчет оплаты и комиссии</a>
        </nav>

        <!-- Личный кабинет (иконка пользователя) -->
        <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="header-user" aria-label="Личный кабинет">
            <svg class="user-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="#1a1a1a"/>
            </svg>
        </a>
    </div>
</header>

<section class="hero-full">
    <!-- Слайдер фоном (картинки меняются) -->
    <div class="hero-slider">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cs7.pikabu.ru/post_img/big/2017/12/27/6/1514366973114574560.jpg" class="d-block w-100" alt="Грузоперевозки">
                </div>
                <div class="carousel-item">
                    <img src="https://cs7.pikabu.ru/post_img/big/2017/12/27/6/1514367031115049152.jpg" class="d-block w-100" alt="Спецтехника">
                </div>
                <div class="carousel-item">
                    <img src="https://cs7.pikabu.ru/post_img/big/2017/12/27/6/1514366973114574560.jpg" class="d-block w-100" alt="Доставка">
                </div>
            </div>
        </div>
    </div>

    <div class="hero-full__inner">
        <div class="hero-cards">
            <div class="hero-card">
                <div class="hero-card__icon">🚐</div>
                <div class="hero-card__title">Газель</div>
                <div class="hero-card__desc">Легкий грузовик с грузоподъёмностью до 1,5 тонн</div>
                <div class="hero-card__price">от 147 Р</div>
            </div>
            <div class="hero-card">
                <div class="hero-card__icon">🚛</div>
                <div class="hero-card__title">5-тонник</div>
                <div class="hero-card__desc">Тяжёлый грузовик грузоподъёмностью до 5 тонн</div>
                <div class="hero-card__price">от 897 Р</div>
            </div>
            <div class="hero-card">
                <div class="hero-card__icon">🚙</div>
                <div class="hero-card__title">Минивэн</div>
                <div class="hero-card__desc">Грузовая версия с грузоподъёмностью до 1,5 тонн</div>
                <div class="hero-card__price">от 497 Р</div>
            </div>
            <div class="hero-card">
                <div class="hero-card__icon">🚚</div>
                <div class="hero-card__title">Самосвал</div>
                <div class="hero-card__desc">Тяжёлый грузовик с открытым кузовом, до 7 тонн</div>
                <div class="hero-card__price">от 947 Р</div>
            </div>
            <div class="hero-card">
                <div class="hero-card__icon">🚜</div>
                <div class="hero-card__title">Трактора</div>
                <div class="hero-card__desc">Самоходная машина для тяги и привода навесных орудий</div>
                <div class="hero-card__price">от 797 Р</div>
            </div>
            <div class="hero-card">
                <div class="hero-card__icon">👷</div>
                <div class="hero-card__title">Грузчики</div>
                <div class="hero-card__desc">Погрузка, разгрузка и переноска грузов</div>
                <div class="hero-card__price">от 697 Р</div>
            </div>
        </div>

        <div class="hero-form">
            <div class="hero-input-wrap">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                <input type="text" placeholder="Откуда" class="hero-input">
            </div>
            <div class="hero-input-wrap">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                <input type="text" placeholder="Куда?" class="hero-input">
            </div>
            <span class="hero-cost">Стоимость: 5000 Р</span>
            <a href="{{ route('calc') ? route('calc') : url('/calc') }}" class="hero-btn-order">
                Заказать
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
            </a>
        </div>
    </div>

    <div class="hero-cta">
        <div class="hero-cta__text">БЫСТРЫЕ</div>
        <div class="hero-cta__text">И БЕЗОПАСНЫЕ</div>
        <div class="hero-cta__text">ГРУЗОПЕРЕВОЗКИ</div>
    </div>
</section>

<div class="site-center" style="padding-top: 24px; padding-bottom: 40px;">
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
<div class="grid text-center">
  <div class="g-col-6">.g-col-6</div>
  <div class="g-col-6">.g-col-6</div>

  <div class="g-col-6">.g-col-6</div>
  <div class="g-col-6">.g-col-6</div>
</div>





</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
