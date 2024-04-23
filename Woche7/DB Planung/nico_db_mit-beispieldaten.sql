-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Apr 2024 um 20:52
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `nico_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `ID` int(11) NOT NULL,
  `kategorie_titel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`ID`, `kategorie_titel`) VALUES
(1, 'HTML'),
(2, 'Design'),
(3, 'Beratung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt`
--

CREATE TABLE `projekt` (
  `ID` int(11) NOT NULL,
  `projekt_titel` varchar(45) DEFAULT NULL,
  `projekt_beschreibung` varchar(45) DEFAULT NULL,
  `projekt_bild` varchar(45) DEFAULT NULL,
  `projekt_datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `projekt`
--

INSERT INTO `projekt` (`ID`, `projekt_titel`, `projekt_beschreibung`, `projekt_bild`, `projekt_datum`, `user_ID`) VALUES
(1, 'Business 20', 'test', 'Business-20.png', '2024-04-23 18:21:49', 1),
(2, 'Pompeo', 'test 2', 'Pompeo.jpg', '2024-04-23 18:21:49', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt_has_kategorie`
--

CREATE TABLE `projekt_has_kategorie` (
  `projekt_ID` int(11) NOT NULL,
  `kategorie_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `projekt_has_kategorie`
--

INSERT INTO `projekt_has_kategorie` (`projekt_ID`, `kategorie_ID`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `passwort` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `passwort`) VALUES
(1, 'Nico', 'nico@myemail.net', '$2y$10$mdUByojdaLq1e027iD/ntumud7ML/xRpznqU2mVuG0DqCBE64HgvO');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`ID`,`user_ID`);

--
-- Indizes für die Tabelle `projekt_has_kategorie`
--
ALTER TABLE `projekt_has_kategorie`
  ADD PRIMARY KEY (`projekt_ID`,`kategorie_ID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `projekt`
--
ALTER TABLE `projekt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
