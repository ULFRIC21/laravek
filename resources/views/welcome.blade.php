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
            /* ============================
               Общий фон и базовая типографика
               Применяется ко всему сайту
               ============================ */
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

            /* ============================
               ШАПКА САЙТА (верхнее меню)
               .site-header — фиксированная шапка,
               внутри неё "капсула" с логотипом и меню
               ============================ */
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

            /* .header-capsule — светлая "капсула" с тенью,
               в которой находятся логотип, пункты меню и иконка пользователя */
            .header-capsule {
                width: 100%;
                max-width: 1200px;
                height: 56px;
                background: #f8f6f0;
                border-radius: 9999px;
                box-shadow: 0 4px 14px rgba(0,0,0,0.08);
                display: flex;
                align-items: center;
                padding: 0 20px;
                box-sizing: border-box;
            }

            /* .header-logo — блок логотипа (иконка грузовика + текст ЯСТРЕБ) */
            .header-logo {
                display: flex;
                align-items: center;
                gap: 10px;
                text-decoration: none;
                margin-right: 24px;
            }

            /* .logo-icon — SVG-иконка грузовика */
            .logo-icon {
                width: 40px;
                height: 28px;
                flex-shrink: 0;
            }

            /* .logo-text — обёртка для надписей "ЯСТРЕБ / ГРУЗОПЕРЕВОЗКИ" */
            .logo-text {
                display: flex;
                flex-direction: column;
                line-height: 1.2;
            }

            /* .logo-title — крупная надпись "ЯСТРЕБ" */
            .logo-title {
                font-size: 1.1rem;
                font-weight: 700;
                color: #e85d04;
                letter-spacing: 0.02em;
            }

            /* .logo-subtitle — подпись "ГРУЗОПЕРЕВОЗКИ" под логотипом */
            .logo-subtitle {
                font-size: 0.7rem;
                font-weight: 600;
                color: #e85d04;
                letter-spacing: 0.04em;
            }

            /* .header-nav — контейнер горизонтального меню (ссылки в шапке) */
            .header-nav {
                flex: 1;
                display: flex;
                align-items: center;
                gap: 28px;
                flex-wrap: wrap;
            }

            /* .header-link — отдельный пункт меню */
            .header-link {
                font-size: 0.9rem;
                font-weight: 600;
                color: #2d2d2d;
                text-decoration: none;
                white-space: nowrap;
            }

            /* Подсветка ссылки меню при наведении */
            .header-link:hover {
                color: #e85d04;
            }

            /* .header-link--long — пункт меню с длинным текстом (перенос по словам) */
            .header-link--long {
                white-space: normal;
                max-width: 160px;
            }

            /* .header-user — круглая кнопка с иконкой пользователя (личный кабинет) */
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

            /* Состояние кнопки пользователя при наведении */
            .header-user:hover {
                background: #eeece6;
            }

            /* .user-icon — сама иконка пользователя внутри кружка */
            .user-icon {
                width: 22px;
                height: 22px;
            }

            /* ============================
               Контейнер для контента ниже героя
               .site-center — выравнивание основного контента по центру
               ============================ */
            .site-center {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 16px;
                box-sizing: border-box;
            }

            /* ============================
               Пример отдельного слайдера (если потребуется)
               #carouselExampleSlidesOnly — карусель с фиксированной высотой
               ============================ */
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

            /* ============================
               ГЛАВНЫЙ ЭКРАН (hero)
               .hero-full — полноэкранный блок, в котором
               фоном крутится слайдер, а сверху контент
               ============================ */
            .hero-full {
                min-height: 100vh;
                width: 100%;
                margin: 0;
                padding: 80px 24px 40px;
                box-sizing: border-box;
                position: relative;
            }

            /* .hero-slider — обёртка для слайдера, который растянут на весь hero */
            .hero-slider {
                position: absolute;
                inset: 0;
                z-index: 0;
            }

            /* Вложенные элементы слайдера внутри hero — растягиваем по высоте hero */
            .hero-slider .carousel,
            .hero-slider .carousel-inner,
            .hero-slider .carousel-item {
                height: 100%;
            }

            /* Картинка внутри слайдов героя — заполняет весь блок без искажений */
            .hero-slider .carousel-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            /* Затемняющая подложка над картинкой слайдера,
               чтобы текст и карточки были читабельными */
            .hero-full::before {
                content: '';
                position: absolute;
                inset: 0;
                background: rgba(0,0,0,0.45);
                z-index: 1;
            }

            /* .hero-full__inner — контейнер видимого контента (карточки + форма) поверх слайдера */
            .hero-full__inner {
                position: relative;
                z-index: 2;
                max-width: 1200px;
                margin: 0 auto;
            }
            /* .hero-form — строка с полями "Откуда / Куда" и кнопкой заказа */
            .hero-form {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 12px;
                margin-bottom: 24px;
            }

            /* .hero-input-wrap — обёртка для одного поля ввода с иконкой локации */
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

            /* Иконка внутри поля (адрес/локация) */
            .hero-input-wrap svg { flex-shrink: 0; color: #c00; }

            /* Само текстовое поле "Откуда / Куда" */
            .hero-input-wrap input {
                border: none;
                outline: none;
                width: 100%;
                font-size: 0.95rem;
            }

            /* .hero-cost — текст с примерной стоимостью справа от полей */
            .hero-cost { color: #fff; font-weight: 700; font-size: 1.1rem; text-shadow: 0 1px 4px rgba(0,0,0,0.5); }

            /* .hero-btn-order — основная кнопка "Заказать" */
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

            /* Ховер по кнопке "Заказать" */
            .hero-btn-order:hover { background: #1a1a1a; color: #fff; }

            /* Иконка-стрелка внутри кнопки "Заказать" */
            .hero-btn-order svg { width: 20px; height: 20px; }

            /* .hero-cta — блок с крупным лозунгом "БЫСТРЫЕ И БЕЗОПАСНЫЕ ГРУЗОПЕРЕВОЗКИ" в правом нижнем углу */
            .hero-cta {
                position: absolute;
                bottom: 40px;
                right: 24px;
                text-align: right;
                z-index: 2;
            }

            /* .hero-cta__text — строки лозунга, крупный белый текст на затемнённом фоне */
            .hero-cta__text {
                color: #fff;
                font-weight: 800;
                font-size: clamp(1.5rem, 4vw, 2.5rem);
                line-height: 1.15;
                letter-spacing: 0.02em;
                text-shadow: 0 2px 12px rgba(0,0,0,0.5);
            }

            /* Заголовок и подзаголовок на hero (как на примере с 1 скрина) */
            .hero-heading {
                margin-top: 10px;
                margin-bottom: 16px;
                max-width: 860px;
            }
            .hero-title {
                color: #fff;
                font-weight: 900;
            }
            /* Блок преимуществ (как на 2 скрине) */
            .features {
                background: #fff;
                padding: 100px 0;
            }
            .feature-item {
                display: flex;
                align-items: flex-start;
                gap: 20px;
                padding: 40px 10px;
            }
            .feature-icon {
                width: 56px;
                height: 56px;
                border-radius: 2px;
                background: #f28a00;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                flex: 0 0 auto;
            }
            .feature-icon svg {
                width: 30px;
                height: 30px;
                fill: #fff;
            }
            .feature-text {
                font-size: 0.92rem;
                color: #2d2d2d;
                line-height: 1.35;
                font-weight: 600;
            }

            /* Блок "Работаем быстро" с фоном на всю ширину */
            .steps-block {
                position: relative;
                color: #fff;
                padding: 60px 0 70px;
                overflow: hidden;
                /* Поставь сюда свою картинку грузовика в public/images */
                background-image: url('/image/image.png');
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
            }
            .steps-block::before {
                content: '';
                position: absolute;
                inset: 0;
                background: radial-gradient(circle at center, rgba(0,0,0,0.1), rgba(0,0,0,0.65));
                z-index: 0;
            }
            .steps-inner {
                position: relative;
                z-index: 1;
                text-align: center;
            }

            .steps-subtitle {
                font-size: 1rem;
                opacity: 1  ;
                margin-bottom: 256px;
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

        <!-- Заголовок/подзаголовок поверх фонового слайдера -->
        <div class="hero-heading">
            <h1 class="hero-title">Грузоперевозки по России</h1>
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

<!-- Преимущества (как на 2 скрине) -->
<section class="features">
    <div class="site-center">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5.55 3.84 10.74 8 11 4.16-.26 8-5.45 8-11V5l-8-3zm0 18c-2.8-.52-6-4.45-6-9V6.3L12 4l6 2.3V11c0 4.55-3.2 8.48-6 9z"/></svg>
                    </div>
                    <div class="feature-text">Гарантируем 100% сохранность грузов</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8.01 8.01 0 0 1-8 8zm.5-13h-2v6l5 3 1-1.73-4-2.27z"/></svg>
                    </div>
                    <div class="feature-text">Доставка точно в указанный в договоре срок</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M7 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10-4a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6.41 19 5 17.59 17.59 5 19 6.41z"/></svg>
                    </div>
                    <div class="feature-text">Самые оптимальные транспортные тарифы</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zm0 12H4V9h16v10zm-2-6h-4v4h4v-4zM20 3H6a2 2 0 0 0-2 2h16a2 2 0 0 1 2 2V7a4 4 0 0 0-4-4z"/></svg>
                    </div>
                    <div class="feature-text">Экономим ваше время и деньги</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M18 2H6v2H3v3a5 5 0 0 0 5 5h.1A5 5 0 0 0 11 14.9V18H8v2h8v-2h-3v-3.1A5 5 0 0 0 15.9 12H16a5 5 0 0 0 5-5V4h-3V2zm-2 8h-1.2a3 3 0 0 1-5.6 0H8a3 3 0 0 1-3-3V6h1v2h2V4h8v4h2V6h1v1a3 3 0 0 1-3 3z"/></svg>
                    </div>
                    <div class="feature-text">15-летний опыт работы в сфере логистических услуг</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm8 1.5V8h4.5L14 3.5zM8 12h8v2H8v-2zm0 4h8v2H8v-2zm0-8h5v2H8V8z"/></svg>
                    </div>
                    <div class="feature-text">Быстрый документооборот</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок "Работаем быстро, работаем для Вас" с фоном на всю ширину -->
<section class="steps-block">
    <div class="site-center steps-inner">
        <h2 class="steps-title">Работаем быстро, работаем для Вас</h2>
        <div class="steps-subtitle">Четыре простых шага</div>

        <div class="row gy-4 justify-content-center">
            <div class="col-6 col-md-3">
                <div class="steps-num">01</div>
                <div class="steps-circle">
                </div>
                <div class="steps-text">Отправляете запрос менеджеру</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="steps-num">02</div>
                <div class="steps-circle">
                </div>
                <div class="steps-text">Уточняем детали и считаем точную стоимость</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="steps-num">03</div>
                <div class="steps-circle">
                </div>
                <div class="steps-text">Подписываем договор и согласовываем график</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="steps-num">04</div>
                <div class="steps-circle">
                </div>
                <div class="steps-text">Доставляем ваш груз в срок</div>
            </div>
        </div>
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
