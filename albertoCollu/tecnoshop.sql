-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Set 17, 2014 alle 15:38
-- Versione del server: 5.5.35-0ubuntu0.13.10.2
-- Versione PHP: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `colluAlberto`
--
CREATE DATABASE IF NOT EXISTS `tecnoshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tecnoshop`;

-- --------------------------------------------------------

--
-- Struttura della tabella `computer`
--

CREATE TABLE IF NOT EXISTS `computer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('Desktop','Notebook','Tablet') COLLATE latin1_general_cs NOT NULL,
  `brand` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `model` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `inces` enum('10.1','13.3','14.2','15.6','17.2') COLLATE latin1_general_cs NOT NULL,
  `ram` enum('DDR1 1GB 400MHz','DDR2 2GB 800MHz','DDR3 4GB 1600MHz','DDR3 8GB 1600MHz','DDR3 16GB 1600MHz') COLLATE latin1_general_cs NOT NULL,
  `os` enum('Linux mint 17 x86','Linux mint 17 x64','Windows 7 x86','Windows 7 x64','Windows 8.1 x64') COLLATE latin1_general_cs NOT NULL,
  `cpu` enum('i7-4980HQ','i5-4910MQ','i3-4690TG','FX-4100','FX-8350') COLLATE latin1_general_cs NOT NULL,
  `storage` enum('250GB 7200RPM SATA3','320GB 5400RPM SATA2','500GB 7200RPM SATA2','750GB 9600RPM SATA3','128GB SSD SATA3','180GB SSD SATA3') COLLATE latin1_general_cs NOT NULL,
  `gpu` enum('nVidia GeForce GTX 770','nVidia GeForce GTX 760','AMD Gigabyte Radeon R9 270X','AMD Sapphire R7 240') COLLATE latin1_general_cs NOT NULL,
  `description` text COLLATE latin1_general_cs,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=32 ;

--
-- Dump dei dati per la tabella `computer`
--

INSERT INTO `computer` (`id`, `type`, `brand`, `model`, `inces`, `ram`, `os`, `cpu`, `storage`, `gpu`, `description`) VALUES
(17, 'Tablet', 'Samsung', 'Note 10.1', '10.1', 'DDR3 8GB 1600MHz', 'Windows 8.1 x64', 'FX-8350', '750GB 9600RPM SATA3', 'AMD Gigabyte Radeon R9 270X', 'Tablet'),
(18, 'Notebook', 'HP', 'Pavillon', '17.2', 'DDR3 4GB 1600MHz', 'Windows 8.1 x64', 'i5-4910MQ', '750GB 9600RPM SATA3', 'AMD Sapphire R7 240', 'Descrizione prodotto..'),
(21, 'Tablet', 'Sony', 'Xperia z2 ', '10.1', 'DDR2 2GB 800MHz', 'Linux mint 17 x64', 'i7-4980HQ', '180GB SSD SATA3', 'nVidia GeForce GTX 770', 'Descrizione prodotto..'),
(22, 'Desktop', 'Apple', 'MacBook Pro', '13.3', 'DDR3 4GB 1600MHz', 'Linux mint 17 x86', 'i7-4980HQ', '128GB SSD SATA3', 'nVidia GeForce GTX 770', 'Descrizione prodotto..'),
(25, 'Notebook', 'SONY', 'Vaio', '15.6', 'DDR3 4GB 1600MHz', 'Windows 7 x64', 'i3-4690TG', '500GB 7200RPM SATA2', 'nVidia GeForce GTX 760', 'Descrizione prodotto..'),
(26, 'Tablet', 'COMPAQ', 'vr500lx', '14.2', 'DDR3 4GB 1600MHz', 'Windows 7 x64', 'i3-4690TG', '500GB 7200RPM SATA2', 'AMD Gigabyte Radeon R9 270X', 'Descrizione prodotto..'),
(27, 'Notebook', 'mediacom', 'fd-9008', '10.1', 'DDR2 2GB 800MHz', 'Windows 7 x86', 'FX-4100', '128GB SSD SATA3', 'nVidia GeForce GTX 770', 'un brutto tablet\r\n'),
(28, 'Notebook', 'acer', 'aspireone', '15.6', 'DDR3 4GB 1600MHz', 'Linux mint 17 x86', 'i3-4690TG', '320GB 5400RPM SATA2', 'AMD Sapphire R7 240', 'Descrizione prodotto..'),
(29, 'Desktop', 'CoolerMaster', 'gr-92bf', '17.2', 'DDR3 16GB 1600MHz', 'Windows 8.1 x64', 'i7-4980HQ', '180GB SSD SATA3', 'nVidia GeForce GTX 770', 'Descrizione prodotto..'),
(30, 'Desktop', 'Compaq', 'HF-T400R', '14.2', 'DDR3 4GB 1600MHz', 'Linux mint 17 x64', 'i3-4690TG', '320GB 5400RPM SATA2', 'AMD Gigabyte Radeon R9 270X', 'Descrizione prodotto..'),
(31, 'Tablet', 'Apple', 'iPad', '10.1', 'DDR1 1GB 400MHz', 'Linux mint 17 x86', 'FX-8350', '250GB 7200RPM SATA3', 'AMD Sapphire R7 240', 'Descrizione prodotto..');

-- --------------------------------------------------------

--
-- Struttura della tabella `depot`
--

CREATE TABLE IF NOT EXISTS `depot` (
  `id_u` bigint(20) unsigned NOT NULL,
  `id_c` bigint(20) unsigned NOT NULL,
  `nitems` bigint(20) unsigned NOT NULL,
  `price` float NOT NULL,
  UNIQUE KEY `id_u` (`id_u`,`id_c`),
  KEY `id_c` (`id_c`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dump dei dati per la tabella `depot`
--

INSERT INTO `depot` (`id_u`, `id_c`, `nitems`, `price`) VALUES
(1, 17, 5, 899.99),
(1, 18, 20, 599.99),
(1, 21, 10, 359.9),
(1, 27, 21, 245.9),
(1, 28, 14, 399.99),
(1, 29, 2, 1228.98),
(1, 30, 6, 789.9),
(1, 31, 3, 699.98),
(4, 22, 3, 1100.99),
(4, 25, 3, 459.99),
(4, 26, 6, 349.99);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=12 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `address`, `identity`, `credit`) VALUES
(1, 'seller@gmail.com', '2e7464a5e9bac192f1251866fea0c255db0cbd83', 'Giulio', 'Cesare', 'Via Roma 13', 'seller', NULL),
(2, 'buyer@gmail.com', '9b165e49da3c5629a2dce8f7d7abbdd7025973d5', 'Ottaviano', 'Augusto', 'Via Milano 95', 'buyer', 10),
(3, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Tito', 'Vespasiano', 'Via Ponzio 57', 'admin', 0),
(4, 'seller2@gmail.com', 'e1aebd011e46c2cc90643cf88b2f59645722957e', 'Domiziano', 'Flavio', 'Via Ciampino 12', 'seller', 0);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `depot`
--
ALTER TABLE `depot`
  ADD CONSTRAINT `depot_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `depot_ibfk_2` FOREIGN KEY (`id_c`) REFERENCES `computer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
