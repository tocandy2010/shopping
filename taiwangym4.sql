-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 08 月 05 日 19:06
-- 伺服器版本: 10.1.35-MariaDB
-- PHP 版本： 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `taiwangym`
--
CREATE DATABASE IF NOT EXISTS `taiwangym` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taiwangym`;

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `cid` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(10) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `regTime` int(11) NOT NULL DEFAULT '0',
  `token` varchar(150) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`cid`, `name`, `email`, `password`, `phone`, `address`, `regTime`, `token`) VALUES
(10, 'hogan', 'hogan@gmail.com', '$2y$10$ayq9CtqUvHJYwxFrY.8vXe8wX6dsxYLW7cRn7hugZt6kw7u9nRb7C', '0982710490', '台中西屯區', 1564725246, 'qBsCrQ41094XvAYPuHsqqRPy3:oF6Kcqrwl4Tvv0DQLr6v2Lyh10'),
(11, '1234', 'apostle.jiaxiang@gmail.com', '$2y$10$.1arMml3s7KgVSVOowwLXeTDGcx7WbosYbQ/Dg1XmsDiyVyX0JyE2', '0976184622', '　　', 1564998765, 'dGjW1l*w1C00biu8AT22oNFeY?IwJTUdS-DwLVQ:h+:6C1gGls11'),
(12, 'testempty', 'jack@yahoo.com', '$2y$10$MzIxjY8/mt5gyeE4rp9X/.6mDqn6viRc4pwKDyqUTqpCcxlbjN97m', '0982710491', '苗栗', 1565017966, 'SEjzQrQNUf88JLAXGmR+BX+u$GL5a5$4wVJhmflKA8CIoCvJ1a12');

-- --------------------------------------------------------

--
-- 資料表結構 `goods`
--

CREATE TABLE `goods` (
  `gid` int(10) UNSIGNED NOT NULL,
  `gnum` smallint(6) UNSIGNED ZEROFILL NOT NULL DEFAULT '000000',
  `name` varchar(100) NOT NULL DEFAULT '',
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `stock` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `uses` varchar(100) NOT NULL DEFAULT '',
  `material` varchar(100) NOT NULL DEFAULT '',
  `gimg` varchar(100) NOT NULL DEFAULT '',
  `addTime` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `goods`
--

INSERT INTO `goods` (`gid`, `gnum`, `name`, `price`, `stock`, `uses`, `material`, `gimg`, `addTime`) VALUES
(1, 000001, 'test', 123, 5, '', '', '', 999),
(2, 000002, 'test2', 456, 20, '', '', '', 999);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `onum` varchar(100) NOT NULL DEFAULT '',
  `cid` int(10) UNSIGNED DEFAULT NULL,
  `gid` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `number` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL DEFAULT '',
  `createTime` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orders`
--

INSERT INTO `orders` (`onum`, `cid`, `gid`, `name`, `price`, `number`, `address`, `createTime`) VALUES
('2019080510292610', 10, 1, 'test', 123, 9, '', 1564993766),
('2019080510350210', 10, 1, 'test', 123, 9, '', 1564994102),
('2019080511045410', 10, 1, 'test', 123, 9, '', 1564995894),
('2019080511200510', 10, 1, 'test', 123, 9, '', 1564996805),
('2019080511222810', 10, 1, 'test', 123, 9, '台中西屯區', 1564996948),
('2019080512124311', 11, 1, 'test', 123, 1, '　　', 1564999963),
('2019080512221511', 11, 1, 'test', 123, 10, '　　', 1565000535),
('2019080512290311', 11, 1, 'test', 123, 10, '　　', 1565000943),
('2019080512353611', 11, 1, 'test', 123, 1, '　　', 1565001336),
('2019080512365611', 11, 1, 'test', 123, 1, '　　', 1565001416);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- 資料表索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`gid`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD KEY `gid` (`gid`),
  ADD KEY `cid` (`cid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `gid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `goods` (`gid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
