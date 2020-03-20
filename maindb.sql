-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 20 2020 г., 22:52
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `maindb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(30) NOT NULL,
  `CategoryCratedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CategoryUpdatedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `CategoryName`, `CategoryCratedDate`, `CategoryUpdatedDate`) VALUES
(76, 'food', '2020-03-20 21:26:43', NULL),
(77, 'drinks', '2020-03-20 21:26:51', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `ModelName` varchar(30) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `ModelCratedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ModelUpdatedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `models`
--

INSERT INTO `models` (`id`, `ModelName`, `categoryID`, `ModelCratedDate`, `ModelUpdatedDate`) VALUES
(55, 'alcoholic', 77, '2020-03-20 21:28:42', NULL),
(57, ' hot dishes', 76, '2020-03-20 21:30:24', NULL),
(58, ' cold dishes', 76, '2020-03-20 21:31:07', NULL),
(61, 'not alcoholic', 77, '2020-03-20 21:32:51', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `ModelID` int(11) DEFAULT NULL,
  `ProductName` varchar(30) DEFAULT NULL,
  `img_path` varchar(30) DEFAULT NULL,
  `IsNew` enum('0','1') DEFAULT NULL,
  `desc_info` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `ProdCratedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ProdUpdatedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `categoryID`, `ModelID`, `ProductName`, `img_path`, `IsNew`, `desc_info`, `price`, `ProdCratedDate`, `ProdUpdatedDate`) VALUES
(16, 77, 55, 'beer', 'beer', '0', 'Kilikia', 9, '2020-03-20 21:35:14', NULL),
(17, 77, 55, 'wine', 'wine', '0', 'Armenia', 30, '2020-03-20 21:35:56', NULL),
(18, 77, 61, 'red bull', 'red bull', '0', 'energetic', 5, '2020-03-20 21:36:43', NULL),
(19, 77, 61, 'Coca Cola', 'Coca Cola', '1', 'cool drinlks', 2, '2020-03-20 21:43:03', NULL),
(21, 77, 61, 'sprite', 'sprite', '0', 'cool drinks', 2, '2020-03-20 21:43:54', NULL),
(22, 76, 57, ' barbecue', ' barbecue', '0', 'armenian', 100, '2020-03-20 21:45:48', NULL),
(23, 76, 57, 'shaurma', 'shaurma', '1', ' with chicken', 3, '2020-03-20 21:47:40', NULL),
(24, 76, 58, ' sandwich', ' sandwich', '1', ' with sausage', 4, '2020-03-20 21:50:34', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `ModelID` (`ModelID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблицы `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ModelID`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
