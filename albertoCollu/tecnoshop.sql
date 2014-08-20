-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Ago 20, 2014 alle 20:31
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
-- Struttura della tabella `computers`
--

CREATE TABLE IF NOT EXISTS `computers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('Desktop','Notebook','Tablet') COLLATE latin1_general_cs NOT NULL,
  `brand` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `model` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `inces` enum('10.1','13.3','14.1','15.6','17.2') COLLATE latin1_general_cs NOT NULL,
  `os` enum('Linux mint 17 x86','Linux mint 17 x64','Windows 7 x86','Windows 7 x64','Windows 8.1 x64') COLLATE latin1_general_cs NOT NULL,
  `cpu` enum('i7-4980HQ','i5-4910MQ','i3-4690TG','FX-4100','FX-8350') COLLATE latin1_general_cs NOT NULL,
  `ram` enum('DDR1 1GB 400MHz','DDR2 2GB 800MHz','DDR3 4GB 1600MHz','DDR3 8GB 1600MHz','DDR3 16GB 1600MHz') COLLATE latin1_general_cs NOT NULL,
  `storage` enum('250GB 7200RPM SATA3','320GB 5400RPM SATA2','500GB 7200RPM SATA2','750GB 9600RPM SATA3','128GB SSD SATA3','180GB SSD SATA3') COLLATE latin1_general_cs NOT NULL,
  `gpu` enum('nVidia GeForce GTX 770','nVidia GeForce GTX 760','AMD Gigabyte Radeon R9 270X','AMD Sapphire R7 240') COLLATE latin1_general_cs NOT NULL,
  `description` text COLLATE latin1_general_cs,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `depot`
--

CREATE TABLE IF NOT EXISTS `depot` (
  `id_seller` bigint(20) unsigned NOT NULL,
  `id_computer` bigint(20) unsigned NOT NULL,
  `nitems` bigint(20) unsigned NOT NULL,
  `price` float NOT NULL,
  UNIQUE KEY `id_seller` (`id_seller`),
  UNIQUE KEY `id_computer` (`id_computer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

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
  `identity` enum('buyer','seller','admin') COLLATE latin1_general_cs DEFAULT NULL,
  `credit` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `address`, `identity`, `credit`) VALUES
(1, 'seller@gmail.com', '2e7464a5e9bac192f1251866fea0c255db0cbd83', 'Claudio', 'Bisio', 'Via Zelig 14', 'seller', 0),
(2, 'buyer@gmail.com', '9b165e49da3c5629a2dce8f7d7abbdd7025973d5', 'Leonardo', 'Pieraccioni', 'Via Panettone 34', 'buyer', 1236),
(3, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Tony', 'Stark', 'Stark Industries', 'admin', 0);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `depot`
--
ALTER TABLE `depot`
  ADD CONSTRAINT `depot_ibfk_1` FOREIGN KEY (`id_seller`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `depot_ibfk_2` FOREIGN KEY (`id_computer`) REFERENCES `computers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
