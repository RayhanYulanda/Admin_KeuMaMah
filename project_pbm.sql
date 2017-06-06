-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 10:19 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_pbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username_admin` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  PRIMARY KEY (`username_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mengajukan`
--

CREATE TABLE IF NOT EXISTS `mengajukan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ustadz` int(11) NOT NULL,
  `materi` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id`,`id_user`,`id_ustadz`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `instansi` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ustadz`
--

CREATE TABLE IF NOT EXISTS `ustadz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ustadz`
--

INSERT INTO `ustadz` (`id`, `email`, `password`, `nama`, `nohp`, `foto`) VALUES
(1, 'solmed@gmail.com', 'ustadz', 'Solmed Al-Bukhari', '083424563223', 'solmed.jpg'),
(2, 'riza@gmail.com', 'ustadz', 'Riza', '08316435222', 'riza.jpg'),
(3, 'alhabsyi@gmail.com', 'ustadz', 'Alhabsyi', '0834627422552', 'alhabsyi.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
