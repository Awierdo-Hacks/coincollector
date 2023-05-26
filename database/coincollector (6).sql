-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 26 mei 2023 om 14:31
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
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `coinlog`
--

INSERT INTO `coinlog` (`id`, `tijd`, `coinvalue`) VALUES
(4, '2023-03-10 07:26:24', 2.00),
(5, '2023-03-10 07:27:03', 0.50),
(6, '2023-03-10 07:27:51', 1.00),
(7, '2023-03-24 11:34:01', 0.50),
(8, '2023-03-24 11:47:14', 2.00),
(11, '2023-03-24 11:51:11', 1.00),
(12, '2023-03-24 12:09:18', 0.20),
(13, '2023-03-24 12:10:11', 0.50),
(14, '2023-03-24 12:10:50', 2.00),
(15, '2023-03-24 12:11:03', 2.00),
(16, '2023-03-24 12:11:05', 0.50),
(17, '2023-03-24 12:11:31', 1.00),
(18, '2023-03-24 12:11:32', 1.00),
(19, '2023-03-24 12:12:13', 1.00),
(20, '2023-03-24 12:12:51', 0.00),
(21, '2023-03-24 12:13:09', 0.20),
(22, '2023-03-24 12:13:32', 0.10),
(23, '2023-03-24 12:14:10', 1.00),
(24, '2023-03-24 12:14:23', 0.20),
(25, '2023-03-24 12:14:49', 1.00),
(26, '2023-03-24 12:14:59', 0.50),
(27, '2023-03-24 12:15:07', 0.50),
(28, '2023-03-24 12:15:14', 2.00),
(29, '2023-03-24 12:15:14', 0.50),
(30, '2023-03-24 12:16:59', 2.00),
(31, '2023-03-24 12:17:48', 1.00),
(32, '2023-05-25 07:28:11', 0.00),
(33, '2023-05-25 07:28:15', 0.00),
(34, '2023-05-25 07:28:17', 0.00),
(35, '2023-05-25 07:28:18', 0.00),
(36, '2023-05-25 07:28:19', 1.00),
(37, '2023-05-25 07:28:21', 0.00),
(38, '2023-05-25 07:28:22', 0.00),
(39, '2023-05-25 07:28:26', 0.10),
(40, '2023-05-25 07:28:50', 0.00),
(41, '2023-05-25 07:28:58', 0.00),
(42, '2023-05-25 07:29:21', 0.00),
(43, '2023-05-25 07:29:40', 0.00),
(44, '2023-05-25 07:30:23', 2.00),
(45, '2023-05-25 07:30:42', 0.00),
(46, '2023-05-25 07:30:45', 0.00),
(47, '2023-05-25 07:30:47', 0.50),
(48, '2023-05-25 07:30:48', 1.00),
(49, '2023-05-25 07:30:51', 1.00),
(50, '2023-05-25 07:30:53', 0.00),
(51, '2023-05-25 07:30:55', 0.00),
(52, '2023-05-25 07:30:55', 0.00),
(53, '2023-05-25 07:31:16', 0.00),
(54, '2023-05-25 07:31:19', 0.10),
(55, '2023-05-25 07:31:20', 0.00),
(56, '2023-05-25 07:31:24', 1.00),
(57, '2023-05-25 07:31:25', 0.00),
(58, '2023-05-25 07:31:27', 0.00),
(59, '2023-05-25 07:31:27', 0.00),
(60, '2023-05-25 07:31:29', 0.00),
(61, '2023-05-25 07:31:29', 2.00),
(62, '2023-05-25 07:31:30', 2.00),
(63, '2023-05-25 07:31:33', 0.00),
(64, '2023-05-25 07:31:34', 0.00),
(65, '2023-05-25 07:31:35', 2.00),
(66, '2023-05-25 07:31:39', 0.00),
(67, '2023-05-25 07:31:40', 0.00),
(68, '2023-05-25 07:31:41', 0.00),
(69, '2023-05-25 07:31:46', 2.00),
(70, '2023-05-25 07:32:09', 0.50),
(71, '2023-05-25 07:32:17', 1.00),
(72, '2023-05-25 07:32:20', 2.00),
(73, '2023-05-25 07:32:24', 0.50),
(74, '2023-05-25 07:32:27', 2.00),
(75, '2023-05-25 07:32:30', 2.00),
(76, '2023-05-25 07:32:36', 0.00),
(77, '2023-05-25 07:32:41', 0.10),
(78, '2023-05-25 07:32:46', 0.10),
(79, '2023-05-25 07:32:51', 1.00),
(80, '2023-05-25 07:32:55', 0.10),
(81, '2023-05-25 07:33:01', 0.10),
(82, '2023-05-25 07:33:03', 0.00),
(83, '2023-05-25 07:33:09', 0.50),
(84, '2023-05-25 07:34:29', 0.00),
(85, '2023-05-25 07:50:06', 0.00),
(86, '2023-05-25 07:50:07', 0.50),
(87, '2023-05-25 07:50:38', 0.00),
(88, '2023-05-25 07:50:40', 0.10),
(89, '2023-05-25 07:50:47', 0.00),
(90, '2023-05-25 07:51:09', 0.00),
(91, '2023-05-26 22:00:00', 100.60),
(92, '2023-05-23 22:00:00', 90.30),
(93, '2023-05-22 22:00:00', 60.20),
(94, '2023-05-23 22:00:00', 50.10),
(95, '2023-05-21 22:00:00', 1.99);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `bericht` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `doelbedrag` bigint NOT NULL,
  `doelnaam` varchar(50) NOT NULL,
  `isverwijderd` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `spaardata`
--

INSERT INTO `spaardata` (`id`, `doelbedrag`, `doelnaam`, `isverwijderd`) VALUES
(1, 130, 'snoep', 0),
(2, 110, 'Sneakers', 0),
(3, 80, 'Nerfgun', 0),
(4, 70, 'gsm', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
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
