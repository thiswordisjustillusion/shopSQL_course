-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 11 2017 г., 23:18
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_login` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_login`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_url`) VALUES
(1, 'Категория#1', 'category1'),
(2, 'Категория#2', 'category2');

-- --------------------------------------------------------

--
-- Структура таблицы `dostavka`
--

CREATE TABLE IF NOT EXISTS `dostavka` (
  `dostavka_id` int(11) NOT NULL AUTO_INCREMENT,
  `dostavka_name` varchar(255) NOT NULL,
  PRIMARY KEY (`dostavka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `dostavka`
--

INSERT INTO `dostavka` (`dostavka_id`, `dostavka_name`) VALUES
(1, 'Самовывоз'),
(2, 'Почта России');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `dostavka_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `dostavka_id` (`dostavka_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`,`dostavka_id`),
  KEY `user_id_3` (`user_id`,`dostavka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `dostavka_id`, `status`) VALUES
(1, 1, '2017-12-01', 1, 1),
(2, 1, '2017-12-06', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_shop`
--

CREATE TABLE IF NOT EXISTS `order_shop` (
  `order_shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`order_shop_id`),
  KEY `order_id` (`order_id`,`shop_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `order_shop`
--

INSERT INTO `order_shop` (`order_shop_id`, `order_id`, `shop_id`, `count`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 1),
(3, 2, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`shop_id`),
  KEY `category_id` (`category_id`),
  KEY `category_id_2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`shop_id`, `category_id`, `name`, `price`, `image`) VALUES
(1, 1, 'Game#1', 1100, 'im1.jpg'),
(2, 1, 'Game#2', 1200, 'im2.jpg'),
(3, 1, 'Game#3', 1300, 'im3.jpg'),
(4, 2, 'Game#4', 1400, 'im4.jpg'),
(5, 2, 'Game#5', 1500, 'im5.jpg'),
(6, 2, 'Game#6', 1600, 'im6.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_fam` varchar(50) NOT NULL,
  `user_tel` int(11) NOT NULL,
  `user_address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `ip` varchar(16) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_fam`, `user_tel`, `user_address`, `email`, `login`, `password`, `date`, `ip`) VALUES
(1, 'qwerty123', 'qwerty123', 1112223344, 'qwerty123', 'qwerty123@sdf.ru', 'qwerty123', '9qweqwr2r1b8b49fab662b2ca945f780fca7a0cf32asd7f', '2017-12-08', '127.0.0.1');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`dostavka_id`) REFERENCES `dostavka` (`dostavka_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_shop`
--
ALTER TABLE `order_shop`
  ADD CONSTRAINT `order_shop_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_shop_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
