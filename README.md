нереально крутые референсы или как их там да таких оченб много на гите обычно самые первые ссылки но все же(я такие встречал когда клонировал админки ехехех) 
https://dribbble.com/shots/25642571-Logistics-Dashboard-Design
https://dribbble.com/shots/27047666-Logistics-Dashboard-Design-UI-UX
https://dribbble.com/shots/27100826-Logistics-Dashboard-UI-Design-Delivery-Management-System
вот так можно оформить главную начальную страницу давольно прикольно 
https://www.behance.net/gallery/181488033/Website-Design-for-Logistics-Management-Platform

да и вообще можно брать чтото отсюда тут и оченб крутые картинки 
https://www.behance.net/search/projects/logistics%20website%20design


чуть чуть проще напишу цепочку проекта точнее логику
1.клиент создает заказ 
2.админ\менеджер принимаает заказ и назначает водитиля и грузчика 
3.заказ исполняется 
4.и завершается 

вот кстати еще интерестно можно ли сделать заказ без менеджера или это такое себе?
еще надо бы может быть когданибуть именно отмена заказа, и както сделать так что водитель например не может выйти или отказатся от заказа, или сделать как в вб курьрке, тоесть открывается карта, и выбирается заказ куда откуда и солько куда зачем, можно еще сделать примерная цена, просто у коннкурентов? такая проблема в том что вот так просто не посотришь сколько, чтобы хотябы понимать примерные цены, есть только таблица, а ты еще найли город куда и зачем агага, и ты просто сидшь ждешь когда расчитают, и бесплатно ли это 



--------------очень удобная штука делает нам тестовые регестрации (driver@localhost loader@localhost admin@localhost (admin123))----------------
php artisan db:seed --class=RoleUsersSeeder  




@endif — это директива шаблонизатора Blade в Laravel. Она означает "конец условия if" (end if) и закрывает блок @if


зауск миграции
php artisan migrate

запуск
php artisan serve
Invoke-WebRequest -Uri https://getcomposer.org/Composer-Setup.exe -OutFile Composer-Setup.exe; .\Composer-Setup.exe /S
php composer.phar install
php composer.phar dump-autoload
php artisan serve

кэш
php artisan cache:clear
php artisan config:clear
php artisan view:clear



краткая цепочка 

1Создание заказа 
   ктото на страничке заказы заполняет форму новый закази нажимает создать и создается в таблице orders новые строки status = new  кроме driver_id loader_id
2 админ видит все заказы
   читает из ordersи отдает списки в шаблоны - поэтому  ыдмин видит что есть такой заказ
3 назначение водятела 
   Фдмин нажимает в работу у заказа открывается страница исполненния формой. Выбирает водятела (И принеоходимости грузчика ) и наэимает кнопку назначить и отрпаивть на работу 
   и там какойто контроллер обновляет в бд именно у этого заказа driver_id, loader_id, status = in_progress, assigned_at.  
4 Водятиел видит свои заказы
   контроллер выбирает из orders только строки где driver_id = auth()->id() все в кабюинете водятела
5 завершение
   ктото с доступом тыкает завершить заполняет форму и отправляет контроллер ставит заказу статус что все круто кластно status = completed его айдишник и коментарий заполняется и заказ становится не октивным 


проблемы, очень разный код, верстка не очень 

с чего можно начать 
1структура views
2один
3 разобратся с кадировкой 
4 убрать дубил 
5 можно роли чуть ограничить а не все через один auth
6 удалить уже ненужные коды(хотя можно оставить)но лучше убрать 






p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
