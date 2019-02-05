-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 08:33 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasepemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cd`
--

CREATE TABLE `cd` (
  `cd_id` int(11) NOT NULL,
  `cdName` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `hargaSewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cd`
--

INSERT INTO `cd` (`cd_id`, `cdName`, `stock`, `hargaSewa`) VALUES
(1, 'Twilight Saga', 9, 7000),
(2, 'Hangout', 1, 10000),
(3, 'Divergent', 1, 5000),
(4, 'Mars met Venus', 1, 6000),
(5, 'Ayah', 5, 5000),
(6, 'The Expendable 2', 4, 10000),
(7, 'Epen & Cupen', 5, 3000),
(8, 'Soekarno', 1, 7000),
(9, 'Sepatu Dahlan', 1, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `username` varchar(18) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `idPeminjaman` int(11) NOT NULL,
  `tanggalPinjam` varchar(30) NOT NULL,
  `batasTanggal` varchar(30) NOT NULL,
  `tanggalPengembalian` varchar(30) DEFAULT NULL,
  `totalDenda` int(11) DEFAULT NULL,
  `totalHarga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`username`, `cd_id`, `idPeminjaman`, `tanggalPinjam`, `batasTanggal`, `tanggalPengembalian`, `totalDenda`, `totalHarga`) VALUES
('syarief', 1, 1, '11-05-2018', '18-05-2018', NULL, NULL, NULL),
('syarief', 3, 2, '11-05-2018', '18-05-2018', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(18) NOT NULL,
  `password` varchar(18) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_HP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `alamat`, `no_HP`) VALUES
('aditya', 'aditya', 'aditya putra pratama', 'Jl Panjaitan', '08788811100'),
('admin', 'admin', 'ADMINISTRATOR', '-', '081211111111'),
('darel', 'darel', 'ludgerus darel', 'Jl Soekarno Hatta', '087836541100'),
('farhan', 'farhan', 'farhan setya', 'Suhat', '0812345678'),
('syarief', 'syarief', 'syariefnoor', 'Dinoyo', '08988107670'),
('tituschristian', 'titus', 'titus christian', 'JL veteran', '0123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idPeminjaman`),
  ADD KEY `FK_user_peminjaman_username` (`username`),
  ADD KEY `FK_cd_peminjaman_cd_id` (`cd_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cd`
--
ALTER TABLE `cd`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `idPeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_cd_peminjaman_cd_id` FOREIGN KEY (`cd_id`) REFERENCES `cd` (`cd_id`),
  ADD CONSTRAINT `FK_user_peminjaman_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
