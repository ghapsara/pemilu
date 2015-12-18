-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2015 at 09:59 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pemilu`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE IF NOT EXISTS `calon` (
`idcalon` int(2) NOT NULL,
  `nocalon` int(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `partai` varchar(255) NOT NULL,
  `visimisi` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`idcalon`, `nocalon`, `nama`, `partai`, `visimisi`) VALUES
(1, 1, 'seorang calon', 'partai maju', 'maju terus'),
(2, 2, 'seorang calon2', 'partai bangkit', 'bangkit terus'),
(3, 3, 'calon ganteng', 'partai cakep', 'mencakepkan warga indonesia'),
(4, 4, 'calon kuat', 'partai kuat banget', 'menguatkan indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `memilih`
--

CREATE TABLE IF NOT EXISTS `memilih` (
  `noktp` int(10) NOT NULL,
  `idcalon` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memilih`
--

INSERT INTO `memilih` (`noktp`, `idcalon`) VALUES
(4, 3),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE IF NOT EXISTS `penduduk` (
  `noktp` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jeniskelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`noktp`, `nama`, `jeniskelamin`, `alamat`) VALUES
(1, 'warga oke', 'perempuan', 'yogyakarta'),
(2, 'seorang penduduk', 'perempuan', 'yogyakarta'),
(3, 'warga baru', 'laki-laki', 'yogyakarta'),
(4, 'warga baru datang', 'perempuan', 'yogyakarta'),
(5, 'warga kampung', 'perempuan', 'yogyakarta'),
(7, 'warga cakep', 'laki-laki', 'yogyakarta'),
(8, 'penduduk imut', 'perempuan', 'yogyakarta'),
(9, 'warga baik', 'laki-laki', 'yogyakarta'),
(7749272, 'vanana', 'perempuan', 'semarang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
 ADD PRIMARY KEY (`idcalon`);

--
-- Indexes for table `memilih`
--
ALTER TABLE `memilih`
 ADD KEY `noktp` (`noktp`), ADD KEY `idcalon` (`idcalon`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
 ADD PRIMARY KEY (`noktp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon`
--
ALTER TABLE `calon`
MODIFY `idcalon` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `memilih`
--
ALTER TABLE `memilih`
ADD CONSTRAINT `memilih_ibfk_1` FOREIGN KEY (`noktp`) REFERENCES `penduduk` (`noktp`) ON UPDATE CASCADE,
ADD CONSTRAINT `memilih_ibfk_2` FOREIGN KEY (`idcalon`) REFERENCES `calon` (`idcalon`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
