@extends('layouts.app')

@section('title', 'ЯСТРЕБ — Грузоперевозки')

@push('styles')
<style>
    .hero-full {
        position: relative;
        min-height: 90vh;
        padding: 120px 16px 60px;
        color: #fff;
        overflow: hidden;
    }
    .hero-full::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top, rgba(17,24,39,0.55), rgba(17,24,39,0.90));
        z-index: 0;
    }
    .hero-slider {
        position: absolute;
        inset: 0;
        z-index: 0;
    }
    .hero-slider .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.65);
    }
    .hero-full__inner {
        position: relative;
        z-index: 1;
        max-width: 1180px;
        margin: 0 auto;
    }
    .hero-title {
        font-size: clamp(3rem, 5vw, 4.2rem);
        font-weight: 900;
        margin-bottom: 16px;
        letter-spacing: -0.04em;
        text-transform: uppercase;
    }
    .hero-subtitle {
        font-size: 1.05rem;
        line-height: 1.7;
        max-width: 680px;
        margin-bottom: 28px;
    }
    .hero-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 14px;
        align-items: center;
        margin-bottom: 32px;
    }
    .hero-input-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255,255,255,0.95);
        border-radius: 14px;
        padding: 14px 16px;
        color: #111827;
    }
    .hero-input-wrap span {
        min-width: 72px;
        font-weight: 700;
    }
    .hero-input-wrap input {
        border: none;
        width: 100%;
        outline: none;
        font-size: 0.95rem;
        background: transparent;
    }
    .hero-btn-order {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: #f59e0b;
        color: #111827;
        border-radius: 14px;
        padding: 14px 22px;
        text-decoration: none;
        font-weight: 700;
        transition: transform 0.2s ease;
        cursor: pointer;
    }
    .hero-btn-order:hover {
        transform: translateY(-2px);
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }
    .stat-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 26px;
        box-shadow: 0 18px 45px rgba(15,23,42,0.08);
        color: #111827;
    }
    .stat-title {
        font-size: 0.95rem;
        color: #6b7280;
        margin-bottom: 10px;
    }
    .stat-value {
        font-size: 2rem;
        font-weight: 800;
        line-height: 1.1;
    }
    .chart-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 24px;
        box-shadow: 0 18px 45px rgba(15,23,42,0.08);
        margin-top: 40px;
    }
    .chart-card h3 {
        margin-bottom: 16px;
        font-weight: 800;
    }
    .promotion { padding: 80px 0; }
    .promotion__title h3 { font-size: 2rem; margin-bottom: 18px; }
    .promotion__sybtitle { font-weight: 700; font-size: 1.4rem; margin-bottom: 18px; color: #1f2937; }
    .promotion__citation { padding-left: 60px; position: relative; font-weight: 600; color: #1f2937; border-left: 4px solid #f59e0b; margin-bottom: 20px; }
    .promotion__text { color: #4b5563; line-height: 1.9; }
    .features { padding: 80px 0; }
    .feature-item { display: flex; gap: 16px; align-items: flex-start; background: #ffffff; border-radius: 20px; padding: 24px; box-shadow: 0 18px 45px rgba(15,23,42,0.04); min-height: 140px; }
    .feature-icon { width: 56px; min-width: 56px; height: 56px; border-radius: 16px; background: #f59e0b; display: grid; place-items: center; color: #fff; font-size: 1.3rem; }
    .feature-text { font-size: 0.95rem; line-height: 1.7; font-weight: 600; color: #111827; }
    .steps-block { padding: 80px 0; }
    .steps-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-top: 32px; }
    .step-card { background: #111827; color: #fff; padding: 28px; border-radius: 22px; min-height: 200px; }
    .step-number { font-size: 2rem; font-weight: 900; margin-bottom: 14px; color: #fbbf24; }
    .step-text { line-height: 1.7; font-size: 0.98rem; }
    .faq-section { margin: 80px 0 40px; }
    .faq-card { background: #ffffff; border-radius: 20px; padding: 24px; box-shadow: 0 18px 45px rgba(15,23,42,0.06); }
    .faq-card .accordion-button { border-radius: 14px; margin-bottom: 12px; background: #f8fafc; color: #111827; }
    .faq-card .accordion-button:not(.collapsed) { background: #f59e0b; color: #111827; }
    .faq-card .accordion-body { background: #ffffff; color: #475569; border-radius: 0 0 14px 14px; }
</style>
@endpush

@section('content')
<div class="site-center">
    <section class="hero-full">
        <div class="hero-slider">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://cs7.pikabu.ru/post_img/big/2017/12/27/6/1514366973114574560.jpg" alt="Грузоперевозки">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cs7.pikabu.ru/post_img/big/2017/12/27/6/1514367031115049152.jpg" alt="Спецтехника">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cs7.pikabu.ru/post_img/big/2017/12/27/6/1514366973114574560.jpg" alt="Доставка">
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-full__inner">
            <h1 class="hero-title">Надежные грузоперевозки по всей России</h1>
            <p class="hero-subtitle">Скорость, удобный расчет и безопасная доставка от своего логистического партнера. Сейчас вы можете оформить заказ и получить актуальную цену за 1 минуту.</p>

            <div class="hero-form">
                <div class="hero-input-wrap">
                    <span>Откуда</span>
                    <input type="text" placeholder="Москва" />
                </div>
                <div class="hero-input-wrap">
                    <span>Куда</span>
                    <input type="text" placeholder="Санкт-Петербург" />
                </div>
                <div class="hero-input-wrap">
                    <span>Груз</span>
                    <input type="text" placeholder="Контейнер, техника" />
                </div>
                <div class="hero-btn-order" role="button" onclick="window.location.href='{{ route('calc') }}'">Заказать</div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-title">Оценка клиентов</div>
                    <div class="stat-value">4.9 / 5</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Доставок в месяц</div>
                    <div class="stat-value">1 250+</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Гарантия сроков</div>
                    <div class="stat-value">98%</div>
                </div>
            </div>
        </div>
    </section>

    <section class="chart-card">
        <h3>Динамика заказов за последние 7 месяцев</h3>
        <canvas id="ordersChart" height="140"></canvas>
    </section>

    <section class="promotion">
        <div class="promotion__title"><h3>Компания ТЛК «Ястреб» — ваш партнер по грузоперевозкам</h3></div>
        <div class="promotion__sybtitle">Организуем перевозку любого типа груза по оптимальной цене</div>
        <div class="promotion__citation">Наша цель — долгосрочное, взаимовыгодное сотрудничество с каждым клиентом.</div>
        <div class="promotion__text">
            Мы осуществляем грузоперевозки по России с широким выбором транспорта и гибкой логистикой. Доверьте доставку опытной команде, которая знает, как управлять маршрутом, документами и сохранностью товара.
        </div>
    </section>

    <section class="features">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <div class="feature-text">Страхуем груз на каждом этапе и гарантируем сохранность.</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon">⚡</div>
                    <div class="feature-text">Оперативный расчет стоимости и подбор оптимального транспорта.</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-item">
                    <div class="feature-icon">📦</div>
                    <div class="feature-text">Управление доставкой с готовыми маршрутами и документами.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="steps-block">
        <h2>Как мы работаем</h2>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">01</div>
                <div class="step-text">Оставляете заявку — мы сразу считаем цену и срок.</div>
            </div>
            <div class="step-card">
                <div class="step-number">02</div>
                <div class="step-text">Согласуем маршрут и документы на перевозку.</div>
            </div>
            <div class="step-card">
                <div class="step-number">03</div>
                <div class="step-text">Отправляем ваш груз и контролируем движение.</div>
            </div>
            <div class="step-card">
                <div class="step-number">04</div>
                <div class="step-text">Доставляем ваш груз в срок.</div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="faq-card">
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true">Что такое услуга перегон автомобиля?</button>
                    </h2>
                    <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Перегон автомобиля — это доставка машины из точки А в точку Б с соблюдением всех правил дорожного движения и безопасности. Часто такой способ выгоднее, чем доставка автовозом.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false">Как подобрать автозав на нужную дату?</button>
                    </h2>
                    <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">На популярные маршруты автозав предоставляется быстро. Для менее загруженных направлений мы согласуем удобный график и помогаем выбрать оптимальную дату.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false">Куда доставлять автомобиль перед перевозкой?</button>
                    </h2>
                    <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Автомобиль передается на согласованную стоянку в пункте загрузки и затем забирается по акту приема-передачи.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const canvas = document.getElementById('ordersChart');
        if (!canvas) return;

        new Chart(canvas, {
            type: 'line',
            data: {
                labels: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл'],
                datasets: [
                    {
                        label: 'Заказы',
                        data: [120, 150, 180, 170, 200, 220, 240],
                        borderColor: '#f59e0b',
                        backgroundColor: 'rgba(245,158,11,0.18)',
                        tension: 0.35,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: '#f59e0b'
                    },
                    {
                        label: 'Реализация',
                        data: [90, 130, 160, 155, 190, 205, 230],
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37,99,235,0.16)',
                        tension: 0.35,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: '#2563eb'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: { mode: 'index', intersect: false }
                },
                interaction: { mode: 'nearest', axis: 'x', intersect: false },
                scales: {
                    x: { grid: { display: false } },
                    y: { beginAtZero: true, ticks: { stepSize: 50 } }
                }
            }
        });
    });
</script>
@endpush
