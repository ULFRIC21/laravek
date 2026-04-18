# Объяснение всего SQL в проекте

В проекте два SQL-файла: **schema.sql** (полная структура с нуля) и **fix_existing_db.sql** (добавление ролей и заказов к уже существующей базе). Ниже разобрано по шагам.

---

## Общие команды (в начале schema.sql)

```sql
CREATE DATABASE IF NOT EXISTS `laravel8_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `laravel8_db`;
```
- **CREATE DATABASE IF NOT EXISTS** — создать базу `laravel8_db`, если её ещё нет.
- **DEFAULT CHARACTER SET utf8mb4** — кодировка для текста (поддержка всех символов, включая эмодзи).
- **COLLATE utf8mb4_unicode_ci** — правила сравнения строк (сортировка, поиск).
- **USE** — дальше все команды выполняются в этой базе.

```sql
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
```
- **SET NAMES utf8mb4** — соединение с сервером использует ту же кодировку.
- **SET FOREIGN_KEY_CHECKS = 0** — временно отключить проверку внешних ключей, чтобы можно было удалять/создавать таблицы в любом порядке (например, сначала `orders`, потом `users`). В конце файла снова включается (**SET FOREIGN_KEY_CHECKS = 1**).

---

## Файл 1: schema.sql

### 1. Таблица `users` (пользователи)

```sql
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `users`;
```
Удаляем таблицы, если есть. `orders` удаляется первой, потому что она ссылается на `users` (внешние ключи).

```sql
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'client',
  ...
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB ...;
```

| Колонка | Тип | Смысл |
|--------|-----|--------|
| **id** | bigint unsigned AUTO_INCREMENT | Уникальный номер пользователя, выдаётся автоматически. |
| **name** | varchar(255) NOT NULL | Имя. |
| **email** | varchar(255) NOT NULL | Почта; UNIQUE — нельзя два пользователя с одним email. |
| **role** | varchar(255) DEFAULT 'client' | Роль: client, driver, loader, admin. |
| **email_verified_at** | timestamp NULL | Когда почту подтвердили (для верификации). |
| **password** | varchar(255) NOT NULL | Хэш пароля (Laravel хранит в bcrypt). |
| **remember_token** | varchar(100) NULL | Токен «запомнить меня». |
| **created_at**, **updated_at** | timestamp NULL | Время создания и последнего обновления записи. |

- **PRIMARY KEY (id)** — главный ключ по полю `id`.
- **UNIQUE KEY (email)** — в таблице не может быть двух строк с одинаковым `email`.
- **ENGINE=InnoDB** — движок таблицы (поддержка транзакций и внешних ключей).

---

### 2. Таблица `password_resets` (сброс пароля)

```sql
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ...
```

Используется при «Забыли пароль»: сохраняются email и одноразовый токен для ссылки сброса. **KEY (email)** — индекс для быстрого поиска по email.

---

### 3. Таблица `failed_jobs` (неудачные фоновые задачи)

```sql
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ...
```

Нужна Laravel для очередей (jobs): сюда попадают упавшие задачи. **payload** — данные задачи, **exception** — текст ошибки. Обычно для простого сайта не заполняется.

---

### 4. Таблица `personal_access_tokens` (Laravel Sanctum)

Хранит API-токены (для мобильных приложений или API). Для обычного входа через браузер не используется.

---

### 5. Таблица `orders` (заказы)

```sql
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `from_address` varchar(255) NOT NULL,
  `to_address` varchar(255) NOT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `volume` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `driver_id` bigint unsigned DEFAULT NULL,
  `loader_id` bigint unsigned DEFAULT NULL,
  `assigned_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_driver_id_foreign` (`driver_id`),
  KEY `orders_loader_id_foreign` (`loader_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_loader_id_foreign` FOREIGN KEY (`loader_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ...
```

| Колонка | Смысл |
|---------|--------|
| **id** | Номер заказа (уникальный). |
| **user_id** | Кто создал заказ — id из таблицы `users`. NULL — анонимный/без привязки. |
| **from_address** | Адрес погрузки. |
| **to_address** | Адрес выгрузки. |
| **weight** | Вес груза (кг). |
| **volume** | Объём (м³). |
| **status** | new / in_progress / completed. |
| **driver_id** | Назначенный водитель — id из `users`. |
| **loader_id** | Назначенный грузчик — id из `users`. |
| **assigned_at** | Когда назначили водителя/грузчика. |
| **completed_at** | Когда заказ завершили. |
| **comment** | Комментарий при завершении. |
| **created_at**, **updated_at** | Создание и обновление записи. |

**Внешние ключи (FOREIGN KEY):**

- **user_id** → **users(id)**. **ON DELETE SET NULL** — если пользователя удалят, в заказе просто обнулится `user_id`.
- **driver_id** → **users(id)**, **ON DELETE SET NULL** — то же для водителя.
- **loader_id** → **users(id)**, **ON DELETE SET NULL** — то же для грузчика.

То есть в `orders` можно записать только такие `user_id`, `driver_id`, `loader_id`, которые есть в `users.id` (или NULL).

**KEY** на этих полях — индексы, чтобы выборки «все заказы водителя» и т.п. работали быстро.

---

### 6. Таблица `migrations` (учёт миграций Laravel)

```sql
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ...
```

Laravel сам заполняет эту таблицу при запуске `php artisan migrate`: в неё пишется имя каждого выполненного файла миграции и номер «пакета» (batch). По ней Laravel понимает, какие миграции уже применены и какие ещё нет.

В **schema.sql** в эту таблицу сразу вставляются строки:

```sql
INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
...
('2026_02_17_000002_create_orders_table', 2);
```

Так мы «обманываем» Laravel: он считает, что эти миграции уже выполнены, и не будет снова создавать таблицы (в том числе не упадёт с «Table 'users' already exists»).

---

### 7. Администратор по умолчанию

```sql
INSERT INTO `users` (..., `role`, `password`, ...) VALUES
('Администратор', 'admin@localhost', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW());
```

- Добавляется одна строка в `users`: имя «Администратор», email **admin@localhost**, роль **admin**.
- **password** — это уже зашифрованный (bcrypt) пароль. Указанный хэш соответствует паролю **password** (стандартный тестовый пароль Laravel).
- **NOW()** — текущие дата и время в полях `created_at` и `updated_at`.

В конце **schema.sql** снова включается проверка внешних ключей: **SET FOREIGN_KEY_CHECKS = 1**.

---

## Файл 2: fix_existing_db.sql

Используется, когда база и таблица `users` уже есть (например, после старого `migrate`), и нужно только добавить роли и заказы, не пересоздавая всё.

```sql
USE `laravel8_db`;
SET NAMES utf8mb4;
```
Выбираем базу и кодировку.

---

### Вставка записей в `migrations` (без дубликатов)

Пример одной вставки:

```sql
INSERT INTO `migrations` (`migration`, `batch`)
SELECT * FROM (SELECT '2014_10_12_000000_create_users_table', 1) t
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2014_10_12_000000_create_users_table');
```

- **SELECT * FROM (SELECT 'имя_миграции', 1) t** — «виртуальная» строка: имя миграции и batch = 1.
- **WHERE NOT EXISTS (...)** — вставить только если в `migrations` ещё нет строки с таким `migration`.

Так в таблицу добавляются записи о стандартных миграциях (users, password_resets, failed_jobs, personal_access_tokens) и о двух наших (add_role, create_orders), и при этом не создаются дубликаты при повторном запуске скрипта.

---

### Добавление колонки `role` в `users`

```sql
ALTER TABLE `users` ADD COLUMN `role` varchar(255) NOT NULL DEFAULT 'client' AFTER `email`;
```

- **ALTER TABLE** — изменить структуру таблицы.
- **ADD COLUMN** — добавить колонку **role**: строка до 255 символов, по умолчанию **client**, расположить после колонки **email**.

Если колонка уже есть, эта строка выдаст ошибку — тогда блок можно не выполнять.

---

### Создание таблицы `orders` (если её ещё нет)

```sql
CREATE TABLE IF NOT EXISTS `orders` ( ... );
```

Структура та же, что и в **schema.sql**: поля заказа, ключи, внешние ключи на `users`. **IF NOT EXISTS** — таблица создаётся только если её ещё нет, иначе команда не выполняется (и не перезатирает данные).

---

### Пометить миграции заказов как выполненные

Те же **INSERT ... WHERE NOT EXISTS** для миграций:

- `2026_02_17_000001_add_role_to_users_table`
- `2026_02_17_000002_create_orders_table`

с **batch = 2**. После этого `php artisan migrate` не будет снова выполнять эти миграции.

---

## Краткая сводка

| Что | Где | Зачем |
|-----|-----|--------|
| Создание базы и кодировка | schema.sql | База `laravel8_db`, utf8mb4. |
| users | schema.sql, fix (только role) | Пользователи и роли (client/driver/loader/admin). |
| password_resets | schema.sql | Токены сброса пароля. |
| failed_jobs | schema.sql | Очередь задач Laravel. |
| personal_access_tokens | schema.sql | API-токены (Sanctum). |
| orders | schema.sql, fix_existing_db.sql | Заказы, связь с users через user_id, driver_id, loader_id. |
| migrations | оба файла | Список «уже выполненных» миграций для Laravel. |
| INSERT admin | schema.sql | Учётка admin@localhost с паролем **password**. |

Вся логика приложения (кто что видит, кто «принял» заказ и т.д.) строится на том, что в **users** хранятся пользователи с полем **role**, а в **orders** — заказы с полями **status**, **user_id**, **driver_id**, **loader_id**. Остальные таблицы — стандарт Laravel и дополнения под сброс пароля и заказы.
