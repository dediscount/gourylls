-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-01-06 15:21:30
-- 服务器版本： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- 表的结构 `advice`
--

CREATE TABLE IF NOT EXISTS `advice` (
`ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `advice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `food`
--

CREATE TABLE IF NOT EXISTS `food` (
`ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `recipe_availability` tinyint(1) NOT NULL,
  `recipe_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `picID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `likes`
--

INSERT INTO `likes` (`picID`, `userID`) VALUES
(1011, 249340);

--
-- 触发器 `likes`
--
DELIMITER //
CREATE TRIGGER `autoDecreaseLike` AFTER DELETE ON `likes`
 FOR EACH ROW update pictures set pictures.favor=pictures.favor-1 where pictures.ID=old.picID
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `autoIncreaseLike` AFTER INSERT ON `likes`
 FOR EACH ROW update pictures set pictures.favor=pictures.favor+1 where pictures.ID=new.picID
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
`ID` int(11) NOT NULL,
  `pic_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `format` varchar(20) NOT NULL,
  `size` float NOT NULL,
  `uploadingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `pictures`
--

INSERT INTO `pictures` (`ID`, `pic_path`, `title`, `description`, `format`, `size`, `uploadingDate`, `userID`, `likes`) VALUES
(1011, 'www.jiji.com', 'myDick', 'huge', '.jpg', 24, '2015-01-06 10:43:16', 249340, 1);

--
-- 触发器 `pictures`
--
DELIMITER //
CREATE TRIGGER `addPicture` AFTER INSERT ON `pictures`
 FOR EACH ROW update user set user.numOfPhotos=user.numOfPhotos+1 where user.ID=new.userID
//
DELIMITER ;
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
`ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT 'password',
  `numOfPhotos` int(11) NOT NULL DEFAULT '0',
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=249341 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `name`, `account`, `password`, `numOfPhotos`, `register_date`, `icon_path`) VALUES
(249340, 'wei', '350122', '111111', 24, '2015-01-06 10:42:40', 'sdsdsds');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advice`
--
ALTER TABLE `advice`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`picID`,`userID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`,`pic_path`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`,`name`,`account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advice`
--
ALTER TABLE `advice`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1012;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=249341;
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
