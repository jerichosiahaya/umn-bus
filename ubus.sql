-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2018 at 10:00 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u-bus`
--
-- --------------------------------------------------------

--
-- Table structure for table `bus_instances`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE
IF NOT EXISTS `bus`
(`busID` int
(11) NOT NULL,
  `ruteID` int
(11) NOT NULL,
  `jumlah_kursi` int
(11) NOT NULL,
  `tglBerangkat` date DEFAULT NULL,
  `wktBerangkat` time DEFAULT NULL,
  PRIMARY KEY
(`busID`),
  KEY `ruteID`
(`ruteID`),
  KEY `jumlah_kursi`
(`jumlah_kursi`),
  KEY `wktBerangkat`
(`wktBerangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`
busID`,
`ruteID
`, `jumlah_kursi`, `tglBerangkat`, `wktBerangkat`) VALUES
(30, 11540, 50, '2019-11-27', '07:30:00'),
(33, 11720, 50, '2019-11-27', '06:40:00'),
(34, 11750, 50, '2019-11-27', '06:50:00'),
(36, 11940, 50, '2019-11-27', '11:30:00'),
(38, 12100, 50, '2019-11-27', '11:30:00'),
(41, 21615, 50, '2019-11-28', '11:30:00');

-- --------------------------------------------------------
--
-- Table structure for table `kategoripengguna`
--

CREATE TABLE `kategoripengguna`
(
  `kategoriID` int
(5) NOT NULL,
  `jenisKategori` varchar
(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoripengguna`
--

INSERT INTO `kategoripengguna` (`
kategoriID`,`jenisKategori
`) VALUES
(1, 'Dosen'),
(2, 'Mahasiswa'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna`
( `penggunaID` int
(50) NOT NULL,
  `kategoriID` int
(5) DEFAULT NULL,
  `sandi` varchar
(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`
penggunaID`,`kategoriID
`, `sandi`) VALUES
(28019, 1, 'sinardunia'),
(32666, 2, 'kambingjantan'),
(32932, 2, 'richo1901');


--
-- Table structure for table `rute`
--

DROP TABLE IF EXISTS `rute`;
CREATE TABLE
IF NOT EXISTS `rute`
(
   `ruteID` int
(11) NOT NULL,
  `wktBerangkat` time DEFAULT NULL,
  `wktTiba` time DEFAULT NULL,
  `asal` varchar
(20) DEFAULT NULL,
  `tujuan` varchar
(20) DEFAULT NULL,
  `kapasitas` int
(11) DEFAULT NULL,
  PRIMARY KEY
(`ruteID`),
  KEY `asal`
(`asal`),
  KEY `tujuan`
(`tujuan`),
  KEY `wktTiba`
(`wktTiba`),
  KEY `kapasitas`
(`kapasitas`),
  KEY `wktBerangkat`
(`wktBerangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`
ruteID`,
`wktBerangkat
`, `wktTiba`, `asal`, `tujuan`, `kapasitas`) VALUES
(11540, '07:30:00', '07:45:00', 'Dormitory', 'UMN', 50),
(11720, '06:40:00', '07:45:00', 'Halte Total Depan TangCity', 'UMN', 50),
(11750, '06:40:00', '07:45:00', 'ITC BSD', 'UMN', 50),
(11940, '11:30:00', '11:45:00', 'UMN', 'Dormitory', 50),
(12100, '11:30:00', '12:35:00', 'UMN', 'Halte Total Depan TangCity', 50),
(21615, '11:30:00', '12:35:00', 'UMN', 'ITC BSD', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

DROP TABLE IF EXISTS `tiket`;
CREATE TABLE
IF NOT EXISTS `tiket`
(
  `tiketID` int AUTO_INCREMENT,
  `busID` int
(11) NOT NULL,
  `ruteID` int
(11) NOT NULL,
  `noKursi` int
(11) NOT NULL,
  `penggunaID` int
(11) DEFAULT NULL,
  `tglBerangkat` date DEFAULT NULL,
  PRIMARY KEY
(`tiketID`),
  KEY `ruteID`
(`ruteID`),
  KEY `penumpangID`
(`penumpangID`)
  KEY `busID`
(`busID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_instances`
--
ALTER TABLE `bus`
ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY
(`ruteID`) REFERENCES `rute`
(`ruteID`),
ADD CONSTRAINT `bus_ibfk_3` FOREIGN KEY
(`wktBerangkat`) REFERENCES `rute`
(`wktBerangkat`);
--
-- Constraints for table `seat_matrix`
--
ALTER TABLE `tiket`
ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY
(`ruteID`) REFERENCES `rute`
(`ruteID`),
ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY
(`penggunaID`) REFERENCES `pengguna`
(`penggunaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
