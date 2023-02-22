-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2023 г., 09:04
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `storebase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `isMain` int NOT NULL DEFAULT '1',
  `isEmpty` int NOT NULL DEFAULT '1',
  `country_id` int NOT NULL DEFAULT '0',
  `city_id` int NOT NULL DEFAULT '0',
  `street_id` int NOT NULL DEFAULT '0',
  `building_id` int NOT NULL DEFAULT '0',
  `appartment_id` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `isMain`, `isEmpty`, `country_id`, `city_id`, `street_id`, `building_id`, `appartment_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 0, 1, 2, 3, 4, 4, '2023-02-05 12:53:24', '2023-02-09 15:54:49', NULL),
(2, 2, 0, 0, 2, 4, 7, 9, 9, '2023-02-05 12:54:38', '2023-02-22 05:18:46', NULL),
(3, 3, 1, 1, 0, 0, 0, 0, 0, '2023-02-06 11:19:52', '2023-02-09 13:13:13', '2023-02-09 10:13:13'),
(4, 4, 1, 1, 0, 0, 0, 0, 0, '2023-02-06 11:37:57', '2023-02-10 08:09:43', '2023-02-10 05:09:43'),
(5, 5, 1, 1, 0, 0, 0, 0, 0, '2023-02-06 12:25:42', '2023-02-06 12:25:42', NULL),
(6, 6, 1, 1, 0, 0, 0, 0, 0, '2023-02-07 08:06:24', '2023-02-09 13:28:03', '2023-02-09 10:28:03'),
(7, 1, 0, 0, 1, 2, 4, 6, 6, '2023-02-09 13:12:23', '2023-02-09 15:54:47', NULL),
(8, 3, 1, 0, 2, 3, 5, 7, 7, '2023-02-09 13:13:13', '2023-02-09 13:13:13', NULL),
(9, 6, 1, 0, 2, 3, 6, 8, 8, '2023-02-09 13:28:03', '2023-02-09 13:28:03', NULL),
(10, 1, 0, 0, 1, 1, 1, 1, 1, '2023-02-09 13:28:59', '2023-02-09 15:54:49', NULL),
(11, 2, 1, 0, 1, 2, 3, 4, 4, '2023-02-09 13:30:04', '2023-02-22 05:18:46', NULL),
(12, 2, 1, 0, 1, 1, 2, 3, 0, '2023-02-09 13:38:22', '2023-02-10 07:08:36', '2023-02-10 04:08:36'),
(13, 2, 0, 0, 1, 2, 4, 6, 6, '2023-02-10 06:36:07', '2023-02-10 06:56:05', '2023-02-10 03:56:05'),
(14, 4, 1, 0, 1, 1, 1, 1, 1, '2023-02-10 06:36:44', '2023-02-10 08:08:53', '2023-02-10 05:08:53'),
(15, 4, 1, 0, 1, 2, 4, 6, 6, '2023-02-10 08:09:43', '2023-02-10 08:09:43', NULL),
(16, 7, 1, 1, 0, 0, 0, 0, 0, '2023-02-10 10:38:28', '2023-02-10 10:38:28', NULL),
(17, 8, 1, 1, 0, 0, 0, 0, 0, '2023-02-22 05:12:37', '2023-02-22 05:32:44', '2023-02-22 02:32:44'),
(18, 4, 0, 0, 1, 1, 2, 3, 3, '2023-02-22 05:18:00', '2023-02-22 05:18:00', NULL),
(19, 8, 1, 0, 1, 5, 9, 11, 11, '2023-02-22 05:31:09', '2023-02-22 05:31:13', '2023-02-22 02:31:13'),
(20, 8, 1, 0, 1, 5, 10, 12, 12, '2023-02-22 05:32:08', '2023-02-22 05:32:24', '2023-02-22 02:32:24'),
(21, 8, 0, 0, 1, 5, 10, 12, 12, '2023-02-22 05:32:44', '2023-02-22 05:32:58', NULL),
(22, 8, 1, 0, 1, 5, 9, 11, 11, '2023-02-22 05:32:55', '2023-02-22 05:32:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `appartments`
--

CREATE TABLE `appartments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `appartments`
--

INSERT INTO `appartments` (`id`, `name`, `building_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '', 0, NULL, NULL, NULL),
(1, '1', 1, '2023-02-05 12:49:16', '2023-02-05 12:49:16', NULL),
(2, '2', 2, '2023-02-05 12:49:29', '2023-02-05 12:49:29', NULL),
(3, '3', 3, '2023-02-05 12:49:40', '2023-02-05 12:49:40', NULL),
(4, '4', 4, '2023-02-05 12:49:55', '2023-02-05 12:49:55', NULL),
(5, '5', 5, '2023-02-05 12:50:06', '2023-02-05 12:50:06', NULL),
(6, '6', 6, '2023-02-05 12:50:18', '2023-02-05 12:50:18', NULL),
(7, '7', 7, '2023-02-05 12:50:28', '2023-02-05 12:50:28', NULL),
(8, '8', 8, '2023-02-05 12:50:39', '2023-02-05 12:50:39', NULL),
(9, '9', 9, '2023-02-05 12:50:48', '2023-02-05 12:50:48', NULL),
(10, '10', 10, '2023-02-05 12:51:00', '2023-02-05 12:51:00', NULL),
(11, '11', 11, '2023-02-05 12:51:00', '2023-02-05 12:51:00', NULL),
(12, '12', 12, '2023-02-05 12:51:00', '2023-02-05 12:51:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `street_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '', 0, NULL, NULL, NULL),
(1, '11', 1, '2023-02-05 12:45:55', '2023-02-05 12:45:55', NULL),
(2, '22', 1, '2023-02-05 12:46:11', '2023-02-05 12:46:11', NULL),
(3, '33', 2, '2023-02-05 12:46:23', '2023-02-05 12:46:23', NULL),
(4, '44', 3, '2023-02-05 12:46:37', '2023-02-05 12:46:37', NULL),
(5, '55', 3, '2023-02-05 12:46:55', '2023-02-05 12:46:55', NULL),
(6, '66', 4, '2023-02-05 12:47:14', '2023-02-05 12:47:14', NULL),
(7, '77', 5, '2023-02-05 12:47:25', '2023-02-05 12:47:25', NULL),
(8, '88', 6, '2023-02-05 12:47:38', '2023-02-05 12:47:38', NULL),
(9, '99', 7, '2023-02-05 12:47:48', '2023-02-05 12:47:48', NULL),
(10, '1010', 8, '2023-02-05 12:48:03', '2023-02-05 12:48:03', NULL),
(11, '1111', 9, '2023-02-05 12:48:03', '2023-02-05 12:48:03', NULL),
(12, '1212', 10, '2023-02-05 12:48:03', '2023-02-05 12:48:03', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '', 0, NULL, NULL, NULL),
(1, 'Moscow', 1, '2023-02-05 12:39:31', '2023-02-05 12:39:31', NULL),
(2, 'St. Petersburg', 1, '2023-02-05 12:39:55', '2023-02-05 12:39:55', NULL),
(3, 'Helsinki', 2, '2023-02-05 12:40:10', '2023-02-05 12:40:10', NULL),
(4, 'Lappeenranta', 2, '2023-02-05 12:40:25', '2023-02-05 12:40:25', NULL),
(5, 'Kaliningrad', 1, '2023-02-08 08:56:01', '2023-02-08 08:56:01', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '', NULL, NULL, NULL),
(1, 'Russia', '2023-02-05 12:37:50', '2023-02-05 12:37:50', NULL),
(2, 'Finland', '2023-02-05 12:38:19', '2023-02-05 12:38:19', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_28_104325_create_phones_table', 1),
(6, '2023_01_28_111914_create_countries_table', 1),
(7, '2023_01_28_111929_create_cities_table', 1),
(8, '2023_01_28_114610_create_streets_table', 1),
(9, '2023_01_28_120200_create_buildings_table', 1),
(10, '2023_01_28_121812_create_appartments_table', 1),
(11, '2023_01_29_091437_create_addresses_table', 1),
(12, '2023_02_12_122820_create_statuses_table', 2),
(13, '2023_02_12_123847_create_producttypes_table', 3),
(14, '2023_02_12_125252_create_products_table', 4),
(15, '2023_02_16_055031_create_orders_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` int NOT NULL,
  `status_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_quantity` int NOT NULL,
  `sum` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `status_id`, `product_id`, `product_quantity`, `sum`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 2, 200000, 1, '2023-02-16 06:09:57', '2023-02-19 06:23:58', NULL),
(2, 1, 1, 2, 4, 1000000, 1, '2023-02-16 08:00:57', '2023-02-19 06:23:58', NULL),
(3, 2, 2, 2, 2, 500000, 2, '2023-02-16 08:03:25', '2023-02-21 15:34:52', NULL),
(4, 2, 2, 3, 1, 434000, 2, '2023-02-16 08:06:22', '2023-02-21 15:34:52', NULL),
(5, 3, 1, 2, 5, 1250000, 4, '2023-02-18 14:39:54', '2023-02-20 10:14:16', NULL),
(6, 4, 2, 3, 1, 434000, 4, '2023-02-18 14:39:54', '2023-02-21 15:34:53', '2023-02-21 12:34:53'),
(7, 5, 2, 1, 2, 200000, 3, '2023-02-18 14:45:28', '2023-02-20 10:14:49', NULL),
(8, 5, 2, 3, 1, 434000, 3, '2023-02-18 14:45:28', '2023-02-20 10:14:49', NULL),
(9, 6, 2, 1, 1, 100000, 1, '2023-02-18 14:47:44', '2023-02-21 15:34:54', NULL),
(10, 6, 2, 2, 5, 1250000, 1, '2023-02-18 14:47:44', '2023-02-21 15:34:54', NULL),
(11, 7, 2, 1, 1, 100000, 7, '2023-02-20 10:25:12', '2023-02-21 15:34:55', NULL),
(12, 7, 2, 2, 1, 250000, 7, '2023-02-20 10:25:12', '2023-02-21 15:34:55', NULL),
(13, 7, 2, 3, 1, 434000, 7, '2023-02-20 10:25:12', '2023-02-21 06:51:26', '2023-02-21 03:51:26'),
(14, 8, 2, 3, 7, 3038000, 1, '2023-02-21 06:52:31', '2023-02-21 06:56:22', '2023-02-21 03:56:22'),
(15, 8, 2, 2, 2, 500000, 1, '2023-02-21 07:51:30', '2023-02-21 15:34:56', '2023-02-21 12:34:56'),
(16, 9, 2, 2, 2, 500000, 1, '2023-02-21 08:04:12', '2023-02-21 15:39:34', NULL),
(17, 9, 2, 3, 6, 2604000, 1, '2023-02-21 13:13:12', '2023-02-21 15:39:34', NULL),
(18, 9, 2, 3, 6, 2604000, 1, '2023-02-21 13:48:34', '2023-02-21 15:39:34', '2023-02-21 12:39:34'),
(19, 10, 2, 1, 2, 200000, 5, '2023-02-21 15:42:22', '2023-02-21 15:43:54', '2023-02-21 12:43:54'),
(20, 10, 2, 2, 6, 1500000, 5, '2023-02-21 15:42:22', '2023-02-21 15:43:37', '2023-02-21 12:43:37'),
(21, 10, 2, 3, 3, 1302000, 5, '2023-02-21 15:42:22', '2023-02-21 15:43:54', '2023-02-21 12:43:54'),
(22, 10, 2, 1, 3, 300000, 1, '2023-02-21 15:44:09', '2023-02-21 15:44:36', '2023-02-21 12:44:36'),
(23, 10, 2, 2, 1, 250000, 1, '2023-02-21 15:44:09', '2023-02-21 15:44:37', '2023-02-21 12:44:37'),
(24, 10, 2, 3, 3, 1302000, 1, '2023-02-21 15:44:09', '2023-02-21 15:44:39', '2023-02-21 12:44:39'),
(25, 10, 2, 1, 3, 300000, 6, '2023-02-21 15:44:58', '2023-02-21 15:45:09', '2023-02-21 12:45:09'),
(26, 10, 2, 2, 1, 250000, 6, '2023-02-21 15:44:58', '2023-02-21 15:45:09', '2023-02-21 12:45:09'),
(27, 10, 2, 3, 3, 1302000, 6, '2023-02-21 15:44:58', '2023-02-21 15:45:09', '2023-02-21 12:45:09'),
(28, 10, 1, 1, 3, 300000, 6, '2023-02-21 15:45:29', '2023-02-21 15:45:36', NULL),
(29, 10, 1, 2, 1, 250000, 6, '2023-02-21 15:45:29', '2023-02-21 15:45:36', NULL),
(30, 10, 1, 3, 3, 1302000, 6, '2023-02-21 15:45:29', '2023-02-21 15:45:36', NULL),
(31, 11, 2, 1, 1, 100000, 8, '2023-02-22 05:33:38', '2023-02-22 05:33:38', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `phones`
--

CREATE TABLE `phones` (
  `id` bigint UNSIGNED NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `phones`
--

INSERT INTO `phones` (`id`, `phone_number`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '+79819876543', 1, '2023-02-05 12:36:01', '2023-02-05 12:36:01', NULL),
(2, '+79811234567', 2, '2023-02-05 12:36:31', '2023-02-05 12:36:31', NULL),
(3, '+79855555555', 3, '2023-02-06 11:19:52', '2023-02-10 10:34:30', NULL),
(4, '+79812222222', 4, '2023-02-06 11:37:57', '2023-02-06 11:37:57', NULL),
(6, '+79813333333', 5, '2023-02-06 12:25:42', '2023-02-06 12:25:42', NULL),
(7, '+79214563456', 6, '2023-02-07 08:06:24', '2023-02-07 08:06:24', NULL),
(8, '+79217777777', 7, '2023-02-10 10:38:28', '2023-02-10 10:38:28', NULL),
(9, '+79453458765', 8, '2023-02-22 05:12:37', '2023-02-22 05:12:37', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `producttype_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `producttype_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TV Samsung', 'Good 1', 100000, 71, 1, '2023-02-12 13:05:35', '2023-02-22 05:33:38', NULL),
(2, 'Iphone 14', 'Good 2', 250000, 124, 2, '2023-02-12 13:06:32', '2023-02-21 15:45:29', NULL),
(3, 'Dell', 'Good 3', 434000, 22, 3, '2023-02-12 13:07:23', '2023-02-21 15:45:29', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `producttypes`
--

CREATE TABLE `producttypes` (
  `id` bigint UNSIGNED NOT NULL,
  `type_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `producttypes`
--

INSERT INTO `producttypes` (`id`, `type_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '', NULL, NULL, NULL),
(1, 'TVs, audio, video', '2023-02-12 12:47:58', '2023-02-12 12:47:58', NULL),
(2, 'Smartphones and gadgets', '2023-02-12 12:48:58', '2023-02-12 12:48:58', NULL),
(3, 'Computers and laptops', '2023-02-12 12:49:39', '2023-02-12 12:49:39', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Paid', '2023-02-12 12:36:53', '2023-02-12 12:36:53', NULL),
(2, 'Not paid', '2023-02-12 12:37:16', '2023-02-12 12:37:16', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `streets`
--

CREATE TABLE `streets` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `streets`
--

INSERT INTO `streets` (`id`, `name`, `city_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '', 0, NULL, NULL, NULL),
(1, 'Arbat', 1, '2023-02-05 12:41:37', '2023-02-05 12:41:37', NULL),
(2, 'Democratic st.', 1, '2023-02-05 12:42:11', '2023-02-05 12:42:11', NULL),
(3, 'Marat st.', 2, '2023-02-05 12:42:33', '2023-02-05 12:42:33', NULL),
(4, 'Nevsky pr.', 2, '2023-02-05 12:42:45', '2023-02-05 12:42:45', NULL),
(5, 'Aleksanterinkatu', 3, '2023-02-05 12:43:46', '2023-02-05 12:43:46', NULL),
(6, 'Fredrikinkatu', 3, '2023-02-05 12:44:00', '2023-02-05 12:44:00', NULL),
(7, 'Ahokatu', 4, '2023-02-05 12:44:44', '2023-02-05 12:44:44', NULL),
(8, 'Einontie', 4, '2023-02-05 12:44:58', '2023-02-05 12:44:58', NULL),
(9, 'Leninsky pr.', 5, '2023-02-05 12:44:58', '2023-02-05 12:44:58', NULL),
(10, 'Frunze st.', 5, '2023-02-05 12:44:58', '2023-02-05 12:44:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Darya', 'kda@mail.ru', NULL, '12345', NULL, '2023-02-05 09:59:54', '2023-02-05 09:59:54', NULL),
(2, 'Vitya', 'dvn@mail.ru', NULL, '12345', NULL, '2023-02-05 10:00:27', '2023-02-11 10:56:20', NULL),
(3, 'Vasya', 'vasya@mail.ru', NULL, NULL, NULL, '2023-02-06 08:37:57', '2023-02-06 08:37:57', NULL),
(4, 'Bora', 'boraCOOLDOG@mail.ru', NULL, NULL, NULL, '2023-02-06 08:37:57', '2023-02-10 09:34:16', NULL),
(5, 'EndTest', 'vitend@mail.ru', NULL, NULL, NULL, '2023-02-06 09:25:42', '2023-02-11 10:55:58', NULL),
(6, 'Mr Smith', 'mrsmith@gmail.com', NULL, NULL, NULL, '2023-02-07 05:06:24', '2023-02-07 05:06:24', NULL),
(7, 'Test Testovich', 'test@list.ru', NULL, NULL, NULL, '2023-02-10 07:38:28', '2023-02-20 07:29:14', NULL),
(8, 'Main Test', 'mt@gmail.com', NULL, NULL, NULL, '2023-02-22 02:12:37', '2023-02-22 02:12:37', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `appartments`
--
ALTER TABLE `appartments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `producttypes`
--
ALTER TABLE `producttypes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `appartments`
--
ALTER TABLE `appartments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `producttypes`
--
ALTER TABLE `producttypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `streets`
--
ALTER TABLE `streets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
