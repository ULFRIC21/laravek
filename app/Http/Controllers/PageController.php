<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /** Список новостей для страницы «Новости» и для отдельной статьи */
    public static function getNewsList(): array
    {
        $list = [
            ['id' => 1, 'title' => 'Как реестр экспедиторов повлияет на рынок грузоперевозок и формирование тарифов', 'excerpt' => 'Введение реестра экспедиторов повысит прозрачность рынка и повлияет на логистические издержки. Рассказываем, чего ждать перевозчикам и заказчикам.', 'image' => 'image/news/1.jpg'],
            ['id' => 2, 'title' => 'Запущено новое направление по Дальнему Востоку', 'excerpt' => 'Теперь мы выполняем регулярные перевозки контейнеров по маршруту Москва — Владивосток с фиксированными сроками доставки.', 'image' => 'image/news/2.jpg'],
            ['id' => 3, 'title' => 'Снижение тарифов для постоянных клиентов', 'excerpt' => 'Для компаний с ежемесячным объёмом перевозок предусмотрены индивидуальные условия и персональный менеджер.', 'image' => 'image/news/3.jpg'],
            ['id' => 4, 'title' => 'Новые требования к тахографам в 2026 году', 'excerpt' => 'С 2026 года вступают в силу обновлённые правила установки и использования тахографов. Кратко о главном для перевозчиков.', 'image' => 'image/news/4.jpg'],
            ['id' => 5, 'title' => 'Грузоперевозки в труднодоступные регионы', 'excerpt' => 'Расширяем географию доставки: организуем перевозки в регионы с ограниченной транспортной инфраструктурой.', 'image' => 'image/news/5.jpg'],
            ['id' => 6, 'title' => 'Страхование грузов: что изменилось', 'excerpt' => 'Обзор изменений в правилах страхования грузов при междугородних и международных перевозках.', 'image' => 'image/news/6.jpg'],
            ['id' => 7, 'title' => 'Сезонные акции на перевозку стройматериалов', 'excerpt' => 'Специальные условия на перевозку строительных грузов до конца квартала. Фиксированные тарифы и скидки при объёме.', 'image' => 'image/news/7.jpg'],
            ['id' => 8, 'title' => 'Обновление парка техники', 'excerpt' => 'Мы обновили парк грузовиков и прицепов: новые машины соответствуют экологическим стандартам и снижают риски простоев.', 'image' => 'image/news/8.jpg'],
            ['id' => 9, 'title' => 'Документооборот в один клик', 'excerpt' => 'Заказчики теперь могут получать акты и накладные в личном кабинете без задержек и бумажной переписки.', 'image' => 'image/news/9.jpg'],
            ['id' => 10, 'title' => 'Итоги года: статистика и планы на следующий сезон', 'excerpt' => 'Краткий отчёт о работе компании за год и анонс новых направлений и сервисов для клиентов.', 'image' => 'image/news/10.jpg'],
        ];
        foreach ($list as &$item) {
            $path = public_path($item['image']);
            $item['image_url'] = is_file($path) ? asset($item['image']) : 'https://picsum.photos/800/400?random=' . $item['id'];
        }
        return $list;
    }

    public function special()
    {
        return view('special');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function news()
    {
        return view('news', ['articles' => self::getNewsList()]);
    }

    public function showNews(int $id)
    {
        $articles = self::getNewsList();
        $article = collect($articles)->firstWhere('id', $id);
        if (!$article) {
            abort(404);
        }
        return view('news-item', ['article' => $article]);
    }

    public function calc()
    {
        return view('cals');
    }
}
