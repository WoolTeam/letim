-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 14 2014 г., 12:32
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `symphony`
--

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `text`, `author`, `email`, `active`, `created_at`, `updated_at`) VALUES
(1, '<p>Ну просто шикардос, всем советую попробовать!</p>', 'Степан', '', 1, '2014-08-13 13:14:29', '2014-08-13 13:14:29'),
(2, '<p><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">orem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas consequat pretium felis sed mattis. Quisque id nibh gravida, posuere ante vitae, imperdiet erat. Aliquam ultricies id ipsum ac viverra. Suspendisse felis nisi, pharetra in suscipit quis, pulvinar suscipit dui. Proin sit amet luctus nibh. Ut nec pretium diam. Integer odio diam, tincidunt ac libero quis, dapibus molestie risus. Donec imperdiet metus quis sapien sollicitudin blandit. Quisque bibendum quis lorem in posuere. Sed tincidunt ullamcorper</span></p>', 'Vangog', '', 1, '2014-08-13 14:27:48', '2014-08-13 14:27:48'),
(3, '<p>Чумавая штука. прям как заново родился.</p>', 'Мартын', '', 1, '2014-08-13 15:17:00', '2014-08-13 15:47:57'),
(12, 'mi viverra lobortis in interdum enim. Morbi arcu augue, aliquam eget auctor laoreet, ornare sed felis. Morbi pulvinar porta imperdiet. Aliquam et varius metus. Aliquam semper auctor augue in fringilla. Vestibulum ante ipsum primis in faucibus orci luctus', 'Василий', '', 0, '2014-08-13 15:41:47', '2014-08-13 15:41:47'),
(13, '<p>test</p>', 'Миня', 'test@mail.ru', 1, '2014-08-14 11:29:56', '2014-08-14 11:29:56'),
(14, 'Шикарнооооооооооооооо!', 'Ракал', 'rakal@mail.ru', 0, '2014-08-14 11:37:01', '2014-08-14 11:37:01'),
(15, 'ewpfopwemfpowemopfmowemofmopmweopmfopmweopmfopm', 'Варфаламей', 'diyakan@gmail.com', 0, '2014-08-14 12:18:39', '2014-08-14 12:18:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
