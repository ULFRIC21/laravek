<footer style="background:#1f2937;color:#f9fafb;padding:36px 0;margin-top:48px;">
    <div class="site-center">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div style="font-weight:700;margin-bottom:12px;">ЯСТРЕБ</div>
                <p style="color:#d1d5db;line-height:1.5;margin:0;">Грузоперевозки по России, работа с корпоративными и частными заказами.</p>
            </div>
            <div class="col-12 col-md-4">
                <div style="font-weight:700;margin-bottom:12px;">Разделы</div>
                <div style="display:flex;flex-direction:column;gap:8px;">
                    <a href="{{ route('special') }}" style="color:#f9fafb;text-decoration:none;">Спец техника</a>
                    <a href="{{ route('reviews') }}" style="color:#f9fafb;text-decoration:none;">Отзывы</a>
                    <a href="{{ route('contacts') }}" style="color:#f9fafb;text-decoration:none;">Контакты</a>
                    <a href="{{ route('news') }}" style="color:#f9fafb;text-decoration:none;">Новости</a>
                    <a href="{{ route('calc') }}" style="color:#f9fafb;text-decoration:none;">Расчет стоимости</a>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div style="font-weight:700;margin-bottom:12px;">Контакты</div>
                <p style="color:#d1d5db;line-height:1.5;margin:0 0 8px;">Телефон: +7 (900) 000-00-00</p>
                <p style="color:#d1d5db;line-height:1.5;margin:0 0 8px;">E-mail: info@example.ru</p>
                <p style="color:#d1d5db;line-height:1.5;margin:0;">© {{ date('Y') }} Все права защищены.</p>
            </div>
        </div>
    </div>
</footer>