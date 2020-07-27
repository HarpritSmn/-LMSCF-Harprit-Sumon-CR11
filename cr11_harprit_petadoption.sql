-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Jul 2020 um 15:15
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_harprit_petadoption`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `adopt`
--

CREATE TABLE `adopt` (
  `adopt_id` int(11) NOT NULL,
  `adopt_start` int(11) NOT NULL,
  `adopt_end` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_animals_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `animals_id` int(11) NOT NULL,
  `animals_animal` varchar(100) NOT NULL,
  `animals_name` varchar(100) NOT NULL,
  `animals_age` int(100) NOT NULL,
  `animals_type` enum('small','large','normal') NOT NULL,
  `animals_description` text NOT NULL,
  `animals_hobbies` text NOT NULL,
  `animals_image` varchar(1000) NOT NULL,
  `animals_city` varchar(100) NOT NULL,
  `animals_zip` varchar(1000) NOT NULL,
  `animals_address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`animals_id`, `animals_animal`, `animals_name`, `animals_age`, `animals_type`, `animals_description`, `animals_hobbies`, `animals_image`, `animals_city`, `animals_zip`, `animals_address`) VALUES
(1, 'tiger', 'frank', 12, 'large', 'he is an old tiger and very lazy.', 'hunting animals', 'https://cdn.pixabay.com/photo/2017/07/24/19/57/tiger-2535888_960_720.jpg', 'New Dehli', '2344', 'dehlistreet 34'),
(2, 'lion', 'susan', 2, 'small', 'is a baby lion', 'playing', 'https://cdn.pixabay.com/photo/2020/06/09/14/02/lion-cubs-5278504_960_720.jpg', 'Zimbabwe', '6342', 'countrystreet 94'),
(3, 'krokodil', 'croco', 17, 'large', 'a big friendly crocodile ', 'napping at golf course', 'https://cdn.pixabay.com/photo/2014/01/14/18/31/nile-crocodile-245013_960_720.jpg', 'florida', '8347', 'flostreet 44'),
(4, 'wolf', 'wolfgang', 20, 'large', 'lives alone ', 'howl', 'https://cdn.pixabay.com/photo/2016/04/18/10/17/wolf-1336229_960_720.jpg', 'upper austria', '5266', 'upperstraße 93'),
(5, 'rabbit', 'eg', 2432, 'small', 'errg', 'erg', 'gerger', 'eregrg', '244', 'fgsadg'),
(6, 'Horse', 'pegasus', 24, 'normal', 'a white horse', 'playing hide and seek', 'https://cdn.pixabay.com/photo/2018/04/06/13/02/horse-3295780_960_720.jpg', 'texas', '6433', 'roadstreet 98');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin','superadmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'Harprit', 'harprit@smn.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(2, 'test', 'test@test.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `adopt`
--
ALTER TABLE `adopt`
  ADD PRIMARY KEY (`adopt_id`);

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animals_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `adopt`
--
ALTER TABLE `adopt`
  MODIFY `adopt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `animals_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
