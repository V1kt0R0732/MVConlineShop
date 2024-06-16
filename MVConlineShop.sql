-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 01 2024 г., 01:02
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
  `name` varchar(40) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `user_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_log` datetime NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `photo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_tovar` int NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `photo_name`, `id_tovar`, `status`) VALUES
(14, '1712149657Lays.jpeg', 19, 1),
(25, '1712653860Без названия.jpg', 20, 1),
(31, '1714991393Морозиво.jpg', 23, 1),
(32, '1717085655Screenshot 2024-05-30 191218.png', 24, 1),
(33, '1717085694Screenshot 2024-05-30 191449.png', 25, 1),
(34, '1717085743Screenshot 2024-05-30 191538.png', 26, 1),
(35, '1717086057Screenshot 2024-05-30 192050.png', 27, 1),
(36, '1717086712Screenshot 2024-05-30 193122.png', 28, 1),
(37, '1717086902Screenshot 2024-05-30 193438.png', 17, 0),
(40, '1717086993Screenshot 2024-05-30 193626.png', 21, 0),
(43, '1717087090Screenshot 2024-05-30 193803.png', 22, 0),
(46, '1717087212Screenshot 2024-05-30 193942.png', 29, 1),
(47, '1717087294Screenshot 2024-05-30 194032.png', 30, 1),
(48, '1717087329Screenshot 2024-05-30 194203.png', 31, 1),
(49, '1717087379Screenshot 2024-05-30 194230.png', 32, 1),
(50, '1717087566Screenshot 2024-05-30 194533.png', 17, 0),
(51, '1717087566Screenshot 2024-05-30 194516.png', 17, 1),
(52, '1717087626Screenshot 2024-05-30 194648.png', 21, 0),
(53, '1717087626Screenshot 2024-05-30 194639.png', 21, 1),
(54, '1717087697Screenshot 2024-05-30 194753.png', 22, 0),
(55, '1717087697Screenshot 2024-05-30 194745.png', 22, 1),
(56, '1717087815Screenshot 2024-05-30 195008.png', 33, 1),
(57, '1717087902Screenshot 2024-05-30 195120.png', 34, 1),
(58, '1717088797Screenshot 2024-05-30 200434.png', 35, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_cat` int NOT NULL,
  `count` int NOT NULL,
  `price` float(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `id_cat`, `count`, `price`, `description`) VALUES
(17, 'Morshin', 1, 10, 40.00, 'Вода 1,5л Моршинська мінеральна сильногазована'),
(19, 'Чипси Lay\'s ', 3, 48, 50.00, 'Чипси120 г Lay\'s картопляні зі смаком сметани та зелені м/уп'),
(20, 'Чипси Lay\'s', 3, 16, 50.00, 'Чипси 120 г Lay\'s картопляні зі смаком крабу м/уп'),
(21, 'Моршинська', 1, 23, 22.00, 'Вода 1,5л Моршинська мінеральна негазована'),
(22, 'Миргородська', 1, 1, 17.00, 'Вода 1,5л Миргородська Лагідна мінеральна слабогазована'),
(23, 'Ріжок', 6, 32, 50.00, 'Дуже смачне морозиво. Привезене прямо з макдональдса. Покупайте'),
(24, 'Сухарики Flint ', 3, 16, 21.00, 'Сухарики 125 г Flint пшенично-житні зі смаком Вершки та зелень'),
(25, 'Сухарики Flint Baguette', 3, 44, 15.00, 'Сухарики 60 г Flint Baguette пшеничні зі смаком лобстера м/уп'),
(26, 'Насіння соняшника', 3, 15, 30.00, 'Насіння соняшника 95 г Сан Санич смажене солоне'),
(27, 'Насіння соняшника', 3, 22, 27.00, 'Насіння соняшника 80 г Сан Санич Преміум смажене солоне м/уп'),
(28, 'Pringles', 3, 17, 140.00, 'Чіпси 165г PRINGLES картопляні зі смаком сметани та цибулі'),
(29, 'Raffaello ', 5, 55, 191.00, 'Цукерки Raffaello 210 г'),
(30, 'Цукерки АВК', 1, 30, 330.00, 'Цукepки АВК Королівський шарм солодкий мікс'),
(31, 'Сливки-Ленивки', 5, 25, 177.00, 'Цукерки Рошен Сливки-Ленивки глазуровані молочно-шоколадною глазур\'ю'),
(32, 'Mars Twix ', 5, 55, 407.00, 'Цукерки Mars Twix minis вагові'),
(33, 'Перець чорний', 8, 40, 10.00, 'Перець чорний 20 г Мрія мелений'),
(34, 'Лавровий лист', 8, 50, 8.00, 'Лавровий лист 10 г Мрія'),
(35, 'Печиво Oрео', 7, 55, 19.00, 'Печиво 44 г Oрео з какао та кремовою начинкою ванільного смаку м/уп');

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
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `relationOrder`
--

INSERT INTO `relationOrder` (`id`, `idUser`, `idCat`, `countCat`, `status`, `dataCat`, `description`, `adress`, `type`) VALUES
(20, 10, 23, 2, 1, '2024-05-27 10:41:45', '', 'address', 'visitor'),
(21, 10, 22, 1, 1, '2024-05-27 10:41:45', '', 'address', 'visitor'),
(22, 11, 22, 1, 1, '2024-05-27 11:19:56', '', 'Example Adress', 'visitor'),
(23, 11, 23, 1, 1, '2024-05-27 11:19:56', '', 'Example Adress', 'visitor'),
(24, 12, 23, 1, 1, '2024-05-27 11:20:21', '', 'address', 'visitor'),
(25, 12, 19, 1, 1, '2024-05-27 11:20:21', '', 'address', 'visitor'),
(26, 12, 17, 1, 1, '2024-05-27 11:20:21', '', 'address', 'visitor'),
(27, 14, 19, 1, 1, '2024-05-29 14:53:58', '', 'Example Adress', 'visitor'),
(28, 14, 20, 1, 1, '2024-05-29 14:53:58', '', 'Example Adress', 'visitor'),
(29, 2, 19, 1, 1, '2024-05-29 15:07:22', '', 'Random', 'client'),
(30, 2, 20, 1, 1, '2024-05-29 15:07:22', '', 'Random', 'client'),
(31, 3, 20, 2, 0, '2024-05-29 17:30:20', '', 'Boby Adress 1', 'client'),
(32, 3, 17, 4, 0, '2024-05-29 17:31:11', 'Boby Likes Water', 'Boby Adress 2', 'client'),
(33, 4, 23, 2, 0, '2024-05-29 17:32:52', '', 'Example Adress', 'client'),
(34, 15, 24, 1, 1, '2024-06-01 00:41:21', '', 'Example Adress', 'visitor'),
(35, 15, 19, 1, 1, '2024-06-01 00:41:21', '', 'Example Adress', 'visitor'),
(36, 16, 17, 1, 1, '2024-06-01 00:58:14', '', 'address', 'visitor'),
(37, 16, 19, 1, 1, '2024-06-01 00:58:14', '', 'address', 'visitor'),
(38, 17, 20, 1, 1, '2024-06-01 00:59:07', '', 'Boby Adress 1', 'visitor'),
(39, 17, 24, 1, 1, '2024-06-01 00:59:07', '', 'Boby Adress 1', 'visitor'),
(40, 17, 25, 1, 1, '2024-06-01 00:59:07', '', 'Boby Adress 1', 'visitor');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `first_name` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `visitor`
--

INSERT INTO `visitor` (`id`, `first_name`, `last_name`, `email`, `phone`, `time`) VALUES
(10, 'Viktor', 'Krasnozhon', 'Visitor@gmail.com', '1230986754', '2024-05-27 10:41:45'),
(11, 'Viktor', 'Krasnozhon', 'Example@gmail.com', '1230986754', '2024-05-27 11:19:56'),
(12, 'Viktor', 'Krasnozhon', 'Visitor@gmail.com', '1230986754', '2024-05-27 11:20:21'),
(13, 'Viktor', 'Krasnozhon', 'Visitor@gmail.com', '1230986754', '2024-05-27 11:26:40'),
(14, 'Viktor', 'Krasnozhon', 'Example@gmail.com', '1230986754', '2024-05-29 14:53:58'),
(15, 'Viktor', 'Krasnozhon', 'Example@gmail.com', '1230986754', '2024-06-01 00:41:21'),
(16, 'Viktor', 'Krasnozhon', 'Visitor@gmail.com', '1230986754', '2024-06-01 00:58:14'),
(17, 'Bob', 'Dori', 'Example@gmail.com', '1230986754', '2024-06-01 00:59:07');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `relationOrder`
--
ALTER TABLE `relationOrder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
