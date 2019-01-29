-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2019 г., 21:18
-- Версия сервера: 5.7.16
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `module1_rahim`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `img_date_upload` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `img_path`, `img_date_upload`) VALUES
(17, '15487055697242_picture_logo.jpg', '2019-01-28 22:59:29'),
(18, '1548705576586979_two.jpg', '2019-01-28 22:59:36'),
(19, '154870558167849_validated_logo.jpg', '2019-01-28 22:59:41'),
(20, '154870558975784_one.jpg', '2019-01-28 22:59:49'),
(21, '1548705596714358_Olivenkranz.png', '2019-01-28 22:59:56'),
(23, '1548705605435338_154870558167849_validated_logo.jpg', '2019-01-28 23:00:05'),
(24, '1548705611562443_two.jpg', '2019-01-28 23:00:11'),
(27, '1548705811872529_picture_logo.jpg', '2019-01-28 23:03:31'),
(28, '1548779988220405_two.jpg', '2019-01-29 19:39:48'),
(29, '1548785865306372_Olivenkranz.png', '2019-01-29 21:17:45');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
