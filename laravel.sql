-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 �?12 �?20 �?15:40
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- 表的结构 `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cvalue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `configs_cname_unique` (`cname`),
  UNIQUE KEY `configs_cvalue_unique` (`cvalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ftime` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `favorites_pid_unique` (`pid`),
  UNIQUE KEY `favorites_fid_unique` (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `favorites`
--

INSERT INTO `favorites` (`id`, `pid`, `fid`, `ftime`, `created_at`, `updated_at`, `uid`) VALUES
(53, '2', '2145061413518791', '1450614135', '2015-12-20 04:22:15', '2015-12-20 04:22:15', 1);

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_11_20_144823_create_products_table', 1),
('2015_11_20_145026_create_favorites_table', 1),
('2015_11_20_145110_create_userinfos_table', 1),
('2015_11_20_152258_create_pasts_table', 1),
('2015_12_20_115301_create_configs_table', 2);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `pasts`
--

CREATE TABLE IF NOT EXISTS `pasts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `pname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `payway` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pastid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `state` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasts_pid_unique` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `pasts`
--

INSERT INTO `pasts` (`id`, `pid`, `type`, `pname`, `price`, `image`, `payway`, `created_at`, `updated_at`, `pastid`, `uid`, `state`) VALUES
(25, '2', '1', '白首', '23', '/images/product/2.png', '面议', '2015-12-20 04:22:20', '2015-12-20 04:22:20', '21450614140', 1, ''),
(26, '4', '4', '炫耀什么', '546', '/images/product/4.png', '面议', '2015-12-20 04:27:58', '2015-12-20 04:27:58', '41450614478', 1, ''),
(27, '5', '4', '时间', '234', '/images/product/5.png', '面议', '2015-12-20 04:58:51', '2015-12-20 04:58:51', '51450616331', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `payway` text COLLATE utf8_unicode_ci NOT NULL,
  `deadline` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `pid`, `name`, `type`, `description`, `price`, `images`, `payway`, `deadline`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', '彩排1', '1', '人生没有彩排，每一天都是现场直播。', 221, '/images/product/1.png', '在学校门口203站台', '1442455625', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2', '白首', '1', '择一城终老，遇一人白首。', 23, '/images/product/2.png', '面议', '1442455689', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '3', '方向1', '2', '人生如果错了方向，停止就是进步。', 43, '/images/product/3.png', '面议', '1443455625', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4', '炫耀什么', '4', '一个人炫耀什么，说明内心缺少什么。', 546, '/images/product/4.png', '面议', '1442453625', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '5', '时间', '4', '时间就像一张网，你撒在哪里，你的收获就在哪里。', 234, '/images/product/5.png', '面议', '1442453465', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '6', '梦想', '4', '人的一生要疯狂一次，无论是为一个人，一段情，一段旅途，或一个梦想。', 54, '/images/product/6.png', '面议', '1412455625', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '7', '饮料', '1', '同样的一瓶饮料，便利店里2块钱，五星饭店里60块，很多的时候，一个人的价值取决于所在的位置。', 34, '/images/product/7.png', '在学校门口', '1442452625', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `userinfos`
--

CREATE TABLE IF NOT EXISTS `userinfos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qq` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `qcode` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userinfos_uid_unique` (`uid`),
  UNIQUE KEY `userinfos_phone_unique` (`phone`),
  UNIQUE KEY `userinfos_email_unique` (`email`),
  UNIQUE KEY `userinfos_qq_unique` (`qq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '风流三月1', '1607974129@qq.com', '$2y$10$vHfzUTmP2Ys4nPz6PZXsiet91COpMOIdpTREriisemzLEuCPP3yZC', 'oaPwm7eJoLvV99fRjn8l4X4JjCfaPNCbostvkaxcfH17zd326O0vEcPsDcPL', '2015-11-29 19:53:14', '2015-12-20 04:11:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
