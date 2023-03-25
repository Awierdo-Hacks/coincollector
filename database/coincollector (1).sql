-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 03 mrt 2023 om 15:25
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
  `totaal` float(10,2) NOT NULL,
  `goal` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `coinlog`
--

INSERT INTO `coinlog` (`id`, `tijd`, `coinvalue`, `totaal`, `goal`) VALUES
(1, '2023-01-25 07:08:17', 0.00, 0.00, 17.00),
(2, '2023-03-03 09:36:16', 0.00, 0.00, 0.00);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
