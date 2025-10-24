-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 24 okt 2025 kl 08:35
-- Serverversion: 10.4.28-MariaDB
-- PHP-version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `bilar`
--
CREATE DATABASE IF NOT EXISTS `bilar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bilar`;

-- --------------------------------------------------------

--
-- Tabellstruktur `bil`
--

CREATE TABLE `bil` (
  `id` int(11) NOT NULL,
  `fabrikat` varchar(20) NOT NULL,
  `modell` varchar(20) NOT NULL,
  `regnr` char(6) NOT NULL,
  `farg` char(7) NOT NULL,
  `mil` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `bil`
--

INSERT INTO `bil` (`id`, `fabrikat`, `modell`, `regnr`, `farg`, `mil`) VALUES
(1, 'Kia', 'EV6', 'ABC123', '#000000', 0),
(2, 'Volvo', 'XC90', 'CBA321', '#ff0080', 0),
(3, 'Kia', 'EV6', 'QWE456', '#0080ff', 0),
(4, 'Audi', 'A8', 'GHJ999', '#8000ff', 999);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `bil`
--
ALTER TABLE `bil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `bil`
--
ALTER TABLE `bil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT ALL ON bilar.* To 'bilanv'@'localhost' IDENTIFIED BY 'bilpass';
FLUSH PRIVILEGES;
