-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: std-mysql
-- Время создания: Май 18 2020 г., 17:05
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
(1, 1, 0),
(2, 6, 0),
(3, 7, 0),
(4, 8, 0),
(5, 9, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `work_phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `city`, `address`, `work_phone`) VALUES
(1, 'test@mail.ru', NULL, NULL, NULL),
(2, 'test@tasr.ty', NULL, NULL, NULL),
(3, 'test@tasr.ty', NULL, NULL, NULL),
(4, 'test@tasr.ty', NULL, NULL, NULL),
(5, 'test@tasr.ty', NULL, NULL, NULL),
(6, 'test@tasr.ty', NULL, NULL, NULL),
(7, 'ttt@mt.t', NULL, NULL, NULL),
(8, 'te@idf.tr', NULL, NULL, NULL),
(9, 'te@rre.mail', NULL, NULL, NULL),
(10, 'dimanata1232@gmail.com', 'Москва', 'Россия, Москва, 117997, ул. Вавилова, д. 19 ', '+7(495)950-21-90');

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
  `BIK` int(255) DEFAULT NULL,
  `INN` bigint(20) DEFAULT NULL,
  `OKPO` int(255) DEFAULT NULL,
  `KPP` varchar(255) DEFAULT NULL,
  `recipiet` varchar(255) DEFAULT NULL,
  `KC` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `details`
--

INSERT INTO `details` (`id`, `BIK`, `INN`, `OKPO`, `KPP`, `recipiet`, `KC`) VALUES
(1, 44525225, 7707083893, 32537, '773601001', 'Ратинский Михаил Сергеевич', '30101810400000000225');

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
(2, 1, 'Дичь', 'Очень вкусно, не могу прям, но дорого', 1987),
(19, 1, 'Форель по-узбекски', 'Кущаи, мои харощии, кущаии', 190),
(20, 1, 'Форель', 'апв', 4);

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
(2, 1, 2),
(15, 1, 19),
(16, 1, 20);

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
  `status_r` bit(1) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `site_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Restaurants`
--

INSERT INTO `Restaurants` (`id`, `name`, `id_bank_details`, `id_contacts`, `status_r`, `id_admin`, `description`, `image`, `img_name`, `site_link`) VALUES
(1, 'SunPol', 1, 10, b'1', 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et voluptatem delectus consequuntur velit, magni placeat tempora nesciunt rerum vitae, eius quas debitis, sint officiis repellat.', './restaurants/SunPol/default-image copy.jpg', '', 'https://vk.com');

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
(1, 1, NULL, NULL, NULL, NULL),
(2, 5, NULL, NULL, NULL, NULL),
(3, 6, NULL, NULL, NULL, NULL),
(4, 7, NULL, NULL, NULL, NULL),
(5, 8, NULL, NULL, NULL, NULL),
(6, 9, NULL, NULL, NULL, NULL);

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
(1, 'darby', NULL, NULL, '2020-03-22', '03/17/2020', 1, NULL, 'male'),
(2, 'test', NULL, NULL, '2020-03-28', '01.02.02', 2, NULL, 'male'),
(3, 'test', NULL, NULL, '2020-03-28', '01.02.02', 3, NULL, 'male'),
(4, 'test', NULL, NULL, '2020-03-28', '01.02.02', 4, NULL, 'male'),
(5, 'test', NULL, NULL, '2020-03-28', '01.02.02', 5, NULL, 'male'),
(6, 'test', NULL, NULL, '2020-03-28', '01.02.02', 6, NULL, 'male'),
(7, 'ttt', NULL, NULL, '2020-03-28', '03/16/2020', 7, NULL, 'male'),
(8, 'Дмитрий', NULL, NULL, '2020-03-28', '03/17/2020', 8, NULL, 'male'),
(9, 'Darby', 'Knuth', NULL, '2020-04-06', '04/06/2020', 9, NULL, 'male');

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
(1, '+7(967)157-04-85', 'test1111'),
(6, 'test', '111'),
(7, '+7(888)888-88-88', 'tttttt'),
(8, '+7(999)999-99-99', '5a105e8b9d40e1329780d62ea2265d8a'),
(9, '+7(000)000-00-00', '51ce84a6db96daaa7081869fd38c517a');

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
(1, 1, 1),
(2, 6, 6),
(3, 7, 7),
(4, 8, 8),
(5, 9, 9);

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
(1, 1, 0),
(2, 6, 0),
(3, 7, 0),
(4, 8, 0),
(5, 9, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access_levels`
--
ALTER TABLE `access_levels`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_admin` (`id_admin`),
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
-- AUTO_INCREMENT для таблицы `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `product_in_restaurants`
--
ALTER TABLE `product_in_restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `prod_and_deliv_in_order`
--
ALTER TABLE `prod_and_deliv_in_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Restaurants`
--
ALTER TABLE `Restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users_order`
--
ALTER TABLE `users_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_in_data`
--
ALTER TABLE `user_in_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user_in_level`
--
ALTER TABLE `user_in_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
  ADD CONSTRAINT `Restaurants_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id_user`),
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
