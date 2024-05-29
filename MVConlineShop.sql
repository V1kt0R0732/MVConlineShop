-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 29 2024 г., 18:23
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
-- База данных: `MVConlineShop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Вода'),
(3, 'Снеки'),
(5, 'Цукерки'),
(6, 'Морозиво'),
(7, 'Печиво'),
(8, 'Приправи');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `first_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_log` datetime NOT NULL,
  `password` varchar(40) NOT NULL,
  `adress` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `user_name`, `first_name`, `last_name`, `email`, `phone`, `last_log`, `password`, `adress`) VALUES
(2, 'Viktor_2', 'Viktor', 'Krasnozhon', 'Example@gmail.com', '063 559 28 96', '2024-05-13 20:30:33', '8cb2237d0679ca88db6464eac60da96345513964', 'Random'),
(3, 'Boby', 'Bob', 'Dori', 'Boby@gmail.com', '1230986754', '2024-05-29 17:29:39', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Boby Adress 1'),
(4, 'Lary', 'Lary', 'Lobster', 'Lary@gmail.com', '1230986754', '2024-05-29 17:31:42', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Example Adress');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `id_tovar` int NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `photo_name`, `id_tovar`, `status`) VALUES
(10, '1712142636Моршин_3.jpg', 17, 0),
(11, '1712142636Моршин_2.jpg', 17, 0),
(12, '1712142636Моршин.jpg', 17, 1),
(14, '1712149657Lays.jpeg', 19, 1),
(18, '1712648898Моршин.jpg', 21, 1),
(25, '1712653860Без названия.jpg', 20, 1),
(30, '1712761613Lays.jpeg', 17, 0),
(31, '1714991393Морозиво.jpg', 23, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(40) NOT NULL,
  `id_cat` int NOT NULL,
  `count` int NOT NULL,
  `price` float(8,2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `id_cat`, `count`, `price`, `description`) VALUES
(17, 'Morshin', 1, 15, 40.00, 'Опис Для Товара: Вода'),
(19, 'Lays Chips', 3, 50, 50.00, ''),
(20, 'Chips with Crab', 1, 17, 50.00, ''),
(21, '111111', 1, 22222, 33333.00, ''),
(22, 'Morshin', 1, 15, 40.00, ''),
(23, 'Ріжок', 6, 25, 50.00, 'Дуже смачне морозиво. Привезене прямо з макдональдса. Покупайте');

-- --------------------------------------------------------

--
-- Структура таблицы `relationOrder`
--

CREATE TABLE `relationOrder` (
  `id` int NOT NULL,
  `idUser` int NOT NULL,
  `idCat` int NOT NULL,
  `countCat` int NOT NULL,
  `status` int NOT NULL,
  `dataCat` datetime NOT NULL,
  `description` text NOT NULL,
  `adress` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `relationOrder`
--

INSERT INTO `relationOrder` (`id`, `idUser`, `idCat`, `countCat`, `status`, `dataCat`, `description`, `adress`, `type`) VALUES
(20, 10, 23, 2, 0, '2024-05-27 10:41:45', '', 'address', 'visitor'),
(21, 10, 22, 1, 0, '2024-05-27 10:41:45', '', 'address', 'visitor'),
(22, 11, 22, 1, 0, '2024-05-27 11:19:56', '', 'Example Adress', 'visitor'),
(23, 11, 23, 1, 0, '2024-05-27 11:19:56', '', 'Example Adress', 'visitor'),
(24, 12, 23, 1, 1, '2024-05-27 11:20:21', '', 'address', 'visitor'),
(25, 12, 19, 1, 1, '2024-05-27 11:20:21', '', 'address', 'visitor'),
(26, 12, 17, 1, 1, '2024-05-27 11:20:21', '', 'address', 'visitor'),
(27, 14, 19, 1, 1, '2024-05-29 14:53:58', '', 'Example Adress', 'visitor'),
(28, 14, 20, 1, 1, '2024-05-29 14:53:58', '', 'Example Adress', 'visitor'),
(29, 2, 19, 1, 0, '2024-05-29 15:07:22', '', 'Random', 'client'),
(30, 2, 20, 1, 0, '2024-05-29 15:07:22', '', 'Random', 'client'),
(31, 3, 20, 2, 0, '2024-05-29 17:30:20', '', 'Boby Adress 1', 'client'),
(32, 3, 17, 4, 0, '2024-05-29 17:31:11', 'Boby Likes Water', 'Boby Adress 2', 'client'),
(33, 4, 23, 2, 0, '2024-05-29 17:32:52', '', 'Example Adress', 'client');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `avatar`, `status`) VALUES
(1, 'Viktor', 'Viktor0732@ukr.net', '8cb2237d0679ca88db6464eac60da96345513964', '1713281205pandaAva.jpg', 'Owner'),
(2, 'Grisha', 'Grisha@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `visitor`
--

CREATE TABLE `visitor` (
  `id` int NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `visitor`
--

INSERT INTO `visitor` (`id`, `first_name`, `last_name`, `email`, `phone`, `time`) VALUES
(10, 'Viktor', 'Krasnozhon', 'Visitor@gmail.com', '1230986754', '2024-05-27 10:41:45'),
(11, 'Viktor', 'Krasnozhon', 'Example@gmail.com', '1230986754', '2024-05-27 11:19:56'),
(12, 'Viktor', 'Krasnozhon', 'Visitor@gmail.com', '1230986754', '2024-05-27 11:20:21'),
(13, 'Viktor', 'Krasnozhon', 'Visitor@gmail.com', '1230986754', '2024-05-27 11:26:40'),
(14, 'Viktor', 'Krasnozhon', 'Example@gmail.com', '1230986754', '2024-05-29 14:53:58');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `relationOrder`
--
ALTER TABLE `relationOrder`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `relationOrder`
--
ALTER TABLE `relationOrder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
