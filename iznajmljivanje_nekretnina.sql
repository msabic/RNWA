-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 03:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iznajmljivanje_nekretnina`
--

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id_grad` int(11) NOT NULL,
  `ime_grada` varchar(45) DEFAULT NULL,
  `zupanija_id_zupanija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id_grad`, `ime_grada`, `zupanija_id_zupanija`) VALUES
(1, 'Imotski', 1),
(2, 'Dubrovnik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idkorisnik` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `kontakt_broj` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `oib` int(11) NOT NULL,
  `lozinka` varchar(45) NOT NULL,
  `razina` int(11) DEFAULT NULL,
  `grad_id_grad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nekretnina`
--

CREATE TABLE `nekretnina` (
  `idnekretnina` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `kvadratura` int(11) NOT NULL,
  `cijena` varchar(45) NOT NULL,
  `broj_soba` int(11) NOT NULL,
  `broj_katova` int(11) NOT NULL,
  `bazen` tinyint(1) NOT NULL,
  `opis_nekretnine` varchar(500) NOT NULL,
  `kucni_ljubimci` tinyint(1) NOT NULL,
  `garaza` tinyint(1) NOT NULL,
  `grad_id_grad` int(11) NOT NULL,
  `vrsta_nekretnine_id_vrsta_nekretnine` int(11) NOT NULL,
  `zupanija_id_zupanija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nekretnina`
--

INSERT INTO `nekretnina` (`idnekretnina`, `naziv`, `kvadratura`, `cijena`, `broj_soba`, `broj_katova`, `bazen`, `opis_nekretnine`, `kucni_ljubimci`, `garaza`, `grad_id_grad`, `vrsta_nekretnine_id_vrsta_nekretnine`, `zupanija_id_zupanija`) VALUES
(1, 'Vila Imotski', 100, '1000', 5, 3, 1, 'Vila Imotski je vila koja se nalazi u Imotskom.', 1, 1, 1, 2, 0),
(2, 'Vikendica Dubrovnik', 50, '10', 2, 2, 1, 'Vikendica Dubrovnik je novoizgrađena vikendica koja ima Wi-Fi.', 1, 1, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `idrezervacija` int(11) NOT NULL,
  `pocetni_datum_rezervacije` date NOT NULL,
  `krajnji_datum_rezervacije` date NOT NULL,
  `datum_rezervacije` varchar(45) DEFAULT NULL,
  `cijena` int(11) DEFAULT NULL,
  `korisnik_idkorisnik` int(11) NOT NULL,
  `nekretnina_idnekretnina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `idslike` int(11) NOT NULL,
  `lokacija` varchar(250) DEFAULT NULL,
  `nekretnina_idnekretnina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`idslike`, `lokacija`, `nekretnina_idnekretnina`) VALUES
(1, 'img/slider/2.jpg', 1),
(2, 'img/slider/3.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_nekretnine`
--

CREATE TABLE `vrsta_nekretnine` (
  `id_vrsta_nekretnine` int(11) NOT NULL,
  `tip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrsta_nekretnine`
--

INSERT INTO `vrsta_nekretnine` (`id_vrsta_nekretnine`, `tip`) VALUES
(1, 'Kuća'),
(2, 'Vila'),
(3, 'Vikendica'),
(4, 'Stan');

-- --------------------------------------------------------

--
-- Table structure for table `zupanija`
--

CREATE TABLE `zupanija` (
  `id_zupanija` int(11) NOT NULL,
  `naziv_zupanije` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zupanija`
--

INSERT INTO `zupanija` (`id_zupanija`, `naziv_zupanije`) VALUES
(1, 'Splitsko dalmatinska'),
(2, 'Dubrovačko neretvanska');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id_grad`,`zupanija_id_zupanija`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idkorisnik`,`grad_id_grad`);

--
-- Indexes for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD PRIMARY KEY (`idnekretnina`,`grad_id_grad`,`vrsta_nekretnine_id_vrsta_nekretnine`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`idrezervacija`,`korisnik_idkorisnik`,`nekretnina_idnekretnina`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`idslike`,`nekretnina_idnekretnina`);

--
-- Indexes for table `vrsta_nekretnine`
--
ALTER TABLE `vrsta_nekretnine`
  ADD PRIMARY KEY (`id_vrsta_nekretnine`);

--
-- Indexes for table `zupanija`
--
ALTER TABLE `zupanija`
  ADD PRIMARY KEY (`id_zupanija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id_grad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idkorisnik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nekretnina`
--
ALTER TABLE `nekretnina`
  MODIFY `idnekretnina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `idrezervacija` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `idslike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vrsta_nekretnine`
--
ALTER TABLE `vrsta_nekretnine`
  MODIFY `id_vrsta_nekretnine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `zupanija`
--
ALTER TABLE `zupanija`
  MODIFY `id_zupanija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
