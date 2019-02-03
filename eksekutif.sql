-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 09:43 AM
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
-- Database: `eksekutif`
--

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_klien` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id`, `user_id`, `nama_klien`) VALUES
(1, 1, 'park 23');

-- --------------------------------------------------------

--
-- Table structure for table `personil`
--

CREATE TABLE `personil` (
  `id` int(11) NOT NULL,
  `nama_personil` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `klien_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personil`
--

INSERT INTO `personil` (`id`, `nama_personil`, `jabatan`, `klien_id`) VALUES
(2, 'pasek', 'Chief', 1);

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `alamat_user`, `email`, `password`, `telepon`, `jenis_kelamin`, `role`, `status`) VALUES
(1, 'admin', 'tidak tahu', 'admin@admin.com', 'admin', '12312313', 'Laki-laki', 'Admin', 1),
(2, 'yoga', 'asdasd', 'yoga@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdad', 'Laki-laki', 'Eksekutif', 1),
(3, 'asdas', 'dasda', 'okasdasd@gmail.com', 'c99a11a53a3748269e3f86d7ac38df11', 'asdsad', 'Laki-laki', 'Admin', 0),
(4, 'wede', 'guna', 'okasdasd@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'asdsad', 'Laki-laki', 'Admin', 1),
(5, 'saya', 'hlsnjkfbsdaf', 'saya@eksekutif.com', '12345', '123456789', 'laki - laki', 'eksekutif', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personil`
--
ALTER TABLE `personil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
