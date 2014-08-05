-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Ago 05, 2014 alle 20:35
-- Versione del server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tecnoshop`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `password` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `name` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `surname` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `address` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `identity` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `credit` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `address`, `identity`, `credit`) VALUES
(1, 'seller@gmail.com', '2e7464a5e9bac192f1251866fea0c255db0cbd83', 'Claudio', 'Bisio', 'Via Zelig 13', 'seller', NULL),
(2, 'buyer@gmail.com', '9b165e49da3c5629a2dce8f7d7abbdd7025973d5', 'Leonardo', 'Pieraccioni', 'Via Panettone 34', 'buyer', NULL),
(3, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Tony', 'Stark', 'Stark Industries', 'admin', NULL);
--
-- Database: `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
