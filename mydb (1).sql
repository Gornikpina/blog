-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2019 at 09:14 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clanek`
--

CREATE TABLE `Clanek` (
  `idClanek` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `vsebina` longtext NOT NULL,
  `nazivSlike` longtext NOT NULL,
  `datum` datetime NOT NULL,
  `Uporabnik_idUporabnik` int(11) NOT NULL,
  `Komentar_idKomentar` int(11) NOT NULL,
  `Kategorije_idKategorije` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Clanek`
--

INSERT INTO `Clanek` (`idClanek`, `naziv`, `vsebina`, `nazivSlike`, `datum`, `Uporabnik_idUporabnik`, `Komentar_idKomentar`, `Kategorije_idKategorije`) VALUES
(1, 'Zdravje na prvem mestu', 'bla bla bla', 'slika', '2019-01-21 12:11:21', 1, 1, 1),
(2, 'Pomen spanca', 'bla bla bla', 'spanec', '2019-01-21 12:11:21', 1, 1, 1),
(3, 'Smeh', 'Ha ha ha, to je vic', 'smesna', '2019-01-21 12:11:22', 1, 1, 2),
(4, 'Novica dneva', 'Danes se je zgodilo...', 'novica', '2019-01-21 12:11:23', 2, 1, 3),
(5, 'Slaba novica', 'Danes se je zgodilo...', 'Slaba_novica', '2019-01-11 12:11:23', 2, 1, 3),
(6, 'Umetnost', 'Umetnost, umetnost, umetnost', 'umetnost', '2019-01-20 10:11:23', 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Kategorije`
--

CREATE TABLE `Kategorije` (
  `idKategorije` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `Clanek_Uporabnik_idUporabnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Kategorije`
--

INSERT INTO `Kategorije` (`idKategorije`, `naziv`, `Clanek_Uporabnik_idUporabnik`) VALUES
(1, 'Zdravje', 1),
(2, 'Humor', 1),
(3, 'Novice', 2),
(4, 'Umetnost', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Komentar`
--

CREATE TABLE `Komentar` (
  `idKomentar` int(11) NOT NULL,
  `vsebina` text NOT NULL,
  `Uporabnik_idUporabnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Komentar`
--

INSERT INTO `Komentar` (`idKomentar`, `vsebina`, `Uporabnik_idUporabnik`) VALUES
(1, 'kul', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Uporabnik`
--

CREATE TABLE `Uporabnik` (
  `idUporabnik` int(11) NOT NULL,
  `uporabniskoIme` varchar(45) NOT NULL,
  `geslo` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nazivSlike` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Uporabnik`
--

INSERT INTO `Uporabnik` (`idUporabnik`, `uporabniskoIme`, `geslo`, `email`, `nazivSlike`) VALUES
(1, 'Pina', '14fc718b1f9c79d435a22fe77e6aa569', 'pina.bla@gmail.com', 'slika1'),
(2, 'Jana', 'b0f54ac9dd2cf70a7a69a0c27e91a6da', 'jana.novak@bla.si', 'jana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clanek`
--
ALTER TABLE `Clanek`
  ADD PRIMARY KEY (`idClanek`,`Uporabnik_idUporabnik`,`Komentar_idKomentar`,`Kategorije_idKategorije`),
  ADD KEY `fk_Clanek_Uporabnik_idx` (`Uporabnik_idUporabnik`),
  ADD KEY `fk_Clanek_Komentar1_idx` (`Komentar_idKomentar`),
  ADD KEY `fk_Clanek_Kategorije_idx` (`Kategorije_idKategorije`);

--
-- Indexes for table `Kategorije`
--
ALTER TABLE `Kategorije`
  ADD PRIMARY KEY (`idKategorije`,`Clanek_Uporabnik_idUporabnik`),
  ADD KEY `fk_Kategorije_Clanek1_idx` (`Clanek_Uporabnik_idUporabnik`);

--
-- Indexes for table `Komentar`
--
ALTER TABLE `Komentar`
  ADD PRIMARY KEY (`idKomentar`,`Uporabnik_idUporabnik`),
  ADD KEY `fk_Komentar_Uporabnik1_idx` (`Uporabnik_idUporabnik`);

--
-- Indexes for table `Uporabnik`
--
ALTER TABLE `Uporabnik`
  ADD PRIMARY KEY (`idUporabnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clanek`
--
ALTER TABLE `Clanek`
  MODIFY `idClanek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Kategorije`
--
ALTER TABLE `Kategorije`
  MODIFY `idKategorije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Komentar`
--
ALTER TABLE `Komentar`
  MODIFY `idKomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Uporabnik`
--
ALTER TABLE `Uporabnik`
  MODIFY `idUporabnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Clanek`
--
ALTER TABLE `Clanek`
  ADD CONSTRAINT `fk_Clanek_Kategorije` FOREIGN KEY (`Kategorije_idKategorije`) REFERENCES `Kategorije` (`idKategorije`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Clanek_Komentar1` FOREIGN KEY (`Komentar_idKomentar`) REFERENCES `Komentar` (`idKomentar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Clanek_Uporabnik` FOREIGN KEY (`Uporabnik_idUporabnik`) REFERENCES `Uporabnik` (`idUporabnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Kategorije`
--
ALTER TABLE `Kategorije`
  ADD CONSTRAINT `fk_Kategorije_Clanek1` FOREIGN KEY (`Clanek_Uporabnik_idUporabnik`) REFERENCES `Clanek` (`Uporabnik_idUporabnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Komentar`
--
ALTER TABLE `Komentar`
  ADD CONSTRAINT `fk_Komentar_Uporabnik1` FOREIGN KEY (`Uporabnik_idUporabnik`) REFERENCES `Uporabnik` (`idUporabnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
