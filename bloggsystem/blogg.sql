-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09. Apr, 2020 00:02 a.m.
-- Server-versjon: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogg`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `blogpost`
--

CREATE TABLE IF NOT EXISTS `blogpost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `title` varchar(150) NOT NULL,
  `creation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `change_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_path` varchar(500) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Blogpost_User` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=140 ;

--
-- Dataark for tabell `blogpost`
--

INSERT INTO `blogpost` (`id`, `content`, `title`, `creation_time`, `change_time`, `image_path`, `author_id`) VALUES
(126, 'Laget av Hamodi', 'Dette er et post', '2020-04-02 21:28:40', '2020-04-06 05:57:33', 'hamo', 2),
(134, 'Wow', 'Dette er Mohammed', '2020-04-03 17:04:14', '2020-04-03 17:04:22', 'wow', 1),
(135, 'COOL', 'AMG', '2020-04-03 17:17:18', '2020-04-03 17:17:18', 'cool', 3),
(139, 'wow', 'Dette er et kult side', '2020-04-04 18:48:16', '2020-04-04 18:48:16', 'wow', 5);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dataark for tabell `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(15, 'Sport'),
(16, 'Skjønnhet'),
(17, 'Biler');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `image_upload`
--

CREATE TABLE IF NOT EXISTS `image_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dataark for tabell `image_upload`
--

INSERT INTO `image_upload` (`id`, `image`) VALUES
(1, 'audi.jpg'),
(2, 'lamo.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `postcategory`
--

CREATE TABLE IF NOT EXISTS `postcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `blogpostid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_PostCategory_Category1` (`categoryid`),
  KEY `fk_PostCategory_Blogpost1` (`blogpostid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dataark for tabell `postcategory`
--

INSERT INTO `postcategory` (`id`, `categoryid`, `blogpostid`) VALUES
(15, 15, 134),
(16, 17, 126);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(65) NOT NULL,
  `display_name` varchar(45) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `password_UNIQUE` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dataark for tabell `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `display_name`, `role`) VALUES
(1, 'Mohammed', '$2y$10$536vmJAXySCAfWdIyVbJLeAYuhMwmc7E0.ryG3E7PA22SSzQajsm.', 'Mohammed', 1),
(2, 'Hamodi', '$2y$10$W725avXhLtwlzFNniZijf.wxL3g8HdXRQOalrRAV0TYh.UPVbpeVq', 'Hamodi', 2),
(3, 'Amg', '$2y$10$OymnMmidSZY1Dqw8OlgERupZM0rwou39h/SyIDOCwV98Cw6NDeke6', 'Amg', 1),
(5, 'MGA', '$2y$10$uCGvkWf3VWVsweFBtQbcpOrBHyiryp/m8NvhsrJEkxFAzF0XcVL/6', 'MGA', 2);

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `fk_Blogpost_User` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrensninger for tabell `postcategory`
--
ALTER TABLE `postcategory`
  ADD CONSTRAINT `fk_PostCategory_Blogpost1` FOREIGN KEY (`blogpostid`) REFERENCES `blogpost` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PostCategory_Category1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
