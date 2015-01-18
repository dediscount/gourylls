-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-01-18 15:09:04
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gourylls`
--

-- --------------------------------------------------------

--
-- 表的结构 `advice`
--

CREATE TABLE IF NOT EXISTS `advice` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `advice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `recipe_availability` tinyint(1) NOT NULL,
  `recipe_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `food`
--

INSERT INTO `food` (`ID`, `class`, `name`, `recipe_availability`, `recipe_link`) VALUES
(1, 'lunch', '土豆鸡', 1, 'http://www.xiachufang.com/recipe/100420936/'),
(2, 'lunch', '黄焖鸡翅', 1, 'http://www.xiachufang.com/recipe/100383061/'),
(3, 'lunch', '麻婆豆腐', 1, 'http://www.xiachufang.com/recipe/100411978/'),
(4, 'lunch', '炸鸡翅', 1, 'http://www.xiachufang.com/recipe/100422009/'),
(5, 'lunch', '糖醋排骨', 1, 'http://www.xiachufang.com/recipe/100421411/'),
(6, 'lunch', '木须肉', 1, 'http://www.xiachufang.com/recipe/100423237/'),
(7, 'lunch', '西红柿烧茄子', 1, 'http://www.xiachufang.com/recipe/100421444/'),
(8, 'lunch', '芹菜炒鸡蛋', 1, 'http://www.xiachufang.com/recipe/100421733/'),
(9, 'lunch', '西红柿土豆炖牛肉', 1, 'http://www.xiachufang.com/recipe/100420871/'),
(10, 'lunch', '口水鸡', 1, 'http://www.xiachufang.com/recipe/100419331/'),
(11, 'dinner', '蒜蓉油淋生菜', 1, 'http://www.xiachufang.com/recipe/100400943/'),
(12, 'dinner', '糖醋里脊', 1, 'http://www.xiachufang.com/recipe/100420851/'),
(13, 'dinner', '鱼香肉丝', 1, 'http://www.xiachufang.com/recipe/100421003/'),
(14, 'dinner', '干锅手撕包菜', 1, 'http://www.xiachufang.com/recipe/100387998/'),
(15, 'dinner', '双椒煎排骨', 1, 'http://www.xiachufang.com/recipe/100402113/'),
(16, 'dinner', '萝卜炒牛肉', 1, 'http://www.xiachufang.com/recipe/100412715/'),
(17, 'dinner', '红三剁', 1, 'http://www.xiachufang.com/recipe/1044075/'),
(18, 'dinner', '红油笋丝', 1, 'http://www.xiachufang.com/recipe/255251/'),
(19, 'dinner', '水煮肉片', 1, 'http://www.xiachufang.com/recipe/100347110/'),
(20, 'dinner', '黑椒杏鲍菇牛肉粒', 1, 'http://www.xiachufang.com/recipe/100099820/'),
(21, 'breakfast', '草莓法式吐司', 1, 'http://www.xiachufang.com/recipe/100429407/'),
(22, 'breakfast', '微波懒人早餐', 1, 'http://www.xiachufang.com/recipe/100423759/'),
(23, 'breakfast', '早餐鸡蛋卷', 1, 'http://www.xiachufang.com/recipe/100416544/'),
(24, 'breakfast', '火腿卷', 1, 'http://www.xiachufang.com/recipe/100169989/'),
(25, 'breakfast', '心形香肠荷包蛋', 1, 'http://www.xiachufang.com/recipe/100378155/'),
(26, 'breakfast', '葡萄干牛奶炖蛋', 1, 'http://www.xiachufang.com/recipe/100415394/'),
(27, 'breakfast', '玉米饼', 1, 'http://www.xiachufang.com/recipe/100409488/'),
(28, 'breakfast', '鸡蛋羹', 1, 'http://www.xiachufang.com/recipe/100409481/'),
(29, 'breakfast', '香蕉松饼', 1, 'http://www.xiachufang.com/recipe/100108816/'),
(30, 'breakfast', '鸡蛋卷饼', 1, 'http://www.xiachufang.com/recipe/100432192/'),
(31, 'dessert', '鸡蛋布丁', 1, 'http://www.xiachufang.com/recipe/100386143/'),
(32, 'dessert', '法式焦糖布丁', 1, 'http://www.xiachufang.com/recipe/100414329/'),
(33, 'dessert', '草莓雪媚娘', 1, 'http://www.xiachufang.com/recipe/1014146/'),
(34, 'dessert', '抹茶椰汁糕', 1, 'http://www.xiachufang.com/recipe/1077219/'),
(35, 'dessert', '双皮奶', 1, 'http://www.xiachufang.com/recipe/100410533/'),
(36, 'dessert', '奶香南瓜派', 1, 'http://www.xiachufang.com/recipe/100029406/'),
(37, 'dessert', '熊掌汤圆', 1, 'http://www.xiachufang.com/recipe/100045857/'),
(38, 'dessert', '可丽饼', 1, 'http://www.xiachufang.com/recipe/1096239/'),
(39, 'dessert', '补肾八宝粥', 1, 'http://www.xiachufang.com/recipe/100119494/'),
(40, 'dessert', '炸牛奶', 1, 'http://www.xiachufang.com/recipe/100040797/');

-- --------------------------------------------------------

--
-- 表的结构 `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `picID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`picID`,`userID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 触发器 `likes`
--
DROP TRIGGER IF EXISTS `autoIncreaseLike`;
DELIMITER //
CREATE TRIGGER `autoIncreaseLike` AFTER INSERT ON `likes`
 FOR EACH ROW update pictures set pictures.likes=pictures.likes+1 where pictures.ID=new.picID
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pic_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `format` varchar(20) NOT NULL,
  `size` float NOT NULL,
  `uploadingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`,`pic_path`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `pictures`
--

INSERT INTO `pictures` (`ID`, `pic_path`, `title`, `description`, `format`, `size`, `uploadingDate`, `userID`, `likes`) VALUES
(3, '/gourylls/public/uploads/249344/pictures/1421314501Deutsch1.jpg', 'c', 'd', 'jpg', 422, '2015-01-15 09:35:01', 249344, 0);

--
-- 触发器 `pictures`
--
DROP TRIGGER IF EXISTS `addPicture`;
DELIMITER //
CREATE TRIGGER `addPicture` AFTER INSERT ON `pictures`
 FOR EACH ROW update user set user.numOfPhotos=user.numOfPhotos+1 where user.ID=new.userID
//
DELIMITER ;
DROP TRIGGER IF EXISTS `deletePicture`;
DELIMITER //
CREATE TRIGGER `deletePicture` BEFORE DELETE ON `pictures`
 FOR EACH ROW begin
delete from likes where likes.picID=old.ID;
update user set user.numOfPhotos=user.numOfPhotos-1 where user.ID=old.userID;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT 'password',
  `numOfPhotos` int(11) NOT NULL DEFAULT '0',
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`,`name`,`account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=249345 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `name`, `account`, `password`, `numOfPhotos`, `register_date`, `icon_path`) VALUES
(249343, 'YifeiShen', 'shen@yifei.com', 'qwerqwer', 0, '2015-01-14 20:50:46', NULL),
(249344, 'shenyifei', 'shenyifei@xxx.com', 'qwerqwer', 1, '2015-01-15 09:23:19', NULL);

--
-- 限制导出的表
--

--
-- 限制表 `advice`
--
ALTER TABLE `advice`
  ADD CONSTRAINT `advice_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- 限制表 `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`picID`) REFERENCES `pictures` (`ID`);

--
-- 限制表 `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
