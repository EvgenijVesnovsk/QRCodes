-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 12 2019 г., 15:05
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `qr_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `qr_tbl`
--

CREATE TABLE `qr_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `param` json NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `qr_tbl`
--

INSERT INTO `qr_tbl` (`id`, `name`, `param`, `count`, `created_at`, `updated_at`) VALUES
(13, 'Медичи', '{\"city\": \"Новороссийск\", \"source\": \"https://medichi-novoros.ru/\", \"product\": \"Медицинский центр\", \"campaing\": \"ООО Медичи\"}', 1, '2019-06-12 08:43:52', '2019-06-12 08:43:52'),
(14, 'Безварикоза', '{\"city\": \"Новороссийск\", \"source\": \"http://medichfp.beget.tech/\", \"product\": \"Лечение варикоза\", \"campaing\": \"ООО Медичи\"}', 0, '2019-06-12 08:43:52', '2019-06-12 08:43:52'),
(15, 'КТ', '{\"city\": \"Новороссийск\", \"source\": \"https://kt-novoros.ru/\", \"product\": \"Компьютерный томограф\", \"campaing\": \"ООО Медичи\"}', 0, '2019-06-12 08:43:52', '2019-06-12 08:43:52'),
(16, 'Housesitter', '{\"city\": \"Новороссийск\", \"source\": \"https://housesitter.ru/\", \"product\": \"Домоводство\", \"campaing\": \"Профессия домохозяйка\"}', 1, '2019-06-12 08:43:52', '2019-06-12 08:43:52');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `qr_tbl`
--
ALTER TABLE `qr_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `qr_tbl`
--
ALTER TABLE `qr_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
