-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `elib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `avtor` varchar(50) NOT NULL DEFAULT '',
  `nazv` varchar(50) NOT NULL DEFAULT '',
  `izd` varchar(50) NOT NULL DEFAULT '',
  `god_izd` varchar(50) NOT NULL DEFAULT '',
  `mesto_izd` varchar(50) NOT NULL DEFAULT '',
  `ob` varchar(50) NOT NULL DEFAULT '',
  `sobst` varchar(50) NOT NULL DEFAULT '',
  `udk` varchar(50) NOT NULL DEFAULT '',
  `bbk` varchar(50) NOT NULL DEFAULT '',
  `grif` varchar(50) NOT NULL DEFAULT '',
  `stat` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `referat` longtext NOT NULL,
  `text` longtext NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '',
  `total_votes` int(5) NOT NULL,
  `total_value` int(5) NOT NULL,
  `used_ips` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=69 ;

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `group_id` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=28 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
