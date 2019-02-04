-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 02:31 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mjs`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `klien_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_absensi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `klien_id`, `user_id`, `tgl_absensi`) VALUES
(20, 1, 7, '2019-01-12'),
(21, 1, 7, '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_detail`
--

CREATE TABLE `absensi_detail` (
  `id` int(11) NOT NULL,
  `absensi_id` int(11) NOT NULL,
  `personil_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_detail`
--

INSERT INTO `absensi_detail` (`id`, `absensi_id`, `personil_id`, `status`) VALUES
(19, 18, 5, 'Tanpa Keterangan'),
(20, 18, 6, 'Sakit'),
(23, 17, 6, 'Tanpa Keterangan'),
(24, 19, 5, 'Tanpa Keterangan'),
(25, 19, 6, 'Hadir'),
(26, 19, 5, 'Tanpa Keterangan'),
(27, 19, 6, 'Off'),
(34, 20, 5, 'Sakit'),
(35, 20, 6, 'Hadir'),
(36, 21, 5, 'Tanpa Keterangan'),
(37, 21, 6, 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id` int(11) NOT NULL,
  `nama_klien` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id`, `nama_klien`, `alamat`, `status`) VALUES
(1, 'Plaza Renon', 'Jl. Raya Puputan Renon', 1),
(2, 'Park 23 Entertainment Center', 'Jl. Kediri, Tuban', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personil`
--

CREATE TABLE `personil` (
  `id` int(11) NOT NULL,
  `nama_personil` varchar(100) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_tinggal` varchar(50) NOT NULL,
  `klien_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personil`
--

INSERT INTO `personil` (`id`, `nama_personil`, `jabatan`, `tgl_lahir`, `alamat_tinggal`, `klien_id`) VALUES
(5, 'guna', 'Chief', '2019-01-21', 'talang 2', 1),
(6, 'ratih', 'Chief', '2019-01-14', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `klien_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `alamat_user`, `email`, `password`, `telepon`, `jenis_kelamin`, `role`, `status`, `klien_id`) VALUES
(6, 'yoga', 'nnnnn', 'yoga@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0808979', 'Laki-laki', 'Admin', 1, 0),
(7, 'oka', 'gunung talang', 'sspr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123', 'Laki-laki', 'ss', 1, 1),
(8, 'eksekutif', 'asds', 'eksekutif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdasd', 'Laki-laki', 'Eksekutif', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absensi_detail`
--
ALTER TABLE `absensi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personil`
--
ALTER TABLE `personil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `absensi_detail`
--
ALTER TABLE `absensi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personil`
--
ALTER TABLE `personil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
