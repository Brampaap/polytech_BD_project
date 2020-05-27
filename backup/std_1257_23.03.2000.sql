-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: std-mysql
-- Время создания: Мар 23 2020 г., 18:24
-- Версия сервера: 5.7.26-0ubuntu0.16.04.1
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(2, 2);

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
(1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `contasts`
--

CREATE TABLE `contasts` (
  `id` int(11) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contasts`
--

INSERT INTO `contasts` (`id`, `email`, `city`, `address`) VALUES
(1, 'test@mail.ru', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `delails`
--

CREATE TABLE `delails` (
  `id` int(11) NOT NULL,
  `BIK` int(11) DEFAULT NULL,
  `INN` int(11) DEFAULT NULL,
  `OKPO` int(11) DEFAULT NULL,
  `KPP` int(11) DEFAULT NULL,
  `recipiet` varchar(255) DEFAULT NULL,
  `KC` int(11) DEFAULT NULL
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
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, NULL, NULL, NULL, NULL);

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
(1, 'darby', NULL, NULL, '2020-03-22', '03/17/2020', 1, NULL, 'male');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`) VALUES
(1, '+7(967)157-04-85', 'test1111');

-- --------------------------------------------------------

--
-- Структура таблицы `user_in_data`
--

CREATE TABLE `user_in_data` (
  `id_user` int(11) DEFAULT NULL,
  `id_userdata` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_in_data`
--

INSERT INTO `user_in_data` (`id_user`, `id_userdata`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_in_level`
--

CREATE TABLE `user_in_level` (
  `id_user` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_in_level`
--

INSERT INTO `user_in_level` (`id_user`, `id_level`) VALUES
(1, 0);

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
-- Индексы таблицы `contasts`
--
ALTER TABLE `contasts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `delails`
--
ALTER TABLE `delails`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Restaurants`
--
ALTER TABLE `Restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bank_details` (`id_bank_details`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_contacts` (`id_contacts`);

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
-- Индексы таблицы `user_in_data`
--
ALTER TABLE `user_in_data`
  ADD KEY `id_userdata` (`id_userdata`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user_in_level`
--
ALTER TABLE `user_in_level`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `contasts`
--
ALTER TABLE `contasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bonus`
--
ALTER TABLE `bonus`
  ADD CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`id`) REFERENCES `userdata` (`id`);

--
-- Ограничения внешнего ключа таблицы `Restaurants`
--
ALTER TABLE `Restaurants`
  ADD CONSTRAINT `Restaurants_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `Restaurants_ibfk_4` FOREIGN KEY (`id_contacts`) REFERENCES `contasts` (`id`);

--
-- Ограничения внешнего ключа таблицы `social_networks`
--
ALTER TABLE `social_networks`
  ADD CONSTRAINT `social_networks_ibfk_1` FOREIGN KEY (`id`) REFERENCES `userdata` (`id`);

--
-- Ограничения внешнего ключа таблицы `userdata`
--
ALTER TABLE `userdata`
  ADD CONSTRAINT `userdata_ibfk_3` FOREIGN KEY (`id_contacts`) REFERENCES `contasts` (`id`);

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
