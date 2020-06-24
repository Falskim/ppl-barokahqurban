-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 04:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qurban`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `livestock_id` int(11) NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `finished` tinyint(1) NOT NULL,
  `handled_by_seller` tinyint(1) NOT NULL,
  `deliver_address` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donate_id`, `user_id`, `livestock_id`, `recipient`, `quantity`, `date`, `finished`, `handled_by_seller`, `deliver_address`, `description`) VALUES
(1, 4, 2, 'bubun', 2, '2020-05-30 20:34:02', 0, 1, 'jln juanda no 8 kec apa aja gang situ planet bekasi', 'first donation!'),
(2, 4, 4, 'memet', 3, '2020-05-30 21:15:20', 0, 0, 'jjjlll apa apa aja lah', '2nd');

-- --------------------------------------------------------

--
-- Table structure for table `livestocks`
--

CREATE TABLE `livestocks` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livestocks`
--

INSERT INTO `livestocks` (`id`, `category`, `price`, `available`, `image`) VALUES
(1, 'Sapi A', 10000000, 1, 'sapi.jpg'),
(2, 'Sapi B', 5000000, 1, 'sapi.jpg'),
(3, 'Domba A', 200000000, 0, 'domba.jpg'),
(4, 'Domba B', 100000, 1, 'domba.jpg'),
(5, 'Kambing A', 7500000, 1, 'kambing.jpg'),
(6, 'Kambing B', 2000000, 1, 'kambing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `livestock_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `finished` tinyint(1) NOT NULL DEFAULT 0,
  `handled_by_seller` tinyint(1) NOT NULL DEFAULT 0,
  `deliver_address` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `livestock_id`, `quantity`, `date`, `finished`, `handled_by_seller`, `deliver_address`, `description`) VALUES
(1, 2, 2, 2, '2020-04-05 11:04:31', 1, 0, NULL, 'Keduax !!!'),
(2, 3, 2, 1, '2020-04-05 11:04:31', 0, 1, NULL, 'Ayy lmao'),
(3, 2, 6, 2, '2020-04-05 11:05:02', 0, 0, NULL, NULL),
(4, 4, 1, 3, '2020-05-10 14:11:18', 0, 0, 'bumi', 'yes yes yes'),
(5, 4, 4, 7, '2020-05-10 14:12:51', 0, 1, 'bumi', 'thats alot of sheep'),
(6, 4, 4, 1, '2020-05-30 17:08:02', 0, 0, 'bumi', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `photo`, `password`, `role`) VALUES
(1, 'Admin', 'admin', NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'First User', 'user@gmail.com', '0853456789', 'Jl. Somewhere No.One Kota Sebelah', 'photo_2.png', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(3, 'Test Dummy', 'user2@gmail.com', '081234567', 'Jl. Cibiru No 123 Kota Bandung', NULL, 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(4, 'ahmad', 'ahmad@email.com', '081234567890', 'bumi', NULL, '61243c7b9a4022cb3f8dc3106767ed12', 'user'),
(5, 'ilham', 'ilham@gmail.com', NULL, NULL, NULL, 'b63d204bf086017e34d8bd27ab969f28', 'user'),
(6, 'aldi', 'aldi@email.com', NULL, NULL, NULL, '5cf15fc7e77e85f5d525727358c0ffc9', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donate_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `livestock_id` (`livestock_id`);

--
-- Indexes for table `livestocks`
--
ALTER TABLE `livestocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `livestock_id` (`livestock_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `livestocks`
--
ALTER TABLE `livestocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`livestock_id`) REFERENCES `livestocks` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
