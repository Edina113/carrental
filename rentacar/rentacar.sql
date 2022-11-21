-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 02:40 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `automobili`
--

-- --------------------------------------------------------

--
-- Table structure for table `auta`
--

CREATE TABLE IF NOT EXISTS `auta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `marka` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `godProiz` varchar(5) NOT NULL,
  `kw` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `boja` varchar(15) NOT NULL,
  `gorivo` enum('benzin','dizel','plin','struja') NOT NULL,
  `cijena` int(11) NOT NULL,
  `link` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `auta`
--

INSERT INTO `auta` (`ID`, `marka`, `model`, `godProiz`, `kw`, `km`, `boja`, `gorivo`, `cijena`, `link`) VALUES
(1, 'Fiat', 'Stilo', '2003', 85, 390000, 'siva', 'dizel', 4000, 'stilo1.jpg'),
(2, 'BMW', 'X5', '2009', 180, 191500, 'crna', 'dizel', 23600, 'bmw2.jpg'),
(10, 'Audi', 'Q7', '2015', 176, 138574, 'Siva', 'dizel', 60800, 'audiq7.jpg'),
(11, 'Golf', '3', '1995', 65, 576000, 'plava', 'benzin', 3000, 'golf3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `korIme` varchar(50) NOT NULL,
  `sifra` varchar(50) NOT NULL,
  `administrator` enum('DA','NE') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `korIme`, `sifra`, `administrator`) VALUES
(1, 'edin', 'sifra1234', 'DA'),
(2, 'bakir', 'sifra1234', 'NE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
