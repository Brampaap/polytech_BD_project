-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: std-mysql
-- Время создания: Май 23 2020 г., 18:06
-- Версия сервера: 5.7.26-0ubuntu0.16.04.1
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `std_1257`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access_levels`
--

CREATE TABLE `access_levels` (
  `id` int(11) NOT NULL,
  `access_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `access_levels`
--

INSERT INTO `access_levels` (`id`, `access_level`) VALUES
(0, 2),
(1, 1),
(2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `admin_in_restaurant`
--

CREATE TABLE `admin_in_restaurant` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_in_restaurant`
--

INSERT INTO `admin_in_restaurant` (`id`, `id_user`, `id_restaurant`) VALUES
(1, 14, 2),
(2, 14, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `bonus`
--

CREATE TABLE `bonus` (
  `id_pr` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `score` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bonus`
--

INSERT INTO `bonus` (`id_pr`, `id`, `score`) VALUES
(10, 14, 0),
(11, 15, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `work_phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `city`, `address`, `work_phone`) VALUES
(15, 'test123@mail.ru', NULL, NULL, NULL),
(16, 'datamail@mail.ru', 'Москва', 'Улица Пушкина, д. Колотушкина 22', '+7(444)-444-44-42'),
(17, 'guest@mail.ru', NULL, NULL, NULL),
(18, 'darby@mail.ru', 'Москва', 'Ул. уличная, д.12', '+7(967)132-33-33');

-- --------------------------------------------------------

--
-- Структура таблицы `courier_in_order`
--

CREATE TABLE `courier_in_order` (
  `id` int(11) NOT NULL,
  `idDelivery` int(11) NOT NULL,
  `idCourier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `d_date` date NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `details`
--

CREATE TABLE `details` (
  `id` int(255) NOT NULL,
  `BIK` varchar(255) DEFAULT NULL,
  `INN` varchar(20) DEFAULT NULL,
  `OKPO` varchar(255) DEFAULT NULL,
  `KPP` varchar(255) DEFAULT NULL,
  `recipiet` varchar(255) DEFAULT NULL,
  `KC` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `details`
--

INSERT INTO `details` (`id`, `BIK`, `INN`, `OKPO`, `KPP`, `recipiet`, `KC`) VALUES
(1, '44525225', '7707083893', '32537', '773601001 ', 'Греф Герман Оскарович', '30101810400000000225'),
(2, '7549432', '343416945', '0004343', '84444', 'Иванов Иван Ивванович', '9432842307430943097');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `O_date` date NOT NULL,
  `O_time` time NOT NULL,
  `payments` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `status`, `name`, `description`, `price`) VALUES
(27, 1, 'gig', 'gig', 4343),
(28, 1, '4444', '44444', 4444),
(29, 1, 'gig', 'gig', 454),
(31, 1, 'Рыба', 'Рыба не мясо', 400),
(32, 1, 'Сыр', 'Ни рыба - ни мясо', 299),
(33, 1, 'Ещё один продукт', 'Описание', 200);

-- --------------------------------------------------------

--
-- Структура таблицы `product_in_restaurants`
--

CREATE TABLE `product_in_restaurants` (
  `id` int(11) NOT NULL,
  `idRest` int(11) NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_in_restaurants`
--

INSERT INTO `product_in_restaurants` (`id`, `idRest`, `idProd`) VALUES
(24, 3, 31),
(25, 3, 32),
(26, 2, 33);

-- --------------------------------------------------------

--
-- Структура таблицы `prod_and_deliv_in_order`
--

CREATE TABLE `prod_and_deliv_in_order` (
  `id` int(11) NOT NULL,
  `idDelivery` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Restaurants`
--

CREATE TABLE `Restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_bank_details` int(11) DEFAULT NULL,
  `id_contacts` int(11) DEFAULT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `site_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Restaurants`
--

INSERT INTO `Restaurants` (`id`, `name`, `id_bank_details`, `id_contacts`, `description`, `image`, `site_link`) VALUES
(2, 'SanPol', 1, 16, 'Lorem text description Добавим текста', './restaurants/SanPol/sanpol_avatar.png', 'https://vk.com/'),
(3, 'Allds', 2, 18, 'Lorem text 213', './restaurants/Allds/default-image copy.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `social_networks`
--

CREATE TABLE `social_networks` (
  `id_pr` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `instagramm` int(11) DEFAULT NULL,
  `facebook` int(11) DEFAULT NULL,
  `vk` int(11) DEFAULT NULL,
  `viber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `social_networks`
--

INSERT INTO `social_networks` (`id_pr`, `id`, `instagramm`, `facebook`, `vk`, `viber`) VALUES
(11, 14, NULL, NULL, NULL, NULL),
(12, 15, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `t_name` varchar(20) DEFAULT NULL,
  `d_of_reg` varchar(20) NOT NULL,
  `born` text,
  `id_contacts` int(11) DEFAULT NULL,
  `card_number` int(255) DEFAULT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userdata`
--

INSERT INTO `userdata` (`id`, `f_name`, `l_name`, `t_name`, `d_of_reg`, `born`, `id_contacts`, `card_number`, `gender`) VALUES
(14, 'Darby', NULL, NULL, '2020-05-22', '06/16/2004', 15, NULL, 'male'),
(15, 'GUEST', NULL, NULL, '2020-05-22', '06/01/2020', 17, NULL, 'male');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`) VALUES
(14, '+7(000)000-00-00', '51ce84a6db96daaa7081869fd38c517a'),
(15, '+7(111)111-11-11', 'b0baee9d279d34fa1dfd71aadb908c3f');

-- --------------------------------------------------------

--
-- Структура таблицы `users_order`
--

CREATE TABLE `users_order` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_in_data`
--

CREATE TABLE `user_in_data` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_userdata` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_in_data`
--

INSERT INTO `user_in_data` (`id`, `id_user`, `id_userdata`) VALUES
(7, 14, 14),
(8, 15, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `user_in_level`
--

CREATE TABLE `user_in_level` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_in_level`
--

INSERT INTO `user_in_level` (`id`, `id_user`, `id_level`) VALUES
(6, 14, 2),
(7, 15, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access_levels`
--
ALTER TABLE `access_levels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `admin_in_restaurant`
--
ALTER TABLE `admin_in_restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_restaurant` (`id_restaurant`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id_pr`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `courier_in_order`
--
ALTER TABLE `courier_in_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDelivery` (`idDelivery`),
  ADD KEY `idCourier` (`idCourier`);

--
-- Индексы таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_in_restaurants`
--
ALTER TABLE `product_in_restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRest` (`idRest`),
  ADD KEY `idProd` (`idProd`);

--
-- Индексы таблицы `prod_and_deliv_in_order`
--
ALTER TABLE `prod_and_deliv_in_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDelivery` (`idDelivery`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Индексы таблицы `Restaurants`
--
ALTER TABLE `Restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contacts` (`id_contacts`),
  ADD KEY `id_bank_details` (`id_bank_details`);

--
-- Индексы таблицы `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id_pr`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contacts` (`id_contacts`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `users_order`
--
ALTER TABLE `users_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Индексы таблицы `user_in_data`
--
ALTER TABLE `user_in_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_userdata` (`id_userdata`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Индексы таблицы `user_in_level`
--
ALTER TABLE `user_in_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_in_restaurant`
--
ALTER TABLE `admin_in_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `courier_in_order`
--
ALTER TABLE `courier_in_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `details`
--
ALTER TABLE `details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `product_in_restaurants`
--
ALTER TABLE `product_in_restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `prod_and_deliv_in_order`
--
ALTER TABLE `prod_and_deliv_in_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Restaurants`
--
ALTER TABLE `Restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users_order`
--
ALTER TABLE `users_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_in_data`
--
ALTER TABLE `user_in_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user_in_level`
--
ALTER TABLE `user_in_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `admin_in_restaurant`
--
ALTER TABLE `admin_in_restaurant`
  ADD CONSTRAINT `admin_in_restaurant_ibfk_1` FOREIGN KEY (`id_restaurant`) REFERENCES `Restaurants` (`id`),
  ADD CONSTRAINT `admin_in_restaurant_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `bonus`
--
ALTER TABLE `bonus`
  ADD CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`id`) REFERENCES `userdata` (`id`);

--
-- Ограничения внешнего ключа таблицы `courier_in_order`
--
ALTER TABLE `courier_in_order`
  ADD CONSTRAINT `courier_in_order_ibfk_1` FOREIGN KEY (`idDelivery`) REFERENCES `delivery` (`id`),
  ADD CONSTRAINT `courier_in_order_ibfk_2` FOREIGN KEY (`idCourier`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `product_in_restaurants`
--
ALTER TABLE `product_in_restaurants`
  ADD CONSTRAINT `product_in_restaurants_ibfk_1` FOREIGN KEY (`idRest`) REFERENCES `Restaurants` (`id`),
  ADD CONSTRAINT `product_in_restaurants_ibfk_2` FOREIGN KEY (`idProd`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `prod_and_deliv_in_order`
--
ALTER TABLE `prod_and_deliv_in_order`
  ADD CONSTRAINT `prod_and_deliv_in_order_ibfk_1` FOREIGN KEY (`idDelivery`) REFERENCES `delivery` (`id`),
  ADD CONSTRAINT `prod_and_deliv_in_order_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `prod_and_deliv_in_order_ibfk_3` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`);

--
-- Ограничения внешнего ключа таблицы `Restaurants`
--
ALTER TABLE `Restaurants`
  ADD CONSTRAINT `Restaurants_ibfk_4` FOREIGN KEY (`id_contacts`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `Restaurants_ibfk_5` FOREIGN KEY (`id_bank_details`) REFERENCES `details` (`id`);

--
-- Ограничения внешнего ключа таблицы `social_networks`
--
ALTER TABLE `social_networks`
  ADD CONSTRAINT `social_networks_ibfk_1` FOREIGN KEY (`id`) REFERENCES `userdata` (`id`);

--
-- Ограничения внешнего ключа таблицы `userdata`
--
ALTER TABLE `userdata`
  ADD CONSTRAINT `userdata_ibfk_3` FOREIGN KEY (`id_contacts`) REFERENCES `contacts` (`id`);

--
-- Ограничения внешнего ключа таблицы `users_order`
--
ALTER TABLE `users_order`
  ADD CONSTRAINT `users_order_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `users_order_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_in_data`
--
ALTER TABLE `user_in_data`
  ADD CONSTRAINT `user_in_data_ibfk_1` FOREIGN KEY (`id_userdata`) REFERENCES `userdata` (`id`),
  ADD CONSTRAINT `user_in_data_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `user_in_level`
--
ALTER TABLE `user_in_level`
  ADD CONSTRAINT `user_in_level_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `user_in_level_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `access_levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
