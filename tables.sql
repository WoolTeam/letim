-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 13 2014 г., 17:27
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
-- Структура таблицы `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `active`, `created_at`, `updated_at`) VALUES
(1, '<p>Есть ли жизнь на марсе?</p>', '<p>Еще какая, пол лица за раз голануть может.</p>', 1, '2009-01-01 00:00:00', '2014-08-13 11:18:54'),
(2, '<p>По чем нынче килограм меди то?</p>', '<p>230 как с куста!</p>', 1, '2009-01-01 00:00:00', '2009-01-01 00:00:00'),
(3, '<p>Проффесор, а не долбанет?</p>', '<p>Да вы что батенька, все будет в лучшем виде!</p>', 1, '2014-08-13 11:27:00', '2014-08-13 11:28:40');

-- --------------------------------------------------------

--
-- Структура таблицы `page_faq`
--

CREATE TABLE IF NOT EXISTS `page_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page` (`page`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `page_faq`
--

INSERT INTO `page_faq` (`id`, `page`) VALUES
(2, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `text`, `author`, `active`, `created_at`, `updated_at`) VALUES
(1, '<p>Ну просто шикардос, всем советую попробовать!</p>', 'Степан', 1, '2014-08-13 13:14:29', '2014-08-13 13:14:29'),
(2, '<p><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">orem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas consequat pretium felis sed mattis. Quisque id nibh gravida, posuere ante vitae, imperdiet erat. Aliquam ultricies id ipsum ac viverra. Suspendisse felis nisi, pharetra in suscipit quis, pulvinar suscipit dui. Proin sit amet luctus nibh. Ut nec pretium diam. Integer odio diam, tincidunt ac libero quis, dapibus molestie risus. Donec imperdiet metus quis sapien sollicitudin blandit. Quisque bibendum quis lorem in posuere. Sed tincidunt ullamcorper</span></p>', 'Vangog', 1, '2014-08-13 14:27:48', '2014-08-13 14:27:48'),
(3, '<p>Чумавая штука. прям как заново родился.</p>', 'Мартын', 1, '2014-08-13 15:17:00', '2014-08-13 15:47:57'),
(12, 'mi viverra lobortis in interdum enim. Morbi arcu augue, aliquam eget auctor laoreet, ornare sed felis. Morbi pulvinar porta imperdiet. Aliquam et varius metus. Aliquam semper auctor augue in fringilla. Vestibulum ante ipsum primis in faucibus orci luctus', 'Василий', 0, '2014-08-13 15:41:47', '2014-08-13 15:41:47');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `page_faq`
--
ALTER TABLE `page_faq`
  ADD CONSTRAINT `page_faq_ibfk_1` FOREIGN KEY (`page`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
