-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 30 2018 г., 03:01
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `casino.xxx`
--

-- --------------------------------------------------------

--
-- Структура таблицы `prizes`
--

CREATE TABLE `prizes` (
  `id` int(11) NOT NULL,
  `label` varchar(535) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(535) NOT NULL,
  `rarity` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prizes`
--

INSERT INTO `prizes` (`id`, `label`, `about`, `image`, `rarity`, `count`) VALUES
(0, 'money', 'Это просто деньги, потрать их на что-нибудь хорошее', 'img/prizes/money.png', 0, 1000),
(2, 'bread', 'Привет\r\nпривет, я хлеб, вкуснее есть меня с кетчупом и колбасой', 'img/prizes/real/bread.png', 2, 0),
(3, 'bottle', 'Бутылка!\r\nЭто бутылка, в местах не столь отдаленных... а в прочем и не важно, отправим почтой или курьером', 'img/prizes/real/bottle.png', 100, 0),
(5, 'Pivo', 'Держи пивавсика, удачной игры!', '/img/prizes/real/pivo.png', 0, 9985);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(65) NOT NULL,
  `password` text NOT NULL,
  `session` varchar(255) NOT NULL,
  `cash` text NOT NULL,
  `koef` text NOT NULL,
  `lastprize` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `session`, `cash`, `koef`, `lastprize`) VALUES
(12, 'alex', '$2y$10$e6aVNknipcNt.G9/R2KOjOzMkxSecirKGy2h1nfxU7JEMRmwx6EMC', 'd3e2b569b3e748d4cfb16d2ea3323bef', '2550', '1', ''),
(13, 'Jarik', '$2y$10$ssw5bJtLih5nPQD87mcPreIUJLynfrQSP0Es5e5uQHZlidkA/lLmi', '3b78612b9768486a58b6409eb78a112e', '', '', ''),
(14, 'sadgirl', '$2y$10$Atph9Cxwjxvst95YFk5hCua68DaQsICRbPNlXPgXnxuVWir8HLtWe', '7239f53c98e911ef6ddd45f34e1a3148', '0', '', '688\n'),
(15, 'John', '$2y$10$9WMllz8bSBqqCzlr5u4Zf.DtE4uH9q2k5imdbp5QQUzGn5NztmiV2', 'e6c057f30522d8a7fd207e64e8e3749c', '1400', '', ''),
(16, '', '$2y$10$/AaBx7JP1pxd3PjB7ojuX.lNhbVE3w1GSd4jtebaUvU6ivMF/iHrq', '', '0', '', ''),
(17, 'asd', '$2y$10$r7cbdUwphp9.UfV/UlkYxONvyNlj/X1cOXnrX5nrL/52r/pqHik8e', '', '0', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `winners`
--

CREATE TABLE `winners` (
  `id` int(11) NOT NULL,
  `prize` varchar(65) NOT NULL,
  `winner` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `winners`
--

INSERT INTO `winners` (`id`, `prize`, `winner`, `status`) VALUES
(1, 'Money ', 'alex', 'Не отправлено'),
(2, 'bread ', 'alex', 'Не отправлено'),
(3, 'bottle ', 'alex', 'Не отправлено'),
(4, 'bread ', 'alex', 'Не отправлено'),
(5, 'bottle ', 'alex', 'Не отправлено'),
(6, 'bottle ', 'alex', 'Не отправлено'),
(7, 'bread ', 'alex', 'Не отправлено'),
(8, 'bread ', 'alex', 'Не отправлено'),
(9, 'bread ', 'alex', 'Не отправлено'),
(10, 'bottle ', 'alex', 'Не отправлено'),
(11, 'bottle ', 'alex', 'Не отправлено'),
(12, 'bread ', 'alex', 'Не отправлено'),
(13, 'Money', 'alex', 'Не отправлено'),
(14, 'bottle ', 'alex', 'Не отправлено'),
(15, 'bottle ', 'alex', 'Не отправлено'),
(16, 'Money 739\n', 'alex', 'Не отправлено'),
(17, 'Money 439\n', 'alex', 'Не отправлено'),
(18, 'bread ', 'alex', 'Не отправлено'),
(19, 'bread ', 'alex', 'Не отправлено'),
(20, 'bread ', 'alex', 'Не отправлено'),
(21, 'bottle ', 'alex', 'Не отправлено'),
(22, 'Money 511\n', 'alex', 'Не отправлено'),
(23, 'bread ', 'alex', 'Не отправлено'),
(24, 'bottle ', 'sadgirl', 'Не отправлено'),
(25, 'bottle ', 'sadgirl', 'Не отправлено'),
(26, 'Money 704\n', 'sadgirl', 'Не отправлено'),
(27, 'bread ', 'sadgirl', 'Не отправлено'),
(28, 'Money 21\n', 'sadgirl', 'Не отправлено'),
(29, 'Money 704\n', 'sadgirl', 'Не отправлено'),
(30, 'bottle ', 'sadgirl', 'Не отправлено'),
(31, 'bottle ', 'sadgirl', 'Не отправлено'),
(32, 'bread ', 'sadgirl', 'Не отправлено'),
(33, 'bottle ', 'sadgirl', 'Не отправлено'),
(34, 'Money 540\n', 'alex', 'Не отправлено'),
(35, 'Money 475\n', 'alex', 'Не отправлено'),
(36, 'bread ', 'alex', 'Не отправлено'),
(37, 'Money 666\n', 'alex', 'Не отправлено'),
(38, 'bottle ', 'alex', 'Не отправлено'),
(39, 'Money 211\n', 'alex', 'Не отправлено'),
(40, 'bread ', 'alex', 'Не отправлено'),
(41, 'bottle ', 'alex', 'Не отправлено'),
(42, 'bread ', 'John', 'Не отправлено'),
(43, 'bottle ', 'John', 'Не отправлено'),
(44, 'bottle ', 'John', 'Не отправлено'),
(45, 'bread ', 'John', 'Не отправлено'),
(46, 'bread ', 'John', 'Не отправлено'),
(47, 'bread ', 'John', 'Не отправлено'),
(48, 'bottle ', 'John', 'Не отправлено'),
(49, 'bottle ', 'John', 'Не отправлено'),
(50, 'Money 687\n', 'John', 'Не отправлено'),
(51, 'Money 155\n', 'John', 'Не отправлено'),
(52, 'bottle ', 'John', 'Не отправлено'),
(53, 'bread ', 'John', 'Не отправлено'),
(54, 'bread ', 'John', 'Не отправлено'),
(55, 'Money 195\n', 'John', 'Не отправлено'),
(56, 'bread ', 'John', 'Не отправлено'),
(57, 'bottle ', 'John', 'Не отправлено'),
(58, 'bread ', 'John', 'Не отправлено'),
(59, 'bottle ', 'John', 'Не отправлено'),
(60, 'bread ', 'John', 'Не отправлено'),
(61, 'bread ', 'John', 'Не отправлено'),
(62, 'Money 651\n', 'John', 'Не отправлено'),
(63, 'Money 547\n', 'John', 'Не отправлено'),
(64, 'bottle ', 'John', 'Не отправлено'),
(65, 'bottle ', 'John', 'Не отправлено'),
(66, 'bread ', 'John', 'Не отправлено'),
(67, 'bread ', 'John', 'Не отправлено'),
(68, 'Money 839\n', 'John', 'Не отправлено'),
(69, 'Money 990\n', 'John', 'Не отправлено'),
(70, 'Money 958\n', 'John', 'Не отправлено'),
(71, 'Pivo ', 'John', 'Не отправлено'),
(72, 'Money 70\n', 'John', 'Не отправлено'),
(73, 'Pivo ', 'John', 'Не отправлено'),
(74, 'bottle ', 'John', 'Не отправлено'),
(75, 'Pivo ', 'John', 'Не отправлено'),
(76, 'Pivo ', 'John', 'Не отправлено'),
(77, 'Pivo ', 'John', 'Не отправлено'),
(78, 'Pivo ', 'John', 'Не отправлено'),
(79, 'bottle ', 'John', 'Не отправлено'),
(80, 'bottle ', 'John', 'Не отправлено'),
(81, 'bottle ', 'John', 'Не отправлено'),
(82, 'Pivo ', 'John', 'Не отправлено'),
(83, 'bread ', 'John', 'Не отправлено'),
(84, 'bread ', 'John', 'Не отправлено'),
(85, 'Pivo ', 'John', 'Не отправлено'),
(86, 'bread ', 'John', 'Не отправлено'),
(87, 'bread ', 'John', 'Не отправлено'),
(88, 'bottle ', 'John', 'Не отправлено'),
(89, 'Money 366\n', 'John', 'Не отправлено'),
(90, 'Money 609\n', 'John', 'Не отправлено'),
(91, 'bottle ', 'John', 'Не отправлено'),
(92, 'Pivo ', 'alex', 'Не отправлено'),
(93, 'money ', 'alex', 'Не отправлено'),
(94, 'bottle ', 'alex', 'Не отправлено'),
(95, 'bread ', 'alex', 'Не отправлено'),
(96, 'bottle ', 'alex', 'Не отправлено'),
(97, 'bread ', 'alex', 'Не отправлено'),
(98, 'bread ', 'alex', 'Не отправлено'),
(99, 'Money 521\n', 'alex', 'Не отправлено'),
(100, 'money ', 'alex', 'Не отправлено'),
(101, 'Pivo ', 'alex', 'Не отправлено'),
(102, 'money ', 'alex', 'Не отправлено'),
(103, 'money ', 'alex', 'Не отправлено'),
(104, 'Money 63\n', 'alex', 'Не отправлено'),
(105, 'money ', 'alex', 'Не отправлено'),
(106, 'Money 139\n', 'alex', 'Не отправлено'),
(107, 'money ', 'alex', 'Не отправлено'),
(108, 'Money 856\n', 'alex', 'Не отправлено'),
(109, 'Money 800\n', 'alex', 'Не отправлено'),
(110, 'bread ', 'alex', 'Не отправлено'),
(111, 'Money 132\n', 'alex', 'Не отправлено'),
(112, 'bottle ', 'alex', 'Не отправлено'),
(113, 'Pivo ', 'alex', 'Не отправлено'),
(114, 'bottle ', 'alex', 'Не отправлено'),
(115, 'Pivo ', 'alex', 'Не отправлено'),
(116, 'bread ', 'alex', 'Не отправлено'),
(117, 'bread ', 'alex', 'Не отправлено'),
(118, 'Pivo ', 'alex', 'Не отправлено'),
(119, 'bread ', 'alex', 'Не отправлено'),
(120, 'bottle ', 'alex', 'Не отправлено'),
(121, 'Money 676\n', 'alex', 'Не отправлено'),
(122, 'Money 493\n', 'alex', 'Не отправлено'),
(123, 'Money 608\n', 'alex', 'Не отправлено'),
(124, 'Money 806\n', 'alex', 'Не отправлено'),
(125, 'Pivo ', 'alex', 'Не отправлено'),
(126, 'bottle ', 'alex', 'Не отправлено'),
(127, 'bread ', 'alex', 'Не отправлено'),
(128, 'Money 708\n', 'alex', 'Не отправлено'),
(129, 'bread ', 'alex', 'Не отправлено'),
(130, 'bottle ', 'alex', 'Не отправлено'),
(131, 'bottle ', 'alex', 'Не отправлено'),
(132, 'bread ', 'alex', 'Не отправлено'),
(133, 'Pivo ', 'alex', 'Не отправлено'),
(134, 'bottle ', 'alex', 'Не отправлено'),
(135, 'bread ', 'alex', 'Не отправлено'),
(136, 'bottle ', 'alex', 'Не отправлено'),
(137, 'bread ', 'alex', 'Не отправлено'),
(138, 'Pivo ', 'alex', 'Не отправлено'),
(139, 'bottle ', 'alex', 'Не отправлено'),
(140, 'bottle ', 'alex', 'Не отправлено'),
(141, 'Pivo ', 'alex', 'Не отправлено'),
(142, 'bread ', 'alex', 'Не отправлено'),
(143, 'Pivo ', 'alex', 'Не отправлено'),
(144, 'Pivo ', 'alex', 'Не отправлено'),
(145, 'Pivo ', 'alex', 'Не отправлено'),
(146, 'Pivo ', 'alex', 'Не отправлено'),
(147, 'Pivo ', 'alex', 'Не отправлено'),
(148, 'Pivo ', 'alex', 'Не отправлено'),
(149, 'Money 857\n', 'alex', 'Не отправлено'),
(150, 'Pivo ', 'alex', 'Не отправлено'),
(151, 'Pivo ', 'alex', 'Не отправлено'),
(152, 'Money 727\n', 'alex', 'Не отправлено'),
(153, 'Money 714\n', 'alex', 'Не отправлено'),
(154, 'Pivo ', 'alex', 'Не отправлено');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `prizes`
--
ALTER TABLE `prizes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `prizes`
--
ALTER TABLE `prizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
