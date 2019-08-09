-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 08 月 09 日 12:33
-- 伺服器版本： 10.1.40-MariaDB
-- PHP 版本： 7.3.5

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
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) UNSIGNED NOT NULL,
  `account` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `token` varchar(255) NOT NULL DEFAULT '' COMMENT '登入憑證',
  `createTime` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`aid`, `account`, `password`, `token`, `createTime`) VALUES
(2, '108001', '$2y$10$MK5M1oRKpaIoxkRg2zrMseiGo6teQ1dvObXFpnm6jXMy.Y/JyPyaO', 'cbrBl5iAEtV-8xew$sh3qtBvGUcrwrLpvj?/ggnUXAIpL:UUYO2', 1565107034),
(3, '108002', '$2y$10$6EXVtUuOZCtripWWEEq1QOmNIyMrr1whJTHwDt4YebNOKBpXHeKg2', 'mmtBCKyxgoqrEXGNw5WjeQoOD6EtXk+1eF$j*QN/lKl5Ov7vi$3', 1565173179);

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
  `token` varchar(150) NOT NULL DEFAULT '' COMMENT '登入憑證',
  `released` varchar(1) NOT NULL DEFAULT '1' COMMENT '1 開放 0封鎖'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `customer`
--

INSERT INTO `customer` (`cid`, `name`, `email`, `password`, `phone`, `address`, `regTime`, `token`, `released`) VALUES
(10, 'hogan', 'hogan@gmail.com', '$2y$10$ayq9CtqUvHJYwxFrY.8vXe8wX6dsxYLW7cRn7hugZt6kw7u9nRb7C', '0982710490', '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1564725246, 'dkbmq*W4pyQIw0i9uFoGgcT3nvVt:pzoU8n5h4zkQSPEG0itSS10', '1'),
(12, 'testempty', 'jack@yahoo.com', '$2y$10$MzIxjY8/mt5gyeE4rp9X/.6mDqn6viRc4pwKDyqUTqpCcxlbjN97m', '0982710491', '苗栗', 1565017966, 'SEjzQrQNUf88JLAXGmR+BX+u$GL5a5$4wVJhmflKA8CIoCvJ1a12', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `goods`
--

CREATE TABLE `goods` (
  `gid` int(10) UNSIGNED NOT NULL,
  `tnum` varchar(10) NOT NULL DEFAULT '' COMMENT '分類編號',
  `name` varchar(100) NOT NULL DEFAULT '',
  `price` mediumint(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '單價',
  `stock` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '庫存',
  `uses` varchar(255) NOT NULL DEFAULT '' COMMENT '商品介紹',
  `material` varchar(255) NOT NULL DEFAULT '' COMMENT '商品材質',
  `gimg` varchar(100) NOT NULL DEFAULT '' COMMENT '商品圖片路徑',
  `released` varchar(5) NOT NULL DEFAULT '1' COMMENT '1 上架 0 下架',
  `addTime` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `goods`
--

INSERT INTO `goods` (`gid`, `tnum`, `name`, `price`, `stock`, `uses`, `material`, `gimg`, `released`, `addTime`) VALUES
(6, '1', '超級水壺', 100, 49, '10公里, 10公里以下, 半程馬拉松, 定向越野, 拉力, 馬拉松', '100.0% 聚乙烯', 'public/homeimg/goodsimg/超級水壺.png', '1', 1565073991),
(7, '1', '超級鞋袋', 500, 50, '10公里, 10公里以下, 半程馬拉松, 馬拉松', '100.0% 聚酯纖維', 'public/homeimg/goodsimg/超級鞋袋.png', '1', 1565074089),
(8, '1', '超級指北針', 30, 64, '健行, 定向越野, 徒步登山, 拉力', '100.0% 鋁 內帳 : 100.0% 聚碳酸', 'public/homeimg/goodsimg/超級指北針.png', '1', 1565074144),
(9, '1', '超級手腕包', 250, 50, '10公里, 10公里以下, 中距離/ 障礙賽, 健走步行, 半程馬拉松, 短跑 / 接力, 越野, 跑步機運動, 鐵人三項, 鐵人兩項, 馬拉松', '腕部 : 81.0% 棉, 腕部 : 15.0% 聚醯胺, 腕部 : 4.0% 二烯類彈性纖維 口袋 : 100.0% 聚醯胺', 'public/homeimg/goodsimg/超級手腕包.png', '1', 1565074248),
(10, '2', '超級滑雪後背包', 200, 98, '單板滑雪, 滑雪', '滑降滑雪, 自由式單板滑雪, 自由式滑雪, 花式單板滑雪, 花式滑雪', 'public/homeimg/goodsimg/超級滑雪後背包.png', '1', 1565074548),
(11, '2', '超級滑雪護腕', 490, 300, '自由式單板滑雪, 花式單板滑雪', '100.0% 聚酯纖維', 'public/homeimg/goodsimg/超級滑雪護腕.png', '1', 1565074633),
(12, '2', '幼兒保暖滑雪褲襪', 249, 146, '滑降滑雪', '主要布料 : 45.0% 亞克力纖維, 主要布料 : 37.0% 棉, 主要布料 : 16.0% 聚醯纖維, 主要布料 : 2.0% 彈性纖維', 'public/homeimg/goodsimg/幼兒保暖滑雪褲襪.png', '1', 1565074726),
(13, '2', '超級皮製防水保暖滑雪手套', 1499, 279, '自由式單板滑雪, 自由式滑雪, 花式單板滑雪', '100.0% 棉羊皮 主要襯裡 : 100.0% 聚酯纖維 墊料 : 100.0% 聚酯纖維 腕部 : 90.0% 氯丁橡膠, 腕部 : 10.0% 聚醯胺', 'public/homeimg/goodsimg/超級皮製防水保暖滑雪手套.png', '1', 1565074862),
(14, '4', '超級拉鍊夾層瑜珈袋', 399, 4, '瑜珈', '100.0% 聚酯纖維', 'public/homeimg/goodsimg/超級拉鍊夾層瑜珈袋.png', '1', 1565074982),
(15, '4', '皮拉提斯平衡墊', 399, 46, '皮拉提斯', '100.0% 發泡EVA', 'public/homeimg/goodsimg/皮拉提斯平衡墊.png', '1', 1565075043),
(16, '4', '防滑基礎瑜珈墊', 199, 35, '瑜珈', '100.0% 發泡PVC', 'public/homeimg/goodsimg/防滑基礎瑜珈墊.png', '1', 1565075093),
(17, '4', '舒適瑜珈支撐墊', 149, 86, '瑜珈', '100.0% 發泡聚氨酯', 'public/homeimg/goodsimg/舒適瑜珈支撐墊.png', '1', 1565075183),
(18, '3', '成人拳擊護齒', 99, 500, '手球, 拳擊, 橄欖球, 武術, 籃球', '100.0% 聚丙烯纖維 本體 : 100.0% 醋酸乙烯酯共聚合物 手把 : 100.0% 聚丙烯纖維', 'public/homeimg/goodsimg/成人拳擊護齒.png', '1', 1565075297),
(19, '3', '台灣製立式沙包', 6999, 32, '全接觸踢拳道, 拳擊, 法式拳擊, 自衛術', '40.0% 鋼, 結構 : 30.0% 聚氨酯纖維 (PU), 結構 : 30.0% 聚乙烯 泡棉 : 100.0% 聚乙烯', 'public/homeimg/goodsimg/台灣製立式沙包.png', '1', 1565075344),
(20, '3', '可回彈速度拳擊球', 1249, 23, '全接觸踢拳道, 拳擊, 法式拳擊, 自衛術', '100.0% 聚氨酯纖維 (PU) 彈性帶 : 100.0% 橡膠 - 熱塑性橡膠（ TPR ） 扣環 : 100.0% 鋼 帶子 : 100.0% 聚酯纖維', 'public/homeimg/goodsimg/可回彈速度拳擊球.png', '1', 1565075376),
(21, '3', '抗衝擊拳擊頭盔', 649, 65, '全接觸踢拳道, 拳擊, 法式拳擊, 自衛術', '50.0% 聚氨酯纖維 (PU), 墊料 : 25.0% 聚乙烯, 墊料 : 25.0% 醋酸乙烯酯共聚合物 外蓋 : 100.0% 聚氨酯纖維 (PU) 內襯 : 100.0% 聚酯纖維', 'public/homeimg/goodsimg/抗衝擊拳擊頭盔.png', '1', 1565075425);

-- --------------------------------------------------------

--
-- 資料表結構 `gtype`
--

CREATE TABLE `gtype` (
  `tnum` tinyint(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分類編號',
  `name` varchar(10) NOT NULL DEFAULT '' COMMENT '分類名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `gtype`
--

INSERT INTO `gtype` (`tnum`, `name`) VALUES
(1, 'jog'),
(2, 'ski'),
(3, 'boxing'),
(4, 'yoga');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `onum` varchar(100) NOT NULL DEFAULT '' COMMENT '訂單編號',
  `cid` int(10) UNSIGNED DEFAULT NULL COMMENT '顧客id',
  `gid` int(10) UNSIGNED DEFAULT NULL COMMENT '商品id',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名稱',
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商品價格',
  `number` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商品數量',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '出貨地址',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '訂單狀態',
  `createTime` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`onum`, `cid`, `gid`, `name`, `price`, `number`, `address`, `status`, `createTime`) VALUES
('2019080612240510', 10, 6, '超級水壺', 100, 1, '台中西屯區', 1, 1565087045),
('2019080706264710', 10, 14, '超級拉鍊夾層瑜珈袋', 399, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565152007),
('2019080711010510', 10, 8, '超級指北針', 30, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565168465),
('2019080717010510', 10, 9, '超級手腕包', 250, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565168465),
('2019080717010510', 10, 16, '防滑基礎瑜珈墊', 199, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565168465),
('2019080711031910', 10, 10, '超級滑雪後背包', 200, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565168599),
('2019080711031910', 10, 21, '抗衝擊拳擊頭盔', 649, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565168599),
('2019080711235310', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565169833),
('2019080711242610', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565169866),
('2019080711275510', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565170075),
('2019080712122310', 10, 19, '台灣製立式沙包', 6999, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565172743),
('2019080712125410', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565172774),
('2019080712150410', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 3, 1565172904),
('2019080903531010', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565315590),
('2019080904172410', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565317044),
('2019080905204010', 10, 8, '超級指北針', 30, 5, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 2, 1565320840),
('2019080906165510', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565324215),
('2019080907503810', 10, 9, '超級手腕包', 250, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565329838),
('2019080907515910', 10, 7, '超級鞋袋', 500, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565329919),
('2019080907515910', 10, 9, '超級手腕包', 250, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565329919),
('2019080907523710', 10, 7, '超級鞋袋', 500, 2, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565329957),
('2019080907523710', 10, 9, '超級手腕包', 250, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 1, 1565329957),
('2019080908131210', 10, 9, '超級手腕包', 250, 1, '台中西屯區台中西屯區台中西屯區台中西屯區台中西屯區', 3, 1565331192);

-- --------------------------------------------------------

--
-- 資料表結構 `ostatus`
--

CREATE TABLE `ostatus` (
  `onum` tinyint(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '狀態編號',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '狀態名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `ostatus`
--

INSERT INTO `ostatus` (`onum`, `name`) VALUES
(1, '訂單成立'),
(2, '備貨中'),
(3, '已出貨');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

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
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `goods`
--
ALTER TABLE `goods`
  MODIFY `gid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 已傾印資料表的限制(constraint)
--

--
-- 資料表的限制(constraint) `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `goods` (`gid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
