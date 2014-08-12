/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : letim

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-08-11 09:57:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'main_menu');

-- ----------------------------
-- Table structure for `menu_item`
-- ----------------------------
DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE `menu_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `page_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_key` (`menu_id`),
  KEY `page_key` (`page_id`),
  CONSTRAINT `menu_key` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `page_key` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu_item
-- ----------------------------
INSERT INTO `menu_item` VALUES ('1', 'О трубе', '1', '5');
INSERT INTO `menu_item` VALUES ('2', 'Тарифы', '1', '6');
INSERT INTO `menu_item` VALUES ('3', 'Контакты', '1', '7');
INSERT INTO `menu_item` VALUES ('4', 'Вопрос ответ', '1', '8');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `teaser` varchar(255) DEFAULT NULL,
  `text` varchar(4000) DEFAULT NULL,
  `image` varchar(4000) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'Первая новость', 'Тизер раз', '<p>текст статьи тут</p>', null, '1', '2014-08-10 16:19:00', '2014-08-10 22:04:36');
INSERT INTO `news` VALUES ('4', 'Новость 2', 'тизер2', '<p>ывапвапвап выаываываыва ыва</p>', 'a:7:{s:8:\"fileName\";s:18:\"/2014/08/koala.jpg\";s:12:\"originalName\";s:9:\"Koala.jpg\";s:8:\"mimeType\";s:10:\"image/jpeg\";s:4:\"size\";i:780831;s:4:\"path\";s:24:\"/photo/2014/08/koala.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}', '1', '2014-08-10 18:37:00', '2014-08-10 21:48:32');
INSERT INTO `news` VALUES ('5', 'Тайтл', 'Аэродинамический тренажер (Аэротруба в Москве)', '<p>ываывалыд ываывдаы ывадыждваыжв ываываы ваыдваыдва ываыва д</p>', 'a:7:{s:8:\"fileName\";s:19:\"/2014/08/desert.jpg\";s:12:\"originalName\";s:10:\"Desert.jpg\";s:8:\"mimeType\";s:10:\"image/jpeg\";s:4:\"size\";i:845941;s:4:\"path\";s:25:\"/photo/2014/08/desert.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}', '1', '2014-08-10 19:59:00', '2014-08-10 21:25:01');

-- ----------------------------
-- Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `text` text,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `home_page` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('4', 'Тайтл', 'home', '<p style=\"margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: \'Open Sans\', sans-serif; font-size: 15px;\">!На третьем этаже Вы найдёте самое важное - вход в полётную зону! Ещё одна приятная новость: здесь же Вы совершенно бесплатно сможете увидеть, как тренируются наши профессиональные спортсмены. Рядом с полётной зоной расположены комнаты для подготовки спортсменов и команд.</p>\r\n<p style=\"margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: \'Open Sans\', sans-serif; font-size: 15px;\">Теперь Вам не нужно искать в интернете - &laquo;куда пойти&raquo; и &laquo;как интересно провести время&raquo;, Вы уже обладаете этой ценной, для проведения досуга, информацией! Вы будете рассказывать друзьям</p>', '1', '2014-08-08 17:24:00', '2014-08-09 14:46:44', '1');
INSERT INTO `page` VALUES ('5', 'О трубе', 'o_trube', '<p style=\"margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: \'Open Sans\', sans-serif; font-size: 15px;\">На третьем этаже Вы найдёте самое важное - вход в полётную зону! Ещё одна приятная новость: здесь же Вы совершенно бесплатно сможете увидеть, как тренируются наши профессиональные спортсмены. Рядом с полётной зоной расположены комнаты для подготовки спортсменов и команд.</p>\r\n<p style=\"margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: \'Open Sans\', sans-serif; font-size: 15px;\">Теперь Вам не нужно искать в интернете - &laquo;куда пойти&raquo; и &laquo;как интересно провести время&raquo;, Вы уже обладаете этой ценной, для проведения досуга, информацией! Вы будете рассказывать друзьям о том, о чём они даже не слышали! Вы будете первопроходцем там, где не нужны ни крылья, ни парашют. Вы сможете сделать то, что до Вас почти никто не делал! Спешим Вас обрадовать, что аэротруба работает с 9 утра до 2:00 ночи, а для спортсменов любое удобное время, когда Вам заблагорассудится! Кроме того, вам не помешает ни дождь, ни снег, ни тайфун. А значит, скоро все времена года станут любимые, потому что мы открыты для Вас всегда.</p>\r\n<p style=\"margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: \'Open Sans\', sans-serif; font-size: 15px;\">Ждём Вас в аэрокомплексе FlyStation в любое время дня и ночи!Теперь Вам не нужно искать в интернете - &laquo;куда пойти&raquo; и &laquo;как интересно провести время&raquo;, Вы уже обладаете этой ценной, для проведения досуга, информацией! Вы будете рассказывать друзьям о том, о чём они даже не слышали! Вы будете первопроходцем там, где не нужны ни крылья, ни парашют. Вы сможете сделать то, что до Вас почти никто не делал! Спешим Вас обрадовать, что аэротруба работает с 9 утра до 2:00 ночи, а для спортсменов любое удобное время, когда Вам заблагорассудится! Кроме того, вам не</p>\r\n<p style=\"margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: \'Open Sans\', sans-serif; font-size: 15px;\">На третьем этаже Вы найдёте самое важное - вход в полётную зону! Ещё одна приятная новость: здесь же Вы совершенно бесплатно сможете увидеть, как тренируются наши профессиональные спортсмены. Рядом с полётной зоной расположены комнаты для подготовки спортсменов и команд.</p>\r\n<p style=\"margin: 0px; padding: 0px 0px 14px; color: #5c6b7b; font-family: \'Open Sans\', sans-serif; font-size: 15px;\">Теперь Вам не нужно искать в интернете - &laquo;куда пойти&raquo; и &laquo;как интересно провести время&raquo;, Вы уже обладаете этой ценной, для проведения досуга, информацией! Вы будете рассказывать друзьям о том, о чём они даже не слышали! Вы будете первопроходцем там, где не нужны ни крылья, ни парашют. Вы сможете сделать то, что до Вас почти никто не делал! Спешим Вас обрадовать, что аэротруба работает с 9 утра до 2:00 ночи, а для спортсменов любое удобное время, когда Вам заблагорассудится! Кроме того, вам не помешает ни дождь, ни снег, ни тайфун. А значит, скоро все времена года станут любимые, потому что мы открыты для Вас всегда.</p>', '1', '2014-08-09 13:06:00', '2014-08-09 15:00:22', '0');
INSERT INTO `page` VALUES ('6', 'Тайтл3', 'uwer', '<p>sdfsdfsdfsdfsdfsdffgh</p>', '1', '2014-08-09 13:44:00', '2014-08-10 13:15:57', '0');
INSERT INTO `page` VALUES ('7', 'Nfsdfs', 'sdfsdfs', '<p>sdfsdfsdf</p>', '1', '2014-08-09 14:24:00', '2014-08-10 13:15:58', '0');
INSERT INTO `page` VALUES ('8', 'Вопрос Ответ', 'question', '<p>fghfghfgh</p>\r\n<p>{{1}}</p>', '1', '2014-08-09 14:26:00', '2014-08-10 15:41:04', '0');
INSERT INTO `page` VALUES ('9', 'Новости', 'news', '<p>Добро пожаловать на страницу новостей</p>', '1', '2014-08-10 20:17:00', '2014-08-10 20:18:03', '0');

-- ----------------------------
-- Table structure for `page_news`
-- ----------------------------
DROP TABLE IF EXISTS `page_news`;
CREATE TABLE `page_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `page` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_page` (`page`),
  CONSTRAINT `news_page` FOREIGN KEY (`page`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page_news
-- ----------------------------
INSERT INTO `page_news` VALUES ('1', '9');

-- ----------------------------
-- Table structure for `photo`
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `photo` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES ('2', 'Фоточка в колготочках', '2009-01-01 00:00:00', 'a:7:{s:8:\"fileName\";s:95:\"/2009/01/11-druzey-oushena-hdrip-scarabey.org-.avi-snapshot-00.38.26-2013.02.12-00.33.07-_1.jpg\";s:12:\"originalName\";s:86:\"11_druzey_Oushena_HDRip_[scarabey.org].avi_snapshot_00.38.26_[2013.02.12_00.33.07].jpg\";s:8:\"mimeType\";s:10:\"image/jpeg\";s:4:\"size\";i:26706;s:4:\"path\";s:101:\"/photo/2009/01/11-druzey-oushena-hdrip-scarabey.org-.avi-snapshot-00.38.26-2013.02.12-00.33.07-_1.jpg\";s:5:\"width\";i:720;s:6:\"height\";i:304;}');
INSERT INTO `photo` VALUES ('3', 'Тюльпаны', '2009-01-01 00:00:00', 'a:7:{s:8:\"fileName\";s:19:\"/2009/01/tulips.jpg\";s:12:\"originalName\";s:10:\"Tulips.jpg\";s:8:\"mimeType\";s:10:\"image/jpeg\";s:4:\"size\";i:620888;s:4:\"path\";s:25:\"/photo/2009/01/tulips.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'ROLE_ADMIN');
INSERT INTO `roles` VALUES ('2', 'ROLE_USER');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL DEFAULT '',
  `pass` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `userRoles` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Roles` (`userRoles`),
  CONSTRAINT `Roles` FOREIGN KEY (`userRoles`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('13', 'zabuto', 'zabutok@mail.ru', 'An+Tas5lVQsDmHF/1o12F5HhqkHAo+LzkWmn5ITM1cSC8y6xG8panL/JtGH2yXfv3lOvotApn+LNBhYFeR0PZg==', '4f782cb1eb2dccc5c17a3058653fc552', '1');
INSERT INTO `user` VALUES ('14', 'zabutok', 'zabutok@mail.ru', '1jHyg4nEYGS+lcG76XHQozNNigZQtX/aJThck+BXPxh0CJ4lyeeF8NrANwEFOYmdd/FZal+b6dgGOyQnt+JILg==', 'd0744b89839df5202913ed78cc5d2900', '2');
