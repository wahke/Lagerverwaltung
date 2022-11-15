-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Nov 2022 um 17:06
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `lagerverwaltung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `material`
--

CREATE TABLE `material` (
  `id` int(255) NOT NULL,
  `barcode` text NOT NULL,
  `artikel` text NOT NULL,
  `lager_schrank` text NOT NULL,
  `lagerplatz` text NOT NULL,
  `einheit` text NOT NULL,
  `lagerbestand` text NOT NULL,
  `kategorie` text NOT NULL,
  `bereich` text NOT NULL,
  `material` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `upassword` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `material`
--
ALTER TABLE `material`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
