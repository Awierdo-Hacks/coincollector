-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 24 mrt 2023 om 10:13
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `coinlog`
--

INSERT INTO `coinlog` (`id`, `tijd`, `coinvalue`) VALUES
(4, '2023-03-10 09:26:24', 2.00),
(5, '2023-03-10 09:27:03', 0.50),
(6, '2023-03-10 09:27:51', 1.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `bericht` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `spaardata`
--

DROP TABLE IF EXISTS `spaardata`;
CREATE TABLE IF NOT EXISTS `spaardata` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `totaal` double NOT NULL,
  `doelbedrag` double NOT NULL,
  `doelnaam` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `spaardata`
--

INSERT INTO `spaardata` (`id`, `totaal`, `doelbedrag`, `doelnaam`) VALUES
(1, 0, 0, 'uw doel'),
(3, 50, 150, 'uw doel');

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
(1, 'bankier', 'geld', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
