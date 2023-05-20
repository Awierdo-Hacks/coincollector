-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 mei 2023 om 23:34
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `coinlog` (
  `id` int(11) NOT NULL,
  `tijd` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `coinvalue` float(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `coinlog`
--

INSERT INTO `coinlog` (`id`, `tijd`, `coinvalue`) VALUES
(4, '2023-03-10 08:26:24', 2.00),
(5, '2023-03-10 08:27:03', 0.50),
(6, '2023-03-10 08:27:51', 1.00),
(7, '2023-03-24 12:34:01', 0.50),
(8, '2023-03-24 12:47:14', 200.00),
(11, '2023-03-24 12:51:11', 1.00),
(12, '2023-03-24 13:09:18', 0.20),
(13, '2023-03-24 13:10:11', 0.50),
(14, '2023-03-24 13:10:50', 2.00),
(15, '2023-03-24 13:11:03', 2.00),
(16, '2023-03-24 13:11:05', 0.50),
(17, '2023-03-24 13:11:31', 1.00),
(18, '2023-03-24 13:11:32', 1.00),
(19, '2023-03-24 13:12:13', 1.00),
(20, '2023-03-24 13:12:51', 0.00),
(21, '2023-03-24 13:13:09', 0.20),
(22, '2023-03-24 13:13:32', 0.10),
(23, '2023-03-24 13:14:10', 1.00),
(24, '2023-03-24 13:14:23', 0.20),
(25, '2023-03-24 13:14:49', 1.00),
(26, '2023-03-24 13:14:59', 0.50),
(27, '2023-03-24 13:15:07', 0.50),
(28, '2023-03-24 13:15:14', 2.00),
(29, '2023-03-24 13:15:14', 0.50),
(30, '2023-03-24 13:16:59', 2.00),
(31, '2023-03-24 13:17:48', 1.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `bericht` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `spaardata` (
  `id` bigint(20) NOT NULL,
  `doelbedrag` double NOT NULL,
  `doelnaam` varchar(50) NOT NULL,
  `isverwijderd` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `spaardata`
--

INSERT INTO `spaardata` (`id`, `doelbedrag`, `doelnaam`, `isverwijderd`) VALUES
(1, 130, 'snoep', 0),
(2, 110, 'Sneakers', 0),
(3, 80, 'Nerfgun', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES
(1, 'bankier', 'geld', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `coinlog`
--
ALTER TABLE `coinlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `spaardata`
--
ALTER TABLE `spaardata`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `coinlog`
--
ALTER TABLE `coinlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT voor een tabel `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `spaardata`
--
ALTER TABLE `spaardata`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
