-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2020 at 11:04 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_vinyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL DEFAULT 'User',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `permission`, `first_name`, `last_name`) VALUES
(31, 'Nottahc', '$2y$10$O7593moZOGih88oxDBaYKeO9Ztdl02iE46uwKsR5XPPDYT1r/Lcg2', 'Admin', 'François', 'Hauet'),
(32, 'Nottah', '$2y$10$VQ7cBfGaXcg6i5DflMQ0VewmxgGpVU85bK.3mGDCX.tU6H0aWG.Wy', 'User', 'François', 'Hauet'),
(36, 'test', '$2y$10$lDSiOE381/F7cjdFnW5jxOJyICpghzwZsGaVafrwkNdXj4YOmDHhC', 'User', 'test', 'test'),

-- --------------------------------------------------------

--
-- Table structure for table `vinyl`
--

CREATE TABLE `vinyl` (
  `id` int(11) NOT NULL,
  `vinyl_name` varchar(255) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `specificity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vinyl`
--

INSERT INTO `vinyl` (`id`, `vinyl_name`, `artist_name`, `Country`, `price`, `status`, `specificity`) VALUES
(2, 'The Dark Side Of The Moon', 'Pink Floyd', 'Japon', '35', 'Bon', 'Vinyle Japonnais avec OBI'),
(13, 'Wish You Where Here', 'Pink Floyd', 'Europe', '20', 'Très bon', 'Rien'),
(14, 'Sgt Peppers', 'The Beatles', 'Europe', '25', 'Très bien', 'Picture Disc'),
(15, 'Sad Wings Of Destiny', 'Judas Priest', 'France', '20', 'Moyen', 'Rien'),
(16, 'Paintkiller', 'Judas Priest', 'Europe', '20', 'Très bon', 'Rien');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `vinyl_name` varchar(255) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `specificity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `vinyl_name`, `artist_name`, `specificity`) VALUES
(5, 'The Wall', 'Pink Floyd', 'Rien'),
(6, 'Alive 2007', 'Daft Punk', 'Rien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vinyl`
--
ALTER TABLE `vinyl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `vinyl`
--
ALTER TABLE `vinyl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
