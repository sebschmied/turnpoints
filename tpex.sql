-- phpMyAdmin SQL Dump
-- version 5.0.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 09:48 PM
-- Server version: 5.7.22
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpex`
--

-- --------------------------------------------------------

--
-- Table structure for table `turnpoints`
--

CREATE TABLE `turnpoints` (
  `id` int(11) NOT NULL,
  `coordinates` point NOT NULL,
  `altitude` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `turnpoints`
--

INSERT INTO `turnpoints` (`id`, `coordinates`, `altitude`, `name`, `comments`) VALUES
(1, '\0\0\0\0\0\0\0E»\n)?i @ÌÏ\rMÙaH@', 670, 'Merkur', 'Merkur near Baden Baden. Its summit is easily identifiable by its antenna tower and paragliding takeoffs to the west and northeast.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `turnpoints`
--
ALTER TABLE `turnpoints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `turnpoints`
--
ALTER TABLE `turnpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
