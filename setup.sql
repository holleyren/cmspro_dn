-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019-07-08 03:59:41
-- 服务器版本: 5.6.35-log
-- PHP 版本: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yuming_com`
--

-- --------------------------------------------------------

--
-- 表的结构 `cp_domain`
--

CREATE TABLE IF NOT EXISTS `cp_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cid` int(3) NOT NULL COMMENT '分类ID',
  `rid` int(3) DEFAULT NULL COMMENT '注册商ID',
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `domain` varchar(255) DEFAULT NULL COMMENT '域名',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `logo` varchar(255) DEFAULT NULL COMMENT 'LOGO',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` text COMMENT '描述',
  `regtime` int(11) DEFAULT NULL COMMENT '注册时间',
  `stoptime` int(11) DEFAULT NULL COMMENT '到期时间',
  `url` varchar(255) DEFAULT NULL COMMENT '跳转',
  `data` text COMMENT '数据',
  `status` int(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='域名表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `cp_domain_class`
--

CREATE TABLE IF NOT EXISTS `cp_domain_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `tid` int(11) NOT NULL COMMENT '上级ID',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `info` text NOT NULL COMMENT '介绍',
  `status` int(2) NOT NULL COMMENT '状态',
  `sort` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='域名分类' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `cp_domain_class`
--

INSERT INTO `cp_domain_class` (`id`, `tid`, `name`, `info`, `status`, `sort`) VALUES
(1, 0, '拼音域名', '', 1, 1),
(2, 0, '单词域名', '', 1, 2),
(3, 0, '数字域名', '', 1, 3),
(4, 0, '三杂域名', '', 1, 4),
(5, 0, '四杂域名', '', 1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `cp_domain_registrar`
--

CREATE TABLE IF NOT EXISTS `cp_domain_registrar` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `info` text NOT NULL COMMENT '介绍',
  `status` int(2) NOT NULL COMMENT '状态',
  `sort` int(3) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='域名注册商' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `cp_domain_registrar`
--

INSERT INTO `cp_domain_registrar` (`id`, `name`, `info`, `status`, `sort`) VALUES
(1, '阿里云(原万网)', '', 1, 1),
(2, '22.cn(爱名网)', '', 1, 2),
(3, '趣域网', '', 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
