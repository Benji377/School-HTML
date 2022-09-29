-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 03:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buecherverwaltung`
--

-- --------------------------------------------------------

--
-- Table structure for table `autoren`
--

CREATE TABLE `autoren` (
  `aid` int(11) NOT NULL,
  `aname` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `ageburtsdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `autoren`
--

INSERT INTO `autoren` (`aid`, `aname`, `ageburtsdatum`) VALUES
(1, 'Kofler Michael', '1979-10-01'),
(2, 'Kramer David', '1962-10-23'),
(3, 'Orfali Robert', '1954-03-05'),
(4, 'Harkey Dan', '1975-07-26'),
(5, 'Edwards Jeri', '1986-03-21'),
(6, 'Ratschiller Tobias', '1952-07-09'),
(7, 'Gerken Till', '1973-03-06'),
(12, 'Yarger Randy Jay', '1977-12-01'),
(13, 'Reese Georg', '1973-09-10'),
(14, 'King Tim', '1965-07-17'),
(15, 'Date Chris', '1983-09-25'),
(16, 'Darween Hugh', '1955-06-23'),
(17, 'Krause J?rg', '1951-10-02'),
(19, 'Pohl Peter', '1983-12-06'),
(20, 'Kopka Helmut', '1980-11-27'),
(21, 'Komma Michael', '1985-12-09'),
(22, 'Bitsch Gerhard', '1977-12-23'),
(23, 'Holz Helmut', '1980-02-03'),
(24, 'Schmitt Bernd', '1959-04-02'),
(25, 'Tikart Andreas', '1951-11-03'),
(26, 'Garfinkel Simon', '1966-06-07'),
(30, 'DuBois Paul', '1986-09-18'),
(37, 'Theodor Kallifatides', '1976-07-12'),
(38, 'Goosens Michael', '1961-10-17'),
(39, 'Rahtz Sebastian', '1953-08-13'),
(47, 'Pollack Martin', '1954-09-28'),
(48, 'Gilmore W.J.', '1968-12-10'),
(51, 'Wellington Luke', '1968-07-16'),
(52, 'Thomson Laura', '1984-11-16'),
(53, 'Monjiam Bruce', '1980-08-21'),
(55, 'Mankell Henning', '1980-10-28'),
(56, 'Kr?ger Guido', '1979-04-20'),
(57, 'Knausg?rd Karl Ove', '1970-03-16'),
(58, 'Suter Martin', '1974-04-02'),
(60, '?ggl Bernd', '1967-11-05'),
(62, 'Asimov Isaac', '1955-09-11'),
(64, 'Laborenz Kai', '1950-10-04'),
(65, 'Wolfgarten Sebastian', '1958-07-16'),
(66, 'Atwood Margaret', '1976-09-13'),
(67, 'Bear Greg', '1984-06-20'),
(68, 'Coetzee J. M.', '1983-02-09'),
(69, 'Gardell Jonas', '1967-09-18'),
(70, 'Ibsen Henrik', '1956-10-27'),
(71, 'Johnson Eyvind', '1951-05-26'),
(73, 'Nesser H?kan', '1952-02-12'),
(74, 'Riel Joern', '1976-04-04'),
(75, 'S?derberg Hjalmar', '1954-02-17'),
(76, 'Saramago Jose', '1975-08-17'),
(77, 'van Heijden Adrianus Fr. Th.', '1959-12-23'),
(78, 'Hauser Tobias', '1969-02-17'),
(81, 'Lendecke Volker', '1975-03-22'),
(82, 'Eller Frank', '1955-01-08'),
(83, 'Schwichtenberg Holger', '1952-02-01'),
(86, 'Wall Larry', '1974-04-03'),
(87, 'Christiansen Tom', '1968-09-13'),
(88, 'Orwant Jon', '1976-04-21'),
(89, 'Gr?be Hans-Gert', '1971-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `kategorien`
--

CREATE TABLE `kategorien` (
  `kid` int(11) NOT NULL,
  `kname` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `khauptnummer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategorien`
--

INSERT INTO `kategorien` (`kid`, `kname`, `khauptnummer`) VALUES
(1, 'Computer books', 11),
(2, 'Databases', 1),
(3, 'Programming', 1),
(4, 'Relational Databases', 2),
(5, 'Object-oriented databases', 2),
(6, 'PHP', 3),
(7, 'Perl', 3),
(8, 'SQL', 2),
(9, 'Children\'s books', 11),
(10, 'Literature and fiction', 11),
(11, 'All books', NULL),
(34, 'MySQL', 2),
(36, 'LaTeX, TeX', 1),
(50, 'Java', 3),
(51, 'Visual Basic', 3),
(52, 'VBA', 3),
(53, 'C#', 3),
(54, 'C', 3),
(55, 'C++', 3),
(56, 'Operating Systems', 1),
(57, 'Linux', 56),
(58, 'Mac OS', 56),
(59, 'Windows', 56),
(60, 'Visual Basic .NET', 3),
(64, 'Sience Fiction', 10),
(65, 'Fantasy', 10),
(66, 'History', 10),
(77, 'PostgreSQL', 2),
(86, 'Microsoft Access', 2),
(87, 'SQLite', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sprachen`
--

CREATE TABLE `sprachen` (
  `sid` int(11) NOT NULL,
  `sname` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sprachen`
--

INSERT INTO `sprachen` (`sid`, `sname`) VALUES
(1, 'english'),
(2, 'deutsch'),
(3, 'svensk'),
(4, 'norsk');

-- --------------------------------------------------------

--
-- Table structure for table `titel`
--

CREATE TABLE `titel` (
  `tnummer` int(11) NOT NULL,
  `ttitel` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tuntertitel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `tauflage` int(255) UNSIGNED NOT NULL DEFAULT 1,
  `terscheinungsjahr` year(4) DEFAULT NULL,
  `tisbn` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `tvergriffen` tinyint(1) DEFAULT NULL,
  `tkommentar` mediumtext COLLATE latin1_general_ci DEFAULT NULL,
  `tbild` mediumblob DEFAULT NULL,
  `tpreis` decimal(38,2) DEFAULT NULL,
  `tletzteaenderung` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `anummer` int(11) NOT NULL,
  `knummer` int(11) NOT NULL,
  `snummer` int(11) NOT NULL,
  `vnummer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `titel`
--

INSERT INTO `titel` (`tnummer`, `ttitel`, `tuntertitel`, `tauflage`, `terscheinungsjahr`, `tisbn`, `tvergriffen`, `tkommentar`, `tbild`, `tpreis`, `tletzteaenderung`, `anummer`, `knummer`, `snummer`, `vnummer`) VALUES
(1, 'Linux', 'Installation, Konfiguration, Anwendung', 5, 2000, NULL, 0, NULL, NULL, '38.89', '2008-07-08 20:33:00', 37, 57, 2, 1),
(2, 'The Definitive Guide to Excel VBA', NULL, 1, 2000, NULL, NULL, NULL, NULL, '35.69', '2008-02-19 10:10:00', 47, 3, 1, 2),
(3, 'Client/Server Survival Guide', NULL, 1, 1997, NULL, 1, NULL, NULL, '29.29', '2009-01-04 23:07:00', 12, 2, 1, 1),
(4, 'Web Application Development with PHP 4.0', NULL, 1, 2000, NULL, 0, NULL, NULL, '44.59', '2008-09-24 03:28:00', 6, 6, 1, 3),
(7, 'MySQL', NULL, 1, 2000, NULL, 1, NULL, NULL, '34.59', '2008-04-26 09:05:00', 6, 34, 1, 3),
(9, 'MySQL & mSQL', NULL, 1, 1999, NULL, 0, NULL, NULL, '20.19', '2008-09-03 15:59:00', 53, 34, 1, 4),
(11, 'A Guide to the SQL Standard', NULL, 1, 1997, NULL, NULL, NULL, NULL, '44.59', '2008-04-21 04:51:00', 6, 8, 1, 1),
(13, 'Visual Basic 6', 'Programmiertechniken, Datenbanken, Internet', 1, 1998, NULL, 0, NULL, NULL, '35.89', '2008-05-27 01:14:00', 19, 51, 2, 1),
(14, 'Excel 2000 programmieren', NULL, 4, NULL, NULL, 1, NULL, NULL, '31.19', '2008-12-27 13:43:00', 17, 3, 2, 1),
(17, 'PHP - Grundlagen und L?sungen', 'Webserver-Programmierung unter Windows und Linux', 1, NULL, NULL, 0, NULL, NULL, '31.19', '2008-12-03 20:27:00', 24, 6, 2, 5),
(18, 'Nennen wir ihn Anna', NULL, 1, NULL, NULL, NULL, NULL, NULL, '36.79', '2008-09-20 23:00:00', 21, 9, 2, NULL),
(19, 'Alltid den d?r Annette', NULL, 1, NULL, NULL, NULL, NULL, NULL, '38.69', '2008-08-05 05:14:00', 7, 9, 3, NULL),
(20, 'Jag saknar dig, jag saknar dig', NULL, 1, NULL, NULL, 1, NULL, NULL, '20.19', '2008-12-16 15:15:00', 7, 9, 3, NULL),
(21, 'LaTeX', NULL, 1, 2000, NULL, 1, NULL, NULL, '33.59', '2008-09-03 17:04:00', 21, 36, 2, 1),
(22, 'Mathematica', 'Einf?hrung, Anwendung, Referenz', 4, 1998, '3827312086', 1, 'CAS', NULL, '32.09', '2008-07-10 01:04:00', 25, 1, 2, 1),
(23, 'Maple', NULL, 4, 2001, NULL, 0, 'CAS', NULL, '31.29', '2008-09-13 11:59:00', 7, 1, 2, 1),
(24, 'VBA-Programmierung mit Excel 7', NULL, 1, NULL, NULL, NULL, NULL, NULL, '44.69', '2008-11-22 18:15:00', 7, 3, 2, 1),
(25, 'Linux f?r Internet und Intranet', NULL, 1, NULL, NULL, 0, NULL, NULL, '31.19', '2008-04-07 23:19:00', 37, 3, 2, NULL),
(27, 'Practical UNIX & Internet Security', NULL, 2, 1996, '1565921488', 1, NULL, NULL, '24.59', '2008-05-26 01:40:00', 17, 1, 1, 4),
(30, 'Visual Basic Datenbankprogrammierung', 'Client/Server-Systeme', 1, 1999, NULL, 1, NULL, NULL, '38.19', '2008-07-26 09:23:00', 5, 2, 2, 1),
(32, 'Ute av verden', NULL, 1, 1998, NULL, NULL, NULL, NULL, '30.99', '2008-07-17 13:59:00', 38, 10, 4, NULL),
(33, 'MySQL', 'Installation, Programmierung, Referenz', 1, 2001, '3827317622', 1, NULL, NULL, '23.69', '2008-07-13 23:13:00', 47, 34, 2, 1),
(34, 'MySQL', NULL, 1, 2001, NULL, 0, 'translation', NULL, '30.49', '2008-04-05 02:36:00', 47, 34, 1, 2),
(41, 'PHP 4', NULL, 1, NULL, '3-446-21546-8', 1, NULL, NULL, '36.69', '2008-05-10 19:55:00', 30, 6, 2, NULL),
(42, 'K?rleken', NULL, 1, 1978, NULL, NULL, NULL, NULL, '27.19', '2008-07-11 04:54:00', 47, 10, 3, 9),
(43, 'Mit LaTeX ins Web', 'Elektronisches Publizieren mit TeX, HTML und XML', 1, 2000, NULL, NULL, NULL, NULL, '34.69', '2008-11-28 18:30:00', 30, 36, 2, 1),
(51, 'Anklage Vatermord', 'Der Fall Philipp Halsmann', 1, 2002, '3552052062', 1, NULL, NULL, '30.79', '2008-12-30 01:03:00', 5, 10, 2, 16),
(52, 'A Programmer\'s Introduction to PHP 4.0', NULL, 1, NULL, NULL, 1, NULL, NULL, '47.29', '2008-06-14 18:35:00', 7, 6, 1, 2),
(58, 'Linux', 'Installation, Konfiguration, Anwendung', 6, 2001, NULL, 0, NULL, NULL, '36.79', '2008-10-03 06:30:00', 17, 57, 2, 1),
(59, 'PHP and MySQL Web Development', NULL, 1, NULL, NULL, NULL, NULL, NULL, '31.19', '2008-11-18 19:34:00', 12, 6, 1, NULL),
(60, 'MySQL Cookbook', 'Solutions and Examples for MySQL Database Developers', 1, 2003, NULL, 1, NULL, NULL, '30.49', '2008-02-15 21:24:00', 39, 34, 1, 4),
(61, 'PostgreSQL', 'Einf?hrung und Konzepte', 1, NULL, NULL, 0, NULL, NULL, '40.39', '2008-12-23 16:39:00', 51, 4, 2, 1),
(63, 'Com?dia Infantil', NULL, 1, NULL, '9173246433', NULL, NULL, NULL, '35.99', '2008-08-01 10:58:00', 30, 10, 3, 17),
(64, 'Hunderna i Riga', NULL, 1, NULL, '9173246549).', 1, NULL, NULL, '37.29', '2008-09-30 23:27:00', 17, 10, 3, 17),
(65, 'Java', 'Handbuch der Java-Programmierung', 1, 2002, NULL, 0, NULL, NULL, '38.69', '2008-02-27 14:43:00', 30, 3, 2, 1),
(66, 'Ein perfekter Freund', NULL, 1, NULL, NULL, 1, NULL, NULL, '31.19', '2008-05-12 15:16:00', 26, 10, 2, 19),
(67, 'Linux im B?ro', 'Jetzt lerne ich ...', 1, 2004, NULL, 1, NULL, NULL, '41.39', '2008-02-14 11:08:00', 47, 57, 2, 20),
(68, 'PHP 5 und MySQL 5', 'Grundlagen, Programmiertechniken, Beispiele', 1, 2005, NULL, NULL, NULL, NULL, '36.39', '2008-07-21 06:03:00', 26, 6, 2, 1),
(69, 'Visual C#', 'Grundlagen, Programmiertechniken, Windows-Anwendungen', 1, 2003, NULL, 1, NULL, NULL, '33.49', '2008-04-08 11:32:00', 2, 53, 2, 1),
(70, 'Excel-VBA programmieren', NULL, 6, 2004, NULL, NULL, NULL, NULL, '44.49', '2008-02-07 22:20:00', 2, 3, 2, 1),
(71, 'Visual Basic .NET', 'Grundlagen, Programmiertechniken, Windows-Anwendungen', 1, 2002, NULL, 0, NULL, NULL, '34.19', '2008-10-07 12:51:00', 30, 60, 2, 1),
(72, 'I, Robot', NULL, 1, NULL, NULL, 0, NULL, NULL, '38.49', '2008-08-16 03:47:00', 37, 64, 1, NULL),
(75, 'The Definitive Guide to MySQL', NULL, 2, 2003, NULL, NULL, NULL, NULL, '47.59', '2008-04-19 06:24:00', 12, 34, 1, 2),
(77, 'CSS-Praxis', NULL, 2, 2004, NULL, 1, NULL, NULL, '32.59', '2008-04-24 14:57:00', 20, 1, 2, 21),
(78, 'Apache Webserver 2.0', 'Installation, Konfiguration, Programmierung', 1, 2003, NULL, 1, NULL, NULL, '43.79', '2008-06-07 06:05:00', 5, 1, 2, 1),
(79, 'Oryx and Crake', NULL, 1, 2003, NULL, 0, NULL, NULL, '33.99', '2008-05-27 23:41:00', 39, 64, 1, NULL),
(80, 'Darwin\'s Radio', NULL, 1, NULL, NULL, 1, NULL, NULL, '36.19', '2008-02-28 03:08:00', 47, 64, 1, NULL),
(81, 'Disgrace', NULL, 1, NULL, NULL, 1, NULL, NULL, '36.29', '2008-04-12 13:05:00', 12, 10, 1, NULL),
(82, 'Life and Times of Michael K', NULL, 1, NULL, NULL, 1, NULL, NULL, '42.49', '2008-06-20 11:57:00', 37, 10, 1, NULL),
(83, 'Oskuld och andra texter', NULL, 1, NULL, NULL, 1, NULL, NULL, '24.89', '2008-10-09 05:21:00', 51, 10, 3, NULL),
(84, 'Geng?ngare', NULL, 1, NULL, NULL, NULL, NULL, NULL, '25.79', '2009-01-10 13:14:00', 30, 10, 3, NULL),
(85, 'Grupp Krilon', NULL, 1, NULL, NULL, NULL, NULL, NULL, '32.49', '2009-01-30 14:24:00', 25, 10, 3, NULL),
(86, 'Dansl?raren ?terkomst', NULL, 1, NULL, NULL, NULL, NULL, NULL, '39.49', '2008-07-08 13:07:00', 47, 10, 3, NULL),
(87, 'Och Picadilly Circus ligger inte i Kumla', NULL, 1, NULL, NULL, 1, NULL, NULL, '37.89', '2008-05-24 07:27:00', 47, 10, 3, NULL),
(88, 'Nicht alle Eisb?ren halten Winterschlaf', NULL, 1, NULL, NULL, 0, NULL, NULL, '46.09', '2008-03-25 13:36:00', 21, 10, 2, NULL),
(89, 'Das Haus meiner V?ter', NULL, 1, NULL, NULL, 0, NULL, NULL, '39.59', '2008-08-09 18:43:00', 37, 10, 2, NULL),
(90, 'Doktor Glas', NULL, 1, NULL, NULL, NULL, NULL, NULL, '28.39', '2008-09-09 21:26:00', 7, 10, 3, NULL),
(91, 'Die Stadt der Blinden', NULL, 1, NULL, NULL, 1, NULL, NULL, '42.69', '2008-11-11 07:35:00', 7, 10, 2, NULL),
(92, 'Das Zentrum', NULL, 1, NULL, NULL, 0, NULL, NULL, '24.19', '2008-04-30 18:28:00', 30, 10, 2, NULL),
(93, 'Ein Tag, ein Leben', NULL, 1, NULL, NULL, 0, NULL, NULL, '27.49', '2008-10-28 13:01:00', 1, 10, 2, NULL),
(94, 'JavaScript', 'Interaktives und dynamisches Webpublishing', 1, NULL, NULL, 0, NULL, NULL, '22.39', '2008-09-26 21:45:00', 48, 1, 2, 20),
(95, 'Windows Forms', 'dotnet essentials', 1, 2002, NULL, 1, NULL, NULL, '42.89', '2008-08-14 08:23:00', 2, 60, 2, 1),
(97, 'Samba', NULL, 1, 2003, NULL, 0, NULL, NULL, '31.09', '2008-08-27 06:30:00', 39, 57, 2, 23),
(98, 'Programmieren mit der .NET-Klassenbibliothek', NULL, 1, NULL, NULL, 1, NULL, NULL, '36.99', '2008-05-01 13:43:00', 37, 3, 2, 1),
(99, 'Programmieren mit der .NET-Klassenbibliothek, 2. Aufl.', NULL, 1, 2003, NULL, NULL, NULL, NULL, '37.89', '2008-05-30 15:09:00', 39, 60, 2, 1),
(101, 'Das Atari ST Grafikbuch', NULL, 1, NULL, NULL, 1, NULL, NULL, '37.99', '2008-04-21 20:33:00', 22, 3, 2, 24),
(109, 'Programming Perl', NULL, 1, NULL, NULL, 1, NULL, NULL, '41.19', '2008-12-29 19:46:00', 7, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verlage`
--

CREATE TABLE `verlage` (
  `vid` int(11) NOT NULL,
  `vname` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `verlage`
--

INSERT INTO `verlage` (`vid`, `vname`) VALUES
(1, 'Addison-Wesley'),
(2, 'Apress'),
(3, 'New Riders'),
(4, 'O\'Reilly & Associates'),
(5, 'Hanser'),
(9, 'Bonnier Pocket'),
(16, 'Zsolnay'),
(17, 'Ordfront f?rlag AB'),
(19, 'Diogenes Verlag'),
(20, 'Markt und Technik'),
(21, 'Galileo'),
(23, 'dpunkt'),
(24, 'Sybex');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoren`
--
ALTER TABLE `autoren`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `kategorien`
--
ALTER TABLE `kategorien`
  ADD PRIMARY KEY (`kid`),
  ADD KEY `khauptnummer` (`khauptnummer`);

--
-- Indexes for table `sprachen`
--
ALTER TABLE `sprachen`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `titel`
--
ALTER TABLE `titel`
  ADD PRIMARY KEY (`tnummer`),
  ADD KEY `anummer` (`anummer`),
  ADD KEY `knummer` (`knummer`),
  ADD KEY `snummer` (`snummer`),
  ADD KEY `vnummer` (`vnummer`);

--
-- Indexes for table `verlage`
--
ALTER TABLE `verlage`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autoren`
--
ALTER TABLE `autoren`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `kategorien`
--
ALTER TABLE `kategorien`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `sprachen`
--
ALTER TABLE `sprachen`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `titel`
--
ALTER TABLE `titel`
  MODIFY `tnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `verlage`
--
ALTER TABLE `verlage`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategorien`
--
ALTER TABLE `kategorien`
  ADD CONSTRAINT `kategorien_ibfk_1` FOREIGN KEY (`khauptnummer`) REFERENCES `kategorien` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `titel`
--
ALTER TABLE `titel`
  ADD CONSTRAINT `titel_ibfk_1` FOREIGN KEY (`anummer`) REFERENCES `autoren` (`aid`),
  ADD CONSTRAINT `titel_ibfk_2` FOREIGN KEY (`knummer`) REFERENCES `kategorien` (`kid`) ON DELETE CASCADE,
  ADD CONSTRAINT `titel_ibfk_3` FOREIGN KEY (`snummer`) REFERENCES `sprachen` (`sid`),
  ADD CONSTRAINT `titel_ibfk_4` FOREIGN KEY (`vnummer`) REFERENCES `verlage` (`vid`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
