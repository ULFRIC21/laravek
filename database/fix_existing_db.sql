-- Если таблица users УЖЕ есть и при php artisan migrate выходит ошибка "Table 'users' already exists":
-- 1) Выполните этот файл в своей базе (laravel8_db или как у вас в .env).
-- 2) Это добавит колонку role, создаст orders и запишет миграции, чтобы Laravel больше не пытался создавать users.

USE `laravel8_db`;

SET NAMES utf8mb4;

-- Пометить стандартные миграции как выполненные (чтобы не запускалась create_users_table). Выполнить один раз.
INSERT INTO `migrations` (`migration`, `batch`)
SELECT * FROM (SELECT '2014_10_12_000000_create_users_table', 1) t
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2014_10_12_000000_create_users_table');
INSERT INTO `migrations` (`migration`, `batch`)
SELECT * FROM (SELECT '2014_10_12_100000_create_password_resets_table', 1) t
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2014_10_12_100000_create_password_resets_table');
INSERT INTO `migrations` (`migration`, `batch`)
SELECT * FROM (SELECT '2019_08_19_000000_create_failed_jobs_table', 1) t
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2019_08_19_000000_create_failed_jobs_table');
INSERT INTO `migrations` (`migration`, `batch`)
SELECT * FROM (SELECT '2019_12_14_000001_create_personal_access_tokens_table', 1) t
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2019_12_14_000001_create_personal_access_tokens_table');

-- Добавить колонку role в users (если ошибка "Duplicate column" — колонка уже есть, пропустите этот блок)
ALTER TABLE `users` ADD COLUMN `role` varchar(255) NOT NULL DEFAULT 'client' AFTER `email`;

-- Таблица заказов (если уже есть — не перезаписываем)
CREATE TABLE IF NOT EXISTS `orders` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Пометить миграции заказов как выполненные
INSERT INTO `migrations` (`migration`, `batch`)
SELECT * FROM (SELECT '2026_02_17_000001_add_role_to_users_table', 2) t
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_02_17_000001_add_role_to_users_table');
INSERT INTO `migrations` (`migration`, `batch`)
SELECT * FROM (SELECT '2026_02_17_000002_create_orders_table', 2) t
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_02_17_000002_create_orders_table');
