-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 19 apr 2023 om 09:10
-- Serverversie: 8.0.31
-- PHP-versie: 8.2.0

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `coinlog`
--

INSERT INTO `coinlog` (`id`, `tijd`, `coinvalue`) VALUES
(1, '2023-03-29 08:21:51', 5.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `bericht` varchar(50) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `mail`
--

INSERT INTO `mail` (`id`, `tijd`, `bericht`, `username`) VALUES
(5, '2023-03-24 15:01:20', 'Positief', 'bankier'),
(6, '2023-03-28 08:38:51', 'Positief', 'bankier'),
(7, '2023-03-29 09:23:45', 'Positief', 'bankier');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `spaardata`
--

DROP TABLE IF EXISTS `spaardata`;
CREATE TABLE IF NOT EXISTS `spaardata` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `doelbedrag` double NOT NULL,
  `doelnaam` varchar(50) NOT NULL,
  `percentage` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `spaardata`
--

INSERT INTO `spaardata` (`id`, `doelbedrag`, `doelnaam`, `percentage`) VALUES
(12, 20, 'ssf', 70),
(16, 50, 'dfzzfz', 50),
(5, 25, 'snoep', 15),
(14, 12, 'fghf', 14),
(17, 100, 'fezfze', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES
(1, 'bankier', 'geld', 'pieter.afr@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
