-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 24 mrt 2023 om 15:26
-- Serverversie: 8.0.31
-- PHP-versie: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coincollector`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `coinlog`
--

DROP TABLE IF EXISTS `coinlog`;
CREATE TABLE IF NOT EXISTS `coinlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tijd` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `coinvalue` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `coinlog`
--

INSERT INTO `coinlog` (`id`, `tijd`, `coinvalue`) VALUES
(4, '2023-03-10 09:26:24', 2.00),
(5, '2023-03-10 09:27:03', 0.50),
(6, '2023-03-10 09:27:51', 1.00),
(7, '2023-03-24 13:34:01', 0.50),
(8, '2023-03-24 13:47:14', 200.00),
(11, '2023-03-24 13:51:11', 1.00),
(12, '2023-03-24 14:09:18', 0.20),
(13, '2023-03-24 14:10:11', 0.50),
(14, '2023-03-24 14:10:50', 2.00),
(15, '2023-03-24 14:11:03', 2.00),
(16, '2023-03-24 14:11:05', 0.50),
(17, '2023-03-24 14:11:31', 1.00),
(18, '2023-03-24 14:11:32', 1.00),
(19, '2023-03-24 14:12:13', 1.00),
(20, '2023-03-24 14:12:51', 0.00),
(21, '2023-03-24 14:13:09', 0.20),
(22, '2023-03-24 14:13:32', 0.10),
(23, '2023-03-24 14:14:10', 1.00),
(24, '2023-03-24 14:14:23', 0.20),
(25, '2023-03-24 14:14:49', 1.00),
(26, '2023-03-24 14:14:59', 0.50),
(27, '2023-03-24 14:15:07', 0.50),
(28, '2023-03-24 14:15:14', 2.00),
(29, '2023-03-24 14:15:14', 0.50),
(30, '2023-03-24 14:16:59', 2.00),
(31, '2023-03-24 14:17:48', 1.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `bericht` varchar(50) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `mail`
--

INSERT INTO `mail` (`id`, `tijd`, `bericht`, `username`) VALUES
(5, '2023-03-24 15:01:20', 'Positief', 'bankier');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `spaardata`
--

DROP TABLE IF EXISTS `spaardata`;
CREATE TABLE IF NOT EXISTS `spaardata` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `doelbedrag` double NOT NULL,
  `doelnaam` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `spaardata`
--

INSERT INTO `spaardata` (`id`, `doelbedrag`, `doelnaam`) VALUES
(12, 45, 'ssf'),
(3, 150, 'uw doel'),
(4, 70, 'auto'),
(5, 25, 'snoep'),
(14, 12, 'fghf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES
(1, 'bankier', 'geld', 'pieter.afr@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
