@extends('layouts.app')

@section('title', 'ЯСТРЕБ — Грузоперевозки')

@push('styles')
<style>
    .hero-section {
        position: relative;
        min-height: 88vh;
        background-image: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1450&q=80');
        background-size: cover;
        background-position: center;
        color: #ffffff;
        padding: 120px 16px 60px;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15,23,42,0.5), rgba(15,23,42,0.92));
        z-index: 0;
    }
    .hero-section .hero-inner {
        position: relative;
        z-index: 1;
        max-width: 1180px;
        margin: 0 auto;
    }
    .hero-heading {
        font-size: clamp(2.8rem, 6vw, 4.2rem);
        font-weight: 900;
        line-height: 1.02;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    .hero-copy {
        font-size: 1.05rem;
        line-height: 1.8;
        max-width: 720px;
        margin-bottom: 40px;
        color: #e2e8f0;
    }
    .hero-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
    }
    .hero-form .hero-input {
        background: rgba(255,255,255,0.95);
        border: none;
        border-radius: 18px;
        padding: 18px 20px;
        font-size: 0.95rem;
        color: #0f172a;
        width: 100%;
        box-sizing: border-box;
    }
    .hero-form button {
        border: none;
        border-radius: 18px;
        background: #f59e0b;
        color: #111827;
        font-weight: 800;
        padding: 18px 22px;
        cursor: pointer;
        transition: transform 0.2s ease, background 0.2s ease;
    }
    .hero-form button:hover {
        transform: translateY(-2px);
        background: #ea580c;
    }
    .section-white,
    .section-light {
        padding: 80px 16px;
    }
    .section-white { background: #ffffff; }
    .section-light { background: #f7f8fb; }
    .section-image {
        position: relative;
        min-height: 420px;
        background-size: cover;
        background-position: center;
        color: #ffffff;
        overflow: hidden;
    }
    .section-image::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(15,23,42,0.55);
    }
    .section-image .section-image-inner {
        position: relative;
        z-index: 1;
        max-width: 1180px;
        margin: 0 auto;
        padding: 80px 16px;
    }
    .section-title {
        font-size: clamp(1.9rem, 3.5vw, 2.6rem);
        font-weight: 800;
        margin-bottom: 12px;
    }
    .section-subtitle {
        font-size: 1rem;
        color: #475569;
        max-width: 720px;
        line-height: 1.8;
        margin-bottom: 32px;
    }
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }
    .stat-block {
        background: #ffffff;
        border-radius: 22px;
        padding: 28px;
        box-shadow: 0 20px 45px rgba(15,23,42,0.06);
        min-height: 150px;
    }
    .stat-label {
        display: block;
        font-size: 0.95rem;
        color: #64748b;
        margin-bottom: 10px;
    }
    .stat-value {
        font-size: 2.4rem;
        font-weight: 800;
        color: #0f172a;
    }
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
    }
    .feature-card {
        background: #ffffff;
        border-radius: 22px;
        padding: 26px;
        box-shadow: 0 18px 40px rgba(15,23,42,0.05);
        display: flex;
        gap: 18px;
    }
    .feature-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        background: #f59e0b;
        display: grid;
        place-items: center;
        color: #ffffff;
        font-size: 1.4rem;
        flex-shrink: 0;
    }
    .feature-card p {
        margin: 0;
        font-weight: 600;
        line-height: 1.7;
        color: #1f2937;
    }
    .chart-card {
        background: #ffffff;
        border-radius: 26px;
        padding: 30px;
        box-shadow: 0 24px 60px rgba(15,23,42,0.06);
    }
    .chart-card canvas {
        width: 100% !important;
        height: auto !important;
    }
    .step-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
    }
    .step-card {
        background: #111827;
        color: #ffffff;
        border-radius: 24px;
        padding: 30px;
        min-height: 200px;
    }
    .step-number {
        font-size: 2rem;
        font-weight: 900;
        color: #fbbf24;
        margin-bottom: 18px;
    }
    .step-text {
        line-height: 1.8;
        color: #e5e7eb;
        font-weight: 500;
    }
    .faq-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 28px;
        box-shadow: 0 24px 60px rgba(15,23,42,0.06);
    }
    .accordion-button {
        border-radius: 16px;
        margin-bottom: 10px;
        background: #f8fafc;
        color: #0f172a;
        font-weight: 700;
    }
    .accordion-button:not(.collapsed) {
        background: #f59e0b;
        color: #111827;
    }
    .accordion-body {
        border-radius: 0 0 16px 16px;
        color: #475569;
    }
    @media (max-width: 768px) {
        .hero-section { padding-top: 140px; }
    }
</style>
@endpush

@section('content')
<section class="hero-section">
    <div class="hero-inner">
        <h1 class="hero-heading">Надежные грузоперевозки по всей России</h1>
        <p class="hero-copy">Скорость, удобный расчет и безопасная доставка от своего логистического партнера. Оформите заказ и получите актуальную цену за 1 минуту.</p>
        <div class="hero-form">
            <input class="hero-input" type="text" placeholder="Откуда">
            <input class="hero-input" type="text" placeholder="Куда">
            <input class="hero-input" type="text" placeholder="Груз">
            <button type="button" onclick="window.location.href='{{ route('calc') }}'">Заказать</button>
        </div>
    </div>
</section>

<section class="section-white">
    <div class="site-center">
        <div class="stats-row">
            <div class="stat-block">
                <span class="stat-label">ценка клиентов</span>
                <span class="stat-value">4.9 / 5</span>
            </div>
            <div class="stat-block">
                <span class="stat-label">оставок в месяц</span>
                <span class="stat-value">1 250+</span>
            </div>
            <div class="stat-block">
                <span class="stat-label">арантия сроков</span>
                <span class="stat-value">98%</span>
            </div>
        </div>
    </div>
</section>

<section class="section-image" style="background-image: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80');">
    <div class="section-image-inner">
        <h2 class="section-title">Транспорт любой сложности</h2>
        <p class="hero-copy">Мы перевозим контейнеры, спецтехнику, крупногабаритные и сборные грузы по России с контролем на каждом этапе.</p>
    </div>
</section>

<section class="section-light">
    <div class="site-center">
        <h2 class="section-title">Почему выбирают нас</h2>
        <p class="section-subtitle">Сбалансированный подход, быстрый расчет и поддержка на каждом этапе доставки.</p>
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">✓</div>
                <p>Страхование груза на всех этапах и контроль сохранности.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <p>Быстрый расчет маршрута и прозрачная стоимость без скрытых платежей.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💼</div>
                <p>Готовые решения для бизнеса и индивидуальный менеджер под ваш маршрут.</p>
            </div>
        </div>
    </div>
</section>

<section class="section-white">
    <div class="site-center">
        <div class="chart-card">
            <h2 class="section-title">График заказов</h2>
            <canvas id="ordersChart" height="220"></canvas>
        </div>
    </div>
</section>

<section class="section-light" style="background-image: linear-gradient(180deg, rgba(247,248,251,1), rgba(247,248,251,0.96));">
    <div class="site-center">
        <h2 class="section-title">Как мы работаем</h2>
        <div class="step-grid">
            <div class="step-card">
                <div class="step-number">01</div>
                <div class="step-text">Оставляете заявку в один клик, мы сразу рассчитываем оптимальный маршрут.</div>
            </div>
            <div class="step-card">
                <div class="step-number">02</div>
                <div class="step-text">Уточняем детали, подбираем лучший транспорт и документируем заказ.</div>
            </div>
            <div class="step-card">
                <div class="step-number">03</div>
                <div class="step-text">Организуем отправку и контролируем движение груза до места назначения.</div>
            </div>
            <div class="step-card">
                <div class="step-number">04</div>
                <div class="step-text">Доставляем груз в срок и передаем его в руки получателя.</div>
            </div>
        </div>
    </div>
</section>

<section class="section-image" style="background-image: url('https://images.unsplash.com/photo-1517632298120-6f5c270a4c59?auto=format&fit=crop&w=1600&q=80'); min-height: 360px;">
    <div class="section-image-inner">
        <h2 class="section-title">Надежная логистика для бизнеса</h2>
        <p class="hero-copy">Крупные и регулярные отправки выполняются по четкому графику, с удобным документооборотом и сопровождением.</p>
    </div>
</section>

<section class="section-white">
    <div class="site-center">
        <div class="faq-card">
            <h2 class="section-title">Часто задаваемые вопросы</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true">Что такое услуга перегон автомобиля?</button>
                    </h2>
                    <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Перегон автомобиля — это доставка машины из точки А в точку Б с соблюдением всех правил дорожного движения и полной безопасностью.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false">Как подобрать автовоз на нужную дату?</button>
                    </h2>
                    <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">По популярным направлениям автовоз доступен быстро. Для других маршрутов мы предлагаем удобные даты с учетом загрузки.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false">Куда доставлять автомобиль перед перевозкой?</button>
                    </h2>
                    <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Автомобиль передается на согласованную стоянку в пункте загрузки и затем забирается по акту.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('ordersChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Янв', 'ев', 'ар', 'пр', 'ай', 'юн', 'юл'],
                datasets: [
                    {
                        label: 'аказы',
                        data: [120, 150, 180, 170, 200, 220, 240],
                        borderColor: '#f59e0b',
                        backgroundColor: 'rgba(245, 158, 11, 0.18)',
                        tension: 0.3,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: '#f59e0b'
                    },
                    {
                        label: 'еализация',
                        data: [90, 130, 160, 155, 190, 205, 230],
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.16)',
                        tension: 0.3,
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
