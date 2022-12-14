-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 10:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g00398383`
--
CREATE DATABASE IF NOT EXISTS `g00398383` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `g00398383`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 5),
(4, 1, 7),
(5, 1, 6),
(6, 1, 5),
(7, 1, 6),
(8, 1, 3),
(9, 1, 2),
(10, 1, 2),
(11, 1, 2),
(12, 1, 2),
(13, 1, 1),
(14, 1, 4),
(15, 1, 4),
(16, 1, 5),
(17, 1, 6),
(18, 1, 7),
(19, 1, 7),
(20, 1, 6),
(21, 1, 5),
(22, 1, 3),
(23, 1, 1),
(24, 1, 4),
(25, 1, 7),
(26, 1, 5),
(27, 1, 4),
(28, 1, 6),
(29, 2, 1),
(30, 2, 4),
(31, 2, 7),
(32, 4, 1),
(33, 4, 2),
(34, 4, 2),
(35, 5, 1),
(36, 5, 2),
(37, 5, 1),
(38, 9, 1),
(39, 9, 5),
(40, 9, 1),
(41, 10, 1),
(42, 10, 1),
(43, 11, 1),
(44, 11, 2),
(45, 11, 3),
(46, 11, 4),
(47, 11, 5),
(48, 12, 1),
(49, 12, 2),
(50, 12, 3),
(51, 12, 4),
(52, 12, 5),
(53, 14, 1),
(54, 14, 1),
(55, 15, 1),
(56, 15, 3),
(57, 17, 1),
(58, 17, 2),
(59, 18, 1),
(60, 18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(1) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `ImageURL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Price`, `ImageURL`) VALUES
(1, 'Landslides in Cyberspace - Mark Fisher Tribute', 10, 'CD1.jpg'),
(2, 'Mark Fisher Ghost Pullover', 20, 'Pullover.jpg'),
(3, 'Mark Fisher - Ghosts Of My Life', 10, 'Book1.jpg'),
(4, 'Mark Fisher - Capitalist Realism', 10, 'Book2.jpg'),
(5, 'Mark Fisher - K Punk', 20, 'Book3.jpg'),
(6, 'Mark Fisher - Post Capitalist Desire', 15, 'Book4.jpg'),
(7, 'Mark Fisher - The Weird And The Eerie', 15, 'Book5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'abc', 'abc'),
(2, 'rebert', 'works'),
(3, 'asd', 'asd'),
(4, 'eric', '123'),
(5, 'stan', 'mcgrath'),
(6, 'lisa', 'cheek'),
(7, 'mark', 'fisher'),
(8, 'nats', 'tester'),
(9, 'Biggie', 'Cheeks'),
(10, 'babyblue', 'begababyblue'),
(11, 'reg', 'new'),
(12, 'ser rebert streng', 'ser rebertly'),
(13, 'cersei lannister', 'jamie lannister'),
(14, 'lannister', 'lannister'),
(15, 'new', 'new'),
(16, 'asdasd', 'asdasd'),
(17, 'wew', 'wew'),
(18, 'lisanew', 'lisanew');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
