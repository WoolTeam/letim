-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 15 2014 г., 12:27
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
-- Структура таблицы `client_tunel`
--

CREATE TABLE IF NOT EXISTS `client_tunel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tunel_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_tunel_to_tunel` (`tunel_id`),
  KEY `client_tunel_to_user` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Участники полёта' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `client_tunel`
--

INSERT INTO `client_tunel` (`id`, `tunel_id`, `client_id`) VALUES
(1, 1, 13),
(2, 2, 13),
(3, 2, 14);

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
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'main_menu');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `page_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_key` (`menu_id`),
  KEY `page_key` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`id`, `name`, `menu_id`, `page_id`) VALUES
(1, 'О трубе', 1, 5),
(2, 'Тарифы', 1, 6),
(3, 'Контакты', 1, 7),
(4, 'Вопрос ответ', 1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `teaser` varchar(255) DEFAULT NULL,
  `text` varchar(4000) DEFAULT NULL,
  `image` varchar(4000) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `teaser`, `text`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Первая новость', 'Тизер раз', '<p>текст статьи тут</p>', NULL, 1, '2014-08-10 16:19:00', '2014-08-10 18:04:36'),
(4, 'Новость 2', 'тизер2', '<p>ывапвапвап выаываываыва ыва</p>', 'a:7:{s:8:"fileName";s:18:"/2014/08/koala.jpg";s:12:"originalName";s:9:"Koala.jpg";s:8:"mimeType";s:10:"image/jpeg";s:4:"size";i:780831;s:4:"path";s:24:"/photo/2014/08/koala.jpg";s:5:"width";i:1024;s:6:"height";i:768;}', 1, '2014-08-10 18:37:00', '2014-08-10 17:48:32'),
(5, 'Тайтл', 'Аэродинамический тренажер (Аэротруба в Москве)', '<p>ываывалыд ываывдаы ывадыждваыжв ываываы ваыдваыдва ываыва д</p>', 'a:7:{s:8:"fileName";s:19:"/2014/08/desert.jpg";s:12:"originalName";s:10:"Desert.jpg";s:8:"mimeType";s:10:"image/jpeg";s:4:"size";i:845941;s:4:"path";s:25:"/photo/2014/08/desert.jpg";s:5:"width";i:1024;s:6:"height";i:768;}', 1, '2014-08-10 19:59:00', '2014-08-10 17:25:01');

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `text` text,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `home_page` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `url`, `text`, `active`, `created_at`, `updated_at`, `home_page`) VALUES
(4, 'Тайтл', 'home', '<p style="margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: ''Open Sans'', sans-serif; font-size: 15px;">!На третьем этаже Вы найдёте самое важное - вход в полётную зону! Ещё одна приятная новость: здесь же Вы совершенно бесплатно сможете увидеть, как тренируются наши профессиональные спортсмены. Рядом с полётной зоной расположены комнаты для подготовки спортсменов и команд.</p>\r\n<p style="margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: ''Open Sans'', sans-serif; font-size: 15px;">Теперь Вам не нужно искать в интернете - &laquo;куда пойти&raquo; и &laquo;как интересно провести время&raquo;, Вы уже обладаете этой ценной, для проведения досуга, информацией! Вы будете рассказывать друзьям</p>', 1, '2014-08-08 17:24:00', '2014-08-09 10:46:44', 1),
(5, 'О трубе', 'o_trube', '<p style="margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: ''Open Sans'', sans-serif; font-size: 15px;">На третьем этаже Вы найдёте самое важное - вход в полётную зону! Ещё одна приятная новость: здесь же Вы совершенно бесплатно сможете увидеть, как тренируются наши профессиональные спортсмены. Рядом с полётной зоной расположены комнаты для подготовки спортсменов и команд.</p>\r\n<p style="margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: ''Open Sans'', sans-serif; font-size: 15px;">Теперь Вам не нужно искать в интернете - &laquo;куда пойти&raquo; и &laquo;как интересно провести время&raquo;, Вы уже обладаете этой ценной, для проведения досуга, информацией! Вы будете рассказывать друзьям о том, о чём они даже не слышали! Вы будете первопроходцем там, где не нужны ни крылья, ни парашют. Вы сможете сделать то, что до Вас почти никто не делал! Спешим Вас обрадовать, что аэротруба работает с 9 утра до 2:00 ночи, а для спортсменов любое удобное время, когда Вам заблагорассудится! Кроме того, вам не помешает ни дождь, ни снег, ни тайфун. А значит, скоро все времена года станут любимые, потому что мы открыты для Вас всегда.</p>\r\n<p style="margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: ''Open Sans'', sans-serif; font-size: 15px;">Ждём Вас в аэрокомплексе FlyStation в любое время дня и ночи!Теперь Вам не нужно искать в интернете - &laquo;куда пойти&raquo; и &laquo;как интересно провести время&raquo;, Вы уже обладаете этой ценной, для проведения досуга, информацией! Вы будете рассказывать друзьям о том, о чём они даже не слышали! Вы будете первопроходцем там, где не нужны ни крылья, ни парашют. Вы сможете сделать то, что до Вас почти никто не делал! Спешим Вас обрадовать, что аэротруба работает с 9 утра до 2:00 ночи, а для спортсменов любое удобное время, когда Вам заблагорассудится! Кроме того, вам не</p>\r\n<p style="margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: ''Open Sans'', sans-serif; font-size: 15px;">На третьем этаже Вы найдёте самое важное - вход в полётную зону! Ещё одна приятная новость: здесь же Вы совершенно бесплатно сможете увидеть, как тренируются наши профессиональные спортсмены. Рядом с полётной зоной расположены комнаты для подготовки спортсменов и команд.</p>\r\n<p style="margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: ''Open Sans'', sans-serif; font-size: 15px;">Теперь Вам не нужно искать в интернете - &laquo;куда пойти&raquo; и &laquo;как интересно провести время&raquo;, Вы уже обладаете этой ценной, для проведения досуга, информацией! Вы будете рассказывать друзьям о том, о чём они даже не слышали! Вы будете первопроходцем там, где не нужны ни крылья, ни парашют. Вы сможете сделать то, что до Вас почти никто не делал! Спешим Вас обрадовать, что аэротруба работает с 9 утра до 2:00 ночи, а для спортсменов любое удобное время, когда Вам заблагорассудится! Кроме того, вам не помешает ни дождь, ни снег, ни тайфун. А значит, скоро все времена года станут любимые, потому что мы открыты для Вас всегда.</p>', 1, '2014-08-09 13:06:00', '2014-08-09 11:00:22', 0),
(6, 'Тайтл3', 'uwer', '<p>sdfsdfsdfsdfsdfsdffgh</p>', 1, '2014-08-09 13:44:00', '2014-08-10 09:15:57', 0),
(7, 'Nfsdfs', 'sdfsdfs', '<p>sdfsdfsdf</p>', 1, '2014-08-09 14:24:00', '2014-08-10 09:15:58', 0),
(8, 'Вопрос Ответ', 'question', '<p>fghfghfgh</p>\r\n<p>{{1}}</p>', 1, '2014-08-09 14:26:00', '2014-08-10 11:41:04', 0),
(9, 'Новости', 'news', '<p>Добро пожаловать на страницу новостей</p>', 1, '2014-08-10 20:17:00', '2014-08-10 16:18:03', 0);

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
-- Структура таблицы `page_news`
--

CREATE TABLE IF NOT EXISTS `page_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `page` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_page` (`page`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `page_news`
--

INSERT INTO `page_news` (`id`, `page`) VALUES
(1, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `photo` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `title`, `date`, `photo`) VALUES
(2, 'Фоточка в колготочках', '2009-01-01 00:00:00', 'a:7:{s:8:"fileName";s:95:"/2009/01/11-druzey-oushena-hdrip-scarabey.org-.avi-snapshot-00.38.26-2013.02.12-00.33.07-_1.jpg";s:12:"originalName";s:86:"11_druzey_Oushena_HDRip_[scarabey.org].avi_snapshot_00.38.26_[2013.02.12_00.33.07].jpg";s:8:"mimeType";s:10:"image/jpeg";s:4:"size";i:26706;s:4:"path";s:101:"/photo/2009/01/11-druzey-oushena-hdrip-scarabey.org-.avi-snapshot-00.38.26-2013.02.12-00.33.07-_1.jpg";s:5:"width";i:720;s:6:"height";i:304;}'),
(3, 'Тюльпаны', '2009-01-01 00:00:00', 'a:7:{s:8:"fileName";s:19:"/2009/01/tulips.jpg";s:12:"originalName";s:10:"Tulips.jpg";s:8:"mimeType";s:10:"image/jpeg";s:4:"size";i:620888;s:4:"path";s:25:"/photo/2009/01/tulips.jpg";s:5:"width";i:1024;s:6:"height";i:768;}');

-- --------------------------------------------------------

--
-- Структура таблицы `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` smallint(5) unsigned NOT NULL,
  `cost` int(10) unsigned NOT NULL,
  `max_people` smallint(6) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_to_plan_type` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Тарифные планы' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `plan`
--

INSERT INTO `plan` (`id`, `type_id`, `name`, `duration`, `cost`, `max_people`, `created_at`, `updated_at`) VALUES
(1, 1, '5 минут', 5, 1000, 3, '2014-08-12 00:00:00', '2014-08-12 00:00:00'),
(2, 2, '10 минут', 10, 12000, 5, '2014-08-15 12:26:58', '2014-08-15 12:26:58');

-- --------------------------------------------------------

--
-- Структура таблицы `plan_type`
--

CREATE TABLE IF NOT EXISTS `plan_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Типы тарифных планов' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `plan_type`
--

INSERT INTO `plan_type` (`id`, `name`) VALUES
(2, 'Корпоротивный'),
(1, 'Обычный');

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

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'ROLE_ADMIN'),
(2, 'ROLE_USER');

-- --------------------------------------------------------

--
-- Структура таблицы `tunel`
--

CREATE TABLE IF NOT EXISTS `tunel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` int(10) unsigned NOT NULL,
  `active` tinyint(3) unsigned NOT NULL,
  `started_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tunel_to_plan` (`plan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Полёты' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tunel`
--

INSERT INTO `tunel` (`id`, `plan_id`, `active`, `started_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2014-08-12 12:00:00', '2014-08-12 00:00:00', '2014-08-12 00:00:00'),
(2, 1, 1, '2014-08-13 14:00:00', '2014-08-12 00:00:00', '2014-08-12 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL DEFAULT '',
  `pass` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `userRoles` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Roles` (`userRoles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `pass`, `salt`, `userRoles`) VALUES
(13, 'zabuto', 'zabutok@mail.ru', 'An+Tas5lVQsDmHF/1o12F5HhqkHAo+LzkWmn5ITM1cSC8y6xG8panL/JtGH2yXfv3lOvotApn+LNBhYFeR0PZg==', '4f782cb1eb2dccc5c17a3058653fc552', 1),
(14, 'zabutok', 'zabutok@mail.ru', '1jHyg4nEYGS+lcG76XHQozNNigZQtX/aJThck+BXPxh0CJ4lyeeF8NrANwEFOYmdd/FZal+b6dgGOyQnt+JILg==', 'd0744b89839df5202913ed78cc5d2900', 2);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_key` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `page_key` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `page_faq`
--
ALTER TABLE `page_faq`
  ADD CONSTRAINT `page_faq_ibfk_1` FOREIGN KEY (`page`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `page_news`
--
ALTER TABLE `page_news`
  ADD CONSTRAINT `news_page` FOREIGN KEY (`page`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `plan_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Roles` FOREIGN KEY (`userRoles`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
