-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1:3313
-- Čas generovania: So 22.Jún 2019, 19:30
-- Verzia serveru: 10.3.10-MariaDB-1:10.3.10+maria~xenial-log
-- Verzia PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `db_autorx2mysql`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `alldata`
--

CREATE TABLE `alldata` (
  `id` int(11) NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `station` varchar(40) NOT NULL,
  `callsign` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL,
  `alt` float NOT NULL,
  `lat` float(8,6) NOT NULL,
  `lon` float(8,6) NOT NULL,
  `temp` float NOT NULL,
  `freq` varchar(40) NOT NULL,
  `frame` int(15) NOT NULL,
  `sats` int(4) NOT NULL,
  `batt` float NOT NULL,
  `bt` varchar(40) NOT NULL,
  `speed` float NOT NULL,
  `model` varchar(40) NOT NULL,
  `distance` float NOT NULL,
  `direction` varchar(40) NOT NULL,
  `comment` varchar(40) NOT NULL,
  `evel` float NOT NULL,
  `bear` float NOT NULL,
  `hum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `first_seen`
--

CREATE TABLE `first_seen` (
  `id` int(11) NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `station` varchar(40) NOT NULL,
  `callsign` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL,
  `alt` float NOT NULL,
  `lat` float(8,6) NOT NULL,
  `lon` float(8,6) NOT NULL,
  `temp` float NOT NULL,
  `freq` varchar(40) NOT NULL,
  `frame` int(15) NOT NULL,
  `sats` int(4) NOT NULL,
  `batt` float NOT NULL,
  `bt` varchar(40) NOT NULL,
  `speed` float NOT NULL,
  `model` varchar(40) NOT NULL,
  `distance` float NOT NULL,
  `direction` varchar(40) NOT NULL,
  `comment` varchar(40) NOT NULL,
  `evel` float NOT NULL,
  `bear` float NOT NULL,
  `hum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `sondedata`
--

CREATE TABLE `sondedata` (
  `id` int(11) NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `station` varchar(40) NOT NULL,
  `callsign` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL,
  `alt` float NOT NULL,
  `lat` float(8,6) NOT NULL,
  `lon` float(8,6) NOT NULL,
  `temp` float NOT NULL,
  `freq` varchar(40) NOT NULL,
  `frame` int(15) NOT NULL,
  `sats` int(4) NOT NULL,
  `batt` float NOT NULL,
  `bt` varchar(40) NOT NULL,
  `speed` float NOT NULL,
  `model` varchar(40) NOT NULL,
  `distance` float NOT NULL,
  `direction` varchar(40) NOT NULL,
  `comment` varchar(40) NOT NULL,
  `evel` float NOT NULL,
  `bear` float NOT NULL,
  `hum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `alldata`
--
ALTER TABLE `alldata`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `first_seen`
--
ALTER TABLE `first_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `sondedata`
--
ALTER TABLE `sondedata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `alldata`
--
ALTER TABLE `alldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `first_seen`
--
ALTER TABLE `first_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `sondedata`
--
ALTER TABLE `sondedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
