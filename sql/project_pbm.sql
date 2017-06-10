-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2017 at 10:48 AM
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
  `id_ajuan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ustadz` int(11) NOT NULL,
  `materi` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `komentar` varchar(150) NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id_ajuan`,`id_user`,`id_ustadz`),
  UNIQUE KEY `id_ajuan` (`id_ajuan`),
  KEY `id_user` (`id_user`),
  KEY `id_ustadz` (`id_ustadz`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mengajukan`
--

INSERT INTO `mengajukan` (`id_ajuan`, `id_user`, `id_ustadz`, `materi`, `tanggal`, `alamat`, `status`, `komentar`, `waktu`) VALUES
(1, 1, 1, 'Buka puasa', '2017-06-07', 'Mibo', 'Pending', '', '03:03:00'),
(2, 2, 2, 'Tawaduk', '2017-06-01', 'Keutapang', 'Terima', '', '24:00:00'),
(5, 1, 1, 'sedekah', '2012-03-02', 'Mibo', 'Tolak', 'Saya kurang sehat', '10:00:00'),
(6, 1, 2, 'Wudhu', '2017-06-30', 'Prada', 'Terima', '', '20:00:00'),
(7, 5, 2, 'Sabar', '2017-06-16', 'Darsa', 'Tolak', 'Saya sibuk', '10:00:00'),
(8, 5, 1, 'Doa', '2017-06-14', 'Krueng Raya', 'Pending', '', '04:00:00'),
(9, 5, 4, 'Solat', '2017-06-08', 'Punge', 'Terima', 'InsyaAllah saya akan datang', '13:00:00'),
(10, 5, 9, 'Tawaduk', '2017-06-08', 'Lambaro', 'Pending', '', '12:00:00'),
(11, 5, 1, 'Nikah', '2017-06-08', 'Keutapang', 'Terima', '', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `nohp_user` varchar(20) NOT NULL,
  `instansi_user` varchar(20) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`,`email_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `password_user`, `nama_user`, `nohp_user`, `instansi_user`, `foto_user`) VALUES
(1, 'rayhanyulanda@gmail.com', 'user', 'Rehan', '083242472724', 'Himpunan Informatika', 'default.jpeg'),
(2, 'naya@gmail.com', 'user', 'Naya', '083234352124', 'HMIF', 'default.jpeg'),
(3, 'ray@gmail.com', 'aku', 'ii', 'dddff', 'ddd', 'default.jpeg'),
(4, 'nol@gmail.com', 'user', 'ray', '08274828472', 'gugudan', 'default.jpeg'),
(5, 'r@gmail.com', 'r', 'rehan', '0836372457', 'hmif', 'default.jpeg'),
(8, 'dhshshd@jdjd.com', 'ff', 'ff', '646565', 'shvsf', 'default.jpeg'),
(9, 'hdjdjsks@jdjd.com', 'djdjd', 'hsjsjsrd', '564655', 'dhshd', 'default.jpeg'),
(10, 'g@gmail.com', 'user', 'ini itu', '0845434', 'gkfksks', 'default.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ustadz`
--

CREATE TABLE IF NOT EXISTS `ustadz` (
  `id_ustadz` int(11) NOT NULL AUTO_INCREMENT,
  `email_ustadz` varchar(50) NOT NULL,
  `password_ustadz` varchar(20) NOT NULL,
  `nama_ustadz` varchar(30) NOT NULL,
  `nohp_ustadz` varchar(20) NOT NULL,
  `foto_ustadz` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ustadz`,`email_ustadz`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ustadz`
--

INSERT INTO `ustadz` (`id_ustadz`, `email_ustadz`, `password_ustadz`, `nama_ustadz`, `nohp_ustadz`, `foto_ustadz`) VALUES
(1, 'solmed@gmail.com', 'ustadz', 'Solmed Al-Bukhari', '08342456322', 'solmed.jpg'),
(2, 'riza@gmail.com', 'ustadz', 'Riza', '08316435222', 'riza.jpg'),
(4, 'alhabsyi@gmail.com', 'ustadz', 'Alhabsyi', '08453465753', 'alhabsyi.jpg'),
(6, 'bukhari@gmail.com', '1234', 'Bukhari', '084435346332', 'default.jpeg'),
(7, 'ali@gmail.com', 'ustadz', 'Ust Ali', '08428473524', 'default.jpeg'),
(8, 'yeye@gmail.com', 'ust', 'yeye', '08428346293', 'default.jpeg'),
(9, 'yaya@gmail.com', 'ust', 'yaya', '08423354255', 'default.jpeg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mengajukan`
--
ALTER TABLE `mengajukan`
  ADD CONSTRAINT `mengajukan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `mengajukan_ibfk_2` FOREIGN KEY (`id_ustadz`) REFERENCES `ustadz` (`id_ustadz`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
