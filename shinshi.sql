-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2022 at 05:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shinshi`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `street` varchar(60) NOT NULL,
  `postcode` varchar(5) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `userID`, `street`, `postcode`, `city`, `state`) VALUES
(11, 2, '31, JALAN 24, TAMAN SERAYA ,', '68000', 'AMPANG', 'Selangor'),
(12, 6, 'no.1,jalan1, taman saga', '1000', 'Ampang', 'Selangor'),
(13, 1, '31, JALAN 24, TAMAN SERAYA ,', '68000', 'AMPANG', 'Selangor'),
(15, 8, 'Suite 1606, casa mila', '68100', 'Batu caves', 'Selangor');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`) VALUES
(1, 'NOIR shirt', 'shirt01', 59.00, 'product-images/noir.jpg'),
(2, 'OSAMA top', 'top01', 129.00, 'product-images/osama.jpg'),
(3, 'SUCI shirt', 'shirt02', 59.00, 'product-images/suci.jpg'),
(4, 'LUMUT outer', 'outer01', 129.00, 'product-images/lumut.jpg'),
(5, 'AWAN outer', 'outer02', 189.00, 'product-images/awan.jpg'),
(6, 'PETAK top', 'top03', 119.00, 'product-images/petak.jpg'),
(7, 'LABU pants', 'pants01', 89.00, 'product-images/labu.jpg'),
(8, 'PEYU top', 'top04', 109.00, 'product-images/peyu.jpg'),
(9, 'SEYUM socks', 'socks01', 12.00, 'product-images/seyum.jpg'),
(10, 'TOMPAH sandal', 'sandals01', 69.00, 'product-images/tompah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `inv` int(10) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `quantity` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`inv`, `code`, `name`, `quantity`, `total`, `date`) VALUES
(17, 'shirt01', 'NOIR shirt', '1', '59', '2021-01-21'),
(18, 'top03', 'PETAK top', '1', '119', '2021-01-21'),
(19, 'outer02', 'AWAN outer', '1', '189', '2021-01-21'),
(20, 'top01', 'OSAMA top', '1', '129', '2021-01-21'),
(21, 'outer01', 'LUMUT outer', '1', '129', '2021-01-21'),
(22, 'pants01', 'LABU pants', '1', '89', '2021-01-21'),
(23, 'sandals01', 'TOMPAH sandal', '1', '69', '2021-01-21'),
(24, 'shirt02', 'SUCI shirt', '1', '59', '2021-01-21'),
(27, 'shirt02', 'SUCI shirt', '2', '118', '2021-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(5) NOT NULL,
  `staffName` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `username`, `password`) VALUES
(1, 'joergen smorgen', 'poopoo', '123456'),
(2, 'Elon Musk', 'xae12', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `username`, `password`, `fname`, `email`, `phone`, `created_at`) VALUES
(1, 'bench', '$2y$10$VCK2CtvBawPMA.H8VIorY.vQX1GupsUFmD6ULMMGILi5nBLWiig/O', 'Aidid kamil Iskandar Dzulkurnain', 'aididkamil1@gmail.com', '0142265200', '2021-01-16'),
(2, 'sanha_risya', '$2y$10$FLXGcICg7lWVWFrw7lpbqOejjqaNEVtwJWu8OuVUtPqpo76R4Ahj.', 'Marisya Hally', 'risyahally@gmail.com', '0102911910', '2021-01-16'),
(6, 'khalish', '$2y$10$6WOWYzyqq8jOm7/3d7GQ8.qiOkSwzve4hoWrKoCKU28OOh8xXvjJ2', 'khalish haiqal bin buyong', 'khalish_haiqal1@gmail.com', '0176830665', '2021-01-18'),
(8, 'pepe', '$2y$10$DHjjV/boKoMNNjFJWsCJheioqVTw2QfTrjb5kqrrKw3JxoKjtX//O', 'pepe bin popo', 'aididkamil1@gmail.com', '0142265200', '2021-01-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`inv`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `inv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `test` FOREIGN KEY (`userID`) REFERENCES `users1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
